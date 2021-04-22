<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Log;
use Session;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller{
     

    public static function humanFileSize($size,$unit="") {
          if( (!$unit && $size >= 1<<30) || $unit == "GB")
               return number_format($size/(1<<30),2)."GB";
          if( (!$unit && $size >= 1<<20) || $unit == "MB")
               return number_format($size/(1<<20),2)."MB";
          if( (!$unit && $size >= 1<<10) || $unit == "KB")
               return number_format($size/(1<<10),2)."KB";
          return number_format($size)." bytes";
    }

    public function create()
    {
          try {
               /* only database backup*/
	          //Artisan::call('backup:run --only-db');
               /* all backup */
               $output = Artisan::call('backup:run',['--only-db'=>true]);

               dd(Artisan::output());
               Log::info("Backpack\BackupManager -- new backup started \r\n" . $output);
               session()->flash('success', 'Successfully created backup!');
               return redirect()->back();
          } catch (Exception $e) {
               session()->flash('danger', $e->getMessage());
               return redirect()->back();
          }
    }

    public function download($file_name) {
        $file = config('laravel-backup.backup.name') .'/Backup_folder_name/'. $file_name;
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);

        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);

            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "Backup file doesn't exist.");
        }
    }

     public function delete($file_name){
          $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
          if ($disk->exists(config('laravel-backup.backup.name') . '/Backup_folder_name/' . $file_name)) {
               $disk->delete(config('laravel-backup.backup.name') . '/Backup_folder_name/' . $file_name);
               session()->flash('delete', 'Successfully deleted backup!');
               return redirect()->back();
          } else {
               abort(404, "Backup file doesn't exist.");
          }
     }
}
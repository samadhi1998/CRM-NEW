<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function View(){

        return view('Reminder.addreminder');
    }

    public function Add(Request $request){
        $reminder = new Reminder();

        $reminder->Description = $request->input('Description');
        $reminder->StartDate = $request->input('StartDate');
        $reminder->EndDate = $request->input('EndDate');

        $reminder->save();

        return redirect('/reminder');
    }
}

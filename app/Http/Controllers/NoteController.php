<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Note::class, Note::class);
    }
    
    //Add Note 

    public function AddNote(Request $request)
    {
       $note=new note;
       $note->Added_By = Auth::user()->EmpID;
       $note->Description=$request->Description;
       $note->Type=$request->Type;
       $note->OrderID=$request->OrderID;

       if($request->hasfile('image')){
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();//get image extension
          $filename= time().'.'.$extension;
          $file->move('uploads/note',$filename); 
          $note->image=$filename;
          }else{
              return $request;
              $note->image='';
          }
       $result=$note->save();

    
       return redirect('/note/viewnote')-> with ('success','Product Inserted successfully');
    }

    //Show Notes

    public function index()
    {
        $note = Note::where('Added_By','=', Auth::user()->EmpID)->get();

        if(Auth::user()->roles->name == 'Super-Admin'){
            $note = Note::all();
        }
        
        return  view('notes/viewnote', ['notes'=>$note]);
    }

    //Redirect to edit view
      
    public function UpdateNote($NoteID)
    {
        $data=note::find($NoteID);
        return view('notes/editnote', ['data'=>$data]);

    }

    //Edit Note

    public function ShowUpdatesNotes(Request $req)
    {
        $data=note::find($req->NoteID);
        $data->Description=$req->Description;
        $data->Type=$req->Type;
        $data->save();
        return redirect('/note/viewnote');
    }

    //Delete Note

    public function deleteNote($NoteID)
    {
        $data=note::find($NoteID);
        $data->delete();
        return redirect('/note/viewnote');
    }

}

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
        $note = Note::where('Added_By','=', Auth::user()->EmpID)->sortable()->paginate(4);

        if(Auth::user()->roles->name == 'Super-Admin'){
            $note = Note::sortable()->paginate(4);
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

    public function searchNotes(Request $request)
    {

        $request->validate([
            'query'=>'required']);

        $query=$request->input('query') ;
        
        $note=Note::where('Description', 'like', "%$query%")->orWhere('OrderID', 'like', "%$query%")->orWhere('NoteID', 'like', "%$query%")->paginate(5);
        
        if (count($note)>0) {
            return view('notes/searchNote', ['notes'=>$note]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter available one ...');
        }
    
    }

}

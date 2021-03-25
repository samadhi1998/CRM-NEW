<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddNote(Request $request)
    {
        // $this->validate($request, [
        
        //     'Name'=>'required|min:1|max:25',
        //     'Brand'=>'required|min:1|max:25',
        //     'Price'=>'required',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        //     'Description'=>'required|min:1|max:100'
        // ]);


       $note=new note;
       $note->Added_By = Auth::user()->EmpID;
       $note->Description=$request->Description;
       $note->Type=$request->Type;
       $note->OrderID=$request->OrderID;
       //$order = $request->input('OrderID');
       //$note->orders()->associate($order);

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

    // public function CreateNote()
    // {
    //     return view('notes.createnote')
    //     ->with('orders',order::all());
    // }

    public function ViewNote()
    {
        $data=note::paginate(5);
        return  view('notes/viewnote', ['notes'=>$data]);
    }
      
    public function UpdateNote($NoteID)
    {
        $data=note::find($NoteID);
        return view('notes/editnote', ['data'=>$data]);

    }


    public function ShowUpdatesNotes(Request $req)
    {
        $data=note::find($req->NoteID);
        $data->Description=$req->Description;
        $data->Type=$req->Type;
        $data->save();
        return redirect('/note/viewnote');

    }


    public function deleteNote($NoteID)
    {
        $data=note::find($NoteID);
        $data->delete();
        return redirect('/note/viewnote');
    }

    public function joinNotes(Note $note)
    {
        // return DB::table('orders')->get();
           return DB::table('orders')
          ->join('notes','orders.OrderID',"=",'notes.OrderID')
          ->select('orders.OrderID')
          ->where('orders.orderID',1)
          ->get();   
    }
}

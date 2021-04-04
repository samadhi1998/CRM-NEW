<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Event::class, Event::class);
    }

    public function index()
    {
                $events = [];
                $data = Event::where('Added_By','=', Auth::user()->EmpID)->get();
                if($data->count())
                 {
                    foreach ($data as $key => $value) 
                    {
                        $events[] = \Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.'+1 day'),
                            null,
                            // Add color
                         [
                            'color'=> $value->color,
                             'textColor' => $value->textColor,
                         ]
                        );
                    }
                }
                $calendar =\Calendar::addEvents($events);
                return view('Reminder.addreminder',compact('events','calendar'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
          ]);
         $events=new Event;
         $events->Added_By = Auth::user()->EmpID;
         $events->title=$request->input('title');
         $events->color=$request->input('color');
         $events->start_date=$request->input('start_date');
         $events->end_date=$request->input('end_date');
         $events->save();
         return redirect('/reminder')->with('success','Event Added');
    }

   
    public function show()
    {
       
        $events = Event::where('Added_By','=', Auth::user()->EmpID)->get();
        return view('Reminder.viewreminder')->with('events',$events);
    }

   
    public function edit($id)
    {
       
        $events = Event::find($id);
        return view('Reminder.editreminder',['events'=>$events]);
    }

    public function update(Request $request, Event $event)
    {
          
        $events = Event::find($request->input('id'));
        $events->id = $request->input('id');
        $events->title = $request->input('title');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');
        $events->color = $request->input('color');
        

          $events->update($request->all());

         return redirect('/view-reminder')->with('success','Event Updates Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $events = Event::find($id);
        $events->delete();
         return redirect('/view-reminder');
    }

    public function searchReminders(Request $request)
    {

        $request->validate([
            'query'=>'required']);

        $query=$request->input('query') ;
        
        $event=Event::where('title', 'like', "%$query%")->orWhere('start_date', 'like', "%$query%")->orWhere('end_date', 'like', "%$query%")->paginate(5);
        
        if (count($event)>0) {
            return view('Reminder/searchReminder', ['events'=>$event]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter available one ...');
        }
    
    }
}

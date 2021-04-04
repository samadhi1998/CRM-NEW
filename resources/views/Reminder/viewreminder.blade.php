@extends('layouts.app')
@section('title','View Reminders')
@section('header','Reminder Details')
@section('content')
<div class="pull-left">
  @if(Auth::user()->can('add-reminder', App\Models\Event::class))
    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" >Add New Reminder <span data-feather="plus"></button>
  @endif
  @if(Auth::user()->can('view-calendar', App\Models\Event::class))
    <a class="btn btn-primary" href="/reminder">View Calendar </a>
  @endif
</div>
  <br> 
  <br>

<div class="container " style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <br>
            <form action="/Search_Reminders" method="GET" role="search">
              {{ csrf_field() }}
              <div class="input-group">
                <input type="text" class="form-control" name="query" id="query" placeholder="Search Reminder"> 
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </form>
            </br>
            </br>
            <table>
              <tr >
                <th >Reminder ID</th>
                <th >Description</th>
                <th >Start Date</th>
                <th >End Date</th>
                <th >Action</th>
              </tr>

              @foreach($events as $event)
              <tr>                                                
                <th scope="row">{{$event['id']}}</th>
                <td>{{$event['title']}}</td>
                <td>{{$event['start_date']}}</td>
                <td>{{$event['end_date']}}</td>
                <td>
                  @if(Auth::user()->can('edit-reminder', App\Models\Event::class))
                    <a href= "/editeventurl/update/{{$event['id']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                           
                  @endif
                  @if(Auth::user()->can('delete-reminder', App\Models\Eveent::class)) 
                    <a href= "/deleteeventurl/{{$event['id']}}" style="margin:10px" class="text-my-own-color"><span data-feather ="trash-2"></span></a> 
                  @endif
                </td>
              </tr>
               @endforeach
            </table>
            <br>
            <br> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('addevent.store') }}"  id="myform">
                @csrf
                <label for="title" ><b>Add Title : </b></label>
                <input type="text" name="title" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="color" ><b>Add Color : </b></label>
                <input type="color" name="color" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="start_date" ><b>Start Date : </b></label>
                <input type="date" name="start_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="end_date" ><b>End Date : </b></label>
                <input type="date" name="end_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="myform">Add</button>
      </div>
    </div>
  </div>
</div>
@endsection
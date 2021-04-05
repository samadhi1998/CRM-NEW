@extends('layouts.app')
@section('title','Search Reminder')
@section('header','Search Reminder')
@section('content')
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
        <div class="table-responsive">
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
          </div>
          </br>
          </br>

          {{$events->links()}}
          <div class="pull-right" style="text-align: right;color:blue">
            <a href="{{ URL::previous() }}">Go Back</a>
          </div>
          </br>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
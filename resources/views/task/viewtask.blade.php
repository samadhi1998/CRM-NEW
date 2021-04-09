@extends('layouts.app')
@section('title','View Task')
@section('header','View Tasks')
@section('content')

<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <br>
            <form action="/Search_Tasks" method="GET" role="search">
              {{ csrf_field() }}
              <div class="input-group">
                <input type="text" class="form-control" name="query" id="query" placeholder="Search Task"> 
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </form>
            </br>
            </br>
            <div class="table-responsive">
          <table>
            <tr>
              <th >@sortablelink('TaskID')</th>
              <th >@sortablelink('ServicePersonID')</th>
              <th >@sortablelink('Status')</th>
              <th >@sortablelink('Due_Date')</th>
              <th >@sortablelink('Description')</th>
              <th >Last Update At</th>
              <th >Action</th>
            </tr>
            @foreach($tasks as $task)
            <tr>
              <td style="text-align: center">{{$task['TaskID']}}</td>
              <td style="text-align: center">{{$task['ServicePersonID']}}</td>
              <td>{{$task['Status']}}</td>
              <td style="text-align: center">{{$task['Due_Date']}}</td>
              <td style="text-align: center">{{$task['Description']}}</td>
              <td style="text-align: center">{{$task['updated_at']}}</td>
              <td>
              @if(Auth::user()->can('edit-task', App\Models\Task::class))
                <a href="/View-Task/editTask/{{$task->TaskID}}" class="text-my-own-color"><span data-feather="edit"></span></a>
              @endif
              @if(Auth::user()->can('delete-task', App\Models\Task::class))
                <a href="" class="text-my-own-color" data-toggle="modal" data-target="#exampleModal2"><span data-feather="trash-2"></span></a>
              @endif
              @if(Auth::user()->can('view-task-information', App\Models\Task::class))
                <a href="/TaskInformation/{{$task['TaskID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
              @endif
              </td>
            </tr>
            @endforeach
          </table>
          </div>
          <br>
          <br>
          {!! $tasks->appends(\Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Delete Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body" style="color:#233554">
                You are going to delete the records of task id {{$task->TaskID}} . Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a href="/deleteTask/{{$task->TaskID}}"><button type="submit" class="btn btn-primary">Continue</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
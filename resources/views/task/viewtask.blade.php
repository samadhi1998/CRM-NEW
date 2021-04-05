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
              <th >Status</th>
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
                <a href="/View-Task/edit/{{$task->TaskID}}" class="text-my-own-color"><span data-feather="edit"></span></a>
              @endif
              @if(Auth::user()->can('delete-task', App\Models\Task::class))
                <a href="/deleteTask/{{$task->TaskID}}" class="text-my-own-color"><span data-feather="trash-2"></span></a>
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
@endsection
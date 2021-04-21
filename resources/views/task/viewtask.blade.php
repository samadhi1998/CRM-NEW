@extends('layouts.app')
@section('title','View Task')
@section('header','View Tasks')
@section('content')

@if (Session::has('error'))
       <div class="alert alert-danger" role="alert">
           {{Session::get('error')}}
       </div>
  @endif
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
  @endif
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
              <td>{{$task['TaskID']}}</td>
              <td>{{$task['ServicePersonID']}}</td>
              <td>{{$task['Status']}}</td>
              <td>{{$task['Due_Date']}}</td>
              <td style="text-align: left">{{$task['Description']}}</td>
              <td>{{$task['updated_at']}}</td>
              <td>
              @if(Auth::user()->can('edit-task', App\Models\Task::class))
                <a href="/View-Task/editTask/{{$task->TaskID}}" class="text-my-own-color"><span data-feather="edit"></span></a>
              @endif
              @if(Auth::user()->can('delete-task', App\Models\Task::class))
                <a href="/deleteTask/{{$task->TaskID}}" class="text-my-own-color"  onclick="return confirm('Are you sure you want to delete this item?');"><span data-feather="trash-2"></span></a>
              @endif
              @if(Auth::user()->can('view-task-information', App\Models\Task::class))
                <a href="/TaskInformation/{{$task['TaskID']}}" style="margin:2px" class="text-my-own-color" ><span data-feather ="eye"></span></a>
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
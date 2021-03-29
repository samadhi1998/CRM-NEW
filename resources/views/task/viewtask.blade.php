@extends('layouts.app')
@section('title','View Task')
@section('header','View Tasks')
@section('content')
@if(Auth::user()->can('add-task', App\Models\Task::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/Create-Task">Add new task <span data-feather="plus"></a>
</div>
@endif
<br>
<br>
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <br>
          <table>
            <tr>
              <th >Task ID</th>
              <th >Service Person ID</th>
              <th >Status</th>
              <th >Due Date</th>
              <th >Description</th>
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
                <a href="/View-Task/edit/{{$task->TaskID}}" class="text-my-own-color"><span data-feather="trash-2"></span></a>
              @endif
              </td>
            </tr>
          @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
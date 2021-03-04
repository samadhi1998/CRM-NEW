@extends('layouts.app')
@section('title','View Task')
@section('content')
<h2 style="text-align: center; color:#233554">Customer Relationship Management System</h2>
        <h2 style="text-align: center; color:#233554">View Task</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <table>
          <tr>
            <th >Task ID</th>
            <th >Service Person ID</th>
            <th >Status</th>
            <th >Due Date</th>
            <th >Description</th>
            <th >Last Update At</th>
            <th >Update</th>
            <!-- <th >Delete</th> -->
          </tr>
          
          @foreach($tasks as $task)
          <tr>
            <td style="text-align: center">{{$task['TaskID']}}</td>
            <td style="text-align: center">{{$task['ServicePersonID']}}</td>
            <td>{{$task['Status']}}</td>
            <td style="text-align: center">{{$task['Due_Date']}}</td>
            <td style="text-align: center">{{$task['Description']}}</td>
            <td style="text-align: center">{{$task['updated_at']}}</td>
            <td><button><a href="/View-Task/edit/{{$task->TaskID}}" class="text-my-own-color">Update</a></button></td>
          </tr>
          @endforeach
        </table>
@endsection
@extends('layouts.app')
@section('title','Users')
@section('content')

    <table>
          <tr>
            <th >Name</th>
            <th >Email</th>
          </tr>
                 @foreach($users as $user)
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    </tr>
                @endforeach
                    
         </table>

@endsection

@extends('layouts.app')
@section('title','View Backups')
@section('header','View Backups')
@section('content')

@if(Auth::user()->can('add-role', App\Models\Role::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/Create-Backup">Create New Backup <span data-feather="plus"></a>
</div>
@endif
<br>
<br>
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
        <div class="table-responsive">
          <table>
            <tr>
              <th >File</th>
              <th >Size</th>
              <th >Date</th>
              <th >Duration</th>
            </tr>
            @foreach($backups as $backup)
            <tr>
              <td style="text-align: center">{{$backup['file_path']}}</td>
              <td style="text-align: left">{{$backup['file_name']}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
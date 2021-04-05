@extends('layouts.app')
@section('title','View Note')
@section('header','Note Details')
@section('content')

@if(Auth::user()->can('add-note', App\Models\Note::class))
  <div class="pull-left">
    <a class="btn btn-primary" href="/addNote">Add new note <span data-feather="plus"></a>
  </div>
@endif
  <br> 
  <br>
<div class="container " style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <br>
          <form action="/Search_Notes" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
              <input type="text" class="form-control" name="query" id="query" placeholder="Search Notes"> 
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
            <tr >
              <th >@sortablelink('NoteID')</th>
              <th >@sortablelink('Description')</th>
              <th >Type</th>
              <th >Images</th>
              <th >@sortablelink('Added_By')</th>
              <th >Action</th>
            </tr>
            @foreach($notes as $note)
            <tr>                                                
              <th scope="row">{{$note['NoteID']}}</th>
              <td>{{$note['Description']}}</td>
              <td>{{$note['Type']}}</td>
              <td> <img src="{{asset('uploads/note/'.$note->image)  }}"
                class="img-circle" width="100px;" height="100px;" alt="Note-Image">  
              </td>
              <td>{{$note['Added_By']}}</td>
              <td>
                @if(Auth::user()->can('edit-note', App\Models\Note::class))
                  <a href= "/UpdateNote/{{$note['NoteID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a> 
                @endif   
                @if(Auth::user()->can('delete-note', App\Models\Note::class))                           
                  <a href= "/DeleteNote/{{$note['NoteID']}}" style="margin:10px" class="text-my-own-color"><span data-feather ="trash-2"></span></a> 
                @endif
              </td>
            </tr>
            @endforeach
          </table>
          </div>
          <br>
          <br> 
          {!! $notes->appends(\Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
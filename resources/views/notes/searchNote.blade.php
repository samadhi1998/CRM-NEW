@extends('layouts.app')
@section('title','Search Note')
@section('header','Search Note')
@section('content')
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
        <div class="table-responsive">
        <table>
            <tr >
              <th >Note ID</th>
              <th >Description</th>
              <th >Type</th>
              <th >Images</th>
              <th >Added By</th>
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
          </br>
          </br>

          {{$notes->links()}}
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
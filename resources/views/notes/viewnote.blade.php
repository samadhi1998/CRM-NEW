@extends('layouts.app')
@section('title','View Note')
@section('header','Note Details')
@section('content')
<div class="pull-left">
    <a class="btn btn-primary" href="/addNote">Add new note <span data-feather="plus"></a>
</div>
<br>
<br>
<div class="container " style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">{{ __('View Product Details') }}</div> -->

                <div class="card-body">

    <br>
    <form action="/Search_Products" method="GET" role="search">
      {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control" name="query" id="query" placeholder="Search Notes"> <span class="input-group-btn">
        <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
      </div>
    </form>
  

    </br>
    </br>

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
       class="img-circle" width="100px;" height="100px;" alt="Note-Image">  </td>
      <td>{{$note['Added_By']}}</td>
      <td>
          <a href= "/UpdateNote/{{$note['NoteID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
          <a href= "/DeleteNote/{{$note['NoteID']}}" style="margin:10px" class="text-my-own-color"><span data-feather ="trash-2"></span></a> 
        
      </td>
    </tr>
        @endforeach
  </table>
  <br>
  <br>
 {{$notes->links()}}
  </div></div></div></div></div></div>
</br>

<!-- ll -->
</br>



@endsection
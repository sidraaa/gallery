@extends('layouts.app') 

@section('title','Home')

@section('content')
    
        <div class="starter-template">
      
        <div class="row">
          @foreach($albums as $album)
            <div class="col-lg-3">
                
              <div class="thumbnail" style="min-height: 514px;">
                  <a class="left" href="{{route('delete_album',array('id'=>$album->id))}}" role="button" onclick="return confirm('Are you sure you want to delete your \'{{$album->name}}\' album?')">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
                <img alt="{{$album->name}}" src="{{ asset("storage/".$album->cover_image) }}" >
                <div class="caption">
                  <h3>{{$album->name}}</h3>
                  <p>{{$album->description}}</p>
                  <p>{{count($album->images)}} image(s).</p>
                  <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                  <p><a href="{{URL::route('show_album',array('id'=>$album->id))}}" class="btn btn-big btn-default">Show Gallery</a></p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    
      </div>

@endsection
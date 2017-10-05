@extends('layouts.app')

@section('title',$album->name)

@section('content')
      <div class="starter-template">
        <div class="media">
          <img class="media-object pull-left"alt="{{$album->name}}" src="{{ asset("storage/".$album->cover_image) }}" width="350px">
          <div class="media-body">
            <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
            <p>{{$album->name}}</p>
          <div class="media">
          <h2 class="media-heading" style="font-size: 26px;">Album Description :</h2>
          <p>{{$album->description}}<p>
          <a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Add New Image to Album</button></a>
          <a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are you sure?')"><button type="button"class="btn btn-danger btn-large">Delete Album</button></a>
        </div>
      </div>
    </div>
    </div>

    @foreach( $album->images->chunk(4) as $chunk)
    <div class="row">
        @foreach( $chunk as $image)
        <div class="col-sm-3">
            <a title="{{$image->description}}" href="#lightbox" data-toggle="modal" >
                <img id ="image-{{$image->id}}" class="thumbnail img-responsive" src="{{ asset("storage/".$image->image) }}" >
            </a>
        </div>
        @endforeach
    </div>
    @endforeach

    <div class="modal fade and carousel slide" id="lightbox">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
       
          <div class="carousel-inner">
              <?php $i=0;?>
             @foreach($album->images as $image)
            <div class="item" data-id="image-{{$image->id}}">
              <img src="{{ asset("storage/".$image->image) }}" alt="{{$image->id}}">
            </div>
             <?php $i++;?>
             @endforeach
           
          </div><!-- /.carousel-inner -->
          <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
    $(document).ready(function(){
       $('.thumbnail').on("click",function(){
           // removing class active from all image divs
           $('.item').attr("class","item");
           // adding class active against the current selection of image
           var img = $(this).attr("id");
           $("[data-id="+img+"]").attr("class","item active");
       }); 
    });
       
     </script>
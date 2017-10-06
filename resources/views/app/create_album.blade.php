
@extends('layouts.app') 

@section('title','Create an Album')

@section('content')
    
      <div class="span4" style="display: inline-block;">
          
       <form name="createnewalbum" method="POST" action="{{route('create_album')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <fieldset>
            <legend>Create an Album</legend>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name">Album Name</label>
              <input name="name" type="text" class="form-control"placeholder="Album Name" value="{{old('name')}}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
              <label for="description">Album Description</label>
              <textarea name="description" type="text"class="form-control" placeholder="Album description">{{old('description')}}</textarea>           
            </div>
            <div class="form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
              <label for="cover_image">Select a Cover Image</label>
              <input type="file" name="cover_image" />
                @if ($errors->has('cover_image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cover_image') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-default">Create!</button>
          </fieldset>
        </form>
      </div>
@endsection
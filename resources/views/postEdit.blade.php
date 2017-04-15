@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Insert new post</div>
                <div class="panel-body">
                    <form class="form" action="{{ route('post.update', [$post -> id]) }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value={{ $post -> title }}>
                      </div>
                      <div class="form-group">
                        <label for="story">Story</label>
                        <textarea name="story" rows="8" class="form-control" value={{ $post -> story }}>{{$post -> story}}</textarea>
                      </div>
                      <div class="form-group pull-right">
                        <input type="reset" name="" value="Reset" class="btn btn-md btn-warning">
                        <input type="submit" name="" value="Submit" class="btn btn-md btn-info">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        @if(count($errors) > 0)
          <div class="col-md-10 col-md-offset-1 alert alert-danger">
            @foreach($errors -> all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </div>
        @endif

</div>
@endsection

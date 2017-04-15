@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          @if(Session::has('success'))
            <div class="alert alert-success">
              {{ Session('success') }}
            </div>
          @endif
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
              <div class="row">
                <div class="panel-heading">
                  <div class="col-md-8"><h1>All Post</h1></div>
                  <div class="col-md-4"><span class="pull-right"><a href="{{ url('post/create') }}" class="btn btn primary">Create Post</a>
                  </span></div></div></div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Story</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($postview as $post)
                      <tr>
                          <td>{{ $post->id }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->story }}</td>
                          <td>{{ $post->created_at }}</td>
                          <td>{{ $post->updated_at }}</td>
                          <td><a href="{{ route('post.edit', [$post -> id]) }}" class="btn btn-md btn-info">Edit</a></td>
                          <td><a href="{{ route('post.delete', [$post -> id]) }}" class="btn btn-md btn-danger">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

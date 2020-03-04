@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-lg-center">Upload News</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          {{ Form::open(['route'=>'create#news','method'=>'post'])}}
          <label class="form-label">Title</label>
          <div class="title">
            {{ Form::text('title', null,['class'=>'form-control','placeholder'=>'news title']) }}
          </div>
          @if ($errors->has('title'))
          <span class="form-text text-danger">{{ $errors->first('title') }}</span>
          @else
          <br>
          @endif
          <label class="form-label">Content</label>
          <div class="content">
            {{ Form::textarea('content',null,['class'=>'form-control','placeholder'=>'news content']) }}
          </div>
          @if ($errors->has('content'))
          <span class="form-text text-danger">{{ $errors->first('content') }}</span>
          @else
          <br>
          @endif
          <div class="text-center">
            {{ Form::submit('Upload..',['class'=>'btn btn-primary']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
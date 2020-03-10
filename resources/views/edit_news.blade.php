@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-lg-center">Update News</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          {{ Form::open(['url' => ['/news/update', $news->news_id ] , 'method' => 'PATCH']) }}
          <label class="form-label">Title</label>
          <div class="title">
            {{ Form::text('title', !empty($news->title) ? $news->title : '',['class'=>'form-control','placeholder'=>'news title']) }}

          </div>
          @if ($errors->has('title'))
          <span class="form-text text-danger">{{ $errors->first('title') }}</span>
          @else
          <br>
          @endif
          <label class="form-label">Content</label>
          <div class="content">
            {{ Form::textarea('content',!empty($news->content) ? $news->content : '',['class'=>'form-control','placeholder'=>'news content']) }}

          </div>

          @if ($errors->has('content'))
          <span class="form-text text-danger">{{ $errors->first('content') }}</span>
          @else
          <br>
          @endif
          <div class="flag">
            {{ Form::select('public_flag',['public' => 'public','private' => 'private'],!empty($news->public_flag) ? $news->public_flag : '', ['class' => 'form-control w-25']) }}
            @if ($errors->has('public_flag'))
            <span class="form-text">
              <strong>{{ $errors->first('public_flag') }}</strong>
            </span>
            @else
            <br>
            @endif
          </div>
          <div class="text-center">
            {{ Form::submit('Update..',['class'=>'btn upload-btn']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
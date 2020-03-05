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
          {{ Form::open(['route'=>'create#news','method'=>'post','accept-charset'=>'utf-8','enctype'=>'multipart/form-data',
          'class'=>'uploader','id'=>'file-upload-form'])}}
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
          <div class="image">
            <input id="file-upload" type="file" name="fileUpload" accept="image/*" onchange="readURL(this);">
              <label for="file-upload" id="file-drag">
                  {{-- <img id="file-image" src="#" alt="Preview" class="hidden" width="200px" height="200px"> --}}
                  <div id="start">
                    <img id="blah" width="300px" height="150px" />
                      <div>Select a file here</div>
                      <div id="notimage" class="hidden">Please select an image</div>
                      <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                      <br>
                      <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                  </div>
              </label>
          </div>
          <hr>
          <div class="text-center">
            {{ Form::submit('Upload..',['class'=>'btn upload-btn']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
  function readURL(input, id) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
 }
</script> 
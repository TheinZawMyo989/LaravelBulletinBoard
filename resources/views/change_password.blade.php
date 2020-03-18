@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-lg-center">Change Password</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          {{ Form::open(['route'=>'change#password' , 'method'=>'post']) }}
          @csrf
          <label class="form-label">Current Password</label>
          <div class="current_password">
            {{ Form::password('current_password',['class'=>'form-control','placeholder'=>'current password']) }}
          </div>
          @if ($errors->has('current_password'))
          <span class="form-text text-danger">{{ $errors->first('current_password') }}</span>
          @else
          <br>
          @endif
          <label class="form-label">New Password</label>
          <div class="new_password">
            {{ Form::password('new_password',['class'=>'form-control','placeholder'=>'new password']) }}
          </div>
          @if ($errors->has('new_password'))
          <span class="form-text text-danger">{{ $errors->first('new_password') }}</span>
          @else
          <br>
          @endif
          <label class="form-label">Confirm Password</label>
          <div class="confirm_password">
            {{ Form::password('confirm_password',['class'=>'form-control','placeholder'=>'confirm password']) }}
          </div>
          @if ($errors->has('confirm_password'))
          <span class="form-text text-danger">{{ $errors->first('confirm_password') }}</span>
          @else
          <br>
          @endif
          <div class="text-center">
            {{ Form::submit('Change..',['class'=>'btn upload-btn']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
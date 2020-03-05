@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12 text-lg-right">
          <a href="{{ route('show#createNews') }}" class="btn btn-success">upload news</a>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header">All News List</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <div class="newslist">
            <table class="table">
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Author</th>
                  <th>Created Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allNews as $newslist)
                <tr>
                  <td><img src="{{ asset($newslist->image) }}" alt="image" width="100px" height="100px"></td>
                  <td>{{ $newslist->title }}</td>
                  <td>{{ $newslist->content }}</td>
                  <td>{{ $newslist->name }}</td>
                  <td>
                    @if($newslist->updated_at)
                    {{ Carbon\Carbon::parse($newslist->updated_at)->diffForHumans() }}
                    @else
                    {{ Carbon\Carbon::parse($newslist->created_at)->diffForHumans() }}
                    @endif
                  </td>
                  <td>
                    @if ($newslist->user_id == auth()->user()->id)
                    <a href="{{ url('/news/edit', $newslist->news_id) }}"><i class="fa fa-pencil"
                        style="font-size:25px;" class="text-primary"></i></a>
                    <a href="{{ url('/news/delete',$newslist->news_id) }}"
                      onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"
                        style="font-size:27px;"></i></a>
                    @else
                    <span>Unauthorized Access</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $allNews->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
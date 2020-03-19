@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12 text-lg-right">
          <a href="{{ route('show#createNews') }}" class="btn news-btn">upload news</a>
        </div>
      </div>
      <br>
      <div class="card">
        <div class="card-header">All News List <span class="badge badge-secondary p-2 float-right"> {{ $count }} posts </span></div>
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
                  <th>Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($allNews->count() == 0)
                <tr>
                  <td colspan="7" class="text-center">No data available!!</td>
                </tr>
                @endif
                @foreach($allNews as $newsList)
                <tr>
                  <td><img src="{{ asset($newsList->image) }}" alt="image" width="100px" height="100px"></td>
                  <td>{{ $newsList->title }}</td>
                  <td>{{ $newsList->content }}</td>
                  <td>{{ $newsList->name }}</td>
                  <td>
                    @if($newsList->updated_at)
                    {{ Carbon\Carbon::parse($newsList->updated_at)->diffForHumans() }}
                    @else
                    {{ Carbon\Carbon::parse($newsList->created_at)->diffForHumans() }}
                    @endif
                  </td>
                  <td>
                    {{ $newsList->public_flag }}
                  </td>
                  <td>
                    @if ($newsList->user_id == auth()->user()->id)
                    <a href="{{ url('/news/edit', $newsList->news_id) }}"><i class="fa fa-pencil"
                        style="font-size:25px;" class="text-primary"></i></a>
                    <a href="{{ url('/news/delete',$newsList->news_id) }}"
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
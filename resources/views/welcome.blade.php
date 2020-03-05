<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <title>{{ config('app.name', 'Bulletin_Board') }}</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
      @auth
      <a href="{{ url('/news/home') }}">Home</a>
      @else
      <a href="{{ route('login') }}">Login</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}">Register</a>
      @endif
      @endauth
    </div>
    @endif
  </div>
  <div class="container">
    <h1>News Channel</h1>
    <div class="row">
      @foreach ($allNews as $newsList)
      <div class="col-md-4 mt-4">
        <div class="card promoting-card">
          <div class="card-body d-flex flex-row">
            <i class="fa fa-user-circle-o" style="font-size:36px"> </i>
            <div>
              <h5 class="card-title font-weight-bold mb-2">&nbsp; {{ $newsList->name }}</h5>
              <p class="card-text">&nbsp;
                @if($newsList->updated_at)
                {{ Carbon\Carbon::parse($newsList->updated_at)->diffForHumans() }}
                @else
                {{ Carbon\Carbon::parse($newsList->created_at)->diffForHumans() }}
                @endif</p>
            </div>
          </div>
          <div class="card-body">
            <h5>{{ $newsList->title }}</h5>
            {{-- <h1>{{ $newsList->image }}</h1> --}}
            <img src="{{ asset($newsList->image) }}" alt="News Photo" class="images" width="100%" height="200px">
            <br>
            <p class="collapse" id="collapse{{$newsList->news_id}}">{{ $newsList->content }}</p>
            <a href="#" data-toggle="collapse" data-target="#collapse{{$newsList->news_id}}">Read more..</a>
          </div>
        </div>

      </div>
      @endforeach
    </div> <br>
    {{ $allNews->links() }}
  </div>
</body>

</html>
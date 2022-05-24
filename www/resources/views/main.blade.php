@extends("index")

@section('content')
    @foreach ($newsList as $news)
    <div class="card m-4" style="width: 90%">
        <div class="card-body">
            <h5 class="card-title">{{ $news->title }}</h5>
            <p class="card-text">{!! $news->description !!}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @endforeach
@endsection

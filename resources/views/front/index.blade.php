@extends('front.layout')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <h1>Афиша</h1>
    </div>
  </div>

    <div class="container">
      <div class="row">
        @foreach($films as $film)
        <div class="col mb-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$film->title}}</h5>
              <p class="card-text">{{$film->description}}</p>
              <a href="{{route('show_film', $film->id)}}" class="btn btn-primary">Подробнее</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection
@extends('front.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <h1>{{$film->title}}</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Описание фильма</h5>
          <p class="card-text">{{$film->description}}</p>
        </div>
        <div class="card-body">
          <h5 class="card-title">Кино компания</h5>
          <p class="card-text">{{$film->company}}</p>
        </div>
        <div class="card-body">
          <h5 class="card-title">Продюсер</h5>
          <p class="card-text">{{$film->producer}}</p>
        </div>

        <a href="{{route('home')}}" class="btn btn-primary">Назад</a>
      </div>
    </div>
  </div>

@endsection
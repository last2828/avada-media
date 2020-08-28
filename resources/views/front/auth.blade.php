@if (Auth::user())
  <div class="container">
    <div class="row justify-content-left">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            {{ Auth::user()->email }} <br> {{__('Вы авторизованы')}}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <form method="post" action="{{route('logout')}}">
          @csrf
          <input type="submit" class="btn btn-dark float-left" value="Выйти">
        </form>
      </div>
    </div>
  </div>
  @else
  <div class="container">
    <div class="row justify-content-left">
      <div class="col-md-6">
        <div class="col">
          <a href="{{route('login')}}">
            <input type="submit" class="btn btn-success float-left" value="Вход">
          </a>
        </div>
        <div class="col">
          <a href="{{route('register')}}">
            <input type="submit" class="btn btn-info float-left" value="Регистрация">
          </a>
        </div>
      </div>
    </div>
  </div>


@endif
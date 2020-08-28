@extends('admin.layout')
@section('content')


    <!-- Main content -->
    <section class="content">
      <form method="post" action="{{route('films.store')}}">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Данные</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger col-md-12">
                <ul>
                  <li>{{ $errors->first() }}</li>
                </ul>
              </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Навание фильма</label>
                <input type="text" id="title" name="title" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Описание фильма</label>
                <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Статус</label>
                <select class="form-control custom-select" name="status">
                  <option selected value="0">Черновик</option>
                  <option value="1">Опубликовано</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Кинокомпания</label>
                <input type="text" id="company" class="form-control" name="company">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Продюсер</label>
                <input type="text" id="producer" name="producer" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('films.index')}}" class="btn btn-secondary">Отменить</a>
          <input type="submit" value="Создать" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
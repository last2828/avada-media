@extends('admin.layout')
@section('content')


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Фильмы</h3>
          <div class="row">
            <div class="col-12">
              <a href="{{route('films.create')}}" class="btn btn-success float-right">Новый фильм</a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                Название фильма
              </th>
              <th style="width: 8%" class="text-center">
                Статус
              </th>
              <th style="width: 20%">
              </th>
            </tr>
            </thead>
            <tbody>
            @foreach($films as $film)
            <tr>
              <td>
                {{$film->id}}
              </td>
              <td>
                <a>
                  {{$film->title}}
                </a>
              </td>
              <td class="project-state">
                <span class="badge badge-success">{{($film->status) ? 'Опубликовано' : 'Черновик'}}</span>
              </td>
              <td class="project-actions text-right">
                <a class="btn btn-primary btn-sm" href="{{route('show_film', $film->id)}}" target="_blank">
                  Просмотреть
                </a>
                <a class="btn btn-info btn-sm" href="{{route('films.edit', $film->id)}}">
                  Изменить
                </a>
                <form action="{{route('films.destroy', $film->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-danger btn-sm" value="Удалить" onclick="confirm('Вы уверены что хотите удалить запись?')">
                </form>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
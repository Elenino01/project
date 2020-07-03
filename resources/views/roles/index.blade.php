@extends('base')

@section('title', 'Перечень ролей')

@section('main')
    <h1>Перечень ролей</h1>

    <a href="{{ route('roles.create') }}">Добавить</a>

    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>Идентификатор</th>
            <th>Заголовок</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>

            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}">
                            Изменить
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('roles.remove', $role->id) }}">
                            Удалить
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>
    </div>
@endsection
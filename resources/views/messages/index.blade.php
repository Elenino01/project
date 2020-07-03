@extends('base')

@section('title', 'Перечень записей в блоге')

@section('main')
    <h1>Перечень записей в блоге</h1>

    <a href="{{ route('messages.create') }}"><p class="text-white">Создать сообщение</p></a>

    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>Идентификатор</th>
            <th>{{ __('Title') }}</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>

            @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->title }}</td>
                    <td>
                    <!-- @can('update', $message) -->
                        <a href="{{ route('messages.edit', $message->id) }}">
                        <p class="text-white">Редактировать</p>
                        </a>
                    <!-- @endcan -->
                    </td>
                    <td>
                    <!-- @can('delete', $message) -->
                        <a href="{{ route('messages.remove', $message->id) }}">
                        <p class="text-white">Удалить</p>
                        </a>
                    <!-- @endcan -->
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>
    </div>
@endsection
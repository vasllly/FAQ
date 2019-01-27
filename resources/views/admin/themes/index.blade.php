@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <h1 class="col-md-9">Список тем</h1>

        <a class="col-md-3 button" href="{{ route('themes.create') }}">Новая тема</a>

        @if ($themes->count())
        <table class="col-md-12">
            <tr>
                <th>ID</th>
                <th>Название темы</th>
            </tr>
            @foreach ($themes as $theme)
            <tr>
                <td>{{ $theme->id }}</td>
                <td>{{ $theme->name }}</td>
                <td><a  class="button" href="{{ route('themes.edit', ['id' => $theme->id]) }}">Редактировать</a></td>
                <td>
                    <form action="{{ route('themes.destroy', ['id' => $theme->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button balert">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <p>Пока нет ни одной темы...</p>
        @endif

    </div>
</div>
@endsection

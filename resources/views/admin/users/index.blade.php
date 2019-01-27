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

        <h1 class="col-md-9">Список администраторов</h1>

        <a class="col-md-3 button" href="{{ route('users.create') }}">Новый администратор</a>

        <table class="col-md-12">
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Email</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                <td><a  class="button" href="{{ route('users.show', ['id' => $user->id]) }}">Редактировать</a></td>
                <td><a  class="button" href="{{ route('users.edit', ['id' => $user->id]) }}">Сменить пароль</a></td>
                <td>
                    <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button balert">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection

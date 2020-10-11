@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <h3>Ver Usuário</h3>
        {!! Button::normal('Listar usuários')
            ->appendIcon(Icon::thList())
            ->asLinkTo(route('admin.user.index'))
        !!}
        </br> </br>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Password</th>
                    <td>{!! Badge::withContents($user->password) !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuarios</title>

</head>

<body class="antialiased">
    <h2>Usuarios</h2>
    @if ($usuarios->count() > 0)
        @foreach ($usuarios as $usuario)
            <table>
                <tr>
                    <td>ID: </td>
                    <td><a class="link" href="usuarios/{{ $usuario->id }}">
                            {{ $usuario->id }}</a>
                    </td>
                </tr>
                <tr>
                    <td>Nome: </td>
                    <td>{{ $usuario->nome }}</td>
                </tr>
                <tr>
                    <td>Cpf: </td>
                    <td>{{ $usuario->cpf }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $usuario->email }}</td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>{{ $usuario->status }}</td>
                </tr>
            </table>
        @endforeach
    @else
        <p>Não achei nd ;-;</p>
    @endif
    <a class="link" href="{{ route('usuario/create') }}">Novo usuario</a>
</body>

<style>
    .link {
        color: #9e69ec;
    }
</style>

</html>

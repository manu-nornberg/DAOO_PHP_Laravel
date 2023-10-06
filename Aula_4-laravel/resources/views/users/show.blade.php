<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h2>Usuario</h2>
    @if ($usuario)
        <table>
            <tr>
                <td>ID: </td>
                <td>{{ $usuario->id }}</td>
            </tr>
            <tr>
                <td>Nome: </td>
                <td>{{ $usuario->name }}</td>
            </tr>
            <tr>
                <td>Cpf: </td>
                <td>{{ $usuario->cpf }}</td>
            </tr>
            <tr>
                <td>Senha: </td>
                <td>{{ $usuario->password }}</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
                <td>Status: </td>
                <td>{{ $usuario->status ? "Sim" : "Nao"}}</td>
            </tr>
        </table>
    @endif
    <a class="link" href="/users/{{ $usuario->id }}/update">Alterar</a>
    <a class="link" href="/users/{{ $usuario->id }}/delete">Excluir</a>
</body>

<style>
    .link{
        color:#9e69ec;
    }
</style>

</html>

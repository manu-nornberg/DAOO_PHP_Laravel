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
        <h3 class="link">Alterar o usuario</h3>
        <form action="{{route('usuario-edit',$usuario->id)}}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome" value="{{ $usuario->nome }}" /></td>
                </tr>
                <tr>
                    <td>Cpf:</td>
                    <td><input type="text" name="cpf" value="{{ $usuario->cpf }}" /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" value="{{ $usuario->email }}" /></td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input class="link" type="submit" value="Salvar" />
                        <a href="/usuarios"><button form=cancel class="link">Cancelar</button></a>
                    </td>
                </tr>
            </table>
        </form>
    @endif
</body>

<style>
    .link {
        color: #9e69ec;
    }
    .link:hover {
        color: #542b92;
    }
</style>

</html>

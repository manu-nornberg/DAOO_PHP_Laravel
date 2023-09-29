<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Criar Usuario</title>

</head>

<body class="antialiased">
    <h2>Usuarios</h2>

        <h3 class="link">Inseir um Usuario</h3>
        <form
        action="{{route('usuario/store')}}" method="POST"
        >
            @csrf
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"  /></td>
                </tr>
                <tr>
                    <td>CPF:</td>
                    <td><input type="text" name="cpf"  /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"  /></td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input class="link" type="submit" value="Salvar" />
                        <a href="/usuarios"><button form=cancel class="link">Cancelar</button></a>
                    </td>
                </tr>
            </table>
        </form>

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

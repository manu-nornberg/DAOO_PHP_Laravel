<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h2>transportadora</h2>
    @if ($transportadora)
        <h3 class="link">Alterar o transportadora</h3>
        <form action="{{route('transportadora-edit',$transportadora->id)}}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Cidade:</td>
                    <td><input type="text" name="cidade" value="{{ $transportadora->cidade }}" /></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="telefone" value="{{ $transportadora->telefone }}" /></td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input class="link" type="submit" value="Salvar" />
                        <a href="/transportadoras"><button form=cancel class="link">Cancelar</button></a>
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Criar Transportadora</title>

</head>

<body class="antialiased">
    <h2>Transportadora</h2>

        <h3 class="link">Inseir um transportadora</h3>
        <form
        action="{{route('transportadora/store')}}" method="POST"
        >
            @csrf
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <table>
                <tr>
                    <td>Cidade:</td>
                    <td><input type="text" name="cidade"  /></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="telefone"  /></td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input class="link" type="submit" value="Salvar" />
                        <a href="/transportadoras"><button form=cancel class="link">Cancelar</button></a>
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

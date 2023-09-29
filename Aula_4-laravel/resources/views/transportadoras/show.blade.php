<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Transportadora</title>

</head>

<body class="antialiased">
    <h2>Transportadora</h2>
    @if ($transportadora)
        <table>
            <tr>
                <td>ID: </td>
                <td>{{ $transportadora->id }}</td>
            </tr>
            <tr>
                <td>Cidade: </td>
                <td>{{ $transportadora->cidade }}</td>
            </tr>
            <tr>
                <td>Telefone: </td>
                <td>{{ $transportadora->telefone }}</td>
            </tr>
        </table>
    @endif
    <a class="link" href="/transportadoras/{{ $transportadora->id }}/update">Alterar</a>
    <a class="link" href="/transportadoras/{{ $transportadora->id }}/delete">Excluir</a>
</body>

<style>
    .link{
        color:#9e69ec;
    }
</style>

</html>

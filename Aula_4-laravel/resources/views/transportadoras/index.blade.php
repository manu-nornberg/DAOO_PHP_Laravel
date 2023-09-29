<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Transportadoras</title>

</head>

<body class="antialiased">
    <h2>Transportadoras</h2>
    @if ($transportadoras->count() > 0)
        @foreach ($transportadoras as $transportadora)
            <table>
                <tr>
                    <td>ID: </td>
                    <td><a class="link" href="transportadoras/{{ $transportadora->id }}">
                            {{ $transportadora->id }}</a>
                    </td>
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
        @endforeach
    @else
        <p>Não achei nd ;-;</p>
    @endif
    <a class="link" href="{{ route('transportadora/create') }}">Nova transportadora</a>
</body>

<style>
    .link {
        color: #9e69ec;
    }
</style>

</html>

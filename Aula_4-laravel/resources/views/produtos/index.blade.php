<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Produtos</title>

</head>

<body class="antialiased">
    <h2>Produtos</h2>
    @if ($produtos->count() > 0)
        @foreach ($produtos as $produto)
            <table>
                <tr>
                    <td>ID: </td>
                    <td><a class="link" href="produtos/{{ $produto->id }}">
                            {{ $produto->id }}</a>
                    </td>
                </tr>
                <tr>
                    <td>Nome: </td>
                    <td>{{ $produto->nome }}</td>
                </tr>
                <tr>
                    <td>Descrição: </td>
                    <td>{{ $produto->descricao }}</td>
                </tr>
                <tr>
                    <td>Preço: </td>
                    <td>{{ $produto->preco }}</td>
                </tr>
            </table>
        @endforeach
    @else
        <p>Não achei nd ;-;</p>
    @endif
    <a class="link" href="{{ route('produto/create') }}">Novo Produto</a>
</body>

<style>
    .link {
        color: #9e69ec;
    }
</style>

</html>

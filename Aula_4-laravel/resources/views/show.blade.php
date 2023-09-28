<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h2>Produtos</h2>
    @if ($produto)
        <table>
            <tr>
                <td>ID: </td>
                <td>{{ $produto->id }}</td>
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
    @endif
    <a class="link" href="/produtos/{{ $produto->id }}/update">Alterar</a>
    <a class="link" href="/produtos/{{ $produto->id }}/delete">Excluir</a>
</body>

<style>
    .link{
        color:#9e69ec;
    }
</style>

</html>

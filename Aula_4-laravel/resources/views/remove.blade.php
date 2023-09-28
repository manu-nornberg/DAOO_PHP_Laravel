<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    @if ($produto)
    asasasas
        <h1>{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <ul>
            <li>Preço: {{ $produto->preco }}</li>
        </ul>
        <table>
            <tr>
                <td>
                    <form action="{{ route('produto-delete',$produto->id) }}" method='post'>
                        @csrf
                        <input type="submit" name='confirmar' value="Remover" />
                    </form>
                </td>
                <td>
                    <a href="/produtos"><button>Cancelar</button></a>
                </td>
            </tr>
        </table>
    @else
    bbbbbbbb
        <p>Produtos não encontrados!</p>
    @endif
    <a href="/produtos">Voltar</a>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    @if ($usuario)
        <h1>{{ $usuario->nome }}</h1>
        <table>
            <tr>
                <td>
                    <form action="{{ route('usuario-delete',$usuario->id) }}" method='POST'>
                        @csrf
                        <input type="submit" name='confirmar' value="Remover" />
                    </form>
                </td>
                <td>
                    <a href="/usuarios"><button>Cancelar</button></a>
                </td>
            </tr>
        </table>
    @else
        <p>usuarios não encontrados!</p>
    @endif
    <a href="/usuarios">Voltar</a>
</body>
</html>

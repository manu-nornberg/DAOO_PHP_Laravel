<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Criar produto</title>

</head>

<body class="antialiased">
    <h2>Produtos</h2>

        <h3 class="link">Inseir um produto</h3>
        <form action="{{route('produto/store')}}" method="POST">
            @csrf
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome"  /></td>
                </tr>
                <tr>
                    <td>Descricao:</td>
                    <td>
                        <textarea name="descricao" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td><input type="number" name="preco" step=".01"  /></td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input class="link" type="submit" value="Salvar" />
                        <a href="/produtos"><button form=cancel class="link">Cancelar</button></a>
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

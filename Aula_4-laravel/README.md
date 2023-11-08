
# E-commerce em Laravel

Uma aplicação que simula um banco de dados em Laravel de um e-commerce.



## Comandos para inicialização

php artisan migrate:fresh

php artisan db:seed

php artisan tinker
## Consultas no banco

Abaixo as consultas das tabelas:

### Usuarios
Selecionar todos os os usuarios:
* DB::Table("users")->get()

Selecionar todos os usuarios por ordem alfabetica:
* DB::Table('users')->select('name')->orderBy('name','ASC')->get(); 

Seleciona o nome dos usuarios e seus produtos:
* DB::Table('pedidos')->join('users', 'user_id', '=', 'users.id')->join('pedido_produto', 'pedido_id', '=', 'pedidos.id')->join('produtos', 'produto_id', '=', 'produtos.id')->select('users.name', 'produtos.nome')->get()

### Endereços
Selecionar todos os endereços dos usuarios:
* DB::Table('enderecos')->join('users','user_id', '=', 'users.id')->get()

### Produtos
Selecionar o nome dos produtos e o numero dos pedidos:
* DB::Table('pedido_produto')->join('pedidos','pedido_id', '=', 'pedidos.id')->join('produtos','produto_id', '=', 'produtos.id')->select('produtos.nome', 'pedidos.id')->get() 

Seleciona os produtos com preços entre 5 e 10 reais:
* DB::Table('produtos')->whereBetween('preco',[5,10])->orderBy('preco','desc')->get();

Seleciona todos os produtos entre 0 à 20 reais e seus id de pedidos:
* DB::Table('pedido_produto')->join('pedidos', 'pedido_id', '=', 'pedidos.id')->join('produtos', 'produto_id', '=', 'produtos.id')->whereBetween('preco',[0,20])->select('produtos.nome as produto','produtos.preco as preco','pedidos.id as numeroPedido')->get()

### Pedidos
Selecionar todos os pedidos e o nome das transportadoras:
* DB::Table("pedidos")->join("transportadoras","transportadora_id", "=", "transportadoras.id")->select('transportadoras.nome','pedidos.*')->get()

Selecionar os nomes dos produtos, e das transportadoras e o id do pedido:
* DB::Table("pedidos")->join("transportadoras", "transportadora_id", "=", "transportadoras.id")->join('pedido_produto','pedido_id', "=", "pedidos.id")->join("produtos", "produto_id", "=", "produtos.id")->select('transportadoras.nome as transportadora','pedidos.id', "produtos.nome as produto")->get()

Selecionar os endereços, nome dos usuarios e o id dos pedidos:
* DB::Table('pedidos')->join('users', 'pedidos.user_id', '=', 'users.id')->join('enderecos', 'enderecos.user_id', '=', 'users.id')->select('users.name', 'enderecos.rua', 'pedidos.id')->get()

### Transportadoras
Selecionar todas as transportadoras:
* DB::Table("transportadoras")->get()

Selecionar o nome das transportadoras por ordem alfabetica: 
* DB::Table('transportadoras')->select('nome')->orderBy('nome', 'ASC')->get()

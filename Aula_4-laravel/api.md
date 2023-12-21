##Documentação API
###Todas as rotas que podem ser acessadas estão em: 
```
\tests\Api\API PHP.postman_collection.json
``` 
###Roles criadas
* clients
* admin
* manager
###Para o login:
```
localhost:8000/api/login
```
```
Para admin - email=admin@gmail.com senha=123456
```
```
Para manager - email=manager@gmail.com senha=123456
```
```
Para client - email=client@gmail.com senha=123456
```
Pegar o token gerado e colocar no Bearer Token
###Permissões da role admin:
* cadastrar/alterar/deletar produtos
* cadastrar/alterar/deletar users
* cadastrar/alterar/deletar pedidos
* ver  pedidos de um user específico
###Permissões da role manager:
* ver pedidos de um user específico
* cadastra produtos
###Permissões de role client:
* alterar as informações do user
###Permissão para todos os usuários autenticados:
* ver produtos
* ver unico produto
* ver pedidos
* ver users


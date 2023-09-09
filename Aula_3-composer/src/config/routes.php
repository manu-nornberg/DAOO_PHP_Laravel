<?php

use Emanu\Aula3Composer\controller\api\Produto;
use Emanu\Aula3Composer\controller\api\Transportadora;
use Emanu\Aula3Composer\controller\api\Usuario;
use Emanu\Aula3Composer\controller\web\Produto as WebProduto;

$routes = [
    'api' => [
        'produtos' => Produto::class,
        'transportadora' => Transportadora::class,
        'usuario' => Usuario::class
    ]
];
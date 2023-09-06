<?php

use Emanu\Aula3Composer\controller\api\Produto;
use Emanu\Aula3Composer\controller\web\Produto as WebProduto;

$routes = [
    'api' => [
        'produtos' => Produto::class
    ],
    'web' => [
        'produtos' => WebProduto::class
    ]
];
<?php
require './model/Pessoa.php';
require './model/Paciente.php';
require './model/IMC.php';

//instanciando os objetos
$pessoa1 = new Pessoa("AAA", 1.9, 80, 20); 
$paciente1 = new Paciente("BBB", 1.5, 50, 50);

//imprimindo
var_dump($pessoa1);
var_dump($paciente1);

//atualizando o valor do peso
$pessoa1->peso = 50;
var_dump($pessoa1);

//atualizando o valor do peso
$paciente1->peso = 200;
var_dump($paciente1);

//calculando o imc das pessoinhas
$pessoa1->imc = IMC::calcIMC($pessoa1);
$paciente1->imc = IMC::calcIMC($paciente1);
echo IMC::classifica($pessoa1);
echo IMC::classifica($paciente1);

?>
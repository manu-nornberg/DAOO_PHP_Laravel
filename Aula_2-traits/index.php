<?php
include_once 'autoload.php';

use model\Atleta;
use model\Relatorio;
use model\Medico;

$atleta = new Atleta("Almir", 1.80, 80.0, 25);
$medico = new Medico("José",null,null,65,'2015-09-11',1500,"Legista");

//echo $atleta;

$relatorio = new Relatorio();
$relatorio->adiciona($medico);
$relatorio->adiciona($atleta);
$relatorio->imprimir();


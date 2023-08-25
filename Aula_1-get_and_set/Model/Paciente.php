<?php

class Paciente extends Pessoa{
    
    //constructor da pessoa para paciente poder usar
    public function __construct($nome, $altura, $peso, $idade){
        parent::__construct($nome, $altura, $peso, $idade);
    }
}


<?php

class Pessoa {
    public $nome, $altura, $peso, $idade, $imc;  //os componentes da classe

    //construct
    public function __construct($nome = null, $altura = null, $peso = null, $idade = null){ //o construtor da classe 
        $this->nome = $nome;
        $this->altura = $altura;
        $this->peso = $peso;
        $this->idade = $idade;
    }

    //destruct
    public function __destruct(){ //funcao pra destruir obj
        echo "\nDestruindo objeto...$this->nome";
    }

    //get and set
    public function __get($nome){
        return $this->$nome;
    }

    public function __set($nome,$value){
        $this->$nome = $value;
    }

}

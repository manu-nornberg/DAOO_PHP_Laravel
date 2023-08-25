<?php

namespace model;

abstract class Pessoa {
    public $nome, $idade, $peso, $altura;

    public function __construct($nome = null, $altura = null, $peso = null, $idade = null)
    {
        $this->nome = $nome;
        $this->altura = $altura;
        $this->peso = $peso;
        $this->idade = $idade;
    }

    public function __destruct()
    {
        echo "\nDestruindo objeto...$this->nome";
    }

    public function __get($nome)
    {
        return $this->$nome;
    }

    public function __set($nome,$value)
    {
        $this->$nome = $value;
    }

    public function __toString(): string
    {
        return "\n=== DADOS DA PESSOA ==="
            ."\nNome: $this->nome"
            ."\nIdade: $this->idade"
            ."\nPeso: $this->peso"
            ."\nAltura: $this->altura\n";
    }
}
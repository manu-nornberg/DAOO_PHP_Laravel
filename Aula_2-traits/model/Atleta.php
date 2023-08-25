<?php

namespace model;

class Atleta extends Pessoa{

    use IMC;
    public function __construct($nome = null, $altura = null, $peso = null, $idade = null)
    {
        parent::__construct($nome, $altura, $peso, $idade);
        $this->calcIMC();
    }

    public function calcIMC()
    {
        if ($this->peso <= 0) {
            echo "\nNão é possível realizar o calculo";
        } else {
            $this->imc = ($this->peso / ($this->altura ** 2));
            return "\nSeu IMC é...".number_format($this->imc,2);
        }

    }

    public function classifica(): string
    {
        if ($this->imc >= 30) {
            return "Obesidade";
        } else if ($this->imc >= 25) {
            return "Sobrepeso";
        } else if ($this->imc >= 18) {
            return "Saudável";
        } else if ($this->imc >= 0) {
            return "Abaixo do peso";
        } else
            return "Não é possivel classificar o IMC";
    }

    public function isNormal(): string
    {
        if ($this->idade >= 18 && $this->idade <= 24) {
            if ($this->imc >= 18 && $this->imc <= 24.9){
                return "Dentro do padrão";
            }
        } else if ($this->idade >= 25 && $this->idade <= 34) {
            if ($this->imc >= 20 && $this->imc <= 25){
                return "Dentro do padrão";
            }
        } else if ($this->idade >= 35 && $this->idade <= 44) {
            if ($this->imc >= 21 && $this->imc <= 26){
                return "Dentro do padrão";
            }
        } else if ($this->idade >= 45  && $this->idade <= 54) {
            if ($this->imc >= 22 && $this->imc <= 27) {
                return "Dentro do padrão";
            }
        } else if ($this->idade >= 55 && $this->idade <= 64) {
            if ($this->imc >= 23 && $this->imc <= 28) {
                return "Dentro do padrão";
            }
        } else if ($this->idade >= 65) {
            if ($this->imc >= 24 && $this->imc <= 29){
                return "Dentro do padrão";
            }
        else {
            return "Fora do padrão";
        }
        }
    }

    public function __toString(): string
    {
        return "\n=== DADOS DO ATLETA ==="
            ."\nNome: $this->nome"
            ."\nIdade: $this->idade"
            ."\nPeso: $this->peso"
            ."\nAltura: $this->altura"
            ."\nIMC: " .number_format($this->imc,2)
            ."\nClassificação: " .$this->classifica()
            ."\nEstá normal? " .$this->isNormal(). "\n";
    }
}
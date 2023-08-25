<?php

namespace model;

trait IMC
{
    protected $imc;

    //funcao para calcular o IMC
//    public function calcIMC()
//    {
//        if ($this->peso <= 0) {
//            echo "\nNão é possivel realizar o calculo";
//        } else {
//            $this->imc = ($this->peso / ($this->altura ** 2));
//            return "\nSeu IMC é...".number_format($this->imc,2);
//        }
//
//    }

    //funcao para classificar os imc
//    public function classifica(): string
//    {
//        if ($this->imc >= 30) {
//            return "\nObesidade";
//        } else if ($this->imc >= 25) {
//            return "\nSobrepeso";
//        } else if ($this->imc >= 18) {
//            return "\nSaudável";
//        } else if ($this->imc >= 0) {
//            return "\nAbaixo do peso";
//        } else
//            return "\nNão é possivel classificar o IMC";
//    }
}
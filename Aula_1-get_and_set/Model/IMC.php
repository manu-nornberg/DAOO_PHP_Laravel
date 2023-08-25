<?php

class IMC{

    //funcao para calcular o IMC
    public static function calcIMC(Pessoa $pessoa){
        if($pessoa->peso <= 0){
            echo "\nNão é possivel realizar o calculo";
        }else{
            $pessoa->imc = ($pessoa->peso/($pessoa->altura**2));
            echo "\nSeu IMC é... $pessoa->imc";
            return $pessoa->imc;
        }
        
    }

    //funcao para classificar os imc
    public static function classifica(Pessoa $pessoa){
        if($pessoa->imc >= 30){
            return "\nObesidade";
        }else if($pessoa->imc >= 25 ){
            return "\nSobrepeso";
        }else if($pessoa->imc >= 18 ){
            return "\nSaudável";
        }else if($pessoa->imc >= 0 ){
            return "\nAbaixo do peso";
        }else
            return "\nNão é possivel classificar o IMC";
        } 
    }
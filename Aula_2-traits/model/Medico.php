<?php

namespace model;
class Medico extends Pessoa implements Funcionario {
    private $especialidade, $salario, $tempo;

    public function __construct($nome = null, $altura = null, $peso = null, $idade = null, $tempo, $salario, $especialidade)
    {
        parent::__construct($nome, $altura, $peso, $idade);
        $this->tempo = $tempo;
        $this->salario = $salario;
        $this->especialidade = $especialidade;
    }

    public function salario(): string{
        return 'R$' . number_format($this->salario, 2, ',', '.');
    }

    public function tempoDeContrato(): string{
        $data = new \DateTime($this->tempo);
        $dataAtual = new \DateTime('now');
        $intervalo = $data->diff($dataAtual);
        return $intervalo->format('%y anos');
    }

    public function __toString(): string
    {
        return "\n=== DADOS DO MEDICO ==="
            ."\nNome: $this->nome"
            ."\nIdade: $this->idade"
            ."\nEspecialidade: $this->especialidade"
            ."\nSalario: " .$this->salario()
            ."\nTempo de contrato: " .$this->tempoDeContrato(). "\n";
    }

}
<?php

namespace model;

use model\Pessoa;
class Relatorio extends Pessoa {
    private $pessoas = [];

    public function adiciona(Pessoa $pessoa): void
    {
        $this->pessoas[] = $pessoa;
    }

    public function log(Pessoa $pessoa): void
    {
        echo $pessoa;
    }

    public function imprimir(): void
    {
        echo "\n\n=== RELATORIO ===";
        foreach ($this->pessoas as $pessoa)
            $this->log($pessoa);
        echo "\n";
    }
}
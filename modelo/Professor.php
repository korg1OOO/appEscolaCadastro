<?php

require_once("Pessoa.php");

class Professor extends Pessoa {

    private string $titulacao;

    public function getTipo() {
        return "P";
    }

    public function getExtra()
    {
        return "Titulação: " . $this->titulacao;
    }

    /**
     * Get the value of titulacao
     */
    public function getTitulacao(): string
    {
        return $this->titulacao;
    }

    /**
     * Set the value of titulacao
     */
    public function setTitulacao(string $titulacao): self
    {
        $this->titulacao = $titulacao;

        return $this;
    }
}

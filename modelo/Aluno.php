<?php

require_once("Pessoa.php");

class Aluno extends Pessoa {

    private string $curso;

    public function getTipo() {
        return "A";
    }

    /**
     * Get the value of curso
     */
    public function getCurso(): string
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     */
    public function setCurso(string $curso): self
    {
        $this->curso = $curso;

        return $this;
    }
}
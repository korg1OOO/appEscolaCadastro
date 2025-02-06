<?php

    abstract class Pessoa {

        protected int $id;
        protected string $nome;
        protected string $email;
        protected int $idade;
        protected string $cpf;

        abstract public function getTipo();
        abstract public function getExtra();

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nome
         */
        public function getNome(): string
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome(string $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail(): string
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail(string $email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of idade
         */
        public function getIdade(): int
        {
                return $this->idade;
        }

        /**
         * Set the value of idade
         */
        public function setIdade(int $idade): self
        {
                $this->idade = $idade;

                return $this;
        }

        /**
         * Get the value of cpf
         */
        public function getCpf(): string
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         */
        public function setCpf(string $cpf): self
        {
                $this->cpf = $cpf;

                return $this;
        }
    }

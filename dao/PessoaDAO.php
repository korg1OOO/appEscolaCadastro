<?php

    require_once("modelo/Pessoa.php");
    require_once("modelo/Aluno.php");
    require_once("modelo/Professor.php");
    require_once("util/Conexao.php");

    class PessoaDAO {

        public function inserirPessoa(Pessoa $pessoa) {

            $sql = "INSERT INTO pessoas 
                   (tipo, nome, email, idade, cpf, curso, titulacao)
                   VALUES
                   (?, ?, ?, ?, ?, ?, ?)";

            $con = Conexao::getCon();

            $stm = $con->prepare($sql);
            if($pessoa instanceof Aluno) {
                $stm->execute(array($aluno->getTipo(),
                                    $aluno->getNome(),
                                    $aluno->getEmail(),
                                    $aluno->getIdade(),
                                    $aluno->getCpf(),
                                    $aluno->getCurso(),
                                    null));
            } else if($pessoa instanceof Professor) {
                $stm->execute(array($professor->getTipo(),
                                    $professor->getNome(),
                                    $professor->getEmail(),
                                    $professor->getIdade(),
                                    $professor->getCPF(),
                                    null,
                                    $professor->getTitulacao()));
            }
        }

        public function listarPessoas() {
            $sql = "SELECT * FROM pessoas";

            $con = Conexao::getCon();

            $stm = $con->prepare($sql);
            $stm->execute();
            $registros = $stm->fetchAll();

            $pessoas = $this->mapPessoas($registros);
            return $pessoas;
        }

        public function buscarPorId(int $idPessoa) {
            $con = Conexao::getCon();

            $sql = "SELECT * FROM pessoas WHERE id = ?";
        
            $stm = $con->prepare($sql);
            $stm->execute([$idPessoa]);

            $registros = $stm->fetchAll();

            $pessoas = $this->mapPessoas($registros);
            
            if (count($pessoas) > 0)
                return $pessoas[0];
            else
                return null;
            }

        public function excluirPessoa(int $idPessoa) {
            $con = Conexao::getCon();
            
            $sql = "DELETE FROM pessoas WHERE id = ?";
            
            $stm = $con->prepare($sql);
            $stm->execute([$idPessoa]);


        }

        private function mapPessoas(array $registros) {
            $pessoas = array();
            foreach($registros as $reg) {
                $pessoa = null;
                if($reg['tipo'] == 'A') {
                    $pessoa = new Aluno();
                    $pessoa->setCurso($reg['curso']);
                } else {
                    $pessoa = new Professor();
                    $pessoa->setTitulacao($reg['titulacao']);
                }

                $pessoa->setId($reg['id']);
                $pessoa->setNome($reg['nome']);
                $pessoa->setEmail($reg['email']);
                $pessoa->setIdade($reg['idade']);
                $pessoa->setCPF($reg['cpf']);
                array_push($pessoas, $pessoa);
            }
            return $pessoas;
        }
    }
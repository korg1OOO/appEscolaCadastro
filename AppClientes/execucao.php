<?php

    require_once("util/Conexao.php");
    require_once("modelo/Aluno.php");
    require_once("modelo/Professor.php");
    require_once("dao/PessoaDAO.php");

    /*
    $con = Conexao::getCon();
    print_r($con); */

    echo "\n\n----SISTEMA ESCOLAR IFPR----\n";
    echo "1- Cadastrar Aluno\n";
    echo "2- Cadastrar Professor\n";
    echo "3- Listar Pessoas\n";
    echo "4- Buscar Pessoas\n";
    echo "5- Excluir Pessoas\n";
    echo "0- Sair\n";

    $opcao = readline("Informe a opção: ");
    switch($opcao) {
        case 1:
            $aluno = new Aluno();
            $aluno->setNome(readline("Informe o nome: "));
            $aluno->setEmail(readline("Informe o e-mail: "));
            $aluno->setIdade(readline("Informe a idade: "));
            $aluno->setCpf(readline("Informe o CPF: "));
            $aluno->setCurso(readline("Informe o curso: "));

            $pessoaDAO = new PessoaDAO();
            $pessoaDAO->inserirPessoa($pessoa);

            echo "Aluno(a) cadastrado com sucesso!\n\n";

            break;

        case 2:
            $professor = new Professor();
            $professor->setNome(readline("Informe o nome: "));
            $professor->setEmail(readline("Informe o e-mail: "));
            $professor->setIdade(readline("Informe a idade: "));
            $professor->setCpf(readline("Informe o CPF: "));
            $professor->setTitulacao(readline("Informe a titulação: "));

            $pessoaDAO = new PessoaDAO();
            $pessoaDAO->inserirPessoa($pessoa);

            echo "Professor(a) cadastrado com sucesso!\n\n";

            break;

        case 3:

            $pessoaDAO = new PessoaDAO();
            $pessoaDAO->listarPessoas($pessoa);

            foreach($pessoas as $p) {
                printf("%d- %s | %s | %s | %s | %s\n", $p->getId(), $p->getTipo(), $p->getNome(),
                $p->getEmail(), $p->getIdade(), $p->getCPF(), $p->getExtra());
            }

            break;
    
        case 4:
            $id = readline("Informe o ID da pessoa cadastrada no sistema: ");

            $pessoaDAO = new PessoaDAO();
            $pessoaDAO = $pessoaDAO->buscarPorId($id);

            if ($pessoa !== null) {
                echo "Usuário encontrado:\n";
                printf("%d- %s | %s | %s | %s | %s\n", 
                    $pessoa->getId(), 
                    $pessoa->getTipo(), 
                    $pessoa->getNome(),
                    ($pessoa instanceof Aluno ? "Curso" : "Titulação"), 
                    $pessoa->getEmail(),
                    $pessoa->getIdade(),
                    $pessoa->getCPF(),
                    $pessoa->getExtra()
                );
            } else {
                echo "Cadastro do usuário não encontrado no sistema!\n";
            }
            break;

        case 5:
            echo "Excluir Cliente pelo ID\n";

            $pessoaDAO = new PessoaDAO();

            $pessoas = $pessoaDAO->listarPessoas();

            foreach($pessoas as $p) {
                printf("%d- %s | %s | %s | %s | %s\n", $p->getId(), $p->getTipo(), $p->getNome(),
                $p->getEmail(), $p->getIdade(), $p->getCPF(), $p->getExtra());
            }
            
            $id = readline("Informe o ID do usuário cadastrado: ");

            $pessoaDAO->excluirPessoa($id);

            echo "Usuário excluído com sucesso!\n\n";
            break;
        
        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida!";
    }
while($opcao != 0);

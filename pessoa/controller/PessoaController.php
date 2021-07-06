<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/php/dao/daoGenerico.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/php/model/Pessoa.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/php/model/conectadb.php';
class PessoaControler
{
    function InserirPessoa($nome, $dtNasc, $login, $senha, $perfil, $email, $cpf)
    {
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setNascimento($dtNasc);
        $pessoa->setlogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setEmail($email);
        $pessoa->setPerfil($perfil);
        $pessoa->setCpf($cpf);

        $daoPessoa = new daoGenerico();
        return $daoPessoa->inserir($pessoa);
    }
}

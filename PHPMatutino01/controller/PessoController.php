<?php
require_once "C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutino01/dao/daoPessoa.php";
require_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutino01/model/Pessoa.php';
class PessoController {

    public function inserirPessoa($nome, $dtNasc, $login, $senha, $perfil,
            $email, $cpf){
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
                
        $daoPessoa = new daoPessoa();
        return $daoPessoa->inserir($pessoa);
    }
}

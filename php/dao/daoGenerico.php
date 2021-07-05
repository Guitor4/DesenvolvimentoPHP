<?php
require_once('C:/xampp/htdocs/DesenvolvimentoPHP/php/model/conectadb.php');
require_once('C:/xampp/htdocs/DesenvolDesenvolvimentoPHP/php/model/Pessoa.php');

class daoGenerico
{
    public $conn;

    public function inserir(Pessoa $p)
    {
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $sql = "insert into pessoa values (null, '" . $p->getNome() . "','" . $p->getNascimento() . "','" . $p->getLogin() . "','" . $p->getSenha() . "','" .
                $p->getPerfil() . "','" . $p->getEmail() . "','" . $p->getCpf() . "')";
                
                if(mysqli_query($conn->conectadb(), $sql) != 1){
                    $msg = "Erro de sintaxe <br>";
                }else{
                    $msg = "Dados cadastrados com sucesso!";
                }
                
        }else{
            $msg ="Erro no banco de dados";
        }
        return $msg;
    }
}

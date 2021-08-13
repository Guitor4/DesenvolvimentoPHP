<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';


class DaoLogin
{


    public function validarLogin($login, $senha)
    {


        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        
        if ($conecta) {
            $st = $conecta->prepare("select * from pessoa where login = ? and senha = ?");

            $st->bindParam(1, $login);
            $st->bindParam(2, $senha);
            if ($st->execute()) {
                if ($st->rowCount() > 0) {
                    $pessoa = new Pessoa();
                    while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                        $pessoa->setIdpessoa($linha->idpessoa);
                        $pessoa->setNome($linha->nome);
                        $pessoa->setLogin($linha->login);
                        $pessoa->setSenha($linha->senha);
                        $pessoa->setPerfil($linha->perfil);

                        
                    }
                    return $pessoa;
                }else{
                    return "Usuário inexistente!!!";
                }
                
            }
        } else {
            return "Erro ao conectar ao banco de dados";
        }
    }
}

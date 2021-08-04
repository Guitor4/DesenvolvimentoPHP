<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Endereco.php';


class Daopessoa
{
    public function inserir(Pessoa $pessoa)
    {
        //$endereco = new Endereco();
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();


        if ($conecta) {
            $nomepessoa = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getlogin();
            $senha = $pessoa->getsenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();
            $endereco = $pessoa->getEndereco();

            $cep = $endereco->getCep();
            $logradouro = $endereco->getLogradouro();
            $bairro = $endereco->getBairro();
            $cidade = $endereco->getCidade();
            $uf = $endereco->getUF();
            $complemento = $endereco->getComplemento();
            //echo var_dump($pessoa);
            try {

                $stmt = $conecta->prepare("SELECT idEndereco FROM" .
                    "endereco where cep = ? and logradouro = ?" .
                    "and complemento = ? limit 1");
                $stmt->bindParam(1, $cep);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $complemento);

                if ($stmt->execute()) {
                    Echo "stmt executou!!";
                    if ($stmt->rowCount() > 0) {
                        while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
                            $fkEnd = $linha->idEndereco;
                        }
                    } else {
                        $stmt2 = $conecta->prepare("INSERT INTO endereco values (null,?,?,?,?,?,?)");
                        $stmt2->bind_param(1, $cep);
                        $stmt2->bind_param(2, $logradouro);
                        $stmt2->bind_param(3, $bairro);
                        $stmt2->bind_param(4, $cidade);
                        $stmt2->bind_param(5, $uf);
                        $stmt2->bind_param(6, $complemento);
                        $stmt2->execute();

                        $stmt3= $conecta->prepare("select idEndereco from endereco " .
                            "where cep = ? and logradouro = ? and complemento = ? limit 1");
                        if ($stmt3->execute()) {
                            if ($stmt3->Rowcount() > 0) {
                                while ($linha = $stmt3->fetch(PDO::FETCH_OBJ)) {
                                    $fkEnd = $linha->idEndereco;
                                }
                            }
                        }
                    }

                    $stmt = $conecta->prepare("insert into pessoa values "
                        . "(null,?,?,?,?,?,?,?)");
                    $stmt->bindParam(1, $nomepessoa);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6, $email);
                    $stmt->bindParam(7, $cpf);
                    $stmt->bindParam(8, $fkEnd);
                    $stmt->execute();
                    $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para atualizar dados da tabela pessoa
    public function atualizarpessoaDAO(pessoa $pessoa)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $nomepessoa = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getlogin();
            $senha = $pessoa->getsenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();
            $endereco = $pessoa->getEndereco();

            $cep = $endereco->getCep();
            $logradouro = $endereco->getLogradouro();
            $bairro = $endereco->getBairro();
            $cidade = $endereco->getCidade();
            $uf = $endereco->getUF();
            $complemento = $endereco->getComplemento();
            try {
                $stmt = $conecta->prepare("update pessoa set "
                    . "nome = ?,"
                    . "dtNasc = ?,"
                    . "login = ?,"
                    . "senha = ?,"
                    . "perfil = ?,"
                    . "email = ?,"
                    . "cpf = ?,"
                    . "fkEndereco = ?,"
                    . "where idpessoa = ?");
                $stmt->bindParam(1, $nomepessoa);
                $stmt->bindParam(2, $dtNasc[]);
                $stmt->bindParam(3, $login);
                $stmt->bindParam(4, $senha);
                $stmt->bindParam(5, $perfil);
                $stmt->bindParam(6, $email);
                $stmt->bindParam(7, $cpf);
                $stmt->bindParam(8, $fkEnd);
                $stmt->bindParam(9, $idpessoa);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                    . "Dados atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para carregar lista de pessoas do banco de dados
    public function listarpessoaDAO()
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("SELECT * from pessoa inner join endereco "
                    . " on pessoa.fkEndereco = endereco.idEndereco");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $pessoa = new pessoa();
                            $pessoa->setIdpessoa($linha->idpessoa);
                            $pessoa->setNome($linha->nome);
                            $pessoa->setDtNasc($linha->dtNasc);
                            $pessoa->setLogin($linha->login);
                            $pessoa->setSenha($linha->senha);
                            $pessoa->setPerfil($linha->perfil);
                            $pessoa->setEmail($linha->email);
                            $pessoa->setCpf($linha->cpf);

                            $endereco = new Endereco();
                            $endereco->setIdEndereco($linha->idEndereco);
                            $endereco->setCep($linha->cep);
                            $endereco->setLogradouro($linha->logradouro);
                            $endereco->setbairro($linha->bairro);
                            $endereco->setcidade($linha->cidade);
                            $endereco->setUF($linha->UF);
                            $endereco->setComplemento($linha->complemento);

                            $pessoa->setEndereco($endereco);
                            $lista[$a] = $pessoa;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
            $conn = null;
            return $lista;
        }
    }

    //método para excluir pessoa na tabela pessoa
    public function excluirpessoaDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from pessoa "
                    . "where idpessoa = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para os dados de pessoa por id
    public function pesquisarpessoaIdDAO($id)
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $pessoa = new pessoa();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("SELECT * from pessoa inner join endereco "
                    . " on pessoa.fkEndereco = endereco.idEndereco");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {

                            $pessoa = new pessoa();
                            $pessoa->setIdpessoa($linha->idpessoa);
                            $pessoa->setNome($linha->nome);
                            $pessoa->setDtNasc($linha->dtNasc);
                            $pessoa->setLogin($linha->login);
                            $pessoa->setSenha($linha->senha);
                            $pessoa->setPerfil($linha->perfil);
                            $pessoa->setEmail($linha->email);
                            $pessoa->setCpf($linha->cpf);

                            $endereco = new endereco();
                            $endereco->setCep($linha->cep);
                            $endereco->setLogradouro($linha->logradouro);
                            $endereco->setbairro($linha->bairro);
                            $endereco->setcidade($linha->cidade);
                            $endereco->setUF($linha->UF);
                            $endereco->setComplemento($linha->complemento);

                            $pessoa->setEndereco($endereco);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
            $conn = null;
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastropessoa.php'\">";
        }
        return $pessoa;
    }
}

<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Endereco.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';

class DaoPessoa
{

    public function inserirPessoaDao(Pessoa $pessoa)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
<<<<<<< HEAD
        $msg = new Mensagem();
        if ($conecta) {
            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getLogin();
            $senha = $pessoa->getSenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();
            $cep = $pessoa->getEndereco()->getCep();
            $logradouro = $pessoa->getEndereco()->getLogradouro();
            $complemento = $pessoa->getEndereco()->getComplemento();
            try {
                //$st vai procurar no banco se já existe o Endereço que o cliente está tentando anexar ao cadastro dele
=======
        $msg = new Mensagem;

        if ($conecta) {
            //echo "Banco conectado";
            $cep = $pessoa->getEndereco()->getCep();
            $logradouro = $pessoa->getEndereco()->getLogradouro();
            $complemento = $pessoa->getEndereco()->getComplemento();
            $bairro = $pessoa->getEndereco()->getBairro();
            $cidade = $pessoa->getEndereco()->getCidade();
            $uf = $pessoa->getEndereco()->getUF();

            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getlogin();
            $senhaSemCriptografia = $pessoa->getSenha();
            $senha = md5($senhaSemCriptografia);
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();

            //echo $cep . $logradouro . $complemento . $bairro . $cidade . $uf;

            try {
>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                $st = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);
<<<<<<< HEAD
                if ($st->execute()) {
                    if ($st->rowCount() > 0) {
                        //Se houver, ele jogar o idEndereco do endereço que o cliente está tentando anexar para a variável $fkEnd,
                        // para ser inserido na tabela pessoa posteriomente no stmt.
                        $linha = $st->fetch(PDO::FETCH_OBJ);
                        $fkEnd = $linha->idEndereco;
                        
                    } else {
                        echo "<p style = 'color:blue;'>O endereço que você usou é novo. Inserindo no banco de dados</p><br>";
                        $bairro = $pessoa->getEndereco()->getBairro();
                        $cidade = $pessoa->getEndereco()->getCidade();
                        $UF = $pessoa->getEndereco()->getUF();
=======

                if ($st->execute()) {
                    //echo "Executou!!<br>";
                    if ($st->rowCount()) {
                        echo "Achou resultado<br>";
                        $linha = $st->fetch(PDO::FETCH_OBJ);
                        $fkEnd = $linha->idEndereco;
                        echo $fkEnd;
                    } else {
                        echo "Não achou resultado, inserindo no banco de dados...<br>";
>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                        $st2 = $conecta->prepare("insert into endereco values (null,?,?,?,?,?,?)");
                        $st2->bindParam(1, $cep);
                        $st2->bindParam(2, $logradouro);
                        $st2->bindParam(3, $bairro);
                        $st2->bindParam(4, $cidade);
<<<<<<< HEAD
                        $st2->bindParam(5, $UF);
                        $st2->bindParam(6, $complemento);
                        if ($st2->execute()) {
                            echo "<p style = 'color:blue;'>Novo endereco inserido com sucesso</p><br>";
                        }
=======
                        $st2->bindParam(5, $uf);
                        $st2->bindParam(6, $complemento);

                        if ($st2->execute()) {
                            //   echo "Executou parte 2!!<br>";
                        }

>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                        $st3 = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $cep);
                        $st3->bindParam(2, $logradouro);
                        $st3->bindParam(3, $complemento);
<<<<<<< HEAD
                        if ($st3->execute()) {
                            if ($st3->rowCount() > 0) {
                                $linha = $st3->fetch(PDO::FETCH_OBJ);
                                $fkEnd = $linha->idEndereco;
                                echo "fkEnd: " . $fkEnd;
                            }
                        }
                    }
=======
                        if ($st->execute()) {
                            // echo "Executou parte 3!!<br>";
                            if ($st->rowCount()) {
                                // echo "Achou resultado<br>";
                                $linha = $st->fetch(PDO::FETCH_OBJ);
                                $fkEnd = $linha->idEndereco;
                                //  echo "fkEnd: ".$fkEnd;
                            }
                        }
                    }

>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                    $stmt = $conecta->prepare("insert into pessoa values (null,?,?,?,?,?,?,?,?)");
                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6, $email);
                    $stmt->bindParam(7, $cpf);
                    $stmt->bindParam(8, $fkEnd);

                    if ($stmt->execute()) {
<<<<<<< HEAD
                        echo "Executou parte 3";
                    }
                    $msg->setMsg("<p style = 'color: green;'>Dados Cadastrados com sucesso!!</p>");
                }
            } catch (Exception $ex) {
                echo "Erro: " . $ex;
=======
                        // echo "Executou parte 4 !!<br>";
                        $msg->setMsg("Dados cadastrados com sucesso!!");
                    }
                }
            } catch (Exception $e) {
                echo "Erro:" . $e;
>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;

        return $msg;
    }


    public function atualizarPessoaDao(Pessoa $pessoa)
    {

        $conn = new Conecta();
        $conecta = $conn->conectadb();
<<<<<<< HEAD
        $msg = new Mensagem();

        if ($conecta) {
            echo "Banco conectado!!";
            $idpessoa = $pessoa->getIdpessoa();
            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getLogin();
            $senha = $pessoa->getSenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();
            $cep = $pessoa->getEndereco()->getCep();
            $logradouro = $pessoa->getEndereco()->getLogradouro();
            $complemento = $pessoa->getEndereco()->getComplemento();
            try {
                //$st vai procurar no banco se já existe o Endereço que o cliente está tentando anexar ao cadastro dele
                $st = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);
                if ($st->execute()) {
                    echo "Executou <br>";
                    if ($st->rowCount() > 0) {
                        //Se houver, ele jogar o idEndereco do endereço que o cliente está tentando anexar para a variável $fkEnd,
                        // para ser inserido na tabela pessoa posteriomente no stmt.
                        
                        $linha = $st->fetch(PDO::FETCH_OBJ);
                        $fkEnd = $linha->idEndereco;
                        
                    } else {
                        echo "<p style = 'color:blue;'>O endereço que você usou é novo. Inserindo no banco de dados</p><br>";
                        $bairro = $pessoa->getEndereco()->getBairro();
                        $cidade = $pessoa->getEndereco()->getCidade();
                        $UF = $pessoa->getEndereco()->getUF();
=======
        $msg = new Mensagem;

        if ($conecta) {
            //echo "Banco conectado";
            $cep = $pessoa->getEndereco()->getCep();
            $logradouro = $pessoa->getEndereco()->getLogradouro();
            $complemento = $pessoa->getEndereco()->getComplemento();
            $bairro = $pessoa->getEndereco()->getBairro();
            $cidade = $pessoa->getEndereco()->getCidade();
            $uf = $pessoa->getEndereco()->getUF();

            $idpessoa = $pessoa->getIdpessoa();
            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getlogin();
            $senhaSemCriptografia = $pessoa->getSenha();
            $senha = md5($senhaSemCriptografia);
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();

            // echo $cep . $logradouro . $complemento . $bairro . $cidade . $uf;

            try {
                $st = $conecta->prepare("SELECT idEndereco FROM endereco WHERE cep = ? AND logradouro = ? AND complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);

                if ($st->execute()) {
                    //echo "Executou!!<br>";
                    if ($st->rowCount()) {
                        echo "Achou resultado<br>";
                        $linha = $st->fetch(PDO::FETCH_OBJ);
                        $fkEnd = $linha->idEndereco;
                        // echo $fkEnd;
                    } else {
                        echo "<p style = 'color: blue;'>O endereço que você inseriu é novo.... Inserindo no banco de dados</p>";
>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                        $st2 = $conecta->prepare("insert into endereco values (null,?,?,?,?,?,?)");
                        $st2->bindParam(1, $cep);
                        $st2->bindParam(2, $logradouro);
                        $st2->bindParam(3, $bairro);
                        $st2->bindParam(4, $cidade);
<<<<<<< HEAD
                        $st2->bindParam(5, $UF);
                        $st2->bindParam(6, $complemento);
                        if ($st2->execute()) {
                            echo "<p style = 'color:blue;'>Novo endereco inserido com sucesso</p><br>";
                        }
=======
                        $st2->bindParam(5, $uf);
                        $st2->bindParam(6, $complemento);

                        if ($st2->execute()) {
                            // echo "Executou parte 2!!<br>";
                            echo "<p style = 'color : blue;'>Endereço inserido com sucesso no banco de dados!!</p>";
                        }

>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                        $st3 = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $cep);
                        $st3->bindParam(2, $logradouro);
                        $st3->bindParam(3, $complemento);
<<<<<<< HEAD
                        if ($st3->execute()) {
                            if ($st3->rowCount() > 0) {
                                $linha = $st3->fetch(PDO::FETCH_OBJ);
                                $fkEnd = $linha->idEndereco;
                            }
                        }
                    }
                    echo $idpessoa;
                    $stmt = $conecta->prepare("update pessoa set nome = ?, dtNasc = ?, login = ?, senha = ?, perfil = ?, email = ?, cpf = ?, fkEndereco = ? where idpessoa = ?");
=======
                        if ($st->execute()) {
                            // echo "Executou parte 3!!<br>";
                            if ($st->rowCount()) {
                                //echo "Achou resultado<br>";
                                $linha = $st->fetch(PDO::FETCH_OBJ);
                                $fkEnd = $linha->idEndereco;
                                //  echo "fkEnd: ".$fkEnd;
                            }
                        }
                    }

                    $stmt = $conecta->prepare("update pessoa set nome = ?, dtNasc = ?, login = ?, senha = ?, perfil = ?, email = ?, cpf = ?, fkEndereco = ? where idpessoa = ? ");
>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6, $email);
                    $stmt->bindParam(7, $cpf);
                    $stmt->bindParam(8, $fkEnd);
                    $stmt->bindParam(9, $idpessoa);

                    if ($stmt->execute()) {
<<<<<<< HEAD
                        echo "Executou parte 3";
                        $msg->setMsg("<p style = 'color: green;'>Dados alterados com sucesso!!</p>");
                    }
                    
                }
            } catch (Exception $ex) {
                echo "Erro: " . $ex;
=======
                        //  echo "Executou parte 4 !!<br>";
                        $msg->setMsg("Dados cadastrados com sucesso!!");
                    }
                }
            } catch (Exception $e) {
                echo "Erro:" . $e;
>>>>>>> ea06180a6582f772bff40beddc1cef8ee1b5592a
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
                    . " on pessoa.fkEndereco = endereco.idEndereco order by pessoa.idpessoa");
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
                    . " on pessoa.fkEndereco = endereco.idEndereco where idpessoa = ?");
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

    public function procurarsenha($login, $senha)
    {
        $pessoa = new Pessoa();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $check = null;
        echo $senha;
        if ($conecta) {
            try {
                $st = $conecta->prepare("SELECT idpessoa FROM pessoa WHERE " . "login = ? and senha = ? ");
                $st->bindParam(1, $login);
                $st->bindParam(2, $senha);
                if ($st->execute()) {

                    if ($st->rowCount() > 0) {
                        echo $st->rowCount();
                        $check =  true;
                    } else {
                        $check =  false;
                    }
                }
            } catch (Exception $ex) {
                echo $ex;
            }
            return $check;
            $conn = null;
        } else {


            echo "Sem conexão com o banco";
        }
    }
}

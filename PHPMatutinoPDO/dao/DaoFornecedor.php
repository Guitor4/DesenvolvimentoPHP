<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Fornecedor.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Endereco.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';

class DaoFornecedor
{

    public function inserir(Fornecedor $fornecedor)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel = $fornecedor->getTelCel();
            $logradouro = $fornecedor->getEndereco()->getLogradouro();
            $complemento = $fornecedor->getEndereco()->getcomplemento();
            $bairro = $fornecedor->getEndereco()->getBairro();
            $cidade = $fornecedor->getEndereco()->getCidade();
            $UF = $fornecedor->getEndereco()->getUF();
            $cep = $fornecedor->getEndereco()->getCEP();
            try {
                $st = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);
                if ($st->execute()) {
                    if ($st->rowCount() > 0) {
                        //Se houver, ele jogar o idEndereco do endereço que o cliente está tentando anexar para a variável $fkEnd,
                        // para ser inserido na tabela fornecedor posteriomente no stmt.
                        $linha = $st->fetch(PDO::FETCH_OBJ);
                        $fkEnd = $linha->idEndereco;
                    } else {
                        echo "<p style = 'color:blue;'>O endereço que você usou é novo. Inserindo no banco de dados</p><br>";
                        $bairro = $fornecedor->getEndereco()->getBairro();
                        $cidade = $fornecedor->getEndereco()->getCidade();
                        $UF = $fornecedor->getEndereco()->getUF();
                        $st2 = $conecta->prepare("insert into endereco values (null,?,?,?,?,?,?)");
                        $st2->bindParam(1, $cep);
                        $st2->bindParam(2, $logradouro);
                        $st2->bindParam(3, $bairro);
                        $st2->bindParam(4, $cidade);
                        $st2->bindParam(5, $UF);
                        $st2->bindParam(6, $complemento);
                        if ($st2->execute()) {
                            echo "<p style = 'color:blue;'>Novo endereco inserido com sucesso</p><br>";
                        }
                        $st3 = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $cep);
                        $st3->bindParam(2, $logradouro);
                        $st3->bindParam(3, $complemento);
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

                    $stmt = $conecta->prepare("insert into fornecedor values "
                        . "(null,?,?,?,?,?,?)");
                    $stmt->bindParam(1, $nomeFornecedor);
                    $stmt->bindParam(2, $representante);
                    $stmt->bindParam(3, $email);
                    $stmt->bindParam(4, $telFixo);
                    $stmt->bindParam(5, $telCel);
                    $stmt->bindParam(6, $fkEnd);
                    $stmt->execute();
                }
            } catch (Exception $e) {
                echo "Erro:" . $e;
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para atualizar dados da tabela fornecedor
    public function atualizarFornecedorDAO(Fornecedor $fornecedor)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idFornecedor = $fornecedor->getIdFornecedor();
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel = $fornecedor->getTelCel();
            $logradouro = $fornecedor->getEndereco()->getLogradouro();
            $complemento = $fornecedor->getEndereco()->getcomplemento();
            $bairro = $fornecedor->getEndereco()->getBairro();
            $cidade = $fornecedor->getEndereco()->getCidade();
            $uf = $fornecedor->getEndereco()->getUF();
            $cep = $fornecedor->getEndereco()->getCEP();
            echo var_dump($fornecedor);
            try {
                $st = $conecta->prepare("SELECT idEndereco FROM endereco WHERE cep = ? AND logradouro = ? AND complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);

                if ($st->execute()) {
                    echo "Executou!!<br>";
                    if ($st->rowCount()) {
                        echo "Achou resultado<br>";
                        $linha = $st->fetch(PDO::FETCH_OBJ);
                        $fkEnd = $linha->idEndereco;
                         echo $fkEnd;
                    } else {
                        echo "<p style = 'color: blue;'>O endereço que você inseriu é novo.... Inserindo no banco de dados</p>";
                        $st2 = $conecta->prepare("insert into endereco values (null,?,?,?,?,?,?)");
                        $st2->bindParam(1, $cep);
                        $st2->bindParam(2, $logradouro);
                        $st2->bindParam(3, $bairro);
                        $st2->bindParam(4, $cidade);
                        $st2->bindParam(5, $uf);
                        $st2->bindParam(6, $complemento);

                        if ($st2->execute()) {
                             echo "Executou parte 2!!<br>";
                            echo "<p style = 'color : blue;'>Endereço inserido com sucesso no banco de dados!!</p>";
                        }

                        $st3 = $conecta->prepare("select idEndereco from endereco where cep = ? and logradouro = ? and complemento = ? limit 1");
                        $st3->bindParam(1, $cep);
                        $st3->bindParam(2, $logradouro);
                        $st3->bindParam(3, $complemento);
                        if ($st->execute()) {
                             echo "Executou parte 3!!<br>";
                            if ($st->rowCount()) {
                                echo "Achou resultado<br>";
                                $linha = $st->fetch(PDO::FETCH_OBJ);
                                $fkEnd = $linha->idEndereco;
                                  echo "fkEnd: ".$fkEnd;
                            }
                        }
                    }

                    $stmt = $conecta->prepare("update fornecedor set nomeFornecedor = ?, representante = ?, email = ?, telFixo = ?, TelCel =?, fkendereco =? where idFornecedor = ?");
                    $stmt->bindParam(1, $nomeFornecedor);
                    $stmt->bindParam(2, $representante);
                    $stmt->bindParam(3, $email);
                    $stmt->bindParam(4, $telFixo);
                    $stmt->bindParam(5, $telCel);
                    $stmt->bindParam(6, $fkEnd);
                    $stmt->bindParam(7, $idFornecedor);
                    $stmt->execute();

                    if ($stmt->execute()) {
                          echo "Executou parte 4 !!<br>";
                        $msg->setMsg("Dados cadastrados com sucesso!!");
                    }
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

    //método para carregar lista de fornecedors do banco de dados
    public function listarFornecedorDAO()
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("select * from fornecedor inner join endereco on fornecedor.fkendereco = endereco.idEndereco");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $fornecedor = new Fornecedor();
                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setRepresentante($linha->representante);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTelFixo($linha->telFixo);
                            $fornecedor->setTelCel($linha->telCel);

                            $endereco = new Endereco();
                            $endereco->setLogradouro($linha->logradouro);
                            $endereco->setcomplemento($linha->complemento);
                            $endereco->setBairro($linha->bairro);
                            $endereco->setCidade($linha->cidade);
                            $endereco->setUF($linha->UF);
                            $endereco->setCEP($linha->cep);

                            $fornecedor->setEndereco($endereco);
                            $lista[$a] = $fornecedor;
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

    //método para excluir fornecedor na tabela fornecedor
    public function excluirFornecedorDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from fornecedor "
                    . "where idFornecedor = ?");
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

    //método para os dados de fornecedor por id
    public function pesquisarFornecedorIdDAO($id)
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $fornecedor = new Fornecedor();
        $endereco = new Endereco();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("SELECT * from fornecedor inner join endereco on 
                fornecedor.fkendereco = endereco.idEndereco where "
                    . "idFornecedor = ?");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {

                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setRepresentante($linha->representante);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTelFixo($linha->telFixo);
                            $fornecedor->setTelCel($linha->telCel);


                            $endereco->setLogradouro($linha->logradouro);
                            $endereco->setcomplemento($linha->complemento);
                            $endereco->setBairro($linha->bairro);
                            $endereco->setCidade($linha->cidade);
                            $endereco->setUF($linha->UF);
                            $endereco->setCEP($linha->cep);

                            $fornecedor->setEndereco($endereco);
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
			 URL='../PHPMatutino01/cadastroFornecedor.php'\">";
        }
        return $fornecedor;
    }
}

<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Fornecedor.php';
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
            $logradouro = $fornecedor->getLogradouroFornecedor();
            $complemento = $fornecedor->getcomplemento();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $UF = $fornecedor->getUF();
            $CEP = $fornecedor->getCEP();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel = $fornecedor->getTelCel();
            try {
                $stmt = $conecta->prepare("insert into fornecedor values "
                    . "(null,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeFornecedor);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $complemento);
                $stmt->bindParam(4, $bairro);
                $stmt->bindParam(5, $cidade);
                $stmt->bindParam(6, $UF);
                $stmt->bindParam(7, $CEP);
                $stmt->bindParam(8, $representante);
                $stmt->bindParam(9, $email);
                $stmt->bindParam(10, $telFixo);
                $stmt->bindParam(11, $telCel);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                    . "Dados Cadastrados com sucesso</p>");
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

    //método para atualizar dados da tabela fornecedor
    public function atualizarFornecedorDAO(Fornecedor $fornecedor)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idFornecedor = $fornecedor->getIdFornecedor();
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $logradouro = $fornecedor->getLogradouroFornecedor();
            $complemento = $fornecedor->getcomplemento();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $UF = $fornecedor->getUF();
            $CEP = $fornecedor->getCEP();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $telFixo = $fornecedor->getTelFixo();
            $telCel = $fornecedor->getTelCel();
            try {
                $stmt = $conecta->prepare("update fornecedor set "
                    . "nomeFornecedor = ?,"
                    . "logradouro = ?,"
                    . "complemento = ?,"
                    . "bairro = ?,"
                    . "cidade = ?,"
                    . "UF = ?,"
                    . "CEP = ?,"
                    . "representante = ?,"
                    . "email = ?,"
                    . "telFixo = ?,"
                    . "telCel = ?"
                    . "where idFornecedor = ?");
                $stmt->bindParam(1, $nomeFornecedor);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $complemento);
                $stmt->bindParam(4, $bairro);
                $stmt->bindParam(5, $cidade);
                $stmt->bindParam(6, $UF);
                $stmt->bindParam(7, $CEP);
                $stmt->bindParam(8, $representante);
                $stmt->bindParam(9, $email);
                $stmt->bindParam(10, $telFixo);
                $stmt->bindParam(11,$telCel);
                $stmt->bindParam(12, $idFornecedor);
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

    //método para carregar lista de fornecedors do banco de dados
    public function listarFornecedorDAO()
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("select * from fornecedor");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $fornecedor = new Fornecedor();
                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setLogradouroFornecedor($linha->logradouro);
                            $fornecedor->setcomplemento($linha->complemento);
                            $fornecedor->setBairro($linha->bairro);
                            $fornecedor->setCidade($linha->cidade);
                            $fornecedor->setUF($linha->UF);
                            $fornecedor->setCEP($linha->CEP);
                            $fornecedor->setRepresentante($linha->representante);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTelFixo($linha->telFixo);
                            $fornecedor->setTelCel($linha->telCel);
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
        if ($conecta) {
            try {
                $rs = $conecta->prepare("select * from fornecedor where "
                    . "idFornecedor = ?");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {

                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setLogradouroFornecedor($linha->logradouro);
                            $fornecedor->setcomplemento($linha->complemento);
                            $fornecedor->setBairro($linha->bairro);
                            $fornecedor->setCidade($linha->cidade);
                            $fornecedor->setUF($linha->UF);
                            $fornecedor->setCEP($linha->CEP);
                            $fornecedor->setRepresentante($linha->representante);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTelFixo($linha->telFixo);
                            $fornecedor->setTelCel($linha->telCel);
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

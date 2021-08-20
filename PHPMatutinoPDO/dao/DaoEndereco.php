<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Endereco.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';
class DaoEndereco
{

    public function inserir(Endereco $endereco)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            //echo var_dump($endereco);
            $cep = $endereco->getCep();
            $logradouro = $endereco->getLogradouro();
            $bairro = $endereco->getBairro();
            $cidade = $endereco->getCidade();
            $UF = $endereco->getUF();
            $complemento = $endereco->getComplemento();
            try {
                $stmt = $conecta->prepare("insert into endereco values "
                    . "(null,?,?,?,?,?,?)");
                $stmt->bindParam(1, $cep);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $bairro);
                $stmt->bindParam(4, $cidade);
                $stmt->bindParam(5, $UF);
                $stmt->bindParam(6, $complemento);
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

    //método para atualizar dados da tabela endereco
    public function atualizarEnderecoDAO(Endereco $endereco)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idEndereco = $endereco->getIdEndereco();
            $cep = $endereco->getCep();
            $logradouro = $endereco->getLogradouro();
            $bairro = $endereco->getBairro();
            $cidade = $endereco->getCidade();
            $UF = $endereco->getUF();
            $complemento = $endereco->getComplemento();
            try {
                $stmt = $conecta->prepare("update endereco set "
                    . "cep = ?,"
                    . "logradouro = ?,"
                    . "bairro = ?,"
                    . "cidade = ?,"
                    . "UF = ?, complemento = ? where idEndereco = ?");
                $stmt->bindParam(1, $cep);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $bairro);
                $stmt->bindParam(4, $cidade);
                $stmt->bindParam(5, $UF);
                $stmt->bindParam(6, $complemento);
                $stmt->bindParam(7, $idEndereco);
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

    //método para carregar lista de enderecos do banco de dados
    public function listarEnderecoDAO()
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("select * from endereco");
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $endereco = new endereco();
                            $endereco->setIdEndereco($linha->idEndereco);
                            $endereco->setCep($linha->cep);
                            $endereco->setLogradouro($linha->logradouro);
                            $endereco->setBairro($linha->bairro);
                            $endereco->setCidade($linha->cidade);
                            $endereco->setUF($linha->UF);
                            $endereco->setComplemento($linha->complemento);
                            $lista[$a] = $endereco;
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

    //método para excluir endereco na tabela endereco
    public function excluirenderecoDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from endereco "
                    . "where idEndereco = ?");
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

    //método para os dados de endereco por id
    public function pesquisarEnderecoIdDAO($id)
    {
        $msg = new Mensagem();
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $endereco = new endereco();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("SELECT * from endereco where "
                    . "idEndereco = ?");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $endereco->setIdEndereco($linha->idEndereco);
                            $endereco->setCep($linha->cep);
                            $endereco->setLogradouro($linha->logradouro);
                            $endereco->setBairro($linha->bairro);
                            $endereco->setCidade($linha->cidade);
                            $endereco->setUF($linha->UF);
                            $endereco->setComplemento($linha->complemento);
                            
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
			 URL='../PHPMatutino01/cadastroendereco.php'\">";
        }
        
        return $endereco;
    }
}

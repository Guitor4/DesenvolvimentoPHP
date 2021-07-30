<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Produto.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Fornecedor.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';

class DaoProduto
{

    public function inserir(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $fkFornecedor = $produto->getFornecedor();
            try {
                $stmt = $conecta->prepare("insert into produto values "
                    . "(null,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $fkFornecedor);
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

    //método para atualizar dados da tabela produto
    public function atualizarProdutoDAO(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $id = $produto->getIdProduto();
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            try {
                $stmt = $conecta->prepare("update produto set "
                    . "nome = ?,"
                    . "vlrCompra = ?,"
                    . "vlrVenda = ?, "
                    . "qtdEstoque = ? "
                    . "where id = ?");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $vlrCompra);
                $stmt->bindParam(3, $vlrVenda);
                $stmt->bindParam(4, $qtdEstoque);
                $stmt->bindParam(5, $id);
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

    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO()
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("SELECT * from produto inner join fornecedor "
              ." on produto.fkFornecedor = fornecedor.IdFornecedor");

              $lista = array();
            


                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto = new Produto();
                            $produto->setIdProduto($linha->idProduto);
                            $produto->setNomeProduto($linha->nome);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                                    
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
                        
                            $produto->setFornecedor($fornecedor);
                            
                            $lista[$a] = $produto;
                            
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

    //método para excluir produto na tabela produto
    public function excluirProdutoDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from produto "
                    . "where id = ?");
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

    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $produto = new Produto();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("select * from produto where "
                    . "idProduto = ?");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($lista = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto->setIdProduto($lista->idProduto);
                            $produto->setNomeProduto($lista->nome);
                            $produto->setVlrCompra($lista->vlrCompra);
                            $produto->setVlrVenda($lista->vlrVenda);
                            $produto->setQtdEstoque($lista->qtdEstoque);
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
			 URL='../PHPMatutino01/cadastroProduto.php'\">";
        }
        return $produto;
    }
    public function setarTudo()
    {
        $conn = new Conecta();
        $conectar = $conn->conectadb();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $produto = new Produto();

        $rs = $conecta->query("SELECT * from produto inner join fornecedor on produto.fkFornecedor = fornecedor.IdFornecedor");
        $a = 0;
        $lista = array();
        if ($rs->execute()) {
            if ($rs->rowCount() > 0) {
                while ($lista = $rs->fetch(PDO::FETCH_OBJ)) {
                    $produto->setIdProduto($lista->idProduto);
                    $produto->setNomeProduto($lista->nome);
                    $produto->setIdProduto($lista->vlrCompra);
                    $produto->setIdProduto($lista->vlrVenda);
                    $produto->setIdProduto($lista->qtdEstoque);

                    $fornecedor = new Fornecedor();
                    $fornecedor->setIdFornecedor($lista->idFornecedor);
                    $fornecedor->setNomeFornecedor($lista->nomeFornecedor);
                    $fornecedor->setLogradouroFornecedor($lista->logradouro);
                    $fornecedor->setcomplemento($lista->complemento);
                    $fornecedor->setBairro($lista->bairro);
                    $fornecedor->setCidade($lista->cidade);
                    $fornecedor->setUF($lista->UF);
                    $fornecedor->setCEP($lista->CEP);
                    $fornecedor->setRepresentante($lista->representante);
                    $fornecedor->setEmail($lista->email);
                    $fornecedor->setTelFixo($lista->telFixo);
                    $fornecedor->setTelCel($lista->telCel);
                
                    $produto->setFornecedor($fornecedor);
                }
            }
        }
        return $produto;
    }
}

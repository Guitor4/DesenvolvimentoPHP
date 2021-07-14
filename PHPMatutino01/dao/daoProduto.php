<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutino01/bd/Conecta.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutino01/model/Produto.php';

class DaoProduto {
    
    public function inserir(Produto $produto){
        $conn = new Conecta();
        if($conn->conectadb()){
            $nomeProduto = $produto->getNomeProduto();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $sql = "insert into produto values (null, '$nomeProduto',"
                    . "'$vlrCompra', '$vlrVenda', '$qtdEstoque')";
            $resp = mysqli_query($conn->conectadb(), $sql) or 
                    die($conn->conectadb());
            if($resp){
                $msg = "<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>";
            }else{
                $msg = $resp;
            }
        }else{
            $msg = "<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }
    
    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO(){
        $conn = new Conecta();
        if($conn->conectadb()){
            $sql = "select * from produtos";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $produto = new Produto();
                    $produto->setIdProduto($result['id']);
                    $produto->setNomeProduto($result['nome']);
                    $produto->setVlrCompra($result['vlrCompra']);
                    $produto->setVlrVenda($result['vlrVenda']);
                    $produto->setQtdEstoque($result['qtdEstoque']);
                    $lista[$a] = $produto;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
    
    //método para excluir produto na tabela produto
    public function excluirProdutoDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        if($conecta){
            $sql = "delete from produto where id = '$id'";
            mysqli_query($conecta, $sql);
            header("Location: ../cadastroProduto.php");
            mysqli_close($conecta);
            exit;
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../cadastroProduto.php'\">"; 
        }
    }
    
    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $produto = new Produto();
        if($conecta){
            $sql = "select * from produtos where id = '$id'";
            $result = mysqli_query($conecta, $sql);
            $linha = mysqli_fetch_assoc($result);
            if ($linha) {
                do {
                    $produto->setIdProduto($linha['id']);
                    $produto->setNomeProduto($linha['nome']);
                    $produto->setVlrCompra($linha['vlrCompra']);
                    $produto->setVlrVenda($linha['vlrVenda']);
                    $produto->setQtdEstoque($linha['qtdEstoque']);
                } while ($linha = mysqli_fetch_assoc($result));
            }
            mysqli_close($conecta);
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutino01/cadastroProduto.php'\">"; 
        }
        return $produto;
    }
}

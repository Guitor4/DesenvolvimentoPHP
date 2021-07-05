<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/bd/conectadb.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/model/Produto.php';
class daoProduto
{

    public function inserirProduto(Produto $produto)
    {

        $conn = new conectadb();
        if ($conn->conectadb()) {
            $nomeProduto = $produto->getNome();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtEstoque = $produto->getQtEstoque();
            echo $nomeProduto;
            echo $vlrCompra;
            echo $vlrVenda;
            echo $qtEstoque;
            $sql = "insert into produtos values (null,'$nomeProduto','$vlrCompra','$vlrVenda','$qtEstoque')";
            if (mysqli_query($conn->conectadb(), $sql)) {
                $msg = "<p style = 'color: green;'>Dados cadastrados com sucesso</p>";
            } else {
                $msg = "<p style = 'color: red;'>Falha ao cadastrar dados</p>";
            }
        } else {
            $msg = "<p style = 'color: red;'>Falha ao conectar com o banco de dados</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }
}

<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/model/Produto.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/bd/conectadb.php';
class daoProduto
{
    function inserirProduto(Produto $produto)
    {
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $produto = $produto->getNome();
            $qtdEstoque = $produto->getQtEstoque();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            
            $sql = "insert into produto values (null,'$produto','$vlrCompra','$qtdEstoque','$vlrVenda')";
            if (mysqli_query($conn->conectadb(), $sql)) {
                $msg = "<p style = 'color: green'>Dados cadastrados com sucesso!!</p>";
            } else {
                $msg = "<p style = 'color: red'>Falha ao cadastrar os dados</p>";
            }
        } else {
            $msg = "<p style = 'color: yellow'>Falha ao conectar com o banco de dados.</p>";
        }
        return $msg;
    }

    function ListarProdutoDAO()
    {
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $sql = "select * from produto";
            if ($conn->conectadb()) {
                $sql = "select * from produto";
                $query =  mysqli_query($conn->conectadb(), $sql);
                $lista = mysqli_fetch_array($query);
                $lp = mysqli_fetch_array($query);
            }
        }
    }
}

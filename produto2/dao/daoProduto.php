<?php
include_once '../bd/conectadb.php';
include_once '../model/Produto.php';
class daoProduto
{

    public function inserirProduto(Produto $produto)
    {

        $conn = new conectadb();
        if ($conn->conectadb()) {
            $nome = $produto->getNome();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();

            $sql = "insert into produto values (null,'$nome','$vlrCompra','$vlrVenda','$qtdEstoque')";
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
}

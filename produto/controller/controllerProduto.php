<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/dao/daoProduto.php';
class ProdutoController{
    function inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtEstoque)
    {
        //echo $nomeProduto, $vlrCompra, $vlrVenda, $qtEstoque;
        $produto = new Produto();
        $produto->setNome($nomeProduto);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setQtEstoque($qtEstoque);


        $daoProduto = new daoProduto();
        return $daoProduto->inserirProduto($produto);
    }
//método para carregar a lista de produtos que vem da DAO
function ListarProdutos(){
    $daoProduto = new DaoProduto();
    return $daoProduto->listarProdutoDAO();
}


}
<?php

class ProdutoController{
    function InserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtEstoque)
    {
        $produto = new Produto();
        $produto->setNome($nomeProduto);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setQtEstoque($qtEstoque);


        $daoProduto = new daoProduto();
        return $daoProduto->inserirProduto($produto);
    }




}
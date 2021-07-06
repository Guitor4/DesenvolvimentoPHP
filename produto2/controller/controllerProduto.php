<?php
include_once '../model/Produto.php';
include_once '../dao/daoProduto.php';
class controllerProduto{

    function inserirProdutoController($produto, $vlrCompra, $vlrVenda, $qtdEstoque){
        $produto = new Produto();
        $produto->setNome($produto);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setQtdEstoque($qtdEstoque);

        $daoproduto = new daoproduto();
        $daoproduto->inserirProduto($produto);
    }

}
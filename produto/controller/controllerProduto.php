<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/dao/daoProduto.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/model/Produto.php';
class ProdutoController{
   public function inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtEstoque)
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
public function ListarProdutos(){
    $daoProduto = new DaoProduto();
    return $daoProduto->listarProdutoDAO();
}


}
<?php
include_once '../bd/conectadb.php';
include_once '../model/Produto.php';
class daoProduto{
    
    function inserirProduto(Produto $produto)
    {
        
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $sql = "insert into pessoa values (null, '" . $produto->getNome() . "','" . $produto->getVlrCompra() . "','" . $produto->getVlrVenda() . "','" 
            . $produto->getQtEstoque()."')";                 
                if(mysqli_query($conn->conectadb(), $sql) != 1){
                    $msg = "Erro de sintaxe <br>";
                }else{
                    $msg = "Dados cadastrados com sucesso!";
                }
                
        }else{
            $msg ="Erro no banco de dados";
        }
        return $msg;
    }
}
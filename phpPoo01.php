<?php
require_once "php/model/Produto.php";

$p = new Produto();

$p->id = 10;
$p->nome = "Tênis";
$p->vlrCompra = 100.00;
$p->vlrVenda = 150.00;
$p->qtEstoque= 50;

echo "Dados do Produto: ";
echo "Código do produto: ". $p->id . "<br>";
echo "Nome: ". $p->nome;
echo "Valor da Compra: ". $p->vlrCompra. "<br>";
echo "Valor da Venda: ". $p->vlrVenda. "<br>";
echo "Quantidade em estoque: ".$p->qtEstoque. "<br>";

?>
<?php
require 'classes/produto.php';
require 'models/produto.php';

use classes\Produto as ProductClasses;
use models\Produto as ProductModels;

$produto = new ProductClasses();
$produto->MostrarDetalhesProduto();

$produto2 = new ProductModels();
$produto2->MostrarDetalhesProduto();
?>
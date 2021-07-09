<?php 
include_once 'livroController.php';

$id = $_REQUEST['ide'];    
$lc = new livroController();
$lc->ExcluirLivro($id);

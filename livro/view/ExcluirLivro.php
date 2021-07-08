<?php 
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/livro';
$id = $_REQUEST['ide'];    
$lc = new livroController();
$lc->ExcluirLivro($id);
?>
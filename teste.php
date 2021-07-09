<?php

include_once 'livro/controller/ExcluirLivro.php';


$livrocontroller = new livroController();
$daoLivro = new daoLivro();
$livro = new livro();


$livrocontroller->ListarLivros();
echo $daoLivro->excluirLivroDao(2);

?>
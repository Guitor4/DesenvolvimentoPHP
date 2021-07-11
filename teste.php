<?php
 include_once __DIR__.'/livro/controller/livroController.php';



$livrocontroller = new livroController();
$daoLivro = new daoLivro();
$livro = new livro();


$livrocontroller->ListarLivros();
echo $daoLivro->excluirLivroDao(2);

?>
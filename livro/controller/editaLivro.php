<?php
include_once 'livroController.php';
include_once '../model/livro.php';
$lc = new livroController();
$lv = new livro();
$id = $lv->getIdlivro();
$titulo = $lv->getTitulo();
$autor = $lv->getAutor();
$editora = $lv->getEditora();
$qtdEstoque = $lv ->getQtdEstoque();
$lc->editarLivro($id,$titulo,$autor,$editora,$qtdEstoque);
exit;

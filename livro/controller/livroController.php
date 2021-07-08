<?php
include_once '../dao/daoLivro.php';
include_once '../model/livro.php';

class livroController{
   function InserirLivroController($titulo, $autor, $editora, $qtdEstoque){
        $livro = new livro();
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQtdEstoque($qtdEstoque);

        $daolivro = new daoLivro();
       return $daolivro->inserirLivro($livro);
   }  
function ListarLivros(){
   $daolivro = new daoLivro();
   return $daolivro->ListarLivros();
}
}

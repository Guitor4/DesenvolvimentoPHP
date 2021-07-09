<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/livro/dao/daoLivro.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/livro/model/livro.php';

class livroController
{
   function InserirLivroController($titulo, $autor, $editora, $qtdEstoque)
   {
      $livro = new livro();
      $livro->setTitulo($titulo);
      $livro->setAutor($autor);
      $livro->setEditora($editora);
      $livro->setQtdEstoque($qtdEstoque);

      $daolivro = new daoLivro();
      return $daolivro->inserirLivro($livro);
   }
   function ListarLivros()
   {
      $daolivro = new daoLivro();
      return $daolivro->ListarLivros();
   }

   function ExcluirLivro($id)
   {
      $daolivro = new daoLivro();
      $daolivro->excluirLivroDao($id);
   }
   function editarLivro($id)
   {
      $daolivro = new daolivro();
      $daolivro->editarLivroDao($id);
   }

   function pesquisarLivroId($id){
      $daolivro = new daolivro();
      $daolivro-> pesquisarLivroIdDao($id);      
   }
   function limpar(){
     return $liv = new livro();

   }
}

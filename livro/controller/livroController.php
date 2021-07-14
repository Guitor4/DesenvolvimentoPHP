<?php
   require 'C:/xampp/htdocs/DesenvolvimentoPHP/livro/dao/daoLivro.php';
   include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/livro/model/livro.php';



class livroController{


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
      echo ($id);
      $daolivro = new daoLivro();
      $daolivro->excluirLivroDao($id);
   }
   function editarLivro($id,$titulo,$autor,$editora,$qtdEstoque)
   {
      $liv = new livro();
      
      $liv->setIdlivro($id);
      $liv->setTitulo($titulo);
      $liv->setAutor($autor);
      $liv->setEditora($editora);
      $liv->setQtdEstoque($qtdEstoque);
      
      $daolivro = new daolivro();
      return $daolivro->editarLivroDao($id,$titulo,$autor,$editora,$qtdEstoque);
   }

   function pesquisarLivroId($id){
      $daolivro = new daolivro();
      return $daolivro-> pesquisarLivroIdDao($id);      
   }
   function limpar(){
     return $liv = new livro();

   }
}

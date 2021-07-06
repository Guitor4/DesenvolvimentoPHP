<?php
include_once '../model/livro.php';
include_once '../bd/conectadb.php';
class daoLivro
{
    function inserirLivro(livro $livro)
    {
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $titulo = $livro->getTitulo();
            $autor = $livro->getAutor();
            $editora = $livro->getEditora();
            $qtdEstoque = $livro->getQtdEstoque();
            $sql = "insert into livro values (null,'$titulo','$autor','$editora','$qtdEstoque')";
            if (mysqli_query($conn->conectadb(), $sql)) {
                $msg = "<p style = 'color: green'>Dados cadastrados com sucesso!!</p>";
            } else {
                $msg = "<p style = 'color: red'>Falha ao cadastrar os dados</p>";
            }
        } else {
            $msg = "<p style = 'color: yellow'>Falha ao conectar com o banco de dados.</p>";
        }
    }
}

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
        return $msg;
    }
    function ListarLivros()
    {
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $sql = "select * from livro";
            $query =  mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $liv = new livro();
                    $liv->setIdlivro($result['idlivro']);
                    $liv->setTitulo($result['titulo']);
                    $liv->setAutor($result['autor']);
                    $liv->setEditora($result['editora']);
                    $liv->setQtdEstoque($result['qtdEstoque']);
                    $lista[$a] = $liv;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }

    function excluirLivroDao($id){
        $conn = new conectadb();
        $conecta = $conn->conectadb();
        if ($conecta){
            $sql = "delete from produto where id = '$id'";
            mysqli_query($conecta,$sql);
            header("Location: ..DesenvolvimentoPHP/livro/view/cadastroLivro.php");
            mysqli_close($conecta);

        }else{
            echo "<script>alert('Banco inoperante')</script>";

        
        }
    }

}

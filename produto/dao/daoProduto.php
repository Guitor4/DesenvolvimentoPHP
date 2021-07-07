<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/model/Produto.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/bd/conectadb.php';
class daoProduto
{
    function inserirProduto(Produto $teste)
    {
        $conn = new conectadb();
        if ($conn->conectadb()) {
            $nome = $teste->getNome();
            $vlrCompra = $teste->getVlrCompra();
            $vlrVenda = $teste->getVlrVenda();
            $qtdEstoque = $teste->getQtEstoque();
            
            $sql = "insert into produtos values (null,'$nome','$vlrCompra','$vlrVenda','$qtdEstoque')";
            if (mysqli_query($conn->conectadb(), $sql)) {
                $msg = "<p style = 'color: green'>Dados cadastrados com sucesso!!</p>";
            } else {
                printf(mysqli_query($conn->conectadb(), $sql));
                $msg = "<p style = 'color: red'>Falha ao cadastrar os dados</p>";
            }
        } else {
            $msg = "<p style = 'color: yellow'>Falha ao conectar com o banco de dados.</p>";
        }
        return $msg;
    }

    function ListarProdutoDAO()
    {
        $conn = new conectadb();
            if ($conn->conectadb()) {
                $sql = "select * from produtos";
                $query =  mysqli_query($conn->conectadb(), $sql);
                $lista = array();
                $a = 0;
                $lp = mysqli_fetch_array($query);
                do{
                    $prod = new Produto();
                    $prod->setId($lp['id']);
                    $prod->setNome($lp['nome']);
                    $prod->setVlrCompra($lp['vlrCompra']);
                    $prod->setVlrVenda($lp['vlrVenda']);
                    $prod->setQtEstoque($lp['qtdEstoque']);
                    $lista[$a] = $prod;
                    $a++;
                }while($lp = mysqli_fetch_array($query));
                mysqli_close($conn->conectadb());
                return $lista; 
            }
        }
    }


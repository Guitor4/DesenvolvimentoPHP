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
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $prod = new Produto();
                    $prod->setId($result['id']);
                    $prod->setNome($result['nome']);
                    $prod->setVlrCompra($result['vlrCompra']);
                    $prod->setVlrVenda($result['vlrVenda']);
                    $prod->setQtEstoque($result['qtdEstoque']);
                    $lista[$a] = $prod;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
}

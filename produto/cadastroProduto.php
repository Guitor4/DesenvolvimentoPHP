<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/controller/controllerProduto.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .botao {
            margin-top: 20px
        }
    </style>
</head>

<body>

    < <div class="col-12 container-fluid" style="margin-top: 20px">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header bg-primary text-white text-center">Cadastro de Clientes </div>
                <div class="card-body border border-3 border-dark">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6 offset-md-3"><label>Código</label><br><br><label>Nome do
                                    produto</label>
                                <input class="form-control" type="text" name="nomeProduto" placeholder="Nome do Produto">
                                <label>Valor da Compra</label>
                                <input type="text" class="form-control" name="vlrCompra" placeholder="Valor da Compra">
                                <label>Valor da Venda</label>
                                <input type="text" class="form-control" name="vlrVenda" placeholder="Valor da Venda">
                                <label>Quantidade em estoque</label>
                                <input type="text" class="form-control" name="qtEstoque" placeholder="qtEstoque">
                                <input class="col-3  offset-md-3 botao btn-success" type="submit" name="Enviar" id="Enviar" value="Enviar"></input>&nbsp;
                                <input class="col-3 botao btn-danger" type="submit" name="Limpar" id="Limpar" value="Cancelar">&nbsp; &nbsp;
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['Enviar'])) {
                        $nomeProduto = $_POST['nomeProduto'];
                        $vlrCompra = $_POST['vlrCompra'];
                        $vlrVenda = $_POST['vlrVenda'];
                        $qtEstoque = $_POST['qtEstoque'];

                        $produto = new ProdutoController();
                        echo $produto->inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtEstoque);
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        </div>

        <DIV class="row" style="margin-top: 30px">
            <table class="table table-striped table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                    
                    
                        <th>Nome</th>
                    
                    
                        <th>Venda</th>
                    
                    
                        <th>Compra</th>
                    
                    
                        <th>Estoque</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $pcTable = new ProdutoController();
                $listaProdutos = $pcTable->ListarProdutos();
                include_once 'bd/conectadb.php';
                $conn = new conectadb;
                if ($conn->conectadb()){
                    $sql = "select * from produto";
                    $query =  mysqli_query($conn->conectadb(), $sql);
                    $lista = mysqli_fetch_array($query);
                    $lp = mysqli_fetch_array($query);
                    mysqli_close($conn->conectadb());
                    if($lp){
                do{
                    print_r("<tr><td>".$lp['id']."</td");
                    print_r("<td>".$lp['nome']."</td> ");
                    print_r("<td>".$lp['vlrCompra']."</td> ");
                    print_r("<td>".$lp['vlrVenda']."</td> ");
                    print_r("<td>".$lp['qtEstoque']."</td></tr>");
                }while(mysqli_fetch_array($query));
            }
        }
                ?>
                </tbody>
            </table>
            <script src="../bootstrap/js/bootstrap.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
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
            margin-top: 20px;
            
        }
        th, td{
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="col-12 container-fluid" style="margin-top: 20px">
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
                            <div class="row" style="margin-top: 30px">
            <table class="table table-striped table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>


                        <th>Nome</th>


                        <th>Venda</th>


                        <th>Compra</th>


                        <th>Estoque</th>


                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new ProdutoController();
                    $listaProdutos = $pcTable->ListarProdutos();
                    foreach ($listaProdutos as $lp){
                        ?>
                        <tr>
                        <td><?php print_r($lp->getId()); ?></td>
                        <td><?php print_r($lp->getNome()); ?></td>
                        <td><?php print_r($lp->getVlrCompra()); ?></td>
                        <td><?php print_r($lp->getVlrVenda()); ?></td>
                        <td><?php print_r($lp->getQtEstoque()); ?></td>
                        <td><a class = "btn btn-success" href="#" style ="margin-right: 10px;">Editar</a>
                        <a class = "btn btn-danger" href="#">Excluir</a>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
                </div>
            </div>
        </div>

    </div>


    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
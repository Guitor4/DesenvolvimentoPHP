<?php
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/controller/controllerProduto.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/produto/model/Produto.php';
$pr = new Produto();
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

        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['cadastrarProduto'])) {
        $nomeProduto = trim($_POST['nomeProduto']);
        if ($nomeProduto != "") {
            $vlrCompra = $_POST['vlrCompra'];
            $vlrVenda = $_POST['vlrVenda'];
            $qtdEstoque = $_POST['qtdEstoque'];

            $pc = new ProdutoController();
            unset($_POST['cadastrarProduto']);
            echo $pc->inserirProduto($nomeProduto, $vlrCompra, $vlrVenda, $qtdEstoque);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
        }
    }
    if (isset($_POST['limpar'])) {
        $pr = null;
        unset($_GET['id']);
        header("Location: cadastroProduto.php");
    }
    if (isset($_GET['idproduto'])) {
        $id = $_GET['idproduto'];
        $pc = new ProdutoController();
        $pr = $pc->pesquisarProdutoId($id);
    }
    ?>


    <div class="container-fluid" style="margin-top: 20px">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header bg-primary text-white text-center">Cadastro de Clientes </div>
                <div class="card-body border border-3 border-dark">

                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6 offset-md-3"><strong>Código:<label style="color: blue;" <?php if ($pr != null) {
                                                                                                            ?>><?php echo $pr->getId(); ?></label><br><br>
                                    <input type="hidden" name="idproduto">
                                <?php
                                                                                                            }
                                ?>
                                <label>Nome do produto</label>
                                <input class="form-control" type="text" name="nomeProduto" placeholder="Nome do Produto">
                                <label>Valor da Compra</label>
                                <input type="text" class="form-control" name="vlrCompra" placeholder="Valor da Compra">
                                <label>Valor da Venda</label>
                                <input type="text" class="form-control" name="vlrVenda" placeholder="Valor da Venda">
                                <label>Quantidade em estoque</label>
                                <input type="text" class="form-control" name="qtdEstoque" placeholder="qtdEstoque">
                                <input class="col-3  offset-md-3 botao btn-success" type="submit" name="Enviar" id="Enviar" value="Enviar"></input>&nbsp;
                                <input class="col-3 botao btn-danger" type="submit" name="Limpar" id="Limpar" value="Cancelar">&nbsp; &nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row" style="margin-top: 30px">
            <table class="table table-striped table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Compra (R$)</th>
                        <th>Venda (R$)</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pcTable = new ProdutoController();
                    $listaProdutos = $pcTable->ListarProdutos();
                    $a = 0;
                    if ($listaProdutos != null) {
                        foreach ($listaProdutos as $lp) {
                            $a++;
                    ?>
                            <tr>
                                <td><?php print_r($lp->getId()); ?></td>
                                <td><?php print_r($lp->getNome()); ?></td>
                                <td><?php print_r($lp->getVlrCompra()); ?></td>
                                <td><?php print_r($lp->getVlrVenda()); ?></td>
                                <td><?php print_r($lp->getQtEstoque()); ?></td>
                                <td> <a class="btn btn-light" href="#?id=<?php echo $lp->getId(); ?>">
                                        <img src="img/edita.png" width="32"></a>
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                        <img src="img/delete.png" width="32"></button>

                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Contexto....<?php echo $lp->getId(); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Sim</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
</body>

</html>
<?php
include_once '../controller/livroController.php';
include_once '../model/livro.php';
$liv = new livro();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        .botao {
            margin-top: 20px
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['Enviar'])) {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $qtdEstoque = $_POST['qtdEstoque'];

        $livro = new livroController();
        echo $livro->InserirLivroController($titulo, $autor, $editora, $qtdEstoque);
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastrolivro.php'\">";
    }
    if (isset($_POST['limpar'])) {
        $pc2 = new livroController();
        $liv = $pc2->limpar();
        unset($_POST['limpar']);
        $_GET = null;
        header("Location:cadastrolivro.php");
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $livro = new livroController();
        $liv = $livro->pesquisarLivroId($id);
    }
    ?>
    <div class="container-fluid" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-4 " style="margin-top: 20px">
                <div class="card-header bg-primary text-white text-center border text-white"><strong>Cadastro de Livros</strong></div>
                <div class="card-body border border-3 border-dark">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-12 ">
                                <strong>Código: <label style="color:blue;">
                                        <?php
                                        if ($liv != null) {
                                            echo $liv->getIdlivro();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="idproduto" value="<?php echo $liv->getIdlivro(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Título</label>
                            <input class="form-control" type="text" name="titulo" placeholder="Nome do livro">
                            <label>Autor(a)</label>
                            <input type="text" class="form-control" name="autor" placeholder="Autor(a)">
                            <label>Editora</label>
                            <input type="text" class="form-control" name="editora" placeholder="Editora">
                            <label>Quantidade em estoque</label>
                            <input type="number" class="form-control" name="qtdEstoque" placeholder="qtdEstoque">
                            <input class="col-3  offset-md-3 botao btn-success" type="submit" name="Enviar" id="Enviar" value="Enviar"></input>&nbsp;
                            <input class="col-3 botao btn-danger" type="submit" name="Limpar" id="Limpar" value="Limpar">&nbsp; &nbsp;
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-8 ">
                <div class="row" style="margin-top: 20px">
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
                            $pcTable = new livroController();
                            $listaLivros = $pcTable->ListarLivros();
                            $a = 0;
                            if ($listaLivros != null) {
                                foreach ($listaLivros as $lv) {
                                    $a++;
                            ?>
                                    <tr>
                                        <td><?php print_r($lv->getIdlivro()); ?></td>
                                        <td><?php print_r($lv->getTitulo()); ?></td>
                                        <td><?php print_r($lv->getAutor()); ?></td>
                                        <td><?php print_r($lv->getEditora()); ?></td>
                                        <td><?php print_r($lv->getQtdEstoque()); ?></td>
                                        <td> <a class="btn btn-light" href="cadastroLivro.php?id=<?php echo $lv->getIdlivro(); ?>">
                                                <img src="../img/edita.png" width="32"></a>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                <img src="../img/delete.png" width="32"></button>

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
                                                    <label><strong>Deseja excluir o Livro: <?php echo $lv->getTitulo() ?></label>
                                                    <form method="post" action="../controller/ExcluirLivro.php">
                                                        <input type="hidden" name="ide" value="<?php echo $lv->getIdlivro(); ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Sim</button>
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                </div>
                                                </form>
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

        </div>

    </div>

    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js " integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT " crossorigin="anonymous "></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
</body>

</html>
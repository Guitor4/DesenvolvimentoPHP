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
                <div class="card-header bg-primary text-white text-center">Cadastro de Livros </div>
                <div class="card-body border border-3 border-dark">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6 offset-md-3"><label>Código</label><br><br>
                            <label>Título</label>
                                <input class="form-control" type="text" name="titulo" placeholder="Nome do livro">
                                <label>Autor(a)</label>
                                <input type="text" class="form-control" name="autor" placeholder="Autor(a)">
                                <label>Editora</label>
                                <input type="text" class="form-control" name="editora" placeholder="Editora">
                                <label>Quantidade em estoque</label>
                                <input type="text" class="form-control" name="qtdEstoque" placeholder="qtdEstoque">
                                <input class="col-3  offset-md-3 botao btn-success" type="submit" name="Enviar" id="Enviar" value="Enviar"></input>&nbsp;
                                <input class="col-3 botao btn-danger" type="submit" name="Limpar" id="Limpar" value="Cancelar">&nbsp; &nbsp;
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['Enviar'])) {
                        include_once '../controller/livroController.php';
                        $titulo = $_POST['titulo'];
                        $autor = $_POST['autor'];
                        $editora = $_POST['editora'];
                        $qtdEstoque = $_POST['qtdEstoque'];

                        $produto = new livroController();
                        echo $produto->InserirLivroController($titulo, $autor, $editora, $qtdEstoque);
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        </div>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
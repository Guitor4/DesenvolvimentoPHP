<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .botao {
            padding: 10px 20px 10px 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
    <title>Document</title>
</head>


<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php

if (isset($_POST['cadastrar'])){
    require_once 'php/controller/PessoaController.php';
    $nome = $_POST['nome'];
    $dtNasc = $_POST['dtNasc'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $perfil = $_POST['perfil'];
    $cpf = $_POST['cpf'];
    

    $pc = new PessoaControler();
    echo "<p>".$pc->InserirPessoa($nome,$dtNasc,$login,$senha,$perfil,$email,$cpf)."</p>";
}
?>
    <div class="col-12 container-fluid" style="margin-top: 20px">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header bg-light text-center">
                    Cadastro de Clientes
                </div>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Código</label><br><br>
                                <label>Nome completo</label>
                                <input class="form-control" type="text" name="nome" ;>
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control" name="dtNasc">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">

                            </div>
                            <div class="col-md-6 ">
                                <label>CPF</label>
                                <input type="cpf" class="form-control" name="cpf">
                                <label>Login</label>
                                <input type="text" class="form-control" name="login">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha">
                                <label>Confirme a senha</label>
                                <input type="password" class="form-control" name="senha2">
                                <label>Perfil</label>
                                <select name="perfil" class="form-control">
                                    <option>[------Select------]</option>
                                    <option>Cliente</option>
                                    <option>Funcionário</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-13">
                                <input class="col-1 offset-5 botao" type="submit" name="cadastrar" id="cadastrar">&nbsp;
                                <input class="col-1 botao mr-1" type="submit" name="butao" id="butao">&nbsp;&nbsp;
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
    <script src=" ../../bootstrap/js/bootstrap.js"></script>
    <script src=" ../../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
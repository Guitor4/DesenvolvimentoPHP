<?php
include_once 'controller/EnderecoController.php';
include_once './model/Endereco.php';
include_once './model/Mensagem.php';
$msg = new Mensagem();
$en = new Endereco();
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>
<!DOCTYPE html>
<html>


<head>

    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            margin-top: 20px;
        }

        .pad15 {
            padding-bottom: 15px;
            padding-top: 15px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">fricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    //envio dos dados para o BD
    if (isset($_POST['cadastrarEndereco'])) {
        $cep = trim($_POST['cep']);
        if ($cep != "") {
            $complemento = $_POST['complemento'];
            $logradouro = $_POST['rua'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $UF = $_POST['uf'];
            $complemento = $_POST['complemento'];

            $ec = new EnderecoController();
            unset($_POST['cadastrarEndereco']);
            $msg = $ec->inserirEndereco($cep,$logradouro, $bairro, $cidade, $UF, $complemento);
            echo $msg->getMsg();
               //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
               //URL='cadastroEndereco.php'\">";
        }
    }

    //m??todo para atualizar dados do Endereco no BD
    if (isset($_POST['atualizarEndereco'])) {
        $cep = trim($_POST['cep']);
        if ($cep != "") {
            $idEndereco = $_POST['idEndereco'];
            $complemento = $_POST['complemento'];
            $logradouro = $_POST['rua'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $UF = $_POST['uf'];
            $complemento = $_POST['complemento'];

            $ec = new EnderecoController();
            unset($_POST['atualizarEndereco']);
            $msg = $ec->atualizarEndereco($idEndereco, $cep, $logradouro, $bairro, $cidade, $UF, $complemento);
            echo $msg->getMsg();
        }
    }

    if (isset($_POST['excluir'])) {
        if ($en != null) {
            $id = $_POST['ide'];

            $ec = new EnderecoController();
            unset($_POST['excluir']);
            $msg = $ec->excluirEndereco($id);
            echo $msg->getMsg();
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroEndereco.php'\">";
        }
    }

    if (isset($_POST['excluirEndereco'])) {
        if ($en != null) {
            $id = $_POST['idEndereco'];
            unset($_POST['excluirEndereco']);
            $ec = new EnderecoController();
            $msg = $ec->excluirEndereco($id);
            echo $msg->getMsg();
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroEndereco.php'\">";
        }
    }

    if (isset($_POST['limpar'])) {
        $en = null;
        unset($_GET['id']);
        header("Location: cadastroEndereco.php");
    }
    if (isset($_GET['id'])) {
        $btEnviar = TRUE;
        $btAtualizar = TRUE;
        $btExcluir = TRUE;
        $id = $_GET['id'];
        $ec = new EnderecoController();
        $en = $ec->pesquisarEnderecoId($id);
    }
    ?>
    <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formul??rio_cep() {
            //Limpa valores do formul??rio de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");

    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);

        } //end if.
        else {
            //CEP n??o Encontrado.
            limpa_formul??rio_cep();
            alert("CEP n??o encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova vari??vel "cep" somente com d??gitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Express??o regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
 

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conte??do.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep ?? inv??lido.
                limpa_formul??rio_cep();
                alert("Formato de CEP inv??lido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formul??rio.
            limpa_formul??rio_cep();
        }
    };

    </script>
    <div class="container-fluid ">
        <div class="row  style=" margin-top: 30px;>
            <div class="col-md-6 offset-md-3">
                <div class=" card-header bg-dark text-center border text-white"><strong>Cadastro de Endereco</strong>
                </div>
                <div class="card-body border">
                    <div class="col-md-12">
                        <form method="post" action="">
                            <div class="row">
                                <div>
                                    <strong>C??digo: <label style="color:red;">
                                            <?php
                                            if ($en != null) {
                                                echo $en->getIdEndereco();
                                            ?>
                                        </label></strong>
                                    <input type="hidden" class="form-control" name="idEndereco" value="<?php echo $en->getIdEndereco(); ?>"><br>
                                <?php
                                            }
                                ?>
                                <label>Cep:
                                    <input name="cep" class="form-control" type="text" id="cep" value="<?php echo $en->getCep(); ?>" size="10" maxlength="9" onblur="pesquisacep(this.value);" /></label><br />
                                <label>Logradouro:
                                    <input name="rua" class="form-control" value="  " type="text" id="rua" size="60" /></label><br />
                                <label>Bairro:
                                    <input name="bairro" class="form-control" value="<?php echo $en->getBairro(); ?>" type="text" id="bairro" size="40" /></label><br />
                                <label>Cidade:
                                    <input name="cidade" class="form-control" value="<?php echo $en->getCidade(); ?>" type="text" id="cidade" size="40" /></label><br />
                                <label>Estado:
                                    <input name="uf" type="text" class="form-control" value="<?php echo $en->getUF(); ?>" id="uf" size="2" /></label><br />
                                <label>Complemento:
                                    <input name="complemento" type="text" class="form-control" value="<?php echo $en->getComplemento(); ?>" id="complemento" /></label><br />
                                <div class=" offset-md-4">
                                    <input type="submit" name="cadastrarEndereco" class="btn btn-success btInput px-md-4 margin-rigth:20px" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                                    <input type="submit" name="atualizarEndereco" class="btn btn-secondary btInput px-md-4" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                                    <button type="button" class="btn btn-warning btInput px-md-4" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                        Excluir
                                    </button>
                                    <input type="submit" class="btn btn-light btInput px-md-4" name="limpar" value="Limpar">
                                </div>
                                <!-- Modal para excluir -->
                                <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Confirmar Exclus??o</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Deseja Excluir?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="excluirEndereco" class="btn btn-success " value="Sim">
                                                <input type="submit" class="btn btn-light btInput" name="limpar" value="N??o">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fim do modal para excluir -->
                                &nbsp;&nbsp;

                                </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div >
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden;">
                        <thead class="table-dark">
                            <tr>
                                <th>C??digo</th>
                                <th>Cep</th>
                                <th>Logradouro</th>
                                <th>Bairro (R$)</th>
                                <th>Cidade</th>
                                <th>A????es</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pcTable = new EnderecoController();
                            $listaProdutos = $pcTable->listarEnderecos();
                            $a = 0;
                            if ($listaProdutos != null) {
                                foreach ($listaProdutos as $lp) {
                                    $a++;
                            ?>
                                    <tr>
                                        <td><?php print_r($lp->getIdEndereco()); ?></td>
                                        <td><?php print_r($lp->getCEP()); ?></td>
                                        <td><?php print_r($lp->getLogradouro()); ?></td>
                                        <td><?php print_r($lp->getBairro()); ?></td>
                                        <td><?php print_r($lp->getCidade()); ?></td>
                                        <td><a href="cadastroEndereco.php?id=<?php echo $lp->getIdEndereco(); ?>" class="btn btn-light">
                                                <img src="img/edita.png" width="32"></a>
                                            </form>
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
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o produto
                                                                <?php echo $lp->getCep(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" value="<?php echo $lp->getIdEndereco(); ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">N??o</button>
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
    </div>


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
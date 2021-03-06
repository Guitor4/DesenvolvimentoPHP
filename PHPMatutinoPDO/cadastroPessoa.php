<?php
include_once 'controller/PessoaController.php';
include_once './model/Pessoa.php';
include_once './model/Mensagem.php';
$msg = new Mensagem();
$ps = new Pessoa();
$endereco = new Endereco();
$ps->setEndereco($endereco);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
if (!isset($_SESSION)){
    session_start();
    if (!isset($_SESSION['perfilp']) || $_SESSION['perfilp'] == ""){
        $_SESSION['perfilp'] = "indefinido";
    }
}
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
    <script>
            function mascara(t, mask){
                var i = t.value.length;
                var saida = mask.substring(1,0);
                var texto = mask.substring(i)
                
                if (texto.substring(0,1) != saida){
                    t.value += texto.substring(0,1);
                }
            }
        </script>
</head>

<body>
            <?php
            include_once './model/nav.php';
            echo navbar();
            
            ?>
    
    <?php
    //envio dos dados para o BD
    if (isset($_POST['cadastrarPessoa'])) {
        $cep = trim($_POST['cep']);
        if ($cep != "") {
            $nome = $_POST['nome'];
            $dtNasc = $_POST['dtNasc'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $perfil = $_POST['perfil'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $complemento = $_POST['complemento'];
            $logradouro = $_POST['rua'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $UF = $_POST['uf'];
            echo " Logradouro : <br>".$logradouro."<br>";

            $ec = new PessoaController();
            unset($_POST['cadastrarPessoa']);
            $msg = $ec->inserirPessoa(
                $nome,
                $dtNasc,
                $login,
                $senha,
                $perfil,
                $email,
                $cpf,
                $cep,
                $logradouro,
                $bairro,
                $cidade,
                $UF,
                $complemento
            );
            
               echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
              URL='cadastroPessoa.php'\">";
        }
    }

    //m??todo para atualizar dados do Pessoa no BD
    if (isset($_POST['atualizarPessoa'])) {
        $cep = trim($_POST['cep']);
        if ($cep != "") {
            $nome = $_POST['nome'];
            $idpessoa = $_POST['idpessoa'];
            $nome = $_POST['nome'];
            $dtNasc = $_POST['dtNasc'];
            $login = $_POST['login'];
            $senhaSemCriptografia = $_POST['senha'];
            $senha = md5($senhaSemCriptografia);
            $perfil = $_POST['perfil'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $complemento = $_POST['complemento'];
            $logradouro = $_POST['rua'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $UF = $_POST['uf'];
            $complemento = $_POST['complemento'];
            

            $ec = new PessoaController();
            unset($_POST['atualizarPessoa']);
            $msg = $ec->atualizarPessoa(
                $idpessoa,
                $nome,
                $dtNasc,
                $login,
                $senha,
                $perfil,
                $email,
                $cpf,
                $cep,
                $logradouro,
                $bairro,
                $cidade,
                $UF,
                $complemento
            );
            echo $msg->getMsg();
            
        }
    }

    if (isset($_POST['excluir'])) {
        if ($ps != null) {
            $id = $_POST['ide'];

            $ec = new PessoaController();
            unset($_POST['excluir']);
            $msg = $ec->excluirPessoa($id);
            echo $msg->getMsg();
            $ps = new Pessoa();
            $endereco = new Endereco();
            $ps->setEndereco($endereco);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroPessoa.php'\">";
        }
    }

    if (isset($_POST['excluirPessoa'])) {
        if ($ps != null) {
            $id = $_POST['idpessoa'];
            unset($_POST['excluirPessoa']);
            $ec = new PessoaController();
            $msg = $ec->excluirPessoa($id);
            echo $msg->getMsg();
            $ps = new Pessoa();
            $endereco = new Endereco();
            $ps->setEndereco($endereco);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroPessoa.php'\">";
        }
    }

    if (isset($_POST['limpar'])) {
        $ps = null;
        unset($_GET['id']);
        header("Location: cadastroPessoa.php");
    }
    if (isset($_GET['id'])) {
        $btEnviar = TRUE;
        $btAtualizar = TRUE;
        $btExcluir = TRUE;
        $id = $_GET['id'];
        $ec = new PessoaController();
        $ps = $ec->pesquisarPessoaId($id);
    }
    ?>
    <!-- Adicionando Javascript -->
    <script>
        function limpa_formul??rio_cep() {
            //Limpa valores do formul??rio de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

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
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

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
                <div class=" card-header bg-dark text-center border text-white"><strong>Cadastro de Pessoa</strong>
                </div>
                <div class="card-body border">
                    <div class="col-md-12">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>C??digo: <label style="color:red;">
                                            <?php
                                            if ($ps != null) {
                                                echo $ps->getIdPessoa();
                                            ?>
                                        </label></strong>
                                    <input type="hidden" class="form-control" name="idpessoa" value="<?php echo $ps->getIdPessoa(); ?>"><br>
                                <?php
                                            }
                                ?>
                                <label>Nome Completo</label>
                                <input class="form-control" type="text" value="<?php echo $ps->getNome(); ?>" name="nome">
                                <label>Data de Nascimento</label>
                                <input class="form-control" type="date" value="<?php echo $ps->getDtNasc(); ?>" name="dtNasc">
                                <label>E-Mail</label>
                                <input class="form-control" type="email" value="<?php echo $ps->getEmail(); ?>" name="email">
                                <label>CPF</label>
                                <input class="form-control" type="text" value="<?php echo $ps->getCpf(); ?>" name="cpf">
                                <label>Cep:
                                    <input name="cep" class="form-control" type="text" id="cep" value="<?php echo $ps->getEndereco()->getCep(); ?>" size="10" maxlength="9" onblur="pesquisacep(this.value);" /></label><br />
                                <label>Login</label>
                                <input class="form-control" value="<?php echo $ps->getLogin(); ?>" type="text" name="login">
                                <label>Senha</label>
                                <input class="form-control" value="<?php echo $ps->getSenha(); ?>" type="password" name="senha">
                                </div>
                                <div class="col-md-6" style="margin-top:25px">

                                    <label>Logradouro:
                                        <input name="rua" class="form-control" value="<?php echo $ps->getEndereco()->getLogradouro(); ?>" type="text" id="rua" size="60" /></label><br />
                                    <label>Bairro:
                                        <input name="bairro" class="form-control" value="<?php echo $ps->getEndereco()->getBairro(); ?>" type="text" id="bairro" size="40" /></label><br />
                                    <label>Cidade:
                                        <input name="cidade" class="form-control" value="<?php echo $ps->getEndereco()->getCidade(); ?>" type="text" id="cidade" size="40" /></label><br />
                                    <label>Estado:
                                        <input name="uf" type="text" class="form-control" value="<?php echo $ps->getEndereco()->getUF(); ?>" id="uf" size="2" /></label><br />
                                    <label>Complemento:
                                        <input name="complemento" type="text" class="form-control" value="<?php echo $ps->getEndereco()->getComplemento(); ?>" id="complemento" /></label><br />
                                    <label>Perfil</label>
                                    <select name="perfil" class="form-control">
                                        <option>[--Selecione--]</option>
                                        <option <?php
                                                if ($ps->getPerfil() == "Cliente") {
                                                    echo "selected = 'selected'";
                                                }
                                                ?>>Cliente</option>
                                        <option <?php
                                                if ($ps->getPerfil() == "Funcion??rio") {
                                                    echo "selected = 'selected'";
                                                }
                                                ?> ?>Funcion??rio</option>
                                    </select>

                                </div>
                                <div class="offset-md-3">
                                    <input type="submit" name="cadastrarPessoa" class="btn btn-success btInput px-md-4 margin-rigth:20px" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                                    <input type="submit" name="atualizarPessoa" class="btn btn-secondary btInput px-md-4" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
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
                                                <input type="submit" name="excluirPessoa" class="btn btn-success " value="Sim">
                                                <input type="submit" class="btn btn-light btInput" name="limpar" value="N??o">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fim do modal para excluir -->
                                &nbsp;&nbsp;

                            </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <div class = "container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden;">
                    <thead class="table-dark">
                        <tr>
                            <th>C??digo</th>
                            <th>Nome</th>
                            <th>DtNasc</th>
                            <th>Login</th>
                            <th>Perfil</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>CEP</th>
                            <th>Estado</th>
                            <th>A????es</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pcTable = new PessoaController();
                        $listaPessoas = $pcTable->listarPessoa();
                        $a = 0;
                        if ($listaPessoas != null) {
                            foreach ($listaPessoas as $lp) {
                                $a++;
                        ?>
                                <tr>
                                    <td><?php print_r($lp->getIdpessoa()); ?></td>
                                    <td><?php print_r($lp->getNome()); ?></td>
                                    <td><?php print_r($lp->getDtNasc()); ?></td>
                                    <td><?php print_r($lp->getLogin()); ?></td>
                                    <td><?php print_r($lp->getPerfil()); ?></td>
                                    <td><?php print_r($lp->getEmail()); ?></td>
                                    <td><?php print_r($lp->getCPF()); ?></td>
                                    <td><?php print_r($lp->getEndereco()->getCep()); ?></td>
                                    <td><?php print_r($lp->getEndereco()->getUF()); ?></td>
                                    <td><a href="cadastroPessoa.php?id=<?php echo $lp->getIdPessoa(); ?>" class="btn btn-light">
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
                                                            <?php echo $lp->getEndereco()->getCep(); ?>?</strong></label>
                                                    <input type="hidden" name="ide" value="<?php echo $lp->getIdPessoa(); ?>">
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
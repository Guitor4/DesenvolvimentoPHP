<?php
session_start();
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/dao/DaoLogin.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';

$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

echo $login . "  " . $senha;
$daoLogin = new DaoLogin();
$resp = $daoLogin->validarLogin($login, $senha);
echo gettype($resp);

if (gettype($resp) == "object") {
    if ($resp != null) {
        if (!isset($_SESSION['login'])) {
            $_SESSION['loginp'] = $resp->getLogin();
            $_SESSION['senhap'] = $resp->getSenha();
            $_SESSION['idp'] = $resp->getIdpessoa();
            $_SESSION['nomep'] = $resp->getNome();
            $_SESSION['perfilp'] = $resp->getPerfil();

            header('../login.php');
            exit;
        }
    } else {
        echo "Usuário inexistente";
        header('../sessionDestroy.php');
        exit;
    }
} else {
    $_SESSION['msg']  = $resp;
    header("location: ../login.php");
    exit;

}

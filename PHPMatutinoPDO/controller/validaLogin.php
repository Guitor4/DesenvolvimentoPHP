<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/dao/DaoLogin.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';

if (!isset($_SESSION)) {
    session_start();
}
$login = $_REQUEST['login'];
$senhaSemCriptografia = $_REQUEST['senha'];
$senha = md5($senhaSemCriptografia);

$daoLogin = new DaoLogin();
$resp = $daoLogin->validarLogin($login, $senha);
echo gettype($resp);
echo "<br>".var_dump($resp);

if (gettype($resp) == "object") {
    if ($resp != null) {
        echo "não nulo";
        if (isset($_SESSION['login'])) {
            echo "Passou";
            $_SESSION['loginp'] = $resp->getLogin();
            $_SESSION['idp'] = $resp->getIdpessoa();
            $_SESSION['nomep'] = $resp->getNome();
            $_SESSION['perfilp'] = $resp->getPerfil();

            header('Location: ../cadastroPessoa.php');
            exit;
        }
    } else {
        echo "Usuário inexistente";
        $_SESSION['msg'] = $resp;
        header('Location: ../sessionDestroy.php');
        exit;
    }
} else {
    $_SESSION['msg']  = $resp;
    header("location: ../login.php");
    exit;
}

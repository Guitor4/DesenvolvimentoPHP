<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/dao/DaoLogin.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Mensagem.php';

if (!isset($_SESSION)) {
    session_start();
    $_SESSION['nr'] = rand(1,1000000);
}
$login = $_REQUEST['login'];
$senhaSemCriptografia = $_REQUEST['senha'];
$senha = md5($senhaSemCriptografia);

$daoLogin = new DaoLogin();
$resp = $daoLogin->validarLogin($login, $senha);
//echo gettype($resp);
//echo "<br>".var_dump($resp);

if (gettype($resp) == "object") {
    if ($resp != null) {
        echo "não nulo";
        if (!isset($_SESSION['login'])) {
            echo "Passou";
            $_SESSION['loginp'] = $resp->getLogin();
            $_SESSION['idp'] = $resp->getIdpessoa();
            $_SESSION['nomep'] = $resp->getNome();
            $_SESSION['perfilp'] = $resp->getPerfil();
            $_SESSION['conferenr'] = $_SESSION['nr'];

            header('Location: ../cadastroPessoa.php');
            exit;
        }
    } else {
        echo "Usuário inexistente";
        $_SESSION['msg'] = $resp;
        $_SESSION['conferenr'] = -1;
        header('Location: ../sessionDestroy.php');
        exit;
    }
} else {
    $_SESSION['msg']  = $resp;
    echo "<p style = 'color:red'>Erro ao fazer login. Tente novamente!!</p>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
    URL='../login.php'\">";
    exit;
}

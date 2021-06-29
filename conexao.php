<?php
$endereco = 'localhost';
$usuario = 'root';
$senha = 'senac';
$banco = 'BNMAcademia';

$link = mysqli_connect($endereco, $usuario,$senha,$banco)
or die('Erro:'.mysqli_error($link));

$sql = "'INSERT INTO cadastro VALUES'" ;
$sql .="(null,";
$sql .="'.$_POST['nome'].',";
$sql .="'.$_POST['sexo'].',";
$sql .="'.$_POST['cpf'].',";
$sql .="'.$_POST['tel'].',";
$sql .="'.$_POST['email'].',";
$sql .="'.$_POST['senha'].',";
$sql .="'.$_POST['endereco'].'," ;
$sql .= "'.$_POST['cidade'].',";
$sql .="'.$_POST['bairro'].',";
$sql .="'.$_POST['estado'].',";
$sql .="'.$_POST['1111-11-11'].')";

$consulta = mysqli_query($link, $sql);


?>
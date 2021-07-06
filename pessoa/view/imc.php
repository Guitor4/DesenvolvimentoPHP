<?php
echo ("IMC com dados pré-inseridos <br> ");
$peso = 120;
$altura = 1.74;
$imc = $peso / ($altura * $altura);
$msg=  "Seu imc é: ";
$msg.= number_format($imc,2);

$msg.= "<br>";
echo($msg);
if($imc < 18.5){
    echo("Você está abaixo do peso");
}else if($imc < 24.9){
    echo("Você está com o peso normal");
}else if($imc < 29.9){
    echo("Você está com sobrepeso");
}else if($imc < 34.9){
    echo("Você tem obesidade de grau 1");
}else if($imc < 39.9){
    echo("Você tem obesidade de grau 2");
}else{
    echo("Você tem obesidade mórbida");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleição</title>
</head>

<body>
    
        <label for="candidato">Escolha seu candidato</label>
        <?php
        $repete = 0;
        $vf = 0;
        $vb = 0;
        $vs = 0;
        $first = "";
        $second = "";
        $third = "";
        do{
        ?>
        <form action="" method="post">
        <select name="candidato" id="voto">
            <option value="1">Fulano</option>
            <option value="2">Sicrano</option>
            <option value="3">Beltrano</option>
        </select>
        <input type="submit" name="voto">Enviar</input>
    </form>
    <?php

        if(isset($_POST["voto"])){
            switch($_POST["candidato"]){
                case 1: 
                    echo("Você votou em fulano");
                    $vf++;
                    break;
                case 2: 
                    echo("Você votou em Sicrano");
                    $vs++;
                    break;
                case 3: 
                    echo("Você votou em Beltrano");
                    $vb++;
                    break;
            }
        }
    }while($repete > 4);
    for ($x = 0; $x < 3; $x++)



    ?>
</body>

</html>
<?php
use \PDO;
$livrocontroller = new livroController();

try{
    $connection = new PDO('mariadb:host=');
}catch(PDOException $e){
    die('Error:'.$e->getMessage());
}
?>
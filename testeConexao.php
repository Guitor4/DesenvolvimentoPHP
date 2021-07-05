<?php

include_once 'produto/bd/conectadb.php';

$conn = new conectadb();
if($conn->conectadb()){
    echo "Conectou";
}else{
    echo "Não conectou";
}


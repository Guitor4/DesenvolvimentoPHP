<?php

include_once 'php/model/conectadb.php';

$conn = new conectadb();
if($conn->conectadb()){
    echo "Conectou";
}else{
    echo "Não conectou";
}


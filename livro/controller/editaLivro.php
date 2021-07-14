<?php
include_once 'livroController.php';
include_once '../model/livro.php';
    $id = $lc->getid;
    $lc = new livroController();
    $lc->editarLivro($id);
    
exit;
<?php
include_once 'livroController';
    $id = $_REQUEST['id'];
    $pc = new livroController();
    $pc->editarLivro($id);
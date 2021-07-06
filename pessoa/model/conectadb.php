<?php
class conectadb
{
    private  $url = "localhost:3306";
    private  $user = "root";
    private  $password = "senac";
    private $base = "dbphp";
    public $db;

    public function _construct()
    {
        $db = $this->conectadb;
    }

    public function conectadb()
    {
        return mysqli_connect(
            $this->url,
            $this->user,
            $this->password,
            $this->base
        );
    }
}

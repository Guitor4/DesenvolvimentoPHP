<?php
class conectadb
{
    private  $url = "localhost:3306";
    private  $user = "root";
    private  $password = "";
    private $base = "dbphp";

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

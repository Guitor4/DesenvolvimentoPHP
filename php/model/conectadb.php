<?php
Class conectadb{
private static $url = "localhost:3306";
private static $user = "root";
private static $password = "senac";
private $banco = "dbphp";
public $db;

public function _construct(){
   $db = $this->conectadb;
}

public  function conectadb(){
    $db = mysqli_connect($this->getUrl(), $this->getUser(),$this->getPassword(),$this->getBanco()) or die('Erro:'.mysqli_errno($db));
    return $db;
}

/**
 * Get the value of url
 */ 
public function getUrl()
{
return $this->url;
}

/**
 * Set the value of url
 *
 * @return  self
 */ 
public function setUrl($url)
{
$this->url = $url;

return $this;
}

/**
 * Get the value of user
 */ 
public function getUser()
{
return $this->user;
}

/**
 * Set the value of user
 *
 * @return  self
 */ 
public function setUser($user)
{
$this->user = $user;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of db
 */ 


/**
 * Get the value of banco
 */ 
public function getBanco()
{
return $this->banco;
}

/**
 * Set the value of banco
 *
 * @return  self
 */ 
public function setBanco($banco)
{
$this->banco = $banco;

return $this;
}
}
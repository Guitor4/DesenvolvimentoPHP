<?php
Class Pessoa {

private $idPessoa;
private $nome;
private $nascimento;
private $login;
private $senha;
private $perfil;
private $email;
private $cpf;


/**
 * Get the value of idPessoa
 */ 
public function getIdPessoa()
{
return $this->idPessoa;
}

/**
 * Set the value of idPessoa
 *
 * @return  self
 */ 
public function setIdPessoa($idPessoa)
{
$this->idPessoa = $idPessoa;

return $this;
}

/**
 * Get the value of nome
 */ 
public function getNome()
{
return $this->nome;
}

/**
 * Set the value of nome
 *
 * @return  self
 */ 
public function setNome($nome)
{
$this->nome = $nome;

return $this;
}

/**
 * Get the value of nascimento
 */ 
public function getNascimento()
{
return $this->nascimento;
}

/**
 * Set the value of nascimento
 *
 * @return  self
 */ 
public function setNascimento($nascimento)
{
$this->nascimento = $nascimento;

return $this;
}

/**
 * Get the value of login
 */ 
public function getLogin()
{
return $this->login;
}

/**
 * Set the value of login
 *
 * @return  self
 */ 
public function setLogin($login)
{
$this->login = $login;

return $this;
}

/**
 * Get the value of senha
 */ 
public function getSenha()
{
return $this->senha;
}

/**
 * Set the value of senha
 *
 * @return  self
 */ 
public function setSenha($senha)
{
$this->senha = $senha;

return $this;
}

/**
 * Get the value of perfil
 */ 
public function getPerfil()
{
return $this->perfil;
}

/**
 * Set the value of perfil
 *
 * @return  self
 */ 
public function setPerfil($perfil)
{
$this->perfil = $perfil;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of cpf
 */ 
public function getCpf()
{
return $this->cpf;
}

/**
 * Set the value of cpf
 *
 * @return  self
 */ 
public function setCpf($cpf)
{
$this->cpf = $cpf;

return $this;
}
}
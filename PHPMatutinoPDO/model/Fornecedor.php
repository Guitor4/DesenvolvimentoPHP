<?php
class Fornecedor {
 private $idFornecedor;
 private $nomeFornecedor;
 private $representante;
 private $email;
 private $telFixo;
 private $telCel;
 private $endereco;

 


 /**
  * Get the value of idFornecedor
  */ 
 public function getIdFornecedor()
 {
  return $this->idFornecedor;
 }

 /**
  * Set the value of idFornecedor
  *
  * @return  self
  */ 
 public function setIdFornecedor($idFornecedor)
 {
  $this->idFornecedor = $idFornecedor;

  return $this;
 }

 /**
  * Get the value of nomeFornecedor
  */ 
 public function getNomeFornecedor()
 {
  return $this->nomeFornecedor;
 }

 /**
  * Set the value of nomeFornecedor
  *
  * @return  self
  */ 
 public function setNomeFornecedor($nomeFornecedor)
 {
  $this->nomeFornecedor = $nomeFornecedor;

  return $this;
 }

 /**
  * Get the value of representante
  */ 
 public function getRepresentante()
 {
  return $this->representante;
 }

 /**
  * Set the value of representante
  *
  * @return  self
  */ 
 public function setRepresentante($representante)
 {
  $this->representante = $representante;

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
  * Get the value of telFixo
  */ 
 public function getTelFixo()
 {
  return $this->telFixo;
 }

 /**
  * Set the value of telFixo
  *
  * @return  self
  */ 
 public function setTelFixo($telFixo)
 {
  $this->telFixo = $telFixo;

  return $this;
 }

 /**
  * Get the value of telCel
  */ 
 public function getTelCel()
 {
  return $this->telCel;
 }

 /**
  * Set the value of telCel
  *
  * @return  self
  */ 
 public function setTelCel($telCel)
 {
  $this->telCel = $telCel;

  return $this;
 }

 /**
  * Get the value of endereco
  */ 
 public function getEndereco()
 {
  return $this->endereco;
 }

 /**
  * Set the value of endereco
  *
  * @return  self
  */ 
 public function setEndereco($endereco)
 {
  $this->endereco = $endereco;

  return $this;
 }
}
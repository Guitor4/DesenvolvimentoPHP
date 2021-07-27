<?php
class Fornecedor {
 private $idFornecedor;
 private $nomeFornecedor;
 private $logradouroFornecedor;
 private $numero;
 private $complemento;
 private $bairro;
 private $cidade;
 private $UF;
 private $CEP;
 private $representante;
 private $email;
 private $telFixo;
 private $telCel;
 


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
  * Get the value of logradouroFornecedor
  */ 
 public function getLogradouroFornecedor()
 {
  return $this->logradouroFornecedor;
 }

 /**
  * Set the value of logradouroFornecedor
  *
  * @return  self
  */ 
 public function setLogradouroFornecedor($logradouroFornecedor)
 {
  $this->logradouroFornecedor = $logradouroFornecedor;

  return $this;
 }

 /**
  * Get the value of numero
  */ 
 public function getNumero()
 {
  return $this->numero;
 }

 /**
  * Set the value of numero
  *
  * @return  self
  */ 
 public function setNumero($numero)
 {
  $this->numero = $numero;

  return $this;
 }

 /**
  * Get the value of complemento
  */ 
 public function getComplemento()
 {
  return $this->complemento;
 }

 /**
  * Set the value of complemento
  *
  * @return  self
  */ 
 public function setComplemento($complemento)
 {
  $this->complemento = $complemento;

  return $this;
 }

 /**
  * Get the value of bairro
  */ 
 public function getBairro()
 {
  return $this->bairro;
 }

 /**
  * Set the value of bairro
  *
  * @return  self
  */ 
 public function setBairro($bairro)
 {
  $this->bairro = $bairro;

  return $this;
 }

 /**
  * Get the value of cidade
  */ 
 public function getCidade()
 {
  return $this->cidade;
 }

 /**
  * Set the value of cidade
  *
  * @return  self
  */ 
 public function setCidade($cidade)
 {
  $this->cidade = $cidade;

  return $this;
 }

 /**
  * Get the value of UF
  */ 
 public function getUF()
 {
  return $this->UF;
 }

 /**
  * Set the value of UF
  *
  * @return  self
  */ 
 public function setUF($UF)
 {
  $this->UF = $UF;

  return $this;
 }

 /**
  * Get the value of CEP
  */ 
 public function getCEP()
 {
  return $this->CEP;
 }

 /**
  * Set the value of CEP
  *
  * @return  self
  */ 
 public function setCEP($CEP)
 {
  $this->CEP = $CEP;

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
}
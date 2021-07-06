<?php
class Produto {
    private $id;
    private $nome;
    private $vlrCompra;
    private $vlrVenda;
    private $qtdEstoque;
    



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of vlrCompra
     */ 
    public function getVlrCompra()
    {
        return $this->vlrCompra;
    }

    /**
     * Set the value of vlrCompra
     *
     * @return  self
     */ 
    public function setVlrCompra($vlrCompra)
    {
        $this->vlrCompra = $vlrCompra;

        return $this;
    }

    /**
     * Get the value of vlrVenda
     */ 
    public function getVlrVenda()
    {
        return $this->vlrVenda;
    }

    /**
     * Set the value of vlrVenda
     *
     * @return  self
     */ 
    public function setVlrVenda($vlrVenda)
    {
        $this->vlrVenda = $vlrVenda;

        return $this;
    }

    /**
     * Get the value of qtdEstoque
     */ 
    public function getQtdEstoque()
    {
        return $this->qtdEstoque;
    }

    /**
     * Set the value of qtdEstoque
     *
     * @return  self
     */ 
    public function setQtdEstoque($qtdEstoque)
    {
        $this->qtdEstoque = $qtdEstoque;

        return $this;
    }
}
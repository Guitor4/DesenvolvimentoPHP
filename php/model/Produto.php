<?php

Class Produto{
    public $id;
    public $nome;
    public $vlrVenda;
    public $vlrCompra;
    public $qtEstoque;


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
     * Get the value of qtEstoque
     */ 
    public function getQtEstoque()
    {
        return $this->qtEstoque;
    }

    /**
     * Set the value of qtEstoque
     *
     * @return  self
     */ 
    public function setQtEstoque($qtEstoque)
    {
        $this->qtEstoque = $qtEstoque;

        return $this;
    }
}
?>
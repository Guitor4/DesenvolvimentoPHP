<?php

class livro
{
    private $idlivro;
    private $titulo;
    private $autor;
    private $editora;
    private $qtdEstoque;

    /**
     * Get the value of idlivro
     */ 
    public function getIdlivro()
    {
        return $this->idlivro;
    }

    /**
     * Set the value of idlivro
     *
     * @return  self
     */ 
    public function setIdlivro($idlivro)
    {
        $this->idlivro = $idlivro;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of editora
     */ 
    public function getEditora()
    {
        return $this->editora;
    }

    /**
     * Set the value of editora
     *
     * @return  self
     */ 
    public function setEditora($editora)
    {
        $this->editora = $editora;

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

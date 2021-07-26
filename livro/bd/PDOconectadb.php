<?php
use \PDO;
class conectadb
{
    /** 
     * Host de conexão com o banco de dados
     * @var string 
     */
    const HOST = 'localhost:3306';

    /**
     * Nome do banco de Dados
     * @var string
     */
    const NAME = 'dbphp';

    /**
     * Usuário do banco de Dados
     * @var string
     */
    const USER = 'root';
    
    /**
     * Senha do banco de Dados
     * @var string
     */
    const PASSWORD = 'senac';
    /**
     * Nome da tabela no banco de Dados
     * @var string
     */
    private $table;

        /**
     * Conexão com o banco de dados
     * @var PDO
     */
    private $conn;

    public function _construct($table = null){
        $this->$table=$table;
        $this->setConnection();
    }


    private function setConnection(){
        try{
            $this->conn= new PDO("mysql:host=".self::HOST.';dbname='.self::NAME,self::USER,self::PASSWORD);
        }catch(PDOException $e){
            die('Error:'.$e->getMessage());
        }
    }
}

<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/dao/DaoFornecedor.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Fornecedor.php';

class FornecedorController
{

    public function inserirFornecedor(
        $nomeFornecedor,
        $logradouro,
        $numero,
        $complemento,
        $bairro,
        $cidade,
        $UF,
        $CEP,
        $representante,
        $email,
        $telFixo,
        $telCel
    ) {
        $fornecedor = new Fornecedor();
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setLogradouroFornecedor($logradouro);
        $fornecedor->setnumero($numero);
        $fornecedor->setcomplemento($complemento);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUF($UF);
        $fornecedor->setCEP($CEP);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);

        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->inserir($fornecedor);
    }

    //método para atualizar dados de fornecedor no BD
    public function atualizarFornecedor(
        $idFornecedor,
        $nomeFornecedor,
        $logradouro,
        $numero,
        $complemento,
        $bairro,
        $cidade,
        $UF,
        $CEP,
        $representante,
        $email,
        $telFixo,
        $telCel
    ) {
        $fornecedor = new Fornecedor();
        $fornecedor->setIdFornecedor($idFornecedor);
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setLogradouroFornecedor($logradouro);
        $fornecedor->setnumero($numero);
        $fornecedor->setcomplemento($complemento);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUF($UF);
        $fornecedor->setCEP($CEP);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);

        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->atualizarFornecedorDAO($fornecedor);
    }

    //método para carregar a lista de fornecedors que vem da DAO
    public function listarFornecedor()
    {
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->listarFornecedorDAO();
    }

    //método para excluir fornecedor
    public function excluirFornecedor($id)
    {
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->excluirfornecedorDAO($id);
    }

    //método para retornar objeto fornecedor com os dados do BD
    public function pesquisarFornecedorId($id)
    {
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->pesquisarFornecedorIdDAO($id);
    }

    //método para editar fornecedor
    public function editarFornecedor($id)
    {
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->atualizarFornecedorDAO($id);
    }

    //método para limpar formulário
    public function limpar()
    {
        return $fr = new Fornecedor();
    }
}

<?php

include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/dao/DaoEndereco.php';
include_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Endereco.php';
class EnderecoController
{


    public function inserirEndereco($cep, $rua, $logradouro, $bairro, $cidade, $UF, $complemento)
    {
        $Endereco = new Endereco();
        $Endereco->setCep($cep);
        $Endereco->setRua($rua);
        $Endereco->setLogradouro($logradouro);
        $Endereco->setBairro($bairro);
        $Endereco->setCidade($cidade);
        $Endereco->setUF($UF);
        $Endereco->setComplemento($complemento);
        $daoEndereco = new DaoEndereco();

        return $daoEndereco->inserir($Endereco);
    }

    //método para atualizar dados de Endereco no BD
    public function atualizarEndereco($idEndereco, $cep, $rua, $logradouro, $bairro, $cidade, $UF, $complemento)
    {
        $Endereco = new Endereco();
        $Endereco->setIdEndereco($idEndereco);
        $Endereco->setCep($cep);
        $Endereco->setRua($rua);
        $Endereco->setLogradouro($logradouro);
        $Endereco->setBairro($bairro);
        $Endereco->setCidade($cidade);
        $Endereco->setUF($UF);
        $Endereco->setComplemento($complemento);

        $daoEndereco = new DaoEndereco();
        return $daoEndereco->atualizarEnderecoDAO($Endereco);
    }

    //método para carregar a lista de Enderecos que vem da DAO
    public function listarEnderecos()
    {
        $daoEndereco = new DaoEndereco();
        return $daoEndereco->listarEnderecoDAO();
    }

    //método para excluir Endereco
    public function excluirEndereco($id)
    {
        $daoEndereco = new DaoEndereco();
        return $daoEndereco->excluirEnderecoDAO($id);
    }

    //método para retornar objeto Endereco com os dados do BD
    public function pesquisarEnderecoId($id)
    {
        $daoEndereco = new DaoEndereco();
        return $daoEndereco->pesquisarEnderecoIdDAO($id);
    }

    //método para editar Endereco
    public function editarEndereco($id)
    {
        $daoEndereco = new DaoEndereco();
        return $daoEndereco->AtualizarEnderecoDAO($id);
    }

    //método para limpar formulário
    public function limpar()
    {
        return $pr = new Endereco();
    }
}

<?php
require_once "C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/dao/daoPessoa.php";
require_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Pessoa.php';
require_once 'C:/xampp/htdocs/DesenvolvimentoPHP/PHPMatutinoPDO/model/Endereco.php';
class PessoaController
{

    public function inserirPessoa(
        $nome,
        $dtNasc,
        $login,
        $senha,
        $perfil,
        $email,
        $cpf,
        $cep,
        $logradouro,
        $bairro,
        $cidade,
        $UF,
        $complemento
    ) {
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUF($UF);
        $endereco->setComplemento($complemento);

        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
        $pessoa->setEndereco($endereco);

        $daoPessoa = new daoPessoa();
        return $daoPessoa->inserir($pessoa);
    }

    //método para atualizar dados de Pessoa no BD
    public function atualizarPessoa(
        $idpessoa,
        $nome,
        $dtNasc,
        $login,
        $senha,
        $perfil,
        $email,
        $cpf,
        $cep,
        $logradouro,
        $bairro,
        $cidade,
        $UF,
        $complemento
    ) {
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUF($UF);
        $endereco->getComplemento($complemento);

        $pessoa = new Pessoa();
        $pessoa->setIdpessoa($idpessoa);
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
        $pessoa->setEndereco($endereco);

        $daoPessoa = new DaoPessoa();
        return $daoPessoa->atualizarPessoaDAO($pessoa);
    }

    //método para carregar a lista de Pessoas que vem da DAO
    public function listarPessoa()
    {
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->listarPessoaDAO();
    }

    //método para excluir Pessoa
    public function excluirPessoa($id)
    {
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->excluirPessoaDAO($id);
    }

    //método para retornar objeto Pessoa com os dados do BD
    public function pesquisarPessoaId($id)
    {
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->pesquisarPessoaIdDAO($id);
    }

    //método para editar Pessoa
    public function editarPessoa($id)
    {
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->atualizarPessoaDAO($id);
    }

    //método para limpar formulário
    public function limpar()
    {
        return $fr = new Pessoa();
    }
}

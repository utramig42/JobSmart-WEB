<?php

class UsuarioModel
{
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getDataRecisao()
    {
        return $this->dataRecisao;
    }

    public function getDataAdmissao()
    {
        return $this->dataAdmissao;
    }

    public function isTemporario()
    {
        return $this->temporario;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setDataRecisao($dataRecisao)
    {
        $this->dataRecisao = $dataRecisao;
    }

    public function setDataAdmissao($dataAdmissao)
    {
        $this->dataAdmissao = $dataAdmissao;
    }

    public function setTemporario($temporario)
    {
        $this->temporario = $temporario;
    }

    public function loadById($id)
    {
        $Sql = new Connection();
        $result = $Sql->select("SELECT * FROM funcionario WHERE mat_fun = :id", array(":id" => $id));

        return $result;
    }
}
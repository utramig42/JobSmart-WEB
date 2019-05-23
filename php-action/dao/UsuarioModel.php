<?php

class UsuarioModel
{
    private $matricula;
    private $cargo; // ID;
    private $nome;
    private $endereco;
    private $uf;
    private $cidade;
    private $salario;
    private $cpf;
    private $tel;
    private $dataNascimento;
    private $dataRecisao;
    private $dataAdmissao;
    private $temporario; // Bool

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula(int $value)
    {
        $this->matricula = $value;
    }

    // Caso o Atributo for booleano.
    public function getTemporario()
    {
        return $this->temporario;
    }

    public function isTemporario(bool $value)
    {
        $this->temporario = $value;
    }
}
<?php

class FornecedorModel{
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getContato() {
        return $this->contato;
    }

    public function getTelFixo() {
        return $this->telFixo;
    }

    public function getTelCel() {
        return $this->telCel;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }

    public function setTelFixo($telFixo) {
        $this->telFixo = $telFixo;
    }

    public function setTelCel($telCel) {
        $this->telCel = $telCel;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

}


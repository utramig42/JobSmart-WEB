<?php
if (file_exists('../dao/Connection.php')) require_once '../dao/Connection.php';
if (file_exists('../dao/UsuarioModel.php')) require_once '../dao/UsuarioModel.php';

new UsuarioControllerUpdate();

class UsuarioControllerUpdate
{
    public function __construct()
    {
        // Deve seguir estritamente esta ordem na chamada.

        // Define os dados genéricos.
        $this->setGeneralData();

        // Define o objeto e seus atributos.
        $this->setObject();

        // Manda os dados para serem atualizados no BD.
        $this->user->update($this->user);
    }

    /**
     * Define o objeto do model e o chama.
     * @access public
     */
    public function setObject()
    {
        $this->user = new UsuarioModel();
        $this->user->setMatricula($this->matricula);
        $this->user->setCargo($this->cargo);
        $this->user->setSalario($this->setSalario());
        $this->user->setTel($this->telefone);
        $this->user->setUf($this->uf);
        $this->user->setCidade($this->cidade);
        $this->user->setEndereco($this->endereco);
    }

    /**
     * Define os dados mais genéricos sem a necessidade uma regra especifica.
     * @access private
     */
    private function setGeneralData()
    {
        $this->matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
        $this->cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $this->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
        $this->uf = isset($_POST['uf']) ? $_POST['uf'] : '';
        $this->cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $this->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    }

    /**
     * Define o Salario e as regras do mesmo.
     * @access private
     * @return String o Salário formatado
     */
    private function setSalario()
    {
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
        $salario = preg_replace("/\./", '', $salario);
        $salario = preg_replace("/\,/", '.', $salario);
        $salario = floatval($salario);
        return $salario;
    }
}

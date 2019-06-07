<?php

if (file_exists('../../includes/config.php')) require_once '../../includes/config.php';


class UsuarioModel
{

    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

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

    public function insert($user)
    {
        $cargo = $user->getCargo();
        $nome = $user->getNome();
        $end = $user->getEndereco();
        $uf = $user->getUf();
        $cidade = $user->getCidade();
        $sal = $user->getSalario();
        $cpf = $user->getCpf();
        $tel = $user->getTel();
        $dtNasc = $user->getDataNascimento();
        $temp = $user->isTemporario();
        $dataRecisao = $user->getDataRecisao();

        $rawQuery = "INSERT INTO funcionario(id_cargo,nm_fun,end_fun,uf_fun,cid_fun,sal_fun,cpf_fun,tel_fun,dt_nasc_fun,temp_ativo_fun,dt_rec_fun) 
        VALUES($cargo,'$nome', '$end', '$uf','$cidade',$sal,'$cpf','$tel','$dtNasc',$temp,'$dataRecisao');";

        $res = $this->Sql->insert($rawQuery);
        if ($res > 0) {
            $_SESSION['mensagem'] =
                '<div class="alert alert-success" role="alert">
                Cadastrado com sucesso!
            </div>';
        } else {
            $_SESSION['mensagem'] =
                '<div class="alert alert-danger" role="alert">
                Ocorreu um erro ao cadastrar!
            </div>';
        }
        header('location: ../../usuarios.php');
    }

    public function remove($user)
    {
        $mat = $user->getMatricula();
        $data = $user->getDataRecisao();

        $rawQuery = "UPDATE funcionario SET
		dt_rec_fun = '$data'
        WHERE mat_fun = $mat";



        $res = $this->Sql->update($rawQuery);

        if ($res > 0) {

            $_SESSION['mensagem'] =

                '<div class="alert alert-success" role="alert">
                    Atualizado com sucesso!
                </div>';
        } else {
            $_SESSION['mensagem'] =
                '<div class="alert alert-danger" role="alert">
                Ocorreu um erro ao atualizar!
            </div>';
        }

        header('location: ../../usuarios.php');
    }

    public function update($user)
    {

        $mat = $user->getMatricula();
        $cargo = $user->getCargo();
        $sal = $user->getSalario();
        $tel = $user->getTel();
        $uf = $user->getUf();
        $cid = $user->getCidade();
        $end = $user->getEndereco();

        $rawQuery = "UPDATE funcionario SET
        uf_fun = '$uf',
        cid_fun = '$cid',
        end_fun = '$end',
        tel_fun = '$tel',
        id_cargo = $cargo,
        sal_fun = $sal
        WHERE mat_fun = $mat;";


        $res = $this->Sql->update($rawQuery);

        if ($res > 0) {
            $_SESSION['mensagem'] =

                '<div class="alert alert-success" role="alert">
                    Atualizado com sucesso!
                </div>';
        } else {
            $_SESSION['mensagem'] =
                '<div class="alert alert-danger" role="alert">
                Ocorreu um erro ao atualizar!
            </div>';
        }

        header('location: ../../usuarios.php');
    }

    public function getUsersPagination()
    { }

    public function getAllUsers($pagesSql = 0, $maxItens = 10): array
    {
        $command = "SELECT 
        f.mat_fun AS 'matricula',
        c.nm_cargo AS 'cargo',
        f.nm_fun AS 'nome',
        f.end_fun AS 'endereco',
        f.uf_fun AS 'uf',
        f.cid_fun AS 'cidade',
        f.sal_fun AS 'salario',
        f.cpf_fun AS 'cpf',
        f.tel_fun AS 'telefone',
        f.dt_nasc_fun AS 'data nascismento',
        f.dt_admin AS 'data admissão',
        if(f.temp_ativo_fun,'Sim','Não') AS 'temporario',
        f.dt_rec_fun AS 'data recisão'
    FROM
        funcionario f
            INNER JOIN
        cargo c ON c.id_cargo = f.id_cargo
        WHERE f.dt_rec_fun  > '" . date('Y-m-d') . "'  OR f.dt_rec_fun IS NULL OR f.dt_rec_fun  = '0000-00-00'
        ORDER BY f.mat_fun
        LIMIT  $pagesSql,$maxItens";


        return $this->Sql->select($command);
    }

    public function listUsersTables($pagesSql, $maxItens)
    {
        $rows = $this->getAllUsers($pagesSql, $maxItens);
        foreach ($rows as  $row) {
            echo '<tr>';
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['cargo'] . "</td>";
            echo "<td>" . $row['salario'] . "</td>";
            echo "
            <td>                               
            <!-- Button Trigger Modal -->
            <button type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\"
                data-target=\"#user" . $row['matricula'] . "Modal\" title=\"Mais Informações\">
            <i class=\"fas fa-info text-white icon\"></i>
            </button>

            <!-- Button Edit Information -->
            <a role=\"button\" class=\"btn btn-warning ml-1\" title=\"Atualizar Informações\"
                href=\"atualizarUsuarios.php?matricula=" . $row['matricula'] . "\">
                <i class=\"fas fa-edit text-white icon\"></i>
            </a>

            <!-- Button Remove Information -->
            <button type=\"button\" class=\"btn btn-danger ml-1\" title=\"Remover Informações\"
            data-toggle=\"modal\" data-target=\"#remove" . $row['matricula'] . "\">
                <i class=\"fas fa-trash text-white icon\"></i>
            </button>
            </td>      
            ";

            echo '</tr>';
        }
    }

    public function loadById($id)
    {
        $this->Sql = new Connection();
        $result = $this->Sql->select(
            "SELECT *
            FROM funcionario 
            WHERE mat_fun = :id",
            array(":id" => $id)
        );

        return $result;
    }

    public function listCargos($id = null)
    {
        $update = isset($id) ? "ORDER BY id_cargo = $id desc" : '';
        $rawQuery = "SELECT * FROM cargo WHERE ativo_cargo = 1" . $update;

        return $this->Sql->select($rawQuery);
    }


    public function listUsersModals()
    {
        $rows = $this->getAllUsers();

        foreach ($rows as $row) {
            echo "

            <!-- Botão para acionar modal -->

            <!-- Modal -->
            <div class=\"modal fade\" id=\"remove" . $row['matricula'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"TituloModalCentralizado\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"TituloModalCentralizado\">Remover Usuario</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Fechar\">
                    <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                <form id=\"user\" method=\"POST\" action=\"core/dll/UsuarioControllerRemove.php\">

                <div class=\"form-group\">
                <div class=\"form-label-group\">
                    <input type=\"text\"  id=\"mat\" name=\"mat\" class=\"form-control\"
                        placeholder=\"Matricula\" autofocus=\"autofocus\" readonly value=\"" . $row['matricula'] . " \">
                    <label for=\"mat\">Matricula</label>
                </div>
            </div>

                    <div class=\"form-group\">
                        <div class=\"form-label-group\">
                        <input type=\"date\" id=\"data\" name=\"data\" class=\"form-control\"
                            placeholder=\"Data de Recisão\" autofocus=\"autofocus\">
                        <label for=\"data\">Data de Recisão</label>
                        </div>
                    </div>

         
           
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fechar</button>
                    <button type=\"submit\" class=\"btn btn-primary\">Salvar mudanças</button>
                </div>
                </div>
                </form>
            </div>
            </div>
                        
            <!-- Modal -->
            <div class=\"modal fade\" id=\"remove\"" . $row['matricula'] . " tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"TituloModalCentralizado\" aria-hidden=\"true\">
              <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                <div class=\"modal-content\">
                  <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"TituloModalCentralizado\">Título do modal</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Fechar\">
                      <span aria-hidden=\"true\">&times;</span>
                    </button>
                  </div>
                  <div class=\"modal-body\">
                        Deseja Realmente excluir este usuario ? 
                </div>
                  <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fechar</button>
                    <button type=\"button\" class=\"btn btn-primary\">Salvar mudanças</button>
                  </div>
                </div>
              </div>
            </div>

        <!-- Modal -->
        <div class=\"modal  fade\" id=\"user" . $row['matricula'] . "Modal\" tabindex=\"-1\" role=\"dialog\"
        aria-labelledby=\"informationModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
        <div class=\"modal-header\">
        <h4 class=\"modal-title\" id=\"informationModalLabel\">Informações do funcionário</h4>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
        </button>
        </div>
        <div class=\"modal-body\">";

            foreach ($row as $att => $attribute) {
                echo "<div class=\"modal-item\">
                    <h5>" . (ucfirst($att)) . "</h5>
                    <p class=\"text-muted\">" . $attribute . "</p>
                </div>";
            }


            echo "
        </div>
        <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fechar</button>
        </div>
        </div>
        </div>
        </div>";
        }
    }
}
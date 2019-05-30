<?php
class UsuarioController
{

    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
        // $this->listUsers();
    }

    public function getAllUsers(): array
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
        cargo c ON c.id_cargo = f.id_cargo;";

        return $this->Sql->select($command);
    }

    public function listUsersTables()
    {
        $rows = $this->getAllUsers();
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
                href=\"atualizarUsuarios.php?matricula\">
                <i class=\"fas fa-trash text-white icon\"></i>
            </button>
            </td>      
            ";

            echo '</tr>';
        }
    }

    public function listUsersModals()
    {
        $rows = $this->getAllUsers();

        foreach ($rows as $row) {
            echo "
        <!-- Modal -->
        <div class=\"modal fade\" id=\"user" . $row['matricula'] . "Modal\" tabindex=\"-1\" role=\"dialog\"
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
                    <p class=\"text-muted\">" . utf8_encode($attribute) . "</p>
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

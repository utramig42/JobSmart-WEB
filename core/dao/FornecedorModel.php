<?php

class FornecedorModel
{
    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function getTelFixo()
    {
        return $this->telFixo;
    }

    public function getTelCel()
    {
        return $this->telCel;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;
    }

    public function setTelFixo($telFixo)
    {
        $this->telFixo = $telFixo;
    }

    public function setTelCel($telCel)
    {
        $this->telCel = $telCel;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function insert(FornecedorModel $provider)
    {
        $razaoSocial = $provider->getRazaoSocial();
        $cnpj = $provider->getRazaoSocial();
        $nome = $provider->getNome();
        $uf = $provider->getUf();
        $cidade = $provider->getCidade();
        $end = $provider->getEndereco();
        $contato = $provider->getContato();
        $telFixo = $provider->getTelFixo();
        $telCel = $provider->getTelCel();

        $rawQuery = "INSERT INTO fornecedor(nm_for,cnpj_for,raz_soc_for,uf_for,cid_for,end_for,nm_cont_for,tel_fix_for,tel_cel_for,ativo_for)
        VALUES(
            '$nome',
            '$cnpj',
            '$razaoSocial',
            '$uf',
            '$cidade',
            '$end',
            '$contato',
            '$telFixo',
            '$telCel',
            '1'
        )";

        $res = $this->Sql->insert($rawQuery);

        if ($res > 0) {

            echo $_SESSION['mensagem'] =
                '<div class="alert alert-success" role="alert">
                Cadastrado com sucesso!
            </div>';
        } else {
            $_SESSION['mensagem'] =
                '<div class="alert alert-danger" role="alert">
                Ocorreu um erro ao cadastrar!
            </div>';
        }

        header('location:../../fornecedores.php');
    }

    public function remove($provider)
    {
        $id = $provider->getId();


        $rawQuery = "UPDATE fornecedor 
        SET 
            ativo_for = 0
            WHERE id_for = $id
        ;";

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

        header('location: ../../fornecedores.php');
    }

    public function update($provider)
    {
        $id = $provider->getId();
        $nome = $provider->getNome();
        $uf = $provider->getUf();
        $cid = $provider->getCidade();
        $end = $provider->getEndereco();
        $contato = $provider->getContato();
        $telFixo = $provider->getTelFixo();
        $telCel = $provider->getTelCel();

        $rawQuery = "UPDATE fornecedor 
        SET 
            nm_for = '$nome',
            uf_for = '$uf',
            cid_for = '$cid',
            end_for = '$end',
            nm_cont_for = '$contato',
            tel_fix_for = '$telFixo',
            tel_cel_for = '$telCel'
            WHERE id_for = $id;
        ;";


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

        header('location: ../../fornecedores.php');
    }

    public function getAllProviders($pagesSql = 0, $maxItens = 10): array
    {
        $command = "SELECT 
        id_for as 'ID',
        nm_for as 'nome fantasia',
        cnpj_for as 'CNPJ',
        raz_soc_for as 'razão social',
        uf_for as 'estado',
        cid_for as 'cidade',
        end_for as 'endereço',
        nm_cont_for as 'contato',
        tel_fix_for as 'telefone fixo',
        tel_cel_for as 'telefone celular',
        dt_cad_for as 'data de cadastro'
    FROM
        fornecedor
    WHERE 
        ativo_for = 1
    ORDER BY 
        id_for
    LIMIT 
        $pagesSql,$maxItens";
        return $this->Sql->select($command);
    }

    public function listProvidersTables($pagesSql, $maxItens)
    {
        $rows = $this->getAllProviders($pagesSql, $maxItens);
        foreach ($rows as  $row) {
            echo '<tr>';
            echo "<td>" . $row['CNPJ'] . "</td>";
            echo "<td>" . $row['nome fantasia'] . "</td>";
            echo "<td>" . $row['contato'] . "</td>";
            echo "<td>" . $row['telefone fixo'] . "</td>";
            echo "<td>" . $row['cidade'] . "/" . $row['estado'] . "</td>";
            echo "
            <td>                               
            <!-- Button Trigger Modal -->
            <button type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\"
                data-target=\"#provider" . $row['ID'] . "\" title=\"Mais Informações\">
            <i class=\"fas fa-info text-white icon\"></i>
            </button>

            <!-- Button Edit Information -->
            <a role=\"button\" class=\"btn btn-warning ml-1\" title=\"Atualizar Informações\"
                href=\"atualizarFornecedores.php?id=" . $row['ID'] . "\">
                <i class=\"fas fa-edit text-white icon\"></i>
            </a>

            <!-- Button Remove Information -->
            <button type=\"button\" class=\"btn btn-danger ml-1\" title=\"Remover Informações\"
            data-toggle=\"modal\" data-target=\"#remove" . $row['ID'] . "\">
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
            FROM fornecedor 
            WHERE id_for = :id",
            array(":id" => $id)
        );

        return $result;
    }

    public function listProvidersModals($pagesSql, $maxItens)
    {
        $rows = $this->getAllProviders($pagesSql, $maxItens);

        foreach ($rows as $row) {

            $this->removeModal($row);
            $this->infoModal($row);
        }
    }

    private function removeModal($row)
    {
        echo "

        <!-- Botão para acionar modal -->

        <!-- Modal -->
        <div class=\"modal fade\" id=\"remove" . $row['ID'] . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"TituloModalCentralizado\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"TituloModalCentralizado\">Remover fornecedor</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Fechar\">
                <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
            <form id=\"provider\" method=\"POST\" action=\"core/dll/FornecedorControllerRemove.php\">

            <div class=\"form-group\">
            <div class=\"form-label-group\">
                <input type=\"hidden\"  id=\"id\" name=\"id\" class=\"form-control\"
                    placeholder=\"id\" autofocus=\"autofocus\" readonly value=\"" . $row['ID'] . " \">
            </div>
        </div> Deseja realmente excluir " . $row['nome fantasia'] . " ?

               
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fechar</button>
                <button type=\"submit\" class=\"btn btn-danger\">Salvar mudanças</button>
            </div>
            </div>
            </form>
        </div>
        </div>
    ";
    }

    private function infoModal($row)
    {

        echo '
        <!-- Modal -->
        <div class="modal fade" id="provider' . $row['ID'] .
            '"tabindex="-1" role="dialog" aria-labelledby="informationModalLabel"' . $row['ID'] . 'aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="informationModalLabel"' . $row['ID'] . ' >Informações do fornecedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <div class="modal-body">';

        foreach ($row as $att => $attribute) {
            echo "<div class=\"modal-item\">
                                <h5>" . (ucfirst($att)) . "</h5>
                                <p class=\"text-muted\">" . $attribute . "</p>
                            </div>";
        }

        echo '</div>
   
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                   </div>
               </div>
           </div>
       </div>';
    }
}

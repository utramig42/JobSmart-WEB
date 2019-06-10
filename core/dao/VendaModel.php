<?php

class VendaModel
{
    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

    private function getAllOrders($pagesSql, $maxItens)
    {
        $rawQuery = "SELECT 
        v.id_venda as 'ID',
        f.nm_fun as 'funcionario', 
        v.vlr_venda as 'valor',
        v.dt_venda as 'data'
        FROM
            venda v
        INNER JOIN
            funcionario f ON f.mat_fun = v.mat_fun
        ORDER BY v.dt_venda desc, v.id_venda desc
            LIMIT  $pagesSql,$maxItens";

        return $this->Sql->select($rawQuery);
    }

    public function listOrdersTables($pagesSql, $maxItens)
    {
        $result = $this->getAllOrders($pagesSql, $maxItens);

        foreach ($result as  $res) {
            echo '<tr>';
            foreach ($res as $value) {
                echo "<td>$value</td>";
            }

            echo '<td>
            <!-- Button Trigger Modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#information' . $res['ID'] . '">
                <i class="fas fa-info text-white icon"></i>
            </button>
            </td>';

            echo '</tr>';
        }
    }

    public function listOrdersModels($pagesSql, $maxItens)
    {
        $dataInitial = $this->getAllOrders($pagesSql, $maxItens);

        foreach ($dataInitial as $value) {
            $rawQuery = "SELECT 
            p.nm_prod as 'nome do produto', 
            it.quant_itens_venda as 'quantidade'
            FROM
                itens_venda it
            INNER JOIN
                venda v ON v.id_venda = it.id_venda
            INNER JOIN
                estoque e ON e.id_est = it.id_est
            INNER JOIN
                produto p ON p.id_prod = e.id_prod
            WHERE
                v.id_venda = " . $value['ID'];


            $query = "SELECT 
            f.desc_forma as 'Forma de Pagamento', p.vlr_pag as 'Valor'
            from
                pagamento p
                    INNER JOIN
                forma_pagamento f ON f.id_forma = p.id_forma
            WHERE id_venda =" . $value['ID'];

            $dataSecond = $this->Sql->select($rawQuery);
            $dataTree = $this->Sql->select($query);
            echo '
            <!-- Modal -->
            <div class="modal fade" id="information' . $value['ID'] . '" tabindex="-1" role="dialog" aria-labelledby="informationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="informationModalLabel">Informações da venda</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">';

            foreach ($value as $key =>  $data) {
                echo "
                <div class=\"modal-item\">
                    <h5>" . (ucfirst($key)) . "</h5>
                    <p class=\"text-muted\">" . $data . "</p>
                </div>
                ";
            }

            echo '<div class="modal-item">';
            echo "<h5> Itens de venda </h5>";
            echo "<ul>";
            foreach ($dataSecond as $second) {

                foreach ($second as $chave => $att) {
                    echo "<li class=\"text-muted\"><b>" . ucfirst($chave) . ":</b> $att </li>";
                }
                echo '<hr />';
            }

            echo "</ul>";
            echo '</div>';


            echo "<h5> Pagamento </h5>";
            echo "<ul>";
            foreach ($dataTree as  $tree) {
                foreach ($tree as $segredo => $tesouro) {
                    echo "<li class=\"text-muted\"><b>" . ucfirst($segredo) . ":</b>  $tesouro </li>";
                }
                echo '<hr/>';
            }
            echo "</ul>";



            echo '
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
            </div>
            </div>';
        }
    }
}

<?php

class DashboardModel
{
    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

    public function userOfDay()
    {
        $rawQuery = "SELECT 
        f.nm_fun as 'nome'
        FROM
            venda v
                INNER JOIN
            funcionario f ON f.mat_fun = v.mat_fun
		WHERE date(v.dt_venda) = date(now())
        GROUP BY v.mat_fun, v.dt_venda
        ORDER BY count(v.mat_fun) DESC, v.dt_venda DESC
        LIMIT 1;";

        return isset($this->Sql->select($rawQuery)[0]['nome']) ? $this->Sql->select($rawQuery)[0]['nome'] : 'Vendas não iniciadas';
    }

    public function productOfDay()
    {
        $rawQuery = "SELECT sum(quant_itens_venda),
            p.nm_prod as 'produto'
        FROM
            itens_venda it
        INNER JOIN
            estoque e ON it.id_est = e.id_est
        INNER JOIN
            produto p ON p.id_prod = e.id_prod
        INNER JOIN  
            venda v ON v.id_venda = it.id_venda
		WHERE date(v.dt_venda) = date(now())
        GROUP BY it.id_est
        ORDER BY sum(quant_itens_venda) desc, v.dt_venda desc;";

        return isset($this->Sql->select($rawQuery)[0]['produto']) ? $this->Sql->select($rawQuery)[0]['produto'] : 'Vendas não iniciadas';
    }

    public function billingOfDay()
    {
        $rawQuery = "SELECT 
        SUM(P.vlr_pag) - SUM(P.vlr_troco_pag) as 'faturamento'
        FROM
            pagamento P
                INNER JOIN
            venda v ON v.id_venda = P.id_venda
                    where date(v.dt_venda) = date(now())
        GROUP BY DATE(v.dt_venda)
        ORDER BY SUM(P.vlr_pag) - SUM(P.vlr_troco_pag) desc;;
        ";

        return isset($this->Sql->select($rawQuery)[0]['faturamento']) ? $this->Sql->select($rawQuery)[0]['faturamento'] : 0;
    }

    public function minimumQuantity()
    {

        return count($this->getMinProducts());
    }

    private function getMinProducts(): array
    {
        $rawQuery = "SELECT 
        e.id_prod as 'ID', 
        p.nm_prod as 'Nome',
        SUM(qtd_prod_est) AS 'Quantidade Atual', 
        SUM(p.qtd_min_prod) AS 'Quantidade minima'
    FROM
        produto p
            INNER JOIN
        estoque e ON p.id_prod = e.id_prod
    WHERE
    p.qtd_min_prod >= qtd_prod_est
    GROUP BY p.id_prod;";

        return $this->Sql->select($rawQuery);
    }

    public function loadModal()
    {



        echo '
        <!-- Modal -->
        <div class="modal fade" id="minium" tabindex="-1" role="dialog" aria-labelledby="informationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="informationModalLabel">Produtos em quantidade Mínima
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <div class="modal-body">';

        $rows = $this->getMinProducts();
        foreach ($rows as  $index => $row) {
            $index++;
            echo " <h3> Produto " . $index . "</h3>";

            foreach ($row as $att => $attribute) {
                echo "<div class=\"modal-item\">
                <b>" . (ucfirst($att)) . "</b>
                <p class=\"text-muted\">" . $attribute . "</p>
            </div>";
            }
        }

        echo '</div>
   
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                   </div>
               </div>
           </div>
       </div>';
    }

    public function loadEmployees()
    {
        $rawQuery = "SELECT 
        f.nm_fun  as 'nome',
        c.nm_cargo as 'cargo',
        count(v.id_venda) as 'vendas'
        FROM 
            funcionario f 
        INNER JOIN	
            cargo c ON c.id_cargo = f.id_cargo
        INNER JOIN 
            venda v ON f.mat_fun = v.mat_fun
        WHERE MONTH(v.dt_venda) = MONTH(now()) 
        GROUP BY v.mat_fun
        ORDER BY count(v.id_venda) desc ";

        $result = $this->Sql->select($rawQuery);

        foreach ($result as $data) {
            echo '<tr>';
            foreach ($data as $value) {
                echo "<td>$value</td>";
            }
            echo '</tr>';
        }
    }
}
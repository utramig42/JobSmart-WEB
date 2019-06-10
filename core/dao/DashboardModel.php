<?php

class DashboardModel
{
    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

    public function monthlySalesGraph()
    {
        $rawQuery = "SELECT 
        count(id_venda) as 'vendas', MONTH(dt_venda) as 'mes'
        FROM
            venda
        GROUP by MONTH(dt_venda) AND year(2019);";

        return json_encode($this->Sql->select($rawQuery));
    }


    public function userOfDay()
    {
        $rawQuery = "SELECT 
        f.nm_fun as 'nome'
        FROM
            venda v
                INNER JOIN
            funcionario f ON f.mat_fun = v.mat_fun
        GROUP BY v.mat_fun, v.dt_venda
        ORDER BY count(v.mat_fun) DESC, v.dt_venda DESC
        LIMIT 1;";


        return $this->Sql->select($rawQuery)[0]['nome'];
    }

    public function productOfDay()
    {
        $rawQuery = "SELECT 
            p.nm_prod as 'produto'
        FROM
            itens_venda it
        INNER JOIN
            estoque e ON it.id_est = e.id_est
        INNER JOIN
            produto p ON p.id_prod = e.id_prod
        INNER JOIN  
            venda v ON v.id_venda = it.id_venda
        GROUP BY it.id_est
        ORDER BY sum(quant_itens_venda) desc, v.dt_venda desc;";

        return $this->Sql->select($rawQuery)[0]['produto'];
    }

    public function billingOfDay()
    {
        $rawQuery = "SELECT 
        SUM(P.vlr_pag) - SUM(P.vlr_troco_pag) as 'faturamento'
        FROM
            pagamento P
                INNER JOIN
            venda v ON v.id_venda = P.id_venda
        GROUP BY v.dt_venda
        ORDER BY 'faturamento' desc;";

        return $this->Sql->select($rawQuery)[0]['faturamento'];
    }

    public function minimumQuantity()
    {
        $rawQuery = "SELECT count(id_prod) as 'alerta' from produto WHERE ativo_prod = 1 AND qtd_prod*0.20 <= qtd_min_prod;";
        return $this->Sql->select($rawQuery)[0]['alerta'];
    }

    private function getAllProducts()
    {
        $rawQuery = "SELECT 
                p.nm_prod as 'nome',
                p.qtd_min_prod as 'quantidade minima',
                p.qtd_prod as 'quantidade atual'

            FROM
                produto p
                    INNER JOIN
                marca m ON m.id_marca = p.id_marca
                    INNER JOIN
                categoria c ON c.id_cat = p.id_cat
            WHERE
                ativo_prod = 1
                    AND qtd_prod * 0.20 <= qtd_min_prod;";

        return $this->Sql->select($rawQuery);
    }

    public function loadModal()
    {
        echo '<!-- Modal -->
        <div class="modal fade" id="minium" tabindex="-1" role="dialog" aria-labelledby="Titulominium" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header ">
                <h5 class="modal-title" id="Titulominium">
                Produtos em quantidade Mínima
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">';
        $rows = $this->getAllProducts();
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


        echo '
              </div>
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
        GROUP BY v.mat_fun;";

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

<?

class ProdutoModel
{
    private $Sql;

    public function __construct()
    {
        $this->Sql = new Connection();
    }

    public function getAllProducts($pagesSql = 0, $maxItens = 10)
    {
        $command = "SELECT 
        p.id_prod as 'ID',
        m.nm_marca as 'marca',
        c.nm_cat as 'categoria',
        p.nm_prod as 'nome',
        p.qtd_min_prod as 'quantidade minima',
        p.qtd_prod as 'quantidade atual',
        p.dt_cad_prod as 'data de cadastro',
        p.obs_prod as 'observações'
        FROM
            produto p
        INNER JOIN
            marca m ON m.id_marca = p.id_marca
        INNER JOIN
            categoria c ON c.id_cat = p.id_cat
        WHERE 
            ativo_prod = 1
        LIMIT 
            $pagesSql,$maxItens";

        return $this->Sql->select($command);
    }


    public function listProductsTables($pagesSql, $maxItens)
    {
        $rows = $this->getAllProducts($pagesSql, $maxItens);
        foreach ($rows as  $row) {
            echo '<tr>';
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['categoria'] . "</td>";
            echo "<td>" . $row['quantidade minima'] . "</td>";
            echo "<td>" . $row['quantidade atual'] . "</td>";
            echo "<td>" . $row['observações'] . "</td>";
            echo "
            <td>                               
            
            <button type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\"
                data-target=\"#product" . $row['ID'] . "\" title=\"Mais Informações\">
            <i class=\"fas fa-info text-white icon\"></i>
            </button>
            
            </td>      
            ";

            echo '</tr>';
        }
    }


    public function listProductsModals($pagesSql, $maxItens)
    {
        $rows = $this->getAllProducts($pagesSql, $maxItens);

        foreach ($rows as $row) {
            $this->infoModal($row);
        }
    }

    public function infoModal($row)
    {

        echo '
        <!-- Modal -->
        <div class="modal fade" id="product' . $row['ID'] .
            '"tabindex="-1" role="dialog" aria-labelledby="informationModalLabel"' . $row['ID'] . 'aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="informationModalLabel"' . $row['ID'] . ' >Informações do produto</h4>
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

<?php
if (file_exists('../../dao/Connection.php')) require_once '../../dao/Connection.php';
//setting header to json
header('Content-Type: application/json');

$mysql = new Connection();
$result = array();

for ($i = 1; $i <= 12; $i++) {
    $query = "SELECT 
	nm_prod as 'maisvendido',
	(SELECT 
    nm_prod
    FROM
    itens_venda it
    INNER JOIN venda v ON v.id_venda = it.id_venda
    INNER JOIN estoque e ON it.id_est = e.id_est
    INNER JOIN produto p ON p.id_prod = e.id_prod
    WHERE MONTH(dt_venda) = $i
    GROUP BY it.id_est
    ORDER BY SUM(quant_itens_venda) LIMIT 1) as 'menosvendido',
    (SELECT 
    SUM(quant_itens_venda)
    FROM
    itens_venda it
    INNER JOIN venda v ON v.id_venda = it.id_venda
    WHERE MONTH(dt_venda) = $i
    GROUP BY id_est
    ORDER BY SUM(quant_itens_venda)
        LIMIT 1) AS 'menor',
    SUM(quant_itens_venda) as 'maior',
    MONTH(dt_venda) as 'mes'
    FROM
    itens_venda it
    INNER JOIN venda v ON v.id_venda = it.id_venda
    INNER JOIN estoque e ON it.id_est = e.id_est
    INNER JOIN produto p ON p.id_prod = e.id_prod
    WHERE MONTH(dt_venda) = $i
    GROUP BY it.id_est
    ORDER BY SUM(quant_itens_venda) DESC LIMIT 1;";

    $result[] = $mysql->select($query);
}

$data = array();

foreach ($result as $rows) {
    foreach ($rows as $row) {
        switch ($row['mes']) {
            case 1:
                $row['mes'] = "Janeiro";
                break;
            case 2:
                $row['mes'] = "Feveiro";
                break;
            case 3:
                $row['mes'] = "Março";
                break;
            case 4:
                $row['mes'] = "Abril";
                break;
            case 5:
                $row['mes'] = "Maio";
                break;
            case 6:
                $row['mes'] = "Junho";
                break;
            case 7:
                $row['mes'] = "Julho";
                break;
            case 8:
                $row['mes'] = "Agosto";
                break;
            case 9:
                $row['mes'] = "Setembro";
                break;
            case 10:
                $row['mes'] = "Outubro";
                break;
            case 11:
                $row['mes'] = "Novembro";
                break;
            case 12:
                $row['mes'] = "Dezembro";
                break;
            default:
                break;
        }
        $data[] = $row;
    }
}


print json_encode($data);

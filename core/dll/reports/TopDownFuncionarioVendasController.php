<?php
if (file_exists('../../dao/Connection.php')) require_once '../../dao/Connection.php';
//setting header to json
header('Content-Type: application/json');

$mysql = new Connection();
$result = array();

for ($i = 1; $i <= 12; $i++) {
    $query = "SELECT 
    f.nm_fun as 'nomeMaior', count(v.id_venda) as 'maior',
    month(dt_venda) as 'mes',
    (SELECT 
    f.nm_fun
from
    venda v
        INNER JOIN
    funcionario f ON v.mat_fun = f.mat_fun
WHERE
    MONTH(dt_venda) = $i
GROUP BY v.mat_fun ORDER BY count(v.id_venda)  LIMIT 1) as 'nomeMenor',
(SELECT 
    count(v.id_venda)
from
    venda v
        INNER JOIN
    funcionario f ON v.mat_fun = f.mat_fun
WHERE
    MONTH(dt_venda) = $i
GROUP BY v.mat_fun ORDER BY count(v.id_venda) ASC  LIMIT 1) as 'menor'
from
    venda v
        INNER JOIN
    funcionario f ON v.mat_fun = f.mat_fun
WHERE
    MONTH(dt_venda) = $i
GROUP BY v.mat_fun ORDER BY count(v.id_venda) DESC LIMIT 1;
";

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

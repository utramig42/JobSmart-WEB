<?php
if (file_exists('../../dao/Connection.php')) require_once '../../dao/Connection.php';
//setting header to json
header('Content-Type: application/json');

$mysql = new Connection();
$result = array();

$users = $mysql->select("SELECT mat_fun as 'ID' from funcionario");

for ($i = 1; $i <= 12; $i++) {
    foreach ($users as $user) {

        $query = "SELECT 
        nm_fun as 'nome',
        nm_prod as 'produto',
        SUM(quant_itens_venda) as 'maior'
        FROM
        itens_venda it
        INNER JOIN venda v ON v.id_venda = it.id_venda
        INNER JOIN estoque e ON it.id_est = e.id_est
        INNER JOIN produto p ON p.id_prod = e.id_prod
        INNER JOIN funcionario f ON v.mat_fun = f.mat_fun
        WHERE MONTH(dt_venda) = $i
        AND v.mat_fun = '" . $user['ID'] . "'
        GROUP BY v.mat_fun,it.id_est
        ORDER BY SUM(quant_itens_venda) DESC LIMIT 1;";

        $result[] = $mysql->select($query);
    }
}

$data = array();

foreach ($result as $rows) {
    foreach ($rows as $row) {
        $data[] = $row;
    }
}


print json_encode($data);

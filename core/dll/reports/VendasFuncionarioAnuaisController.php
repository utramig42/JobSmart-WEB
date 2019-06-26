<?php
if (file_exists('../../dao/Connection.php')) require_once '../../dao/Connection.php';
//setting header to json
header('Content-Type: application/json');

$mysql = new Connection();

$query = "SELECT 
f.nm_fun as 'nome', count(v.id_venda) as 'vendas',year(v.dt_venda) as 'ano'
from
venda v
    INNER JOIN
funcionario f ON v.mat_fun = f.mat_fun
WHERE

year(dt_venda) = year(now())
GROUP BY v.mat_fun";

$result = $mysql->select($query);


print json_encode($result);
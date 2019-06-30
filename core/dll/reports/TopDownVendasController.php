<?php
if (file_exists('../../dao/Connection.php')) require_once '../../dao/Connection.php';
//setting header to json
header('Content-Type: application/json');

$mysql = new Connection();
$result = array();


$query = "SELECT 
    nm_for as 'nome', count(e.id_for) as quant
FROM
    estoque e
        INNER JOIN
    fornecedor f ON f.id_for = e.id_for
GROUP BY e.id_for;";

    $result = $mysql->select($query);


print json_encode($result);

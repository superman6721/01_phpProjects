<?php require_once("./dbconnection.php"); ?>

<?php

$query = 'select * from userInfo';

$res = $pdo->prepare($query);
$res->execute();
$data = $res->fetchAll(POD::FETCH_ASSOC);
print_r($data);
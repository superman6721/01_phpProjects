<?php
$server = 'localhost';
$dbname = 'authorization';
$user = 'root';

$pdo = new PDO("mysql:host=$server;dbname=$dbname", $user, "");
// $query = "insert into userInfo (name, password, phoneNo) values (?, ?, ?)";
// // $query = 'select * from userInfo';
// $res = $pdo->prepare($query);
// $res->execute(['thura', 'Thura123@', '093434']);
// $data = $res->fetchAll(PDO::FETCH_ASSOC);
// print_r($data)
?>
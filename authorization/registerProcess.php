<?php require_once("./dbconnection.php") ?>
<?php


$userName = $_POST['name'];
$userPhoneNo = $_POST['phNo'];
$userAge = $_POST['age'];
$userGender = $_POST['gender'];
$userPassword = $_POST['password'];

$query = 'insert into userInfo (name, phoneNo, age, password, gender ) values (?,?,?,?,?)';

$res = $pdo->prepare($query);
$res->execute([$userName, $userPhoneNo, $userAge, $userPassword, $userGender]);
echo "insert success";
header("Location:./loginPage.php");

?>
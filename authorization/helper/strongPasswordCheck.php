<?php

$passwordLength = strlen($password )>=6;
$lowerCaseStatus = preg_match("/[a-z]/", $password);
$upperCaseStatus = preg_match("/[A-Z]/", $password);
$numberStatus = preg_match("/[0-9]/", $password);
$specialLatterStatus = preg_match("/[!@#$%^&*()]/", $password);

if ($passwordLength && $lowerCaseStatus && $upperCaseStatus && $numberStatus && $specialLatterStatus) {
    echo "strong password!";
} else {
    echo $passwordLength ? "" : "password must be at least 6 character long";
    echo $lowerCaseStatus ? "" : "password must have at least one lower case latter";
    echo $upperCaseStatus ? "" : "password must have at least one upper case latter";
    echo $numberStatus ? "" : "password must have at least one number";
    echo $specialLatterStatus ? "" : "password must have at least one special character";
}

?>
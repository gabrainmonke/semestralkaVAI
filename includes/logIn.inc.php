<?php

if (isset($_POST["submit"])){

    $userName = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    loginUser($connecction,$userName,$pwd);

} else {
    header("location: ../logIn.php");
    exit();
}
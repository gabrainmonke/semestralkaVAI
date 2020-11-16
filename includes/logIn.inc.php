<?php

if (isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require "dbh.inc.php";
    require_once "functions.inc.php";

    loginUser($connection, $username, $pwd);

} else {
    header("location: ../logIn.php");
    exit();
}
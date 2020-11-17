<?php

if (isset($_POST["submit"])){

    $username = $_POST["uid"];
    $password = $_POST["pwd"];

    require "DBconnection.php";
    require_once "functions.php";

    loginUser($connection, $username, $password);

} else {
    header("location: ../logIn.php");
    exit();
}
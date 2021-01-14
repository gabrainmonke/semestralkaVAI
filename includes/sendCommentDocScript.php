<?php

if (isset($_POST["submit"])){

    $author = $_POST['author'];
    $message = $_POST['message'];

    require_once "DBconnection.php";
    require_once "functions.php";

    newComment($connection,$author,$message);

}else {
    header("location: ../index.php");
    exit();
}
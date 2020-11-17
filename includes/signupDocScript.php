<?php

if (isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwdrepeat"];

    require_once "DBhandler.php";
    require_once "functions.php";

    /*
     * Kontrola po odoslaní formulára, či daná registrácia je správne vyplnená
     */

    if (!isEmailValid($email)){
        header("location: ../signUp.php?error=invalidemail");
        exit();
    }

    if (!isUidValid($userName)){
        header("location: ../signUp.php?error=invaliduid");
        exit();
    }

    if (!passwordsMatch($password,$passwordRepeat)){
        header("location: ../signUp.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($connection, $userName, $email)){
        //ak v databáze existuje používatel s týmto menom, používatel sa nebude môčt registrovať
        header("location: ../signUp.php?error=usernametaken");
        exit();
    }

    createUser($connection,$name,$email,$userName,$password);

    }
    else {
        header("location: ../signUp.php");
        exit();
    }


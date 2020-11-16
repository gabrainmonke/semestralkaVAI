<?php

if (isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";


    /*
     * Kontrola po odoslaní formulára, či daná registrácia je správne vyplnená
     */

    if (emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat) !== false){
        header("location: ../signUp.php?error=emptyinput");
        exit();
    }

    if (invalidUID($userName) !== false){
        header("location: ../signUp.php?error=invvaliduid");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: ../signUp.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signUp.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($connection, $userName, $email) !== false){
        header("location: ../signUp.php?error=usernametaken");
        exit();
    }

    createUser($connection,$name,$email,$userName,$pwd);

    }
    else {
        header("location: ../signUp.php");
        exit();
    }


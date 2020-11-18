<?php

session_start();
$userID = $_SESSION["userID"];

if (isset($_POST["submit"])){

    require_once "DBconnection.php";
    require_once "functions.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];

    if (!empty($name)){

        if (strlen($name) > 2){
            $name = explode(" ",$name, 2);

            $isValidFirst = preg_match(("/^[a-zA-Z]*$/"), $name[0]);
            $isValidSecond = preg_match(("/^[a-zA-Z]*$/"), $name[1]);

            if ($isValidFirst && $isValidSecond){
                $name = $name[0] . " " .$name[1];
                $sqlQuery = "UPDATE users SET usersName='$name' WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
            }

        } else {

            header("location: ../editProfile.php?error=invalidname");
            exit();

        }
    }

    if (!empty($email)){

        if (isEmailValid($email)){

            $emailExists = uidExists($connection,$email,$email);

            if (!$emailExists){

                $sqlQuery = "UPDATE users SET usersEmail='$email' WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);

            } else {

                header("location: ../editProfile.php?error=emailalreadyexist");
                exit();

            }

        } else {

            header("location: ../editProfile.php?error=invalidemail");
            exit();

        }
    }

    if (!empty($userName)){

        $userName = str_replace(' ', '', $userName);

        $isValid = preg_match(("/^[a-zA-Z]*$/"), $userName);

        if ($isValid){

            $uidExists = uidExists($connection,$userName,$userName);

            if (!$uidExists){
                $sqlQuery = "UPDATE users SET usersUID='$userName' WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
            } else {

                header("location: ../editProfile.php?error=uidalreadexists");
                exit();

            }

        } else {

            header("location: ../editProfile.php?error=invalidusername");
            exit();

        }

    }

    header("location: ../profile.php");
    exit();

}

<?php

session_start();
$userID = $_SESSION["userID"];
$userUID = $_SESSION["userUID"];

if (isset($_POST["submit"])){

    require_once "DBconnection.php";
    require_once "functions.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];

    if (!empty($name)){

        if (strlen($name) > 2){

            $isValid = preg_match("/^\p{L}*\s\p{L}*$/u", $name);

            if ($isValid){
                //die($isValid);
                $sqlQuery = "UPDATE users SET usersName='$name' WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);
            } else {

                header("location: ../editProfile.php?error=invalidname");
                exit();
            }

        } else {

            header("location: ../editProfile.php?error=invalidname");
            exit();

        }
    }

    if (!empty($email)){

        if (isEmailValid($email)){

            $emailExists = uidExists($connection,$email,$email,$userID);

            if (!$emailExists){

                $sqlQuery = "UPDATE users SET usersEmail='$email' WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);

            } else{

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

       // $isValid = preg_match("/^\p{L}*\s\p{L}*$/u", $name);

        $isValid = preg_match(("/^[a-zA-Z]*$/"), $userName);

        if ($isValid){

            $uidExists = uidExists($connection,$userName,$userName,$userID);

            if (!$uidExists){
                $sqlQuery = "UPDATE users SET usersUID='$userName' WHERE usersID = '$userID'";
                $result = mysqli_query($connection,$sqlQuery);

                $sqlQueryComments = "UPDATE comments SET author='$userName' WHERE author='$userUID'";
                $result = mysqli_query($connection,$sqlQueryComments);
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

<?php

function invalidUID($userName){
    $result = false;
    if (!preg_match(("/^[a-zA-Z0-9]*$/"), $userName)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result = false;
    if ($pwd !== $pwdRepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($connection, $userName, $email){

    $sqlQuery = "SELECT * FROM users 
                 WHERE  usersUID = ? OR usersEmail = ?;";

    $statement = mysqli_stmt_init($connection);

    //kontrola sql príkazu v databáze
    if (!mysqli_stmt_prepare($statement, $sqlQuery)) {
        header("location: ../signUp.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $userName, $email);

    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    //kontrolujeme či v databáze existuje už záznam s rovnakým usernamom alebo emailom
    if ($row = mysqli_fetch_assoc($resultData)) {

        //ak áno vraciame riadok na ktorom sa dáta zhodujú
        mysqli_stmt_close($statement);
        return $row;

    } else {
        //ak nie vieme, že používatela môžeme zaregistrovať
        $result = false;
        mysqli_stmt_close($statement);
        return $result;
    }

    mysqli_stmt_close($statement);
}

function createUser($connection, $name, $email, $username, $pwd) {

    $sqlQuery = "INSERT INTO users (usersName, usersEmail, usersUID, usersPWD) 
                 VALUES (?, ?, ?, ?);";

    $statement = mysqli_stmt_init($connection);

    //kontrola sql príkazu v databáze
    if (!mysqli_stmt_prepare($statement, $sqlQuery)) {
        header("location: ../signUp.php?error=statementfailed");
        exit();
    }

    $hashedPWD = md5($pwd);

    mysqli_stmt_bind_param($statement, "ssss", $name, $email, $username, $hashedPWD);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../signUp.php?error=none");
    exit();
}

function loginUser($connection, $userName, $pwd){
   $uidExists = uidExists($connection, $userName, $userName);

   if ($uidExists === false){
       header("location: ../logIn.php?error=wronglogin");
       exit();
   }

   $pwdHashed = $uidExists["usersPWD"];

   if (md5($pwd) === $pwdHashed) {
       session_start();
       $_SESSION["userID"] = $uidExists["usersID"];
       $_SESSION["userUID"] = $uidExists["usersUID"];
       header("location: ../index.php");
       exit();
   }
   else {
       header("location: ../logIn.php?error=wronglogin");
       exit();
   }

}

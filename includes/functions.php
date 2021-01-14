<?php

function isUidValid($userName) {

    $isValid = preg_match(("/^[a-zA-Z0-9]*$/"), $userName);

    //kontrola prihlasovacieho mena aby obsahovalo iba písmená a čísla
    if ($isValid){

        $isValid = true;

    } else {

        $isValid = false;

    }

    return $isValid;
}

function isEmailValid($email) {

    $isValid = filter_var($email,FILTER_VALIDATE_EMAIL);

    if ($isValid) {

        $isValid = true;

    } else {

        $isValid = false;

    }

    return $isValid;

}

function passwordsMatch($password, $passwordRepeat){

    $passwordsMatch = $password === $passwordRepeat;

    if ($passwordsMatch){

        $passwordsMatch = true;

    } else {

        $passwordsMatch = false;

    }
    return $passwordsMatch;
}

function uidExists($connection, $userName, $email, $userID){

    $sqlQuery = "SELECT * 
                 FROM users 
                 WHERE  (usersUID = ? OR usersEmail = ?)
                 AND usersID <> ?;";

    $statement = mysqli_stmt_init($connection);

    //kontrola sql príkazu v databáze
    if (!mysqli_stmt_prepare($statement, $sqlQuery)) {
        header("location: ../signUp.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "sss", $userName, $email, $userID);
    mysqli_stmt_execute($statement);
    $resultData = mysqli_stmt_get_result($statement);

    //kontrolujeme či v databáze existuje už záznam s rovnakým usernamom alebo emailom
    if ($DBrow = mysqli_fetch_assoc($resultData)) {

        //ak áno vraciame riadok na ktorom sa dáta zhodujú
        mysqli_stmt_close($statement);
        return $DBrow;

    } else {

        //ak nie vieme, že používatela môžeme zaregistrovať
        $result = false;
        mysqli_stmt_close($statement);
        return $result;

    }

}

function createUser($connection, $name, $email, $username, $password) {

    $sqlQuery = "INSERT INTO users (usersName, usersEmail, usersUID, usersPWD) 
                 VALUES (?, ?, ?, ?);";

    $statement = mysqli_stmt_init($connection);

    //kontrola sql príkazu v databáze
    if (!mysqli_stmt_prepare($statement, $sqlQuery)) {
        header("location: ../signUp.php?error=statementfailed");
        exit();
    }

    $hashedPassword = md5($password);

    mysqli_stmt_bind_param($statement, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../signUp.php?error=none");
    exit();
}

function loginUser($connection, $userName, $password,$userID){

   $uidExists = uidExistsLogin($connection, $userName, $userName);

   if ($uidExists === false){
       header("location: ../logIn.php?error=wronglogin");
       exit();
   }

   $pwdHashed = $uidExists["usersPWD"];
   $passwordsMatch = md5($password) === $pwdHashed;

   if ($passwordsMatch) {
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

function uidExistsLogin($connection, $userName, $email){

    $sqlQuery = "SELECT * 
                 FROM users 
                 WHERE  usersUID = ? OR usersEmail = ?";

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
    if ($DBrow = mysqli_fetch_assoc($resultData)) {

        //ak áno vraciame riadok na ktorom sa dáta zhodujú
        mysqli_stmt_close($statement);
        return $DBrow;

    } else {

        //ak nie vieme, že používatela môžeme zaregistrovať
        $result = false;
        mysqli_stmt_close($statement);
        return $result;

    }

}

function newComment($connection,$author,$message){

    $sqlQuery = "INSERT INTO comments (author,message) 
                 VALUES (?, ?);";

    $statement = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statement, $sqlQuery)) {
        header("location: ../gallery.php?errorAddingComment");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $author, $message);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../gallery.php?error=none");
    exit();

}

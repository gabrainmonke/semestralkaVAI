<?php



function emptyInputSignup($name, $email, $userName, $pwd, $pwdRepeat){
    $result = false;
    if (empty($name) || empty($email) || empty($userName) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

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
    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
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
    if (!mysqli_stmt_prepare($statement,$sqlQuery)){
        header("location: ../signUp.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement,"ss",$userName,$email);

    mysqli_stmt_execute($statement);
}

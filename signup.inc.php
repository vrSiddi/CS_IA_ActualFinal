<?php

if(isset($_POST["sub"])){
    
    $username =  $_POST["username"];
    $pswd =  $_POST["pswd"];
    $pswd2 =  $_POST["pswd2"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //Checks if fields are empty
    if(emptyInputSignup($username, $pswd, $pswd2) !== false){
        header("location: ../SignUp.php?error=emptyinput");
        exit();
    }

    //Checks if username is invalid
    if(invalidUid($username) !== false){
        header("location: ../SignUp.php?error=invaliduid");
        exit();
    }

    //Checks if passwords match
    if(pwdMatch($pswd, $pswd2) !== false){
        header("location: ../SignUp.php?error=passwordsdontmatch");
        exit();
    }

    //Checks if uid is already taken
    if(uidExists($conn, $username) !== false){
        header("location: ../SignUp.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $pswd);
}
else{
    header("location: ../SignUp.php");
    exit();
}
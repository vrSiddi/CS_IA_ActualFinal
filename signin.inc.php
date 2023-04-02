<?php

if(isset($_POST["sub"])){
    $username = $_POST["username"];
    $pswd = $_POST["pswd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    //Checks if Input is empty
    if(emptyInputLogin($username, $pswd) !== false){
        header("location: ../SignIn.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pswd);
}
else{
    header("location: ../SignIn.php");
    exit();
}
<?php
//Link to Database
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName= "Login System";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
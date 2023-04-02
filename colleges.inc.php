<?php
   session_start();
   require_once 'dbh.inc.php';
   
   //Add Colleges
   if(isset($_POST["sub"])){
    $cn = $_POST["newName"];
    $dd = $_POST["newDate"];
    $uid = $_SESSION["userid"];

    $sql = "INSERT INTO colleges (collegeName, dueDate, userId) VALUES ('$cn', '$dd', '$uid');";
     mysqli_query($conn, $sql);
     header("location: ../colleges.php");
   }
   
   //Update Colleges
   if(isset($_POST["update"])){
    //Store Form Data
    $uName = $_POST["updateCN"];
    $uDate = $_POST["updateDD"];
    $getID = $_POST["getID"];
    $uid = $_SESSION["userid"];
    $index =  $_SESSION['cID'.$getID];
    
    //Update Database
    $sql = "UPDATE colleges SET collegeName = '$uName', dueDate = '$uDate'
    WHERE collegeId = '$index' AND userId = '$uid'";
    $run = mysqli_query($conn, $sql);
    if($run){
    header("location: ../colleges.php");
    } 
    else{
      die(mysqli_error($conn));
    }
    
   }

   //Delete Colleges
   if(isset($_POST["delete"])){
    
    $nCol = $_POST['delID'];
    $index = $_SESSION['cID'.$nCol];
    $uid = $_SESSION["userid"];
    
    //Delete From Database
    $sql = "DELETE FROM colleges WHERE collegeId = '$index'";
    $run = mysqli_query($conn, $sql);
    if($run){
    header("location: ../colleges.php");
    } 
    else{
      die(mysqli_error($conn));
    }

   }

   //Link Selected College to Correct Essays
   if(isset($_POST["link"])){
    $loc = $_POST["link"]; 
    $index = $_SESSION['cID'.$loc]; 
    $_SESSION['cCollege'] = $index;
    $_SESSION['currentName'] = $_SESSION['cName'.$loc]; 
    header("location: ../essay1.php");
   }
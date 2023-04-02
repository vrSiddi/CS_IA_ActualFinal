<?php
    session_start();
    include_once 'includes/dbh.inc.php';
?>

<!doctype html>
<html lang="en">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

</head>

<body>
  <header>
    <!-- Header -->
    <div class = "container-fluid p-3  bg-secondary text-white ">
        <h1>Essay Pro</h1>
        <p>Essay Organizer</p>
    </div>
</header>
<header class = "" >
    <!--NavBar-->
    <nav class = "navbar navbar-expand-sm bg-dark navbar-dark">
        <div class = "container-fluid justify-content-center">
            <ul class = "navbar-nav">
                <li class = "nav-item px-5">
                    <a class = "nav-link" href = "index.php">Home</a>
                </li>
                <li class = "nav-item px-5">
                    <a class = "nav-link" href = "colleges.php">My Colleges</a>
                </li>
                <li class = "nav-item dropdown px-5" >
                    <a class = "nav-link dropdown-toggle" data-bs-toggle="dropdown" href = "#">Account</a>
                    <ul class = "dropdown-menu">
                        <?php 
                            
                            if(isset($_SESSION["useruid"])){
                                echo "<li><a class = 'dropdown-item' href = 'profile.php'>Account Information</a></li>";
                                echo "<li><a class = 'dropdown-item' href = 'includes/logout.inc.php'>Log Out</a></li>";
                            } 
                            else{
                                echo "<li><a class = 'dropdown-item' href = 'SignUp.php'>Sign Up</a></li>";
                                echo "<li><a class = 'dropdown-item' href = 'SignIn.php'>Log In</a></li>";
                            }
                        
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

  </header>

<script>
     
</script>

                        
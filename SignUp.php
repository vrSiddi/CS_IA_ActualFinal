<?php
    include_once 'header.php';
   
?>
  <title>Sign Up</title>
  <main>
    <div class="container mt-2">
        <h2>Create an Account</h2>
        <!--Sign In Form-->
        <form action="includes/signup.inc.php" method = "post">
            <div class="mb-3 mt-3">
              <label for="Enter username" class="form-label">Username:</label>
              <input type="text" class="form-control" id="uName" placeholder="Enter username" name="username">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Enter Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="mb-3">
                <label for="pwd2" class="form-label">Re-enter Password:</label>
                <input type="password" class="form-control" id="pwd2" placeholder="Re-enter password" name="pswd2">
              </div>
            <button type="submit" class="btn btn-primary" name = "sub">Create Account</button>
          </form>
          
          <div class = "text-danger">
          <?php 
            //Error Handlers
            if(isset($_GET["error"])){
              if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
              }
              else if($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username!</p>";
              }
              else if($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords don't match</p>";
              }
              else if($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong, try again!</p>";
              }
              else if($_GET["error"] == "usernametaken"){
                echo "<p>Username already taken!</p>";
              } 
              else if($_GET["error"] == "none"){
                echo "<p class = \"text-success\">You have signed up! Go to the Login Page to access your account.</p>";
              }
            }
  
          ?>
         </div>
        <!--Create Account Link-->
        <p class="mt-2"> <a href = "SignIn.php">I already have an account.</a></p>
        </div>
        
        
 
        
 
  </main>
  <footer>
    
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
 
</body>

</html>
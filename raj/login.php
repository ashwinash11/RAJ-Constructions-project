<?php
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="login.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="login.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
  
html {
    display: table;
    margin: auto;
    
}



   p {
      color:red;
      margin-top:10px;
   }
</style>

  </head>
<body>
  <br><br><br><br>

     
      
  <div class="content">
  <form action="login.php" method="post">
            <h1 class="damn">Log in </h1>
            
          </div>
  
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"></p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            
            <input style ="width:500px;" type="email" name="user" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required/>
           
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required/>
           
          </div>

          <div class="d-flex justify-content-between align-items-center">


          <div><input type="checkbox" onclick="myFunction()"> Show Password</div> 
          
    
            <br><br>
            <a href="createacc.php" class="text-body">Create account</a>
          </div>

            <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="ok" class="btn btn-dark btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              </div>
</form>


<?php
if(isset($_POST['ok'])){

$username =  $_POST['user'];
$password =  $_POST['password'];

$_SESSION["user"] = $username;
error_reporting(E_ERROR | E_PARSE);
$sql = "SELECT EMAIL,PASSWORD  from login where EMAIL = '$username'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);




  if($username == $row['EMAIL'] && $password == $row['PASSWORD'])
  {
    echo "<script>window.location.href='admin_home.php';</script>";
    
  }
  else
  echo "<p>Login failed</p>";
  
  }


?>
</body>
</html>
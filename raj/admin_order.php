<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<nav" class="navbar navbar-expand-lg navbar-light bg-light">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<nav  class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin_home.php">RAJ CONSTRUCTIONS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MANAGE PRODUCTS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_prod.php">ADD NEW PRODUCTS</a>
          <a class="dropdown-item" href="mod_prod.php">MODIFY PRODUCTS</a>
         
      </li>
      <a class="nav-item nav-link" href="admin_order.php">ORDERS</a>
      <a class="nav-item nav-link" href="feedback.php">FEEDBACKS</a>

    </div>
  </div>
</nav>
<br>
<br>
<h2 style = "text-align:center;">ORDERS</h2>
<br>
<table class="table table-striped">
    <tr>
        <th> Order Id </th>
        <th> Customer Name </th>
        <th> Customer Email </th>
        <th> Product Id </th>
        <th> Product Name </th>
        <th> Product Rate </th>
        <th> Customer address </th>
    </tr>

   


<?php
require 'config.php';





//  display 
$sql = "select * from orders";  
$sql1 = "SELECT * FROM `product` WHERE Pro_id = (SELECT product_id from `orders`)";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0) {
  // output data of each row 
  while($row = mysqli_fetch_assoc($result)) {
    ?>
<?php if (mysqli_num_rows($result1) > 0) {
  // output data of each row 
  while($row1 = mysqli_fetch_assoc($result1)) {
    ?>
 
  <tr>
  <td><?php echo  $row["order_id"]; ?></td>
    <td><?php echo  $row["name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["product_id"]; ?></td>
    <td><?php echo $row1["Pro_Name"]; ?></td>
    <td>₹:<?php echo $row1["Pro_price"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    
  </tr>	
 
<?php
  }
} 
}
}
else {
  echo "0 results";
}


mysqli_close($conn);
?>
</body>
</html>
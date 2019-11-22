<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <style>
* {
  box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
  float: center;
  width: 25%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
    

</head>
<body>
   <div class="container">
   <div class="row">
   <div class="col-md-12">
   <div class="row" style="background-color:cyan">
   <div class="col-md-10">
   <a href="index.php" class="btn btn-info">Home</a>
   <a href="service.php" class="btn btn-info">Service</a>
   <a href="about.php" class="btn btn-info">About</a>
   <a href="contact.php" class="btn btn-info">Contact</a>
   </div>
   <div class="col-md-2">
   <a href="login.php" class="btn btn-info">Login</a>
   <a href="register.php" class="btn btn-info">Register</a>
   </div>
   </div>
   <div class="row" style=background-color:orange>
   <div class="col-md-12">
   
   <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="./images/1.jpg" alt="Los Angeles"  width="1200px" height="250px">
  </div>
  <div class="carousel-item">
    <img src="./images/2.jpg" alt="Chicago" width="1200px" height="250px">
  </div>
  <div class="carousel-item">
    <img src="./images/3.jpg" alt="New York" width="1200px" height="250px">
  </div>
 
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>
   </div>
<?php 
require 'dbconnect.php';
?>
<div style=background-color:cyan >
<form action="home.php" method="post">
<?
$uname=$_POST['uname'];
echo $uname;
?>
  <!-- <table>
    <tr><td>Username<td><input type="text" value=""></td></td></tr>
    <tr><td>Password<td> <input type="text" value=""></td></td></tr>
    <tr><td><td> <input type="submit" value="Login"></td></td></tr>
  </table> -->
</form>
</div>
</div>
</div>
</div>
</body>
</html>

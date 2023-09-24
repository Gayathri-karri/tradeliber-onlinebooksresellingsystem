<?php 
include('include/connect.php');
include('C:\Users\DELL\OneDrive\Desktop\xampp\htdocs\miniproject\functions\commonfunc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mini project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
<body>
   <div class="container-fluid p-0">
   <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./userarea/registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cartitem(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php totalprice(); ?></a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchdata">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="search" class="btn btn-outline-light" name="searchdataproduct">
      </form>
    </div>
  </div>
</nav>
<?php
cart();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
        <?php
        if(isset($_SESSION['username']))
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
        else
           echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome guest</a>
           </li>";
        if(isset($_SESSION['username']))
        echo "<li class='nav-item'>
        <a class='nav-link' href='.\userarea\logout.php'>Logout</a>
      </li>";
      else
      echo "<li class='nav-item'>
        <a class='nav-link' href='.\userarea\login.php'>Login</a></li>";
        ?>          
  </ul>
</nav>
  <div class="bg-light">
    <h3 class="text-center">
      TRADE LIBER
    </h3>
    <p class="text-center">The only thing in this world which made us to learn, laugh and always being loyal is a book.</p>
  </div>
  <div class="row px-1">
    <div class="col-md-10">
      <div class="row">
        <?php
        viewdetails();
       getuniquecategories();
        ?>
      </div>
    </div>
</div>
    <div class="col-md-2 bg-secondary p-0">
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        <?php
        getcategories();
        ?>
      </ul>
    </div>
  </div>
<div class="bg-info p-3 text-center">
  <p> All rights reserved Copyright © 2023</p>
</div>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
include('../include/connect.php');
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
    <link rel="stylesheet" href="../style.css">
     <style>
        img {
            max-width: 50%;
            height: auto;
        }

        @media (max-width: 300px) {
            /* Adjust image size for small screens */
            img {
                max-height: 50px;
            }
        }
        .proimg
        {
            width:100px;
            height:100px;
            object-fit:contain;
        }
    </style> 
  </head>
<body>
   <div class="container-fluid p-0">
   <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cartitem(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php totalprice(); ?></a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search.php" method="get">
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
        <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
      else
      echo "<li class='nav-item'>
        <a class='nav-link' href='login.php'>Login</a></li>";
        ?>       
  </ul>
</nav>
  <div class="bg-light">
    <h3 class="text-center">
      TRADE LIBER
    </h3>
    <p class="text-center">The only thing in this world which made us to learn, laugh and always being loyal is a book.</p>
  </div>
  <div class="row">
    <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-secondary text-center">
        <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $img="select * from user where username='$username'";
        $res5=mysqli_query($con,$img);
        $fetch=mysqli_fetch_array($res5);
        $userimg=$fetch['user_image'];
        echo "        <li class='nav-item'>
        <img src='../images/$userimg' alt=''>
      </li>";
        ?>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php"><h6>pending orders</h6></a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account"><h6>edit account</h6></a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?order7"><h6>my orders</h6></a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete"><h6>delete account</h6></a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="logout.php"><h6>logout</h6></a>
        </li>
        </ul>

    </div>
        <div class="col-md-10 text-center">
        <?php
        orders();
        if(isset($_GET['edit_account']))
        {
            include('editaccount.php');
        }
        if(isset($_GET['orders']))
        {
            include('order2.php');
        }
        if(isset($_GET['order7']))
        {
          include('order5.php');
        }
        ?>
    </div>
  </div>
  <div class="bg-info p-3 text-center">
  <p> All rights reserved Copyright © 2023</p>
</div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
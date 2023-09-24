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
    <title>cart details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .cartimg
{
    width:70px;
    height:70px;
    object-fit:contain;
}
    </style>
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
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cartitem(); ?></sup></a>
        </li>
      </ul>
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
  <!-- table_-->
  <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tbody>
                    <?php
                     global $con;
                     $ip=getIpAddress();
                     $totalx=0;
                     $select="Select * from cart where ip_adress='$ip'";
                     $result=mysqli_query($con,$select);
                     $rescount=mysqli_num_rows($result);
                     if($rescount>0)
                     {
                      echo "<tr>
                      <th>Book Title</th>
                      <th>Book Image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th clospan=2>Operations</th>
                  </tr>";
                     while($row=mysqli_fetch_array($result))
                     {
                       $productid=$row['book_id'];
                       $select1="Select * from books where book_id=$productid";
                       $result1 =mysqli_query($con,$select1);
                       while($row1=mysqli_fetch_array($result1))
                       {
                           $price=array($row1['price']);
                           $pricetable=$row1['price'];
                           $title=$row1['book_title'];
                           $img=$row1['image1'];
                           $values=array_sum($price);
                           $totalx+=$values;
                          ?>
                    <tr>
                        <td>
                             <?php echo "$title";?> 
                        </td>
                        <td><?php echo"<img src='./images/$img'class='cartimg'>";?></td>
                        <td><input type="text" name="qty"  class="form-input w-50"></td>
                        <td><?php echo "$pricetable/-" ?></td>
                        <td><input type='checkbox' name="remove1[]" value="<?php echo "$productid";?>"></td>
                        <td>
                          <input type='submit' value='Update Cart' class='bg-info px-3 py-2 border-0 mx-3' name='update6'>
                          <input type='submit' value='Remove Item' class='bg-info px-3 py-2 border-0 mx-3' name='remove'>
                            <?php 
                            $ip=getIpAddress();
                            if(isset($_POST['update6']))
                            {
                              $qty5=$_POST['qty'];
                              $update_qty="update cart set quantity=$qty5 where ip_adress='$ip'";
                              $result_qty=mysqli_query($con,$update_qty);
                              $totalx=$totalx*$qty5;
                              if (!$result_qty) {
                                echo "updated successfully";
                            } 
                            }
                            ?>
                            <!-- <input type='submit' value='Update Cart' class='bg-info px-3 py-2 border-0 mx-3' name='update'>
                            <button class='bg-info px-3 py-2 border-0 mx-3'>Remove</button>-->
                        </td>
                    </tr>
                    <?php 
                     }
                   }
                  }
                  else
                  echo "<h2 class='text-center text-danger'>Cart is empty!</h2>";?>
                </tbody>
        </table>
        <div class="d-flex mb-5">
          <?php 
          if($rescount>0)
            echo "<h4 class='px-4'>Subtotal: <strong class='text-info'> $totalx/-</strong></h4>";
            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='cont'>";
            if($rescount>0)
            echo "<input type='submit' value='Check Out' class='bg-secondary px-3 py-2 border-0 text-light' name='check'>";
            if(isset($_POST['cont']))
            {
            echo "<script>window.open('index.php','_self')</script>";
            }
            if(isset($_POST['check']))
            {
              if(isset($_SESSION['username']))
                 echo "<script>window.open('userarea/payment.php','_self')</script>";
              else
                 echo "<script>window.open('userarea/login.php','_self')</script>";
          }
            ?>
        </div>
    </div>
  </div>
                  </form>
                  <!-- remove item-->
                  <?php 
                  function remove()
                  {
                    global $con;
                    if(isset($_POST['remove']))
                    {
                      foreach($_POST['remove1'] as $productid1)
                      {
                        echo "$productid1";
                        $select1="delete from cart where book_id=$productid1";
                        $result5 =mysqli_query($con,$select1);
                        if($result5)
                        {
                          echo "<script>alert('Item deleted successfully')</script>";
                          echo "<script>window.open('cart.php','_self');</script>";
                        }
                      }
                    }
                  }
                  echo $removeitem=remove();

?>
<div class="bg-info p-3 text-center">
  <p> All rights reserved Copyright © 2023</p>
</div>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
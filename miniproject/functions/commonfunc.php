<?php
//include('./include/connect.php');
//getting products
function getproducts()
{
    global $con;
    if(!isset($_GET['category']))
    {
    $select="select * from books order by rand() limit 0,9";
        $result =mysqli_query($con,$select);
        while($row=mysqli_fetch_assoc($result))
        {
          $bookid=$row['book_id'];
          $booktitle=$row['book_title'];
          $bookdes=$row['book_description'];
          $bookcid=$row['category_id'];
          $bookp=$row['price'];
          $bookimg=$row['image1'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./images/$bookimg' class='card-img-top' alt='$booktitle'>
            <div class='card-body'>
              <h5 class='card-title'>$booktitle</h5>
                  <p class='card-text'>$bookdes</p>
                  <p class='card-text'>Price : $bookp/-</p>
                  <a href='index.php?addtocart=$bookid' class='btn btn-info'>Add to cart</a>
                  <a href='productdetails.php?productid=$bookid' class='btn btn-secondary'>View more</a>
            </div>
        </div>
          </div>";
        }
        }
}
function getuniquecategories()
{
    global $con;
    if(isset($_GET['category']))
    {
      $categoryid=$_GET['category'];
    $select="select * from books where category_id=$categoryid";
        $result =mysqli_query($con,$select);
        $count=mysqli_num_rows($result);
       if($count==0)
       {
        echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
       }
        while($row=mysqli_fetch_assoc($result))
        {
          $bookid=$row['book_id'];
          $booktitle=$row['book_title'];
          $bookdes=$row['book_description'];
          $bookcid=$row['category_id'];
          $bookp=$row['price'];
          $bookimg=$row['image1'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./images/$bookimg' class='card-img-top' alt='$booktitle'>
            <div class='card-body'>
              <h5 class='card-title'>$booktitle</h5>
                  <p class='card-text'>$bookdes</p>
                  <p class='card-text'>Price : $bookp/-</p>
                  <a href='index.php?addtocart=$bookid' class='btn btn-info'>Add to cart</a>
                  <a href='productdetails.php?productid=$bookid' class='btn btn-secondary'>View more</a>
            </div>
        </div>
          </div>";
        }
        }
}

function getcategories()
{
  global $con;
  $select_categories="Select * from categories";
        $result=mysqli_query($con,$select_categories);
        while($row_data=mysqli_fetch_assoc($result))
        {
        $category=$row_data['category_title'];
        $id=$row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='index.php?category=$id' class='nav-link text-light'>$category</a>
      </li>";
        }
}
function search()
{
  global $con;
  if(isset($_GET['searchdataproduct']));
  {
    $usersearch=$_GET['searchdata'];
        $select="select * from books where book_keywords like '%$usersearch%'";
        $result =mysqli_query($con,$select);
       $count=mysqli_num_rows($result);
       if($count==0)
       {
        echo "<h2 class='text-center text-danger'>No Match Found.No Books found on this Category!</h2>";
       }
        while($row=mysqli_fetch_assoc($result))
        {
          $bookid=$row['book_id'];
          $booktitle=$row['book_title'];
          $bookdes=$row['book_description'];
          $bookcid=$row['category_id'];
          $bookp=$row['price'];
          $bookimg=$row['image1'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./images/$bookimg' class='card-img-top' alt='$booktitle'>
            <div class='card-body'>
              <h5 class='card-title'>$booktitle</h5>
                  <p class='card-text'>$bookdes</p>
                  <p class='card-text'>Price : $bookp/-</p>
                  <a href='index.php?addtocart=$bookid' class='btn btn-info'>Add to cart</a>
                  <a href='productdetails.php?productid=$bookid' class='btn btn-secondary'>View more</a>
            </div>
        </div>
          </div>";
        }
      }
}
function viewdetails()
{
  global $con;
  if(isset($_GET['productid']))
  {
    if(!isset($_GET['category']))
    {
      $product=$_GET['productid'];
    $select="select * from books where book_id=$product";
        $result =mysqli_query($con,$select);
        while($row=mysqli_fetch_assoc($result))
        {
          $bookid=$row['book_id'];
          $booktitle=$row['book_title'];
          $bookdes=$row['book_description'];
          $bookcid=$row['category_id'];
          $bookp=$row['price'];
          $bookimg=$row['image1'];
          $img2=$row['image2'];
          $img3=$row['image3'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
          <img src='./images/$bookimg' class='card-img-top' alt='$booktitle'>
            <div class='card-body'>
              <h5 class='card-title'>$booktitle</h5>
                  <p class='card-text'>$bookdes</p>
                  <p class='card-text'>Price : $bookp/-</p>
                  <a href='index.php?addtocart=$bookid' class='btn btn-info'>Add to cart</a>
                  <a href='index.php' class='btn btn-secondary'>Go Home</a>
            </div>
        </div>
          </div>
          <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Books</h4>
                </div>
                <div class='col-md-6'>
                <img src='./images/$img2' class='card-img-top' alt='$booktitle'>
                </div>
                <div class='col-md-6'>
                <img src='./images/$img3' class='card-img-top' alt='$booktitle'>
                </div>
            </div>";
        }
        }
      }
}  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
//cart function
function cart()
{
  global $con;
  if(isset($_GET['addtocart']))
  {
    $ip=getIpAddress();
    $productid=$_GET['addtocart'];
    $select="Select * from cart where ip_adress='$ip' and book_id=$productid";
    $result =mysqli_query($con,$select);
    $count=mysqli_num_rows($result);
    if($count>0)
       {
        echo "<script>alert('This Item is already inside cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
       }
       else
       {
        $insert="insert into cart(book_id,ip_adress,quantity) values ($productid,'$ip','0')";
        $result1 =mysqli_query($con,$insert);
        echo "<script>alert('This Item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
       }
  }
}
//cart item numbers
function cartitem()
{
  global $con;
  if(isset($_GET['addtocart']))
  {
    $ip=getIpAddress();
    $select="Select * from cart where ip_adress='$ip'";
    $result =mysqli_query($con,$select);
    $count=mysqli_num_rows($result);
  }
       else
       {
        $ip=getIpAddress();
    $select="Select * from cart where ip_adress='$ip'";
    $result =mysqli_query($con,$select);
    $count=mysqli_num_rows($result);
       }
       echo $count;
  }
  function totalprice()
  {
    global $con;
    $ip=getIpAddress();
    $total=0;
    $select="Select * from cart where ip_adress='$ip'";
    $result=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($result))
    {
      $productid=$row['book_id'];
      $select1="Select * from books where book_id=$productid";
      $result1 =mysqli_query($con,$select1);
      while($row1=mysqli_fetch_array($result1))
      {
          $price=array($row1['price']);
          $values=array_sum($price);
          $total+=$values;
      }
  }
  echo $total;
}
function orders()
{
  global $con;
  $username=$_SESSION['username'];
  $select5="select * from user where username='$username'";
  $result6=mysqli_query($con,$select5);
  while($row_query=mysqli_fetch_array($result6))
  {
    $id=$row_query['user_id'];
    if(!isset($_GET['edit_account']))
    {
      if(!isset($_GET['orders']))
      {
        if(!isset($_GET['delete']))
      {
        $get="select * from orders where user_id=$id and status='pending'";
        $result5=mysqli_query($con,$get);
        $count2=mysqli_num_rows($result5);
        if($count2>0)
        {
          echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$count2</span> pending orders</h3>";
          echo "<p class='text-center'><a href='profile.php?orders' class='text-dark'>Order Details</a></p>";
        }
        else
        {
          echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>";
          echo "<p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
        }
      }
      }
    }
    }
}
?>
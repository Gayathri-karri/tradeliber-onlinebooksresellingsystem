<?php 
include('../include/connect.php');
include('../functions/commonfunc.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body
        {
            overflow-x:hidden;
        }
    </style>
</head>
<body>
<div class="container-fluid my-3">
        <h2 class="text-center">
            LOGIN PAGE
        </h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipath/form-data">
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" autocomplete="off" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password"  name="password" class="form-control" placeholder="Enter your password" autocomplete="off" required/>
</div>
                            <div class="mt-4 pt-2">
                            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login">
                            <br>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an Account? <a href="registration.php" class="text-danger">REGISTER</a> </p>
                        </div>
                    </form>
                </div>
            </div>
</div>
</body>
</html>
<?php
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $select ="select * from user where username='$username'";
    $result=mysqli_query($con,$select);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    $ip=getIPAddress();
    $select1 ="select * from cart where ip_adress='$ip'";
    $res2=mysqli_query($con,$select1);
    $count1=mysqli_num_rows($res2);
    $res2=mysqli_query($con,$select1);
    if($count>0)
    {
        if(password_verify($password,$row['password']))
        {
            $_SESSION['username']=$username;
           // echo "<script>alert('Logged in Sucessfully')</script>";
           if($count1==0 and $count==1)
           {
            $_SESSION['username']=$username;
            echo "<script>alert('Logged in Sucessfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
           }
           else
           {
            $_SESSION['username']=$username;
            echo "<script>alert('Logged in Sucessfully')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
           }
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else
    {
        echo "<script>alert('Invalid Username')</script>";
    }
} 
?>
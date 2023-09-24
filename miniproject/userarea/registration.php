<?php 
include('../include/connect.php');
include('../functions/commonfunc.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            NEW USER REGISTRATION
        </h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipath/form-data">
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" autocomplete="off" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email" autocomplete="off" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" id="image" name="image" class="form-control" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password"  name="password" class="form-control" placeholder="Enter your password" autocomplete="off" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="confirmpass" class="form-label">Confirm Password</label>
                            <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="Confirm your password" autocomplete="off" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="adress" class="form-label">Address</label>
                            <input type="text" id="adress" name="adress" class="form-control" placeholder="Enter your Address" autocomplete="off" required/>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter your Mobile" autocomplete="off" required/>
                        </div>
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register">
                            <br>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an Account? <a href="login.php" class="text-danger">LOGIN</a> </p>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $confirmpass=$_POST['confirmpass'];
    $adress=$_POST['adress'];
    $contact=$_POST['contact'];
    $image=$_POST['image'];
    //$image_tmp=$_FILES['image']['tmp_name'];
    $ip=getIPAddress();
    $select ="Select * from user where username='$username' or user_email='$email'";
    $res=mysqli_query($con,$select);
    $count=mysqli_num_rows($res);
    if($count>0)
    {
    echo "<script>alert('This username or email is already present please enter another username')</script>";
    }
    else if($password!=$confirmpass)
    {
        echo "<script>alert('Password and confirm password do not match')</script>";
    }
    else
    {
    move_uploaded_file($image,"./userimages/$image");
    $insert="insert into user (username,user_email,password,user_image,user_ipaddress,address,mobile)
     values('$username','$email','$hash','$image','$ip','$adress','$contact') ";
     $result=mysqli_query($con,$insert);
    if($result)
    echo "<script>alert('user registered successfully')</script>";
    else
    die(mysqli_error($con));
    }
    $select1="select * from cart where ip_adress='$ip'";
    $res1=mysqli_query($con,$select1);
    $count1=mysqli_num_rows($res1);
    if($count1>0)
    {
        $_SESSION['username']=$username;
        echo "<script>alert('you have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}
?>
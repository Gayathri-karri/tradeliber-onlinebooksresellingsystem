<?php 
include('C:\Users\DELL\OneDrive\Desktop\xampp\htdocs\miniproject\include\connect.php');
//include('C:\Users\DELL\OneDrive\Desktop\xampp\htdocs\miniproject\functions\commonfunc.php');
function getIPAddress1() {  
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    img{
        width:80%;
        margin:auto;
        display:block;
    }
</style>
<body>
    <?php
    $ip=getIPAddress1();
    $getuser="select * from user where user_ipaddress='$ip'"; 
    $result=mysqli_query($con,$getuser);
    $run=mysqli_fetch_array($result);
    $userid=$run['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.png"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $userid ?>" ><h2 class="text-center">PAY OFFLINE<h2></a>
            </div>
        </div>
    </div>
</body>
</html>
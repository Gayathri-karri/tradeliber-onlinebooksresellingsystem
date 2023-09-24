<?php 
include('../include/connect.php');
include('../functions/commonfunc.php');
if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
}
$ip=getIPAddress();
$price=0;
$select="select * from cart where ip_adress='$ip'";
$result=mysqli_query($con,$select);
$invoice=mt_rand();
$status='pending';
$count=mysqli_num_rows($result);
while($rowprice=mysqli_fetch_array($result))
{
    $proid=$rowprice['book_id'];
    $select1="select * from books where book_id=$proid";
    $result1=mysqli_query($con,$select1);
    while($rowprice1=mysqli_fetch_array($result1))
    {
        $price1=array($rowprice1['price']);
        $price2=array_sum($price1);
        $price=$price+$price2;
    }
}
$get="select * from cart";
$run=mysqli_query($con,$get);
$quantity=mysqli_fetch_array($run);
$quantity1=$quantity['quantity'];
if($quantity1==0)
{
    $quantity1=1;
    $subtotal=$price;
}
else
{
    $quantity1=$quantity1;
    $subtotal=$price*$quantity1;
}
$insert="insert into orders(user_id,amount,invoice,total_products,order_date,status) values($user_id,$subtotal,$invoice,$count,NOW(),'$status')";
$run2=mysqli_query($con,$insert);
if($run2)
{
echo "<script>alert('orders are submitted successfully')</script>";
echo "<script>window.open('profile.php','_self')</script>";
}
$insert1="insert into pending(user_id,invoice,productid,quantity,status) values($user_id,$invoice,$proid,$quantity1,'$status')";
$run3=mysqli_query($con,$insert1);
$empty="delete from cart where ip_adress='$ip'";
$run4=mysqli_query($con,$empty);
?>


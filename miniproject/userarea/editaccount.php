<?php
if(isset($_GET['edit_account']))
{
    $user=$_SESSION['username'];
    $select7="select * from user where username='$user'";
    $result7=mysqli_query($con,$select7);
    $fetch1=mysqli_fetch_assoc($result7);
    $userid=$fetch1['user_id'];
    $name=$fetch1['username'];
    $email=$fetch1['user_email'];
    $address=$fetch1['address'];
    $mobile=$fetch1['mobile'];

    if(isset($_POST['update']))
    {
        $update=$userid;
        $name=$_POST['username'];
         $email=$_POST['email'];
        $address=$_POST['address'];
        $mobile=$_POST['phone'];
        //$img2=$_POST['photo'];
        //$update2="update user set username='$name',user_email='$email',address='$adress',user_image='$img',mobile='$mobile' where user_id=$update";
        //$run3=mysqli_query($con,$update2);
       // if($run3)
        //{
            echo "<script>alert('data updated successfully')</script>";
        //}
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $name; ?>" >
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-outline mb-4 d-flex  w-50 m-auto">
        <input type="file" class="form-control m-auto" name="photo">
        <img src="../images/<?php echo $userimg; ?>" alt="" class="proimg">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="address" value="<?php echo $address; ?>">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="phone" value="<?php echo $mobile; ?>">
    </div>
    <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 " name="update">
    </form>
</body>
</html>
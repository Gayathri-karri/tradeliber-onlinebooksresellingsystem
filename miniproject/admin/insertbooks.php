<?php
include('../include/connect.php');
if(isset($_POST['insertbook']))
{
    $title=$_POST['book'];
    $description=$_POST['description'];
    $keyword=$_POST['keyword'];
    $category=$_POST['bookcategory'];
    $price=$_POST['price'];  
    $status='true';
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $insert="insert into books (book_title,book_description,book_keywords,category_id,image1,price,date,status)
         values ('$title','$description','$keyword','$category','$new','$price',NOW(),'$status')";
         $result=mysqli_query($con,$insert);
         if($result)
         {
         echo "<script>alert('inserted successfully')</script>";
         }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
   
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Books</h1>
        <form action="" method="post" enctype="mutlipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="Book Title" class="form-label">Book Title</label>
                <input type="text" name="book" id="Book Title" class="form-control" placeholder="enter book title" autocomplete="off" reqiured >
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="enter description of the book" autocomplete="off" reqiured >
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword" class="form-label">Book Keywords</label>
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="enter keyword" autocomplete="off" reqiured >
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="bookcategory" id="" class="form-select">
                    <option value="">select category</option>
                    <?php
                    $select_query="select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row_data=mysqli_fetch_assoc($result_query))
                    {
                        $category=$row_data['category_title'];
                        $id=$row_data['category_id'];
                        echo "<option value='$id'>$category</option>";
                     }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control"  reqiured >
            </div>
                <!--<div class="form-outline mb-4 w-50 m-auto">
                <label for="image2" class="form-label">Book Image2</label>
                <input type="file" name="image2" id="image2" class="form-control" reqiured >
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image3" class="form-label">Book Image3</label>
                <input type="file" name="image3" id="image3" class="form-control" reqiured >
            </div>-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Book Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="enter book price" autocomplete="off" reqiured >
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insertbook" class="btn btn-info mb-3 px-3" value="Insert Book">
                 </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
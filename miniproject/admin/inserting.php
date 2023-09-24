if($_FILES["image"]["error"]===4)
    {
        echo "<script>alert('image doesnt exist')</script>";
    }
    else
    {
        $filename=$_FILES["image"]["name"];
        $filesize=$_FILES["image"]["size"];
        $tmpname=$_FILES["image"]["tmp_name"];
        $valid=['jpg','jpeg','png'];
        $extension=explode('.',$filename);
        $extension=strtolower(end($extension));
         if($filesize>1000000)
        {
            echo "<script>alert('size too large')</script>";
        }
        else{
            $new=uniqid();
            $new.='.'.$extension;
            move_uploaded_file($tmpname,"./bookimages/.$new");
            $insert="insert into books (book_title,book_description,book_keywords,category_id,image1,price,date,status)
         values ('$title','$description','$keyword','$category','$new','$price',NOW(),'$status')";
         $result=mysqli_query($con,$insert);
         if($result)
         {
         echo "<script>alert('inserted successfully')</script>";
         }
        }
    }
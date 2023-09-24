<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin
        {
             width:100px;
            object-fit:contain;
        }
        .footer
        {
            position:absolute;
            bottom:0;
        }</style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col-md-12  bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/logo1.jpeg" alt="" class="admin"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insertbooks.php" class="nav-link text-light bg-info m-1 p-2">INSERT BOOKS</a></button>
                    <button class="my-3" ><a href="" class="nav-link text-light bg-info m-1 p-2 ">VIEW BOOKS</a></button>
                    <button class="my-3" ><a href="index.php?insert" class="nav-link text-light bg-info m-1 p-2">INSERT CATEGORIES</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info m-1 p-2">VIEW CATEGORIES</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info m-1 p-2">ALL ORDERS</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info m-1 p-2">ALL PAYMENTS</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info m-1 p-2">LIST USERS</a></button>
                    <button class="my-3"><a href="" class="nav-link text-light bg-info m-1 p-2">LOGOUT</a></button>
                </div>
            </div>
        </div>
   
    <div class="container my-3">
        <?php
        if(isset($_GET['insert']))
        {
            include('insert.php');
        }
        ?>
     </div>
        <div class="bg-info p-3 text-center footer">
            <p> All rights reserved Copyright © 2023</p>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
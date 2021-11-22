<?php
    include('../config/constants.php');
    include('login_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Header -->
    <div class="header border-bottom">
        <div class="py-3 container">
            <ul class="mb-0 pl-0 d-flex justify-content-center">
                <li class="px-3"><a href="<?php echo SITEURL; ?>">Back to Home Page</a></li>
                <li class="px-3"><a href="index.php">Home</a></li>
                <li class="px-3"><a href="admin.php">Admin</a></li>
                <li class="px-3"><a href="category.php">Category</a></li>
                <li class="px-3"><a href="food.php">Food</a></li>
                <li class="px-3"><a href="order.php">Order</a></li>
                <li class="px-3"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
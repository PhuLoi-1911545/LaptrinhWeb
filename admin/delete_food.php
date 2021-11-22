<?php
    include('../config/constants.php');
  
    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        // 1. Get ID and image_name of food
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // 2. Delete image
        if ($image_name != "") {
            $path = "../images/food/".$image_name;
            $remove = unlink($path);

            if ($remove == FALSE) { // failed to delete image
                $_SESSION['remove'] = "<h3 class='text-danger text-center'> Food Image delete FAILED! </h3>"; //display message
                header("location:".SITEURL."admin/food.php");
                die();
            }
        }

        // 3. SQL to delete data in db
        $sql = "DELETE FROM food WHERE id=$id";
        $res = mysqli_query($connection, $sql);
        if ($res == TRUE) {
            $_SESSION['delete'] = "<h3 class='text-success text-center'> Food Image delete successfully! </h3>"; //display message
            header("location:".SITEURL."admin/food.php");
        } else {
            $_SESSION['delete'] = "<h3 class='text-danger text-center'> Food Image delete FAILED! </h3>"; //display message
            header("location:".SITEURL."admin/food.php");
        }

    } else {
        $_SESSION['unauthorized'] = "<h3 class='text-danger text-center'> Unauthorized Access! </h3>";
        header("location:".SITEURL."admin/food.php");
    }
?>
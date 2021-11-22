<?php
    include('../config/constants.php');

    // 1. Get ID and image_name of category
    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Delete image
        if ($image_name != "") {
            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            if ($remove == FALSE) { // failed to delete image
                $_SESSION['remove'] = "<h3 class='text-danger text-center'> Category Image delete FAILED! </h3>"; //display message
                header("location:".SITEURL."admin/category.php");
                die();
            }
        }

        // 2. SQL to delete data in db
        $sql = "DELETE FROM category WHERE id=$id";
        $res = mysqli_query($connection, $sql);

        if ($res == TRUE) {
            $_SESSION['delete'] = "<h3 class='text-success text-center'> Category Image delete successfully! </h3>"; //display message
            header("location:".SITEURL."admin/category.php");
        } else {
            $_SESSION['delete'] = "<h3 class='text-danger text-center'> Category Image delete FAILED! </h3>"; //display message
            header("location:".SITEURL."admin/category.php");
        }
    } else {
        header("location:".SITEURL."admin/category.php");
    }
?>
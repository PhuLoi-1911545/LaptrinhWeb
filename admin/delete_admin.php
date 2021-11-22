<?php
    include('../config/constants.php');

    // 1. Get ID of admin
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    // 2. Create SQL Query to delete admin
    $sql = "DELETE FROM admin WHERE id=$id";

    $res = mysqli_query($connection, $sql);

    // 3. Redirect page
    if ($res == TRUE) {
        $_SESSION['delete'] = "<h3 class='text-success text-center'> Admin deleted successfully! </h3>"; //display message
        header("location:".SITEURL."admin/admin.php"); //redirect page
    } else {
        $_SESSION['delete'] = "<h3 class='text-danger text-center'> Admin deleted failed! </h3>"; //display message
        header("location:".SITEURL."admin/admin.php"); //redirect page
    }  
?>
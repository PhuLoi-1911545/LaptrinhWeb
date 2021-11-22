<?php
    if (!isset($_SESSION['user'])) { // if not login
        $_SESSION['not_login'] = "<h3 class='text-danger text-center'> Please LOGIN to access Admin Panel! </h3>";
        header("location:".SITEURL."admin/login.php");
    }
?>

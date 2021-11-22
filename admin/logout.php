<?php
    include('../config/constants.php');

    // 1. Delete Session
    session_destroy(); // delete $_SESSION['user']

    // 2. Redirect page
    header("location:".SITEURL."admin/login.php");
?>
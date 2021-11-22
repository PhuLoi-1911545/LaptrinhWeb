<?php
    // Start Session
    session_start();

    // creat constants
    define('SITEURL', 'http://localhost/assWEB/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'ass_web');

    $connection = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //connect db
    $db_select = mysqli_select_db($connection, DB_NAME) or die(mysqli_error()); //select db
?>
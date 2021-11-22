<?php
    include('../config/constants.php');
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

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1 class="text-center">Login</h1>

            <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if (isset($_SESSION['not_login'])) {
                    echo $_SESSION['not_login'];
                    unset($_SESSION['not_login']);
                }
            ?>
            
            <form action="" method="POST">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="username">Username:</label>
                    <input type="text" class="col-md-7 form-control" id="username" name="username" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your username'" placeholder="Enter your username">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="password">Password:</label>
                    <input type="password" class="col-md-7 form-control" id="password" name="password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your password'" placeholder="Enter your password">
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-md-7">
                        <button type="submit" name="submit" class="btn btn-outline-success w-100">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>

<!-- process -->
<?php
    if (isset($_POST['submit'])) {
        // 1. Get data form Form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. Check username and password existed or not
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        // 3. Execute the Query
        $res = mysqli_query($connection, $sql);

        // 4. Count rows to check user existed or not (1 success)
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $_SESSION['login'] = "<h3 class='text-success text-center'> Login successfully! </h3>"; //display message
            $_SESSION['user'] = $username; // access control
            // header("location:".SITEURL."admin/");
            echo("<script>location.href = '".SITEURL."admin/';</script>");
        } else {
            $_SESSION['login'] = "<h3 class='text-danger text-center'> Username or Password WRONG! </h3>"; //display message
            // header("location:".SITEURL."admin/login.php");
            echo("<script>location.href = '".SITEURL."admin/login.php';</script>");
        }
    }
?>
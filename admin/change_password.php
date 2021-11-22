<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Change Password</h1>

            <!-- Get ID -->
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
            ?>

            <form action="" method="POST">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="current_password">Current Password:</label>
                    <input type="password" class="col-md-7 form-control" id="current_password" name="current_password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your old password'" placeholder="Enter your old password">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="new_password">New Password:</label>
                    <input type="password" class="col-md-7 form-control" id="new_password" name="new_password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your new pasword'" placeholder="Enter your new pasword">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="confirm_password">Confirm Password:</label>
                    <input type="password" class="col-md-7 form-control" id="confirm_password" name="confirm_password" onfocus="this.placeholder=''" onblur="this.placeholder='Confirm your new password'" placeholder="Confirm your new password">
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-md-7">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" name="submit" class="btn btn-outline-primary w-100">Change</button>
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
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // 2. Check ID and Current password existed or not
        $sql = "SELECT * FROM admin WHERE id = $id AND password = '$current_password'";
        $res = mysqli_query($connection, $sql);

        if ($res == TRUE) {
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                // user existed
                if ($new_password == $confirm_password) {
                    $sql2 = "UPDATE admin SET
                        password = '$new_password'
                        WHERE id = $id
                    ";
                    $res2 = mysqli_query($connection, $sql2);
                    if ($res2 == TRUE) {
                        $_SESSION['change_pass'] = "<h3 class='text-success text-center'> Password changed succesfully! </h3>"; //display message
                        header("location:".SITEURL."admin/admin.php");
                    } else {
                        $_SESSION['change_pass'] = "<h3 class='text-danger text-center'> Failed to change Password! </h3>"; //display message
                        header("location:".SITEURL."admin/admin.php");
                    }
                } else {
                    $_SESSION['pass_not_match'] = "<h3 class='text-danger text-center'> New Password and Confirm Password NOT match ! </h3>"; //display message
                    header("location:".SITEURL."admin/admin.php");
                }
            } else {
                $_SESSION['user_not_found'] = "<h3 class='text-danger text-center'> User NOT FOUND! </h3>"; //display message
                header("location:".SITEURL."admin/admin.php"); 
            }
        }

        // 3. Check New passwrod == Confirm password

        // 
    }
?>
<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Add Admin</h1>

            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <form action="" method="POST">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="full_name">Full Name:</label>
                    <input type="text" class="col-md-7 form-control" id="full_name" name="full_name" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your full name'" placeholder="Enter your full name">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="username">Userame:</label>
                    <input type="text" class="col-md-7 form-control" id="username" name="username" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your username'" placeholder="Enter your username">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="password">Password:</label>
                    <input type="password" class="col-md-7 form-control" id="password" name="password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your password'" placeholder="Enter your password">
                </div>
                <div class="form-group row">
                    <div class="offset-3 col-md-7">
                        <button type="submit" name="submit" class="btn btn-outline-success w-100">Create</button>
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

        // Get date form Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // SQL Query to save data into db
        $sql = "INSERT INTO admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        // Executing Query and save data into db
        $res = mysqli_query($connection, $sql) or die(mysqli_error());

        // Check data inserted or not
        if ($res == TRUE) {
            $_SESSION['add'] = "<h3 class='text-success text-center'> Admin added successfully! </h3>"; //display message
            header("location:".SITEURL."admin/admin.php"); //redirect page
        } else {
            $_SESSION['add'] = "<h3 class='text-danger text-center'> Admin added failed! </h3>"; //display message
            header("location:".SITEURL."admin/add_admin.php"); //redirect page
        }
    }
?>
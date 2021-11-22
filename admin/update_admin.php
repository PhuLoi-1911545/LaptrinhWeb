<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Update Admin</h1>

            <?php
                // 1. Get id admin
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }               

                //2. SQL Query to get id
                $sql = "SELECT * FROM admin WHERE id=$id";
                $res = mysqli_query($connection, $sql);

                if ($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    
                    // check id haved or not
                    if ($count == 1) {
                        $row = mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    } else {
                        header("location:".SITEURL."admin/admin.php");
                    }
                }
            ?>

            <form action="" method="POST">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="full_name">Full Name:</label>
                    <input type="text" class="col-md-7 form-control" id="full_name" name="full_name" value="<?php echo $full_name; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="username">Userame:</label>
                    <input type="text" class="col-md-7 form-control" id="username" name="username" value="<?php echo $username; ?>">
                </div>
                <div class="form-group row">
                    <div class="offset-3 col-md-7">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" name="submit" class="btn btn-outline-success w-100">Update</button>
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
        // get data from Form
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // SQL Query to update 
        $sql = "UPDATE admin SET
            full_name = '$full_name',
            username = '$username'
        WHERE id = '$id'
        ";

        $res = mysqli_query($connection, $sql);

        if ($res == TRUE) {
            $_SESSION['update'] = "<h3 class='text-success text-center'> Admin updated successfully! </h3>"; //display message
            header("location:".SITEURL."admin/admin.php"); //redirect page
        } else {
            $_SESSION['update'] = "<h3 class='text-danger text-center'> Admin updated failed! </h3>"; //display message
            header("location:".SITEURL."admin/admin.php"); //redirect page
        }
    }
?>
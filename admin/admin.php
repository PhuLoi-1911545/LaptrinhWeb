<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Admin</h1>

            <!-- add admin -->
            <a href="add_admin.php" class="btn btn-outline-primary mb-4 float-right">Add Admin</a>

            <!-- display message -->
            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['user_not_found'])) {
                    echo $_SESSION['user_not_found'];
                    unset($_SESSION['user_not_found']);
                }

                if (isset($_SESSION['pass_not_match'])) {
                    echo $_SESSION['pass_not_match'];
                    unset($_SESSION['pass_not_match']);
                }

                if (isset($_SESSION['change_pass'])) {
                    echo $_SESSION['change_pass'];
                    unset($_SESSION['change_pass']);
                }
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM admin";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                // get data from db
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                
                                ?>

                                <!-- display data -->
                                <tr>
                                    <th scope="row"><?php echo $n++; ?></th>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/change_password.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn btn-outline-success mx-2">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn btn-outline-danger">Delete Admin</a>
                                    </td>
                                </tr>

                                <?php
                                }                               
                            } else {
                                
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>
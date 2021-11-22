<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Category</h1>

            <!-- add admin -->
            <a href="add_category.php" class="btn btn-outline-primary mb-4 float-right">Add Category</a>

            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['remove'])) {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if (isset($_SESSION['not_category'])) {
                    echo $_SESSION['not_category'];
                    unset($_SESSION['not_category']);
                }

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if (isset($_SESSION['remove_old_image'])) {
                    echo $_SESSION['remove_old_image'];
                    unset($_SESSION['remove_old_image']);
                }
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Active</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $n++; ?></th>
                                        <td><?php echo $title; ?></td>

                                        <td>
                                            <?php
                                                if ($image_name != "") {
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="rounded img-thumbnail" style="width: 100px; height: 100px;">
                                                    <?php
                                                } else {
                                                    echo "Image not found";
                                                }
                                            ?>                                   
                                        </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-outline-success">Update Category</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-outline-danger ml-2">Delete Category</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="6"><div class="text-danger">No Category Added.</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>
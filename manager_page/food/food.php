<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">

            <h1 class="text-center primary-color mt-3">List of Food</h1>

            <!-- Button add Food -->           
            <div class="text-center">
                <a href="add_food.php" class="btn btn__login w-25 mb-2 mt-2">Create New Food</a>
            </div>

            <!-- Display session -->
            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['unauthorized'])) {
                    echo $_SESSION['unauthorized'];
                    unset($_SESSION['unauthorized']);
                }

                if (isset($_SESSION['remove'])) {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if (isset($_SESSION['not_food'])) {
                    echo $_SESSION['not_food'];
                    unset($_SESSION['not_food']);
                }

                if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if (isset($_SESSION['remove_old_image'])) {
                    echo $_SESSION['remove_old_image'];
                    unset($_SESSION['remove_old_image']);
                }
                
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center">Featured</th>
                        <th scope="col" class="text-center">Active</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all food from db
                        $sql = "SELECT * FROM food";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            // 2. Get each food
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $category_id = $row['category_id'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <!-- 3. Display each food -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $title; ?></td>
                                        <td class="text-center"><?php echo "$".$price; ?></td>

                                        <td class="text-center">
                                            <?php
                                                if ($image_name != "") {
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-thumbnail" style="width: 100px; height: 100px;">
                                                    <?php
                                                } else {
                                                    echo "Image not found";
                                                }
                                            ?>                                   
                                        </td>

                                        <?php
                                            // Display category of food
                                            $sql2 = "SELECT * FROM category WHERE id = $category_id";
                                            $res2 = mysqli_query($connection, $sql2);
                                            $count2 = mysqli_num_rows($res2);
                                            if ($count2 > 0) {
                                                while ($row2 = mysqli_fetch_assoc($res2)) {
                                                    $title_category = $row2['title'];
                                                    ?>
                                                        <td class="text-center"><?php echo $title_category; ?></td>
                                                    <?php
                                                }
                                            } else {

                                            }
                                        ?>

                                        <td class="text-center"><?php echo $featured; ?></td>
                                        <td class="text-center"><?php echo $active; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/food/update_food.php?id=<?php echo $id; ?>" class="btn btn-outline-success">Update</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/food/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-outline-danger ml-2">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="8"><div class="text-danger">No Food Added.</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('../partials/footer.php');
?>
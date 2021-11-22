<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Update Category</h1>

            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // SQL Query
                    $sql = "SELECT * FROM category WHERE id=$id";
                    $res = mysqli_query($connection, $sql);

                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        $row = mysqli_fetch_assoc($res);

                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    } else {
                        $_SESSION['not_category'] = "<h3 class='text-danger text-center'> Category NOT Found! </h3>";
                        header("location:".SITEURL."admin/category.php");
                    }
                } else {
                    header("location:".SITEURL."admin/category.php");
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="title">Title:</label>
                    <input type="text" class="col-md-7 form-control" id="title" name="title" value="<?php echo $title; ?>">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label">Current Image:</label>
                    <?php
                        if ($current_image != "") {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" class="rounded img-thumbnail" style="width: 200px; height: 100px;">
                            <?php
                        } else {
                            echo "<h3 class='text-danger text-center'> Image not added! </h3>";
                        }
                    ?>
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="image">Select New Image:</label>
                    <input type="file" class="" id="image" name="image">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label">Featured:</label>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" class="ml-3" name="featured" value="No"> No
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label">Active:</label>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" class="ml-3" name="active" value="No"> No
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-md-7">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
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
        // 1. Get data from Form
        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // 2. Update New Image if selected
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];

            if ($image_name != "") {
                // 1. Upload New Image
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Category_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;

                // 2. Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) {
                    $_SESSION['upload'] = "<h3 class='text-danger text-center'> Image upload failed! </h3>"; //display message
                    header("location:".SITEURL."admin/category.php");
                    die();
                }

                // 3. Remove Old Image
                if ($current_image != "") {
                    $path = "../images/category/".$current_image;
                    $remove = unlink($path);

                    if ($remove == FALSE) { // failed to delete image
                        $_SESSION['remove_old_image'] = "<h3 class='text-danger text-center'> Category Image change FAILED! </h3>"; //display message
                        header("location:".SITEURL."admin/category.php");
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }

        // 3. SQL Query
        $sql2 = "UPDATE category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
        WHERE id = $id
        ";

        $res2 = mysqli_query($connection, $sql2);

        if ($res2 == TRUE) {
            $_SESSION['update'] = "<h3 class='text-success text-center'> Category updated successfully! </h3>"; //display message
            header("location:".SITEURL."admin/category.php");
        } else {
            $_SESSION['update'] = "<h3 class='text-danger text-center'> Category updated failed! </h3>"; //display message
            header("location:".SITEURL."admin/category.php");
        }
    }
?>
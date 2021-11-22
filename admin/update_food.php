<?php
    include('partials/header.php');
?>

    <!-- content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Update Food</h1>

            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // SQL Query
                    $sql2 = "SELECT * FROM food WHERE id=$id";
                    $res2 = mysqli_query($connection, $sql2);

                    $count2 = mysqli_num_rows($res2);
                    if ($count2 == 1) {
                        $row2 = mysqli_fetch_assoc($res2);

                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $current_image = $row2['image_name'];
                        $current_category = $row2['category_id'];
                        $featured = $row2['featured'];
                        $active = $row2['active'];
                    } else {
                        $_SESSION['not_food'] = "<h3 class='text-danger text-center'> Food NOT Found! </h3>";
                        header("location:".SITEURL."admin/food.php");
                    }
                } else {
                    header("location:".SITEURL."admin/food.php");
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="title">Title:</label>
                    <input type="text" class="col-md-7 form-control" id="title" name="title" value="<?php echo $title; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="description">Description:</label>
                    <textarea class="col-md-7 form-control" name="description" id="description" rows="3"><?php echo $description; ?></textarea>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="price">Price:</label>
                    <input type="number" class="col-md-7 form-control" id="price" name="price" value="<?php echo $price; ?>">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label">Current Image:</label>
                    <?php
                        if ($current_image != "") {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" class="rounded img-thumbnail" style="width: 200px; height: 100px;">
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

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="category">Category:</label>
                    <select name="category" id="category" class="col-md-7 form-control">
                        <?php
                            // 1. SQL to get category from db
                            $sql = "SELECT * FROM category WHERE active='Yes'";
                            $res = mysqli_query($connection, $sql);

                            // 2. Display in select category
                            // count rows to check category existed or not
                            $count = mysqli_num_rows($res);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    // get information of category
                                    $category_id = $row['id'];
                                    $category_title = $row['title'];

                                    ?>
                                        <option <?php if($category_id == $current_category) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                    <option value="0">No Category Found</option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="featured">Featured:</label>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" class="" id="featured" name="featured" value="Yes"> Yes
                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" class="ml-3" id="featured" name="featured" value="No"> No
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="active">Active:</label>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" class="" id="active" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" class="ml-3" id="active" name="active" value="No"> No
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
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // 2. Update New Image if selected
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];

            if ($image_name != "") {
                // 1. Upload New Image
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Food_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/".$image_name;

                // 2. Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) {
                    $_SESSION['upload'] = "<h3 class='text-danger text-center'> Image upload failed! </h3>"; //display message
                    header("location:".SITEURL."admin/food.php");
                    die();
                }

                // 3. Remove Old Image
                if ($current_image != "") {
                    $path = "../images/food/".$current_image;
                    $remove = unlink($path);

                    if ($remove == FALSE) { // failed to delete image
                        $_SESSION['remove_old_image'] = "<h3 class='text-danger text-center'> Category Image change FAILED! </h3>"; //display message
                        header("location:".SITEURL."admin/food.php");
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
        $sql3 = "UPDATE food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
        WHERE id = $id
        ";

        $res3 = mysqli_query($connection, $sql3);

        if ($res3 == TRUE) {
            $_SESSION['update'] = "<h3 class='text-success text-center'> Food updated successfully! </h3>"; //display message
            echo("<script>location.href = '".SITEURL."admin/food.php';</script>");
        } else {
            $_SESSION['update'] = "<h3 class='text-danger text-center'> Food updated failed! </h3>"; //display message
            echo("<script>location.href = '".SITEURL."admin/food.php';</script>");
        }
    }
?>
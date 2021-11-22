<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Add Category</h1>

            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="title">Title:</label>
                    <input type="text" class="col-md-7 form-control" id="title" name="title" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your category title'" placeholder="Enter your category title">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="image">Select Image:</label>
                    <input type="file" class="" id="image" name="image">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="featured">Featured:</label>
                    <input type="radio" class="" id="featured" name="featured" value="Yes"> Yes
                    <input type="radio" class="ml-3" id="featured" name="featured" value="No"> No
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="active">Active:</label>
                    <input type="radio" class="" id="active" name="active" value="Yes"> Yes
                    <input type="radio" class="ml-3" id="active" name="active" value="No"> No
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
        // 1. Get data from Form
        $title = $_POST['title'];

        if (isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        } else {
            $featured = "No";
        }

        if (isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = "No";
        }

        if (isset($_FILES['image']['name'])) { // Check image selected or not
            // 1. To upload image, need image name, source path and destination
            $image_name = $_FILES['image']['name'];
            if ($image_name != "") {
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Category_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;

                // 2. Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) {
                    $_SESSION['upload'] = "<h3 class='text-danger text-center'> Image upload failed! </h3>"; //display message
                    header("location:".SITEURL."admin/add_category.php");
                    die();
                }
            }
        } else {
            $image_name = "";
        }

        // 2. SQL Query to insert category to db
        $sql = "INSERT INTO category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
        ";

        // 3. Execute SQL to save category in db
        $res = mysqli_query($connection, $sql);

        // 4. Check SQL executed or not
        if ($res == TRUE) {
            $_SESSION['add'] = "<h3 class='text-success text-center'> Category added successfully! </h3>"; //display message
            header("location:".SITEURL."admin/category.php");
        } else {
            $_SESSION['add'] = "<h3 class='text-danger text-center'> Category added failed! </h3>"; //display message
            header("location:".SITEURL."admin/add_category.php");
        }
    }
?>
<?php
    include('partials/header.php');
?>
    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Add Food</h1>

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
                    <input type="text" class="col-md-7 form-control" id="title" name="title" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your food title'" placeholder="Enter your food title">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="description">Description:</label>
                    <textarea class="col-md-7 form-control" name="description" id="description" rows="5" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your food description'" placeholder="Enter your food description"></textarea>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="price">Price:</label>
                    <input type="number" class="col-md-7 form-control" id="price" name="price" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your food price'" placeholder="Enter your food price">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <label class="col-md-3 text-right col-form-label" for="image">Select Image:</label>
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
                                    $id = $row['id'];
                                    $title = $row['title'];

                                    ?>
                                        <option value="<?php echo $id ?>"><?php echo $title ?></option>
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
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

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
        
        // 1.1 Upload image
        if (isset($_FILES['image']['name'])) { // Check image selected or not
            // 1. To upload image, need image name, source path and destination
            $image_name = $_FILES['image']['name'];
            if ($image_name != "") {
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Food_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/".$image_name;

                // 2. Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) { // image upload failed
                    $_SESSION['upload'] = "<h3 class='text-danger text-center'> Image upload failed! </h3>"; //display message
                    header("location:".SITEURL."admin/add_food.php");
                    die();
                }
            }
        } else {
            $image_name = "";
        }

        // 2. SQL Query to insert food to db
            // number don't need ''
        $sql2 = "INSERT INTO food SET
            title = '$title',
            description = '$description',
            price = $price,                 
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
        "; 

        // 3. Execute SQL to save food in db
        $res2 = mysqli_query($connection, $sql2);

        // 4. Check SQL executed or not
        if ($res == TRUE) {
            $_SESSION['add'] = "<h3 class='text-success text-center'> Food added successfully! </h3>"; //display message
            // header("location:".SITEURL."admin/food.php");
            echo("<script>location.href = '".SITEURL."admin/food.php';</script>");
        } else {
            $_SESSION['add'] = "<h3 class='text-danger text-center'> Food added failed! </h3>"; //display message
            // header("location:".SITEURL."admin/add_food.php");
            echo("<script>location.href = '".SITEURL."admin/add_food.php';</script>");
        }
    }
?>
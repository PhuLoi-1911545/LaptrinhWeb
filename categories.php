<?php
    include('partials_front/header.php');
?>
<<<<<<< Updated upstream
    <!-- <p style="margin-top: 190px;"></p> -->
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
=======
    <!-- 1. Background -->
    <section class="food-search img-categories text-center"></section>
>>>>>>> Stashed changes

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
<<<<<<< Updated upstream
            <h2 class="text-center">Explore Foods</h2>

            <?php
                // 1. SQL to display categories from db
                $sql = "SELECT * FROM category WHERE active='Yes'";
                $res = mysqli_query($connection, $sql);

                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if ($image_name != "") {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve img_category">
                                            <?php
                                        } else {
                                            echo "<h3 class='text-danger text-center'> Image not availables! </h3>"; 
                                        }
                                    ?>

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>
                        <?php
=======
            <h2 class="text-center info-text-1 text-dark mb-5">Categories</h2>

            <div class="row d-flex">
                <?php
                    // 1. SQL to display categories from db
                    $sql = "SELECT * FROM category WHERE active='Yes'";
                    $res = mysqli_query($connection, $sql);

                    $count = mysqli_num_rows($res);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];

                            ?>
                                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>" class="col-md-4 mt-3">
                                    <div class="float-container text-center">
                                        <?php
                                            if ($image_name != "") {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/categories/<?php echo $image_name; ?>" class="img-responsive img_category">
                                                <?php
                                            } else {
                                                echo "<h3 class='text-danger text-center'> Image not availables! </h3>"; 
                                            }
                                        ?>

                                        <h3 class="categories__title text-white"><?php echo $title; ?></h3>
                                    </div>
                                </a>
                            <?php
                        }
                    } else {
                        echo "<h3 class='text-danger text-center'> Category not added! </h3>"; 
>>>>>>> Stashed changes
                    }
                } else {
                    echo "<h3 class='text-danger text-center'> Category not added! </h3>"; 
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php
    include('partials_front/footer.php');
?>
<?php
    include('partials_front/header.php');
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['order'])) {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                // 1. SQL to display categories from db
                $sql = "SELECT * FROM category WHERE featured='Yes' AND active='Yes' LIMIT 3";
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
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                            <?php
                                        } else {
                                            echo "<h3 class='text-danger text-center'> Image not availables! </h3>"; 
                                        }
                                    ?>

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>
                        <?php
                    }
                } else {
                    echo "<h3 class='text-danger text-center'> Category not added! </h3>"; 
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Best Selling</h2>

            <?php
                $sql2 = "SELECT * FROM food WHERE featured='Yes' AND active='Yes' LIMIT 6";
                $res2 = mysqli_query($connection, $sql2);

                $count2 = mysqli_num_rows($res2);

                if ($count2 > 0) {
                    while ($row2 = mysqli_fetch_assoc($res2)) {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $image_name = $row2['image_name'];

                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if ($image_name != "") {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                            <?php
                                        } else {
                                            echo "<h3 class='text-danger text-center'> Image not availables! </h3>"; 
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo "$".$price; ?></p>
                                    <p class="food-detail"><?php echo $description; ?></p>
                                    <br>

                                    <a href="
                                        <?php
                                            if (!isset($_SESSION['user'])) {
                                                $_SESSION['not_login'] = "<h6 class='text-danger'> LOGIN to ORDER Food! </h6>";
                                                echo SITEURL; ?>user_page/login.php<?php 
                                            } else {
                                                echo SITEURL; ?>order.php?food_id=<?php echo $id;
                                            }
                                        ?>
                                    " class="btn btn-primary">Order Now</a>

                                    <?php
                                        if (isset($_SESSION['user'])) {
                                            ?>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="title" value="<?php echo $title; ?>">
                                                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                                                    <input type="hidden" name="image_name" value="<?php echo $image_name; ?>">
                                                    <input type="number" name="quantity" value="1">
                                                    <input type="submit" value="Add to Cart" name="add_to_cart">
                                                </form>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    echo "<h3 class='text-danger text-center'> Food not availables! </h3>"; 
                }
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php?>">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include('partials_front/footer.php');
?>

<!-- Program -->
<?php
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $cart_array_id = array_column($_SESSION['cart'], "id");
            
            if (!in_array($_POST['id'], $cart_array_id)) {
                $count = count($_SESSION['cart']);
                $cart_array = array(
                    'id'            => $_POST['id'],
                    'title'         => $_POST['title'],
                    'quantity'      => $_POST['quantity'],
                    'price'         => $_POST['price'],
                    'image_name'    => $_POST['image_name']
                );
                $_SESSION['cart'][$count] = $cart_array;
            } else {
                echo "<script>alert('Item already added')</script>";
                echo("<script>location.href = '".SITEURL."';</script>");
            }
        } else {
            $cart_array = array(
                'id'            => $_POST['id'],
                'title'         => $_POST['title'],
                'quantity'      => $_POST['quantity'],
                'price'         => $_POST['price'],
                'image_name'    => $_POST['image_name']
            );
            $_SESSION['cart'][0] = $cart_array;
        }       
    }
?>
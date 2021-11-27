<?php
    include('partials_front/header.php');
?>
    <!-- 1. Search -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required class="pl-5">
                <input type="submit" name="submit" value="Search" class="btn btn__login btn__login-primary w-25">
            </form>
        </div>
    </section>

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

    <!-- 2. Info -->
    <section class="info">
        <div class="container info-text d-flex flex-column justify-content-center">
            <h1 class="info-text-1 mb-5">ABOUT</h1>
            <h2 class="info-text-2 d-flex justify-content-center"> Family-Owned &amp; Operated</h2>
            <div class="d-flex justify-content-center">
                <hr class="yline">
            </div>            
            <p class="info-text-3 mt-4"> VT2L was founded in 2021 in order to serve the​&nbsp;Bach Khoa community. Whether you’re looking to place a small order or need to fill the bellies of a large group, we have a variety of options for you to choose from. We understand that each customer has their own unique tastes and cravings, which is why we always customize our packages to satisfy each and every need.</p>
        </div>
    </section>

    <!-- 3. Categories -->
    <section class="categories-home">
        <div class="container">
            <h2 class="text-center info-text-1 text-dark mb-5">Explore Foods</h2>

            <div class="row d-flex">
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
                                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>" class="col-md-4 mt-3">
                                    <div class="float-container text-center">
                                        <?php
                                            if ($image_name != "") {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img_category">
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
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- 4. Food -->
    <section class="food-home">
        <div class="container">
            <h2 class="text-center info-text-1 text-dark mb-5">Best Selling</h2>

            <div class="row">
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
                                <div class="col-md-6">
                                    <div class="food-menu-box">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <?php
                                                    if ($image_name != "") {
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve h-100 img__food">
                                                        <?php
                                                    } else {
                                                        echo "<h3 class='text-danger text-center'> Image not availables! </h3>"; 
                                                    }
                                                ?>
                                            </div>

                                            <div class="col-md-8 d-flex flex-column justify-content-center my-3">
                                                <h4 class="mb-0"><?php echo $title; ?></h4>
                                                <p class="m-0 mb-3 food-detail"><?php echo $description; ?></p>
                                                <p class="m-0">Price: <?php echo "$".$price; ?></p>                                              
                                                <?php
                                                    if (isset($_SESSION['user'])) {
                                                        ?>
                                                            <form action="" method="POST" class="mt-2">
                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                <input type="hidden" name="title" value="<?php echo $title; ?>">
                                                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                                                <input type="hidden" name="image_name" value="<?php echo $image_name; ?>">
                                                                <input class="form__input w-25 pl-3 rounded" type="number" name="quantity" value="1">
                                                                <input class="btn btn__login btn__login-primary w-50 ml-2 rounded" type="submit" value="Add to Cart" name="add_to_cart">
                                                            </form>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <a href="
                                            <?php
                                                if (!isset($_SESSION['user'])) {
                                                    $_SESSION['not_login'] = "<h6 class='text-danger'> LOGIN to ORDER Food! </h6>";
                                                    echo SITEURL; ?>user_page/login.php<?php 
                                                } else {
                                                    echo SITEURL; ?>order.php?food_id=<?php echo $id;
                                                }
                                            ?>
                                        " class="btn btn__login btn__login-primary btn__order">Order Now
                                        </a>
                                    </div>
                                </div>
                            <?php
                        }
                    } else {
                        echo "<h3 class='text-danger text-center'> Food not availables! </h3>"; 
                    }
                ?>
            </div>

            <p class="text-center mt-5">
                <a href="<?php echo SITEURL; ?>foods.php?>">See All Foods</a>
            </p>
        </div>
      
    </section>

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
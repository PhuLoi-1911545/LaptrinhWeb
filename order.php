<?php
    include('partials_front/header.php');
?>

<?php
    if (isset($_GET['food_id'])) {
        $food_id = $_GET['food_id'];

        // get detail
        $sql = "SELECT * FROM food WHERE id=$food_id";
        $res = mysqli_query($connection, $sql);

        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);
            
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        } else {
            header('location:'.SITEURL);
        }
    } else {
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

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
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <div class="order-label">Note</div>
                    <textarea name="note" rows="3" placeholder="E.g. Note" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php
    include('partials_front/footer.php');
?>

<!-- process -->
<?php
    if (isset($_POST['submit'])) {
        // 1. Get data from Form
        $food = $_POST['food'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];
        $total = $price * $quantity;
        $order_date = date("Y-m-d h:i:sa"); // get current date and time
        $status = "Ordered"; // orderred, on delivery, delivered, cancelled
        $customer_name = $_POST['full_name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];
        $note = $_POST['note'];

        // 2. SQL to save data in db
        $sql2 = "INSERT INTO food_order SET
            food = '$food',
            price = '$price',
            quantity = '$quantity',
            total = '$total',
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address',
            note = '$note'
        ";
        $res2 = mysqli_query($connection, $sql2);

        if ($res2 == TRUE) {
            $_SESSION['order'] = "<h3 class='text-success text-center'> Food ordered successfully! </h3>"; //display message
            echo("<script>location.href = '".SITEURL."';</script>");
        } else {
            $_SESSION['order'] = "<h3 class='text-danger text-center'> Failed to order Food! </h3>"; //display message
            echo("<script>location.href = '".SITEURL."';</script>");
        }
    }
?>
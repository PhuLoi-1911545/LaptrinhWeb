<?php
    include('partials/header.php');
?>
    <!-- content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Update Order</h1>

            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM food_order WHERE id=$id";
                    $res = mysqli_query($connection, $sql);

                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        $row = mysqli_fetch_assoc($res);

                        $food = $row['food'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                    } else {
                        $_SESSION['not_order'] = "<h3 class='text-danger text-center'> Order NOT Found! </h3>";
                        header("location:".SITEURL."admin/order.php");
                    }
                } else {
                    header("location:".SITEURL."admin/order.php");
                }
            ?>

            <form action="" method="POST">
                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label">Food Name:</label>
                    <div class="col-md-7 form-control"><?php echo $food; ?></div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label">Price:</label>
                    <div class="col-md-7 form-control"><?php echo $price; ?></div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="quantity">Quantity:</label>
                    <input type="number" class="col-md-7 form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="status">Status:</label>
                    <select name="status" id="status" class="col-md-7 form-control">
                        <option <?php if($status=="Ordered") {echo "selected";} ?> value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivery") {echo "selected";} ?> value="On Delivery">On Delivery</option>
                        <option <?php if($status=="Delivered") {echo "selected";} ?> value="Delivered">Delivered</option>
                        <option <?php if($status=="Cancelled") {echo "selected";} ?> value="Cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="customer_name">Customer_name:</label>
                    <input type="text" class="col-md-7 form-control" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="customer_contact">Customer_contact:</label>
                    <input type="text" class="col-md-7 form-control" id="customer_contact" name="customer_contact" value="<?php echo $customer_contact; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="customer_email">Customer_email:</label>
                    <input type="text" class="col-md-7 form-control" id="customer_email" name="customer_email" value="<?php echo $customer_email; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 text-right col-form-label" for="customer_address">Customer_address:</label>
                    <input type="text" class="col-md-7 form-control" id="customer_address" name="customer_address" value="<?php echo $customer_address; ?>">
                </div>

                <div class="form-group row">
                    <div class="offset-3 col-md-7">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
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
        $id = $_POST['id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $total = $price * $quantity;
        $status = $_POST['status'];
        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        $sql2 = "UPDATE food_order SET
            quantity = '$quantity',
            total = '$total',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
        WHERE id=$id
        ";

        $res2 = mysqli_query($connection, $sql2);

        if ($res2 == TRUE) {
            $_SESSION['update'] = "<h3 class='text-success text-center'> Order updated successfully! </h3>"; //display message
            echo("<script>location.href = '".SITEURL."admin/order.php';</script>");
        } else {
            $_SESSION['update'] = "<h3 class='text-danger text-center'> Order updated failed! </h3>"; //display message
            echo("<script>location.href = '".SITEURL."admin/order.php';</script>");
        }
    } 
?>
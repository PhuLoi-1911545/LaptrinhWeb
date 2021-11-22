<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Order</h1>

            <?php
                if (isset($_SESSION['not_order'])) {
                    echo $_SESSION['not_order'];
                    unset($_SESSION['not_order']);
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
                    <th scope="col" class="text-center">Food</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Total</th>
                    <th scope="col" class="text-center">Order_date</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Customer Name</th>
                    <th scope="col" class="text-center">Customer Contact</th>
                    <th scope="col" class="text-center">Customer Email</th>
                    <th scope="col" class="text-center">Customer Address</th>
                    <th scope="col" class="text-center">Operation</th>
                </tr>
            </thead>
                <tbody>

                    <?php
                        $sql = "SELECT * FROM food_order ORDER BY id DESC";
                        $res = mysqli_query($connection, $sql);
                        
                        $n = 1;

                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $n++; ?></th>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                if ($status == "Ordered") {
                                                    echo "<label>$status</label>";
                                                }
                                                else if ($status == "On Delivery") {
                                                    echo "<label class='text-warning'>$status</label>";
                                                }
                                                else if ($status == "Delivered") {
                                                    echo "<label class='text-success'>$status</label>";
                                                }
                                                else if ($status == "Cancelled") {
                                                    echo "<label class='text-danger'>$status</label>";
                                                } 
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update_order.php?id=<?php echo $id; ?>" class="btn btn-outline-success">Update Order</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="12"><div class="text-danger">No Order</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>
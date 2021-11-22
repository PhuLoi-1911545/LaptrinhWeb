<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1>Dashboard</h1>

            <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>

            <div class="row">
                <div class="col-md-3 py-3 text-center">
                    <?php
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($connection, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    Category
                </div>

                <div class="col-md-3 py-3 text-center">
                    <?php
                        $sql2 = "SELECT * FROM food";
                        $res2 = mysqli_query($connection, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    Food
                </div>

                <div class="col-md-3 py-3 text-center">
                    <?php
                        $sql3 = "SELECT * FROM food_order";
                        $res3 = mysqli_query($connection, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1><?php echo $count3; ?></h1>
                    Total Order
                </div>

                <div class="col-md-3 py-3 text-center">
                    <?php
                        $sql4 = "SELECT SUM(total) AS Total FROM food_order WHERE status='Delivered'";
                        $res4 = mysqli_query($connection, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        $total_revenue = $row4['Total'];
                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    Revenue generated
                </div>
            </div>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>
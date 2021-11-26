<?php
    include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="0" >
    <!-- Navbar Section Starts Here -->
    <section class="navbar navbar-expand-sm  fixed-top">
        <div class="container navbar-choose">
            <div class="logo">
                <!-- <a href="<?php echo SITEURL; ?>" title="Logo"> -->
                <a class="navbar-brand" >
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>

                    <?php
                        if (isset($_SESSION['manager'])) {
                            ?>
                                <li>
                                    <a href="<?php echo SITEURL; ?>manager_page/">Manager</a>
                                </li>
                            <?php
                        }
                    ?>

                    
                    <li>
                        <?php
                            if (!isset($_SESSION['user'])) {
                                ?>
                                    <a href="<?php echo SITEURL; ?>user_page/login.php">Login</a>
                                <?php
                            } else { 
                                // Get ID user
                                $username = $_SESSION['user'];
                                $sql = "SELECT * FROM users WHERE username = '$username'";
                                $res = mysqli_query($connection, $sql);
                                $count = mysqli_num_rows($res);
                                if ($count == 1) {
                                    $row = mysqli_fetch_assoc($res);
                                    $id = $row['id'];                                  
                                }
                                
                                ?>
                                    <a href="<?php echo SITEURL; ?>user_page/user.php?id=<?php echo $id; ?>">Personal</a></li>
                                    <li><a href="<?php echo SITEURL; ?>cart.php">Cart</a></li>
                                    <li> <a href="<?php echo SITEURL; ?>user_page/logout.php">Logout</a>
                                <?php
                            }
                        ?>
                        
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

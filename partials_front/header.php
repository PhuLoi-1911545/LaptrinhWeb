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
    <!-- Navbar -->
    <section class="header__navbar fixed-top p-0">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="">
                <a class="navbar-brand" href="<?php echo SITEURL; ?>">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive w-75">
                </a>
            </div>

            <div class="menu d-flex">
                <div>
                    <a <?php if($_SERVER['SCRIPT_NAME']=="/assignmentWEB/index.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>">Home</a>
                </div>
                <div>
                    <a <?php if($_SERVER['SCRIPT_NAME']=="/assignmentWEB/categories.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>categories.php">Categories</a>
                </div>
                <div>
                    <a <?php if($_SERVER['SCRIPT_NAME']=="/assignmentWEB/foods.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>foods.php">Foods</a>
                </div>

                <?php
                    if (isset($_SESSION['manager'])) {
                        ?>
                            <div>
                                <a href="<?php echo SITEURL; ?>manager_page/" class="navbar__item">Manager</a>
                            </div>
                        <?php
                    }
                ?>

                
                <div>
                    <?php
                        if (!isset($_SESSION['user'])) {
                            ?>
                                <a href="<?php echo SITEURL; ?>user_page/login.php" class="navbar__item">Login</a>
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
                                <a href="<?php echo SITEURL; ?>user_page/user.php?id=<?php echo $id; ?>" class="navbar__item">Personal</a></div>
                                <div><a href="<?php echo SITEURL; ?>cart.php" class="navbar__item">Cart</a></div>
                                <div><a href="<?php echo SITEURL; ?>user_page/logout.php" class="navbar__item">Logout</a>
                            <?php
                        }
                    ?>                  
                </div>
            </div>

            <!-- <div class="clearfix"></div> -->
        </div>
    </section>
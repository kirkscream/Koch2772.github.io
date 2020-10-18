<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="styles/log_in.css">
</head>

<body>
<?php include "inc/dbconn.inc.php";
$stat = status();
?>

<div id="menucontainer">
    <ul id="menu">
        <li><a href="categories.php" id="menuCat">Categories</a></li>
        <li><a href="FAQ.php" id="menuFAQ">FAQ</a></li>
        <li><a href="aboutus.php" id="menuAbout">About us</a></li>
        <span>
            <li>
                <!-- UPDATES THE CART TOTAL/COST ON MENU
                    BASED OFF CURRENT USER -->
                <?php require_once "db_functions.php";
                $cartTotal = update_cart_total($conn);
                $cartCost = update_cart_cost($conn);
                if($cartTotal != false && $cartCost != false) { ?>
                    <a href="#" id="carttotal"><?php echo $cartTotal; ?> 
                            <?php 
                                if($cartTotal > 1) {
                                    echo "ITEMS | ";
                                } else {
                                    echo "ITEM | ";
                                } ?> $<?php echo $cartCost; ?></a>
                    <?php 
                        echo mysqli_error($conn);
                        mysqli_close($conn);
                } else { ?>
                    <a href="#" id="carttotal">? ITEM | $??</a>
                <?php }

                ?>

                <a href="#" id="carttext">View Cart /</a>
                <a href="#" id="carttext">Checkout</a>
            </li>
            <i class="fa fa-shopping-cart" style="font-size:32px;color:purple"></i>
        </span>
        <div>
            <li><a href="Loginpage.html" id="menuLogin">Login /</a><a href="Logout.php" id="menuLogin">Logout</a></li>
            <li class="menuStat">Status: </li><span class="dolstat"><?php echo $stat ?></span>
        </div>
    </ul>
</div>
<!-- noyesl drumk1t - 0010 -->
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kochanski Group - T Temby, J Gibson, B Gray, P Chu" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <title>Menu</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include "inc/dbconn.inc.php";
require_once "db_functions.php";
$stat = status();
?>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" id="closebtn" onclick="closeNav()">×</a>
  <?php 
  $results = get_cart($conn);

  foreach ($results as $row ) { ?>
    <div class="cart-container">
        <div class="cart"><?php echo $row['productName']; ?> | 
        <a href="javascript:void(0)" id="removebtn" onclick="remove_item($conn, $row['stockNum'])">Remove</a></div>
        <span class="cart">ID: <?php echo $row['stockNum']; ?></span>
        <div class="cart">Cost: <?php echo $row['unitCost']; ?></div>
        <span class="cart">Quantity: <?php echo $row['qty']; ?></span>
        <span class="cart"> | Total: $<?php echo $row['totalCost']; ?></span>
      </div>
      <?php } ?>
</div>


<div id="menucontainer">
    <ul id="menu">
        <li><a href="categories.php" id="menuCat">Categories</a></li>
        <li><a href="FAQ.php" id="menuFAQ">FAQ</a></li>
        <li><a href="aboutus.php" id="menuAbout">About us</a></li>
        <span>
            <li>
                <!-- UPDATES THE CART TOTAL/COST ON MENU
                    BASED OFF CURRENT USER -->
                <?php 
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
                } else { ?>
                    <a href="#" id="carttotal">? ITEM | $??</a>
                <?php } 
                mysqli_close($conn);?>

                <a href="#" id="carttext" onclick="openNav()">View Cart /</a>
                <a href="#" id="carttext">Checkout</a>
            </li>
            <i class="fa fa-shopping-cart" style="font-size:32px;color:purple"></i>
        </span>
        <div>
            <li><a href="Loginpage.html" id="menuLogin">Login /</a><a href="Logout.php" id="menuLogin">Logout</a></li>
            <li class="menuStat">Status: </li><span class="dolstat"><?php 
                                    if ($_SESSION["loggedin"]) {
                                        echo $stat; echo $_SESSION["username"]; ?></span> <?php
                                    } else {
                                        echo $stat; ?></span> <?php
                                    } ?>
        </div>
    </ul>
</div>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>
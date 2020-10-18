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
<?php require_once "inc/dbconn.inc.php";
$stat = status();
?>

<div id="menucontainer">
    <ul id="menu">
        <li><a href="categories.php" id="menuCat">Categories</a></li>
        <li><a href="FAQ.php" id="menuFAQ">FAQ</a></li>
        <li><a href="aboutus.php" id="menuAbout">About us</a></li>
        <span>
            <li>
                <a href="#" id="carttotal"># ITEM | $XX</a>
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

</body>
</html>
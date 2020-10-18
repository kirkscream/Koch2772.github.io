<?php

include_once 'db_functions.php';

if ($conn) {
    $stockNum = $_GET["stockNum"];
    $qty = $_GET["qty"];
    $unitCost = $_GET["unitCost"];

    if (check_qty($conn, $stockNum, $qty))) {
        add_to_cart($conn, $_SESSION["id"], $stockNum, $unitCost, $qty);
    }
    else {
        echo "Not enough qty";
    }
}
else {
    echo "Connection to database failed";
}
?>
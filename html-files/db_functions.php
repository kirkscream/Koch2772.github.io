<?php

// Function that returns the stockQty from the database of a selected item
// and checks to see if the store has sufficient product before sale
function check_qty($conn, $stockNum, $qty) {
    $query = "SELECT stockQty FROM product WHERE stockNum=?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $stockNum);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $stockQty);
        mysqli_stmt_fetch($stmt);

        if ($stockQty < $qty) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    mysqli_stmt_close($stmt);
    
    // remove error line later
    echo mysqli_error($conn);
    mysqli_close($conn);
}

// Function to add items into a cart as well as custId
function add_to_cart($conn, $custId, $stockNum, $unitCost, $qty) {
    $totalCost = $unitCost * $qty;
    $query = "INSERT INTO cart(custId, stockNum, unitcost, qty, totalCost) VALUES(?, ?, ?, ?, ?);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $custId, $stockNum, $unitCost, $qty, $totalCost);
        $outcome = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $outcome;

    } else {
        return FALSE;
    }

    // remove error line later
    echo mysqli_error($conn);
    mysqli_close($conn);
}

function update_cart_total($conn) {

    if ($_SESSION["id"]) {
        $cartTotal = 0;
        $query = "SELECT qty FROM cart WHERE custId = ?;";

        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $qty);
            while (mysqli_stmt_fetch($stmt)) {
                $cartTotal += $qty;
            }
        }

        return $cartTotal;

    } else {
        return false;
    }

}

function update_cart_cost($conn) {

    if ($_SESSION["id"]) {
        $cartCost = 0;
        $query = "SELECT totalCost FROM cart WHERE custId = ?;";

        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $totalCost);
            while (mysqli_stmt_fetch($stmt)) {
                $cartCost += $totalCost;
            }
        }

        return $cartCost;

    } else {
        return false;
    }

}

function get_cart($conn) {
    if ($_SESSION["id"]) {
        $cartCost = 0;
        $query = "SELECT product.productName, cart.stockNum, cart.unitCost, cart.qty, cart.totalCost 
                    FROM product, cart
                        WHERE product.stockNum = cart.stockNum && cart.custId = ?;";

        $stmt = mysqli_prepare($conn, $query);
        $results = array();

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $productName, $stockNum, $unitCost, $qty, $totalCost);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["productName"] = $productName;
                $row["stockNum"] = $stockNum;
                $row["unitCost"] = $unitCost;
                $row["qty"] = $qty;
                $row["totalCost"] = $totalCost;
                
                $results[] = $row;
            }
        }

        return $results;

    } else {
        return false;
    }

}

function remove_item($conn, $stockNum) {
    $query = "DELETE FROM cart WHERE custId=? && stockNum=?;";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['id'], $stockNum);
        mysqli_stmt_execute($stmt);
    }
}

?>
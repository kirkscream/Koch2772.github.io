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

?>
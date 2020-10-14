<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8" />
    <meta name="author" content="T Temby, J Gibson, Author 3, Author 4" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <script src="scripts/script.js" defer></script>
    <title>Mystic Shop</title>
  </head>
  <body>
    <div>
        <a href="index.php" id="title"><h1><b>~~ The Mystic Shop ~~</b></h1></a>
        <?php require_once "inc/menu.inc.php"; ?>

        <p>Mystic Animal Fangs</p>

        <div class="productslist">
            <div class="product-container">
                <img src="https://via.placeholder.com/100" alt="productimg">
                <div class="product-desc">

                    <?php
                    require_once "inc/dbconn.inc.php";
                    $sql = "SELECT productName, description FROM product WHERE productName = 'Basilisk fang';";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <a href="#" class="product-title"><?php echo $row["productName"]; ?></a>
                            <p><?php echo $row["description"]; ?></p>
                 <?php }
                    } 
                    echo mysqli_error($conn);
                    mysqli_close($conn); ?>

                </div> 
            </div>
        </div>

    </div>
  </body>
</html>
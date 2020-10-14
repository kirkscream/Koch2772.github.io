<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
        @font-face {
            font-family: 'Mystical';
            src: url(fonts/DsMysticora-d9dZ.ttf);
        }
    </style>
    
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8" />
    <meta name="author" content="T Temby, J Gibson, Author 3, Author 4" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <script src="scripts/script.js" defer></script>
    <title>Mystic Shop</title>
  </head>
  <body>
    <div>
        <a href="index.php" id="title"><div class="mysticfont"><h1>Mystic Shop</h1></div></h1></a>

        <!-- The menu bar html -->        
        <?php require_once "inc/menu.inc.php"; ?>


        <div class="catagory-container">
            <ul class="catagory-list">
                <li>
                    <div class="catagory-product">
                        <a href="teeth.php">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>Exotic Animal Fang's</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product">
                        <a href="#">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>Unicorn Horns</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product">
                        <a href="#">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>Phoenix Feathers</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product">
                        <a href="#">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>TEST</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product">
                        <a href="#">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>TEST</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product">
                        <a href="#">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>TEST</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product">
                        <a href="#">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>TEST</h2>
                        </a>
                    </div>
                </li>
        </div>

    </div>
  </body>
</html>

﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

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
    <div class="title">
    <div class="mysticfont">
        <!-- Website title -->        
        <a href="index.php" id="title"><div class="mysticfont"><h1>Mystic Shop</h1></div></h1></a>
    </div>

    <!-- The menu bar html -->        
    <?php require_once "inc/menu.inc.php"; ?>


    <div class="main-page-content">
        <div class="hot-items">
            <div class="mysticfont">
                 <h2>Hot Items</h2>
            </div>
            <div class="catagory-container">
            <ul class="catagory-list">
                <li>
                    <div class="catagory-product-1x4">
                        <a href="#">
                            <img src="productimages/Unicorn Horn.jpg" alt="productimg">
                            <h2>White Unicorn Horn</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product-1x4">
                        <a href="#">
                            <img src="productimages/Phoenix Feather.jpg" alt="productimg">
                            <h2>Phoenix Feather</h2>
                        </a>
                    </div>
                </li>
                
                <li>
                    <div class="catagory-product-1x4">
                        <a href="fang.php">
                            <img src="productimages/Basilisk Fang.jpg" alt="productimg">
                            <h2>Basilisk Fang</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product-1x4">
                        <a href="Categories.php">
                            <img src="productimages/BronzeDragonScales.jpg" alt="productimg">
                            <h2>Bronze Dragon Scale</h2>
                        </a>
                    </div>
                </li>
            </div>
        </div>
        <div class="categories">
            <div class="mysticfont">
                 <h2>Categories</h2>
            </div>
            <div class="catagory-container">
            <ul class="catagory-list">
                <li>
                    <div class="catagory-product-1x4">
                        <a href="teeth.php">
                            <img src="productimages/Basilisk Fang.jpg" alt="productimg">
                            <h2>Exotic Animal Fang's</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product-1x4">
                        <a href="#">
                            <img src="productimages/RainbowHorn.jpg" alt="productimg">
                            <h2>Unicorn Horns</h2>
                            <!--https://www.welchsworkshop.com/products/rainbow-5-padded-unicorn-horn-->
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product-1x4">
                        <a href="#">
                            <img src="productimages/PinkDragonScales.jpg" alt="productimg">
                            <h2>Dragon Scales</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="catagory-product-1x4">
                        <a href="Categories.php">
                            <img src="https://via.placeholder.com/300x300" alt="productimg">
                            <h2>All Categories</h2>
                        </a>
                    </div>
                </li>
            </div>
        </div>
  </body>
</html>

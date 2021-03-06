<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/shipping_styles.css">
    <style>
        @font-face {
            font-family: 'Mystical';
            src: url(fonts/DsMysticora-d9dZ.ttf);
        }
    </style>
    <meta charset="utf-8" />
    <meta name="author" content="T Temby, J Gibson, Author 3, Author 4" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <script src="scripts/script.js" defer></script>
    <title>Mystic Shop</title>
  </head>

  <body>
  
      <div class="title">
                <div class="mysticfont">
                  <h1>Mystic Shop</h1>
                </div>

        <div class="ship-submit-Detail">
              <div class = "sub-heading2">

                <h2>Shipping details are submited ! Thank you for choosing our company</h2>

              </div>

            <!--List information-->
          
            <div class="ship-submit-Detail">
              <div id="list-ship-detail">
            <?php 
                echo  "<div id = \"ship-cust-Name\">" ;
                      echo " Name : " . $_POST['shipfName'] . "&nbsp;" . $_POST['shiplName'];

                echo "</div>";

                echo "<div id =\"ship-cust-Email\">";
                
                      echo " Email : " .$_POST['shipEmail'];
                
                echo "</div>";

                echo "<div id =\"ship-cust-Address1\">";

                      echo " Address : " .$_POST['shipAddress1'];

                echo "</div>";

                echo "<div id =\"ship-cust-Address2\">";
                     
                      if(empty($_POST['shipAddress2'])){

                        echo " Second Address : N/A";

                      } else {
                                   
                        echo " Second Address : " .$_POST['shipAddress2'];
                      
                      }

                echo "</div>";

                echo "<div id =\"ship-cust-Apartment\">";

                      echo " Apartment : " .$_POST['shipApartment'];
                
                echo "</div>";

                echo "<div id =\"ship-cust-Suburb\">";

                      echo " Suberb : " .$_POST['shipSuburb'];

                echo "</div>";

                echo "<div id =\"ship-cust-Galaxy\">";

                      echo " Galaxy : " .$_POST['shipGalaxy'];

                echo "</div>";

                echo "<div id =\"ship-cust-Planet\">";

                      echo " System : " .$_POST['shipSystem'];

                echo "</div>"; 

                echo "<div id =\"ship-cust-Postcode\">";

                      echo " Postcode : " .$_POST['shipPostcode'];

                echo "</div>";

                echo "<div id =\"ship-cust-Phonenumber\">";

                      echo " Phone : " .$_POST['shipPhone'];
                echo "</div>";

              ?>
              
    </body>
    <div class="mysticfont">
            <h2>Simmilar products</h2>
    </div>
    <div class="main-page-content">
        <div class="categories">
            <div class="catagory-container">
                <ul class="catagory-list">
                <?php
                    require_once "inc/dbconn.inc.php";
                    $sql = "SELECT * FROM `product` WHERE `stockNum` LIKE '";
                    $sql .= $stockNum;
                    $sql .= "' ORDER BY `category` ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                                $tmp = $row["category"]; 
	                    }
	                }
                    $sql = "SELECT * FROM `product` WHERE `category` LIKE '";
                    $sql .= $tmp;
                    $sql .= "' ORDER BY `category` ASC";
                    $extra = 0;

                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) < 5){
                            $extra = 4 - mysqli_num_rows($result);
						}
                        if(mysqli_num_rows($result) > 0){
                            $u=0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["stockNum"] != $stockNum){
                                    echo    "<div class=\"catagory-product-1x4\">";
                                    echo        "<a href=\"#\">";
                                    echo            "<img src=\"productimages/";
                                    echo            $tmp = $row["stockNum"];
                                    echo            ".jpg\" alt=\"";
                                    echo            $row["stockNum"];
                                    echo            "\">";
                                    echo            "<h2>";
                                    echo            $row["productName"];
                                    echo            "</h2>";
                                    echo        "</a>";
                                    echo    "</div>";
                                    $u++;
                                }else{
                                    $extra++;                    
								}
                            }
	                    }
                    }

                    
                    
                    $sql = "SELECT * FROM `product` WHERE `stockNum` LIKE '%";
                    $sql .= substr($stockNum,0,4);
                    $sql .= "%'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["stockNum"] != $stockNum){
                                    echo    "<div class=\"catagory-product-1x4\">";
                                    echo        "<a href=\"#\">";
                                    echo            "<img src=\"productimages/";
                                    echo            $tmp = $row["stockNum"];
                                    echo            ".jpg\" alt=\"";
                                    echo            $row["stockNum"];
                                    echo            "\">";
                                    echo            "<h2>";
                                    echo            $row["productName"];
                                    echo            "</h2>";
                                    echo        "</a>";
                                    echo    "</div>";
                                    $extra--;
                                }
                            }
	                    }
                    }
                    mysqli_close($conn);
                ?>
                </ul>
            </div>
        </div>
    </div>
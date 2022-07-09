<?php include('login-check-admin-menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Menu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/all.min.css">
</head>
<body>

    <?php 
        
        
        include('../../constant/coneection.php');
        
        $menu_id = $_GET['menu_id'];

        //query to show data 
        $query = "SELECT * FROM tbl_menu WHERE menu_id = '$menu_id'; ";

        //execute the query
        $result = pg_query($pgcon,$query);

        while ($rows = pg_fetch_assoc($result)) {

            $menu_id = $rows['menu_id'];
            ?>

                <div class="container">
                    <div class="card">
                        <div id="shopping">
                            <i class="fas fa-cart-plus"><sup id="items-added"></sup></i>
                        </div>
                        <div class="images">
                            <h2><?php echo $rows['menu_name'] ?></h2>
                            <!-- <div class="slider"><img id="big-image" src="images/Nomos1.webp" alt=""></div> -->
                            <div class="slider">
                                <?php echo "<img src='menu-img/" . $rows['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
                            </div>
                        </div>
                        <div class="infos">
                            <h1><?php echo $rows['menu_name'] ?></h1>
                            <div class="price">
                                <h3>Price : ₹<?php echo $rows['menu_price'] ?></h3>
                            </div>
                            <div id="info-content">
                            <h2 class="choose"><b>Description</b></h2>
                                <p class="paragraph" style="display: block;"><?php echo "<i>" . $rows['menu_description'] . "</i>"; ?></p>
                                <br><br>
                                <h2><b>Active</b></h2>
                                <p><?php echo "<i>" . $rows['menu_active'] . "</i>"; ?></p>
                                        <br><br>
                                        <h2><b>Category</b></h2>
                                        <p>
                                        <?php
                                            if ($rows['category_id'] == 1) {
                                                echo "<p><i>Drink</i></p>";
                                            } elseif ($rows['category_id'] == 2) {
                                                echo "<p><i>BreakFast</i></p>";
                                            } else {
                                                echo "<p><i>Dinner</i></p>";
                                            }
                                    ?>
                                </p>
                            </div>
                            <div class="buttons">
                                <a href="update-menu.php?menu_id=<?php echo $menu_id; ?>"><button id="add-to-cart"><i class="fas fa-shopping-cart"></i>Update</button></a>
                                <a href="delete-menu.php?menu_id=<?php echo $menu_id; ?>"><button>Delete</button></a>
                                <a href="../admin-menu.php"><button>Go Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            
        }

        
    ?>

</body>
</html>

<!-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomos Watch</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/all.min.css">
</head>
<body>
    <div class="container">

        <div class="card">
            <div id="shopping">
                <i class="fas fa-cart-plus"><sup id="items-added"></sup></i>
            </div>
            <div class="images">
                <h2>NOMOS LUX Glashütte</h2>
                <div class="slider"><img id="big-image" src="images/Nomos1.webp" alt=""></div>
            </div>
            <div class="infos">
                <h1>NOMOS LUX Glashütte</h1>
                <div class="price">
                    <h3>2100$</h3>
                </div>
                <div id="more-infos">
                    <h5 class="choose">Description</h5>
                </div>
                <div id="info-content">
                    <p  class="paragraph" style="display: block;">The watch comes with the original Nomos black Cordovan Shell strap and with the original Nomos 18kt white gold tang buckle. This timepiece is sourced directly from Nomos, hence please allow one week delivery time (often within days).</p>
                </div>
                <div class="buttons">
                    <button id="add-to-cart"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
                    <button>BUY NOW</button>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>  -->
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yamifood Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
	.subscribe_form .submit {
		background-color: #d0a772;
		color: #fff;
		font-size: 16px;
		font-weight: 600;
		line-height: 50px;
		/* display: inline-block; */
		margin-left: 40%;
		padding: 0 10px;
		float: left;
		width: 20%;
		border: none;
		cursor: pointer;
		transition: all 0.5s ease-in-out;
	}
	hr{
		width: 70%;
		align-items: center;
	}
	b{
		text-align: center;
	}
	
</style>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="../images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="admin-home.php">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="admin-menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-category.php">Category</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-orders.php">Orders</a></li>
						<li class="nav-item"><a class="nav-link" href="admins.php">Admins</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-blogs.php">Blogs</a></li>
						<li class="nav-item"><a class="nav-link" href="adminlogout.php">logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Menu</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	<br>
	<!-- button to add menu -->
	<div class="subscribe_form">
		<h4>Want to Add Menu
		<?php 
			if (isset($_SESSION['menu-add'])) {
				echo "<br>" . $_SESSION['menu-add'];
				unset($_SESSION['menu-add']);
			}
		?>
		</h4>
		<a href="admin-menu/menu-add.php"><button class="submit">ADD</button></a>
	</div>

	<hr>

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
						<?php 
							if (isset($_GET['dinner'])) {
								echo '<h3><b>Dish For Dinner</b></h3>';
								unset($_GET['dinner']);
							}
							if (isset($_GET['breakfast'])) {
								echo '<h3><b>Dish For BreakFast</b></h3>';
								unset($_GET['breakfast']);
							}
							if (isset($_GET['drinks'])) {
								echo '<h3><b>Avaliable Drinks</b></h3>';
								unset($_GET['drinks']);
							}
							if (isset($_GET['all'])) {
								echo '<h3><b>All Dishes<b></h3>';
								unset($_GET['all']);
							}
						?>
					</div>
				</div>
			</div>
			<form action="" method="GET">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group">
                                <button class="active" data-filter="*" name="all">All</button>
                                <button data-filter=".drinks" name="drinks">Drinks</button>
                                <button data-filter=".lunch" name="breakfast">BrakFast</button>
                                <button data-filter=".dinner" name="dinner">Dinner</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
				
			<div class="row special-list">

                <?php 

                    include('../constant/coneection.php');

                    if (isset($_GET['dinner'])) {
                        
                        $query_dinner = "SELECT * FROM tbl_menu WHERE category_id = 3";

                        $result_dinner = pg_query($pgcon,$query_dinner);

                        while ($rows_dinner = pg_fetch_assoc($result_dinner)) {
                        
							

                            ?>

                                <div class="col-lg-4 col-md-6 special-grid dinner">
                                    <div class="gallery-single fix">
                                        <!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
                                        <?php echo "<img src='admin-menu/menu-img/" . $rows_dinner['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
                                        <div class="why-text">
                                            <h4><?php echo $rows_dinner['menu_name'] ?></h4>
											<p></p>
                                            <h5><?php echo $rows_dinner['menu_price'] ?></h5>
                                            <a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                            <a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                        }
                    } elseif (isset($_GET['breakfast'])) {
                        
                        $query_breakfast = "SELECT * FROM tbl_menu WHERE category_id = 2";

                        $result_breakfast = pg_query($pgcon,$query_breakfast);

                        while ($rows_breakfast = pg_fetch_assoc($result_breakfast)) {
                        
                            ?>

                                <div class="col-lg-4 col-md-6 special-grid breakfast">
                                    <div class="gallery-single fix">
                                        <!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
                                        <?php echo "<img src='admin-menu/menu-img/" . $rows_breakfast['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
                                        <div class="why-text">
                                            <h4><?php echo $rows_breakfast['menu_name'] ?></h4>
                                            <p></p>
                                            <h5><?php echo $rows_breakfast['menu_price'] ?></h5>
                                            <a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                            <a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                        }
                    } elseif (isset($_GET['drinks'])) {
                        
                        $query_drinks = "SELECT * FROM tbl_menu WHERE category_id = 1";

                        $result_drinks = pg_query($pgcon,$query_drinks);
						
						while ($rows_drinks = pg_fetch_assoc($result_drinks)) {
                        
							?>
	
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
										<?php echo "<img src='admin-menu/menu-img/" . $rows_drinks['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
										<div class="why-text">
											<h4><?php echo $rows_drinks['menu_name'] ?></h4>
											<p></p>
											<h5><?php echo $rows_drinks['menu_price'] ?></h5>
											<a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
											<a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
	
							<?php
						}
                    } else {
                        
                        $query = "SELECT * FROM tbl_menu";

                        $result = pg_query($pgcon,$query);

                        while ($rows = pg_fetch_assoc($result)) {
                        
                            ?>

                                <div class="col-lg-4 col-md-6 special-grid active">
                                    <div class="gallery-single fix">
                                        <!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
                                        <?php echo "<img src='admin-menu/menu-img/" . $rows['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
                                        <div class="why-text">
                                            <h4><?php echo $rows['menu_name'] ?></h4>
                                            <p></p>
                                            <h5><?php echo $rows['menu_price'] ?></h5>
                                            <a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                            <a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                        }
                    }
                
                ?>
				<!-- <div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="../images/img-01.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Drinks 1</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $7.79</h5>
							<a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
							<a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="../images/img-04.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Lunch 1</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $15.79</h5>
							<a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
							<a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="../images/img-07.jpg" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Dinner 1</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $25.79</h5>
							<a href="show_menu.php"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
							<a href="delete-menu.php"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
						</div>
					</div>
				</div> -->
				
			</div>
		</div>
	</div>
	<!-- End Menu -->


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="../js/jquery.superslides.min.js"></script>
	<script src="../js/images-loded.min.js"></script>
	<script src="../js/isotope.min.js"></script>
	<script src="../js/baguetteBox.min.js"></script>
	<script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>


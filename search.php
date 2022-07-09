<?php 

	session_start();
	include('constant/coneection.php');

?>

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
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/search.css"> 
    <link rel="stylesheet" href="css/style.css">       
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/customer-section.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<style>

.user-area{
    width: 50px;
    height: 50px;
    background-color: black;
    margin: 0px 10px;
    border-radius: 50%;
    border: 2px solid gray;
    overflow: hidden;
}
.user-area img{
    max-width: 100%;
    height: auto;
    object-fit: cover;
}
.user-area:hover{
    transition: all 0.5s ease-in-out;
    transform: scale(1.1);
}


.subscribe_form2 .submit2 {
	background-color: #d0a772;
	color: #fff;
	font-size: 16px;
	font-weight: 600;
	line-height: 30px;
	margin-left: 36%;
	width: 10%;
	border: none;
	cursor: pointer;
	transition: all 0.5s ease-in-out;
	border-radius: 5px;
}
.submit2:hover{
	background-color: black;
}

</style>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<?php 
					if (isset($_SESSION['customer_username'])) {
						
						$customer_username = $_SESSION['customer_username'];

						//query to select img of customer
						$query = "SELECT cust_img FROM tbl_customer WHERE cust_username = '$customer_username' ";

						//execute the query
						$result = pg_query($pgcon,$query);

						$rows = pg_fetch_assoc($result);
						?>
							<div class="user-area menu-btn">
								<!-- <img src="Background/Users/user1.png" alt="User Name"> -->
								<?php echo "<img src='customer/img/" . $rows['cust_img'] . " ' alt='User Name'>"; ?>
							</div>
							<div class="side-bar">
								<div class="close-btn">
									<i class="fas fa-times"></i>
								</div>
								<div class="menu">
									<div class="item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
									<div class="item"><a href="customer/account.php"><i class="fas fa-user"></i>Account</a></div>
									<div class="item"><a href="customer/orders.php"><i class="fas fa-shipping-fast"></i>Orders</a></div>
									<div class="item"><a href="customer/table_booking_history.php" class="sub-item"><i class="fas fa-calendar-alt"></i>Booking History</a></div>
									<div class="item">
										<a class="sub-btn"><i class="fas fa-binoculars"></i>Explore<i class="fas fa-angle-right dropdown"></i></a>
										<div class="sub-menu">
											<?php 
												$query_category ="SELECT category_name FROM tbl_category ORDER BY random() LIMIT 5";
												$result_category = pg_query($pgcon,$query_category);
												while($rows_category = pg_fetch_assoc($result_category)){
													?>
														<a href="search.php?search_item=<?php echo $rows_category['category_name'] ?>" class="sub-item"><?php echo $rows_category['category_name'] ?></a>
													<?php
												}
											?>
											<!-- <a href="#" class="sub-item">Drinks</a>
											<a href="#" class="sub-item">Dinner</a>
											<a href="#" class="sub-item">BreakFast</a>
											<a href="#" class="sub-item">Pizza</a>
											<a href="#" class="sub-item">Moms</a> -->
										</div>
									</div>
									<div class="item"><a href="logout.php" class="sub-item"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
									<!-- <div class="item">
										<a class="sub-btn"><i class="fas fa-cogs"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
										<div class="sub-menu">
											<a href="messages.php" class="sub-item">Messages</a>
											<a href="../logout.php" class="sub-item">Logout</a>
										</div>
									</div> -->
									<div class="item"><a href="about.php"><i class="fas fa-info-circle"></i>About</a></div>
								</div>
							</div>
						<?php
					}
				?>
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="reservation.php">Reservation</a>
								<a class="dropdown-item" href="stuff.php">Stuff</a>
								<a class="dropdown-item" href="gallery.php">Gallery</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="blog.php">blog</a>
								<a class="dropdown-item" href="blog-details.php">blog Single</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="login.php"><i title="signin/up" class="fas fa-sign-in-alt"></i></a></li>
						<li class="nav-item"><a class="nav-link" href="logout.php"><i title="logout" class="fas fa-sign-out-alt"></i></a></li>
						<?php 
							if (isset($_SESSION['customer_username'])) {
								?>
									<li class="nav-item"><a class="nav-link" href="cart.php"><i title="cart" class="fas fa-shopping-cart"></i></a></li>
								<?php
							}
						?>
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
					<form action="search.php" method="get">
						<div class="searchBox">
							<input class="searchInput"type="text" name="search_item" placeholder="Search what you want" required>
							<button type="submit" class="searchButton" name="search-submit" href="search.php">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					<h2>Search Result</h2>
						<!-- <h2>You Search  -->
						<!-- <span style="color: #E67451;"> -->
						<?php 
						// echo $search_item; ?> 
						<!-- </span></h2> -->
					</div>
				</div>
			</div>

			<form style="margin-left: 15%;" action="search.php" method="get">
				<h3>Serach using Filter</h3>
					<?php 
							
						include('constant/coneection.php');
						$category_res = pg_query($pgcon,"SELECT * FROM tbl_category");
						$count = 0;
						while ($cat_rows = pg_fetch_assoc($category_res)) {
							$category_id = $cat_rows['category_id'];
							$category_name = $cat_rows['category_name'];
							$category_active = $cat_rows['category_active'];

							?>

								<div style="width: 15%;" class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="category[]" id="<?php echo $category_name ?>" value="<?php echo $category_id ?>">
									<label class="form-check-label" for="<?php echo $category_name ?>"><?php echo $category_name ?></label>
								</div>

							<?php
							$count++;
							if ($count == 5) {
								echo "<br>";
								$count = 0;
							}
						}
					
					?>
					<div class="subscribe_form2">
					<input class="submit2" type="submit" value="search" name="filter-submit">
					</div>
				</form>
			
				
			<div class="row special-list">
				<?php

					if (isset($_GET['search-submit']) || isset($_GET['search_item'])) {

						include('constant/coneection.php');
						$search_item = $_GET['search_item'];
						$search_item = preg_replace("/[^A-Za-z]/i"," ",$search_item);
						
						include('constant/coneection.php');

						$query = "SELECT * FROM tbl_menu 
							WHERE category_id in (SELECT category_id FROM tbl_category WHERE category_active = 'Active') 
							AND menu_active = 'Active'
							AND menu_name LIKE '%$search_item%' 
							OR menu_description = '%$search_item%' 
							OR category_id in (SELECT category_id FROM tbl_category WHERE category_name LIKE '%$search_item%')
							ORDER BY menu_name
						";

						$result = pg_query($pgcon,$query);

						$count_all = pg_num_rows($result);
						if ($count_all > 0) {

							echo "<h4><b>Special Menu</b></h4>";
							while ($rows = pg_fetch_assoc($result)) {
								
								$menu_id = $rows['menu_id'];

								?>

									<div class="col-lg-4 col-md-6 special-grid active">
										<div class="gallery-single fix">
											<!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
											<?php echo "<img src='admin/admin-menu/menu-img/" . $rows['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
											<div class="why-text">
												<h4><?php echo $rows['menu_name'] ?></h4>
												<p></p>
												<h5>₹<?php echo $rows['menu_price'] ?></h5>
												<a href="admin-menu/show_menu.php?menu_id=<?php echo $menu_id; ?>"><i title="Details" style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
												<?php 
													if (isset($customer_username)) {
														?>
															<a style="padding: 10px;" href="manage_cart.php?menu_id=<?php echo $menu_id; ?>"><i title="Add to Cart" style="font-size: 25px;" class="fa fa-shopping-cart" aria-hidden="true" onclick="add_to_cart()"></i></a>
														<?php
													}
												?>
											</div>
										</div>
									</div>

								<?php
							}
						} else {
								
							echo "<h4><b>Menu is Not Available</b></h4>";
						}
					}

					if (isset($_GET['filter-submit'])) {
						
						include('constant/coneection.php');
						$category_id = $_GET['category'];

						if (is_array($category_id)) {
							foreach ($category_id as $value) {
								
								$result = pg_query($pgcon,"SELECT * FROM tbl_menu WHERE category_id = $value");
								$check_count = pg_num_rows($result);
								if ($check_count > 0) {
									
									while ($rows = pg_fetch_assoc($result)) {

										$menu_id = $rows['menu_id'];
	
										?>
	
											<div class="col-lg-4 col-md-6 special-grid active">
												<div class="gallery-single fix">
													<!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
													<?php echo "<img src='admin/admin-menu/menu-img/" . $rows['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
													<div class="why-text">
														<h4><?php echo $rows['menu_name'] ?></h4>
														<p></p>
														<h5>₹<?php echo $rows['menu_price'] ?></h5>
														<a href="admin-menu/show-menu1.php?menu_id=<?php echo $menu_id; ?>"><i style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
														<a href="admin-menu/delete-menu.php?menu_id=<?php echo $menu_id; ?>"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></a>
													</div>
												</div>
											</div>
	
										<?php
										
									}
								} else {

									echo "<h4><b>Menu is Not Available</b></h4>";
								}
							}
						}
				   	}
				?>
				
			</div>
			<div class="row special-list">
				<?php 
						
					if (isset($menu_id)) {
						
						//get the category of searched menu
						$rel_query = "SELECT category_id FROM tbl_menu 
							WHERE menu_id = '$menu_id';
						";
						$rel_result = pg_query($pgcon,$rel_query);
						while ($rows = pg_fetch_assoc($rel_result)) 
							$category = $rows['category_id'];
						

						//show the related menus
						$query = "SELECT * FROM tbl_menu 
							WHERE category_id in (SELECT category_id FROM tbl_category WHERE category_active = 'Active') 
							AND menu_active = 'Active'
							AND category_id = '$category'
							ORDER BY random() LIMIT 5
						";

						$result = pg_query($pgcon,$query);

						$count_all = pg_num_rows($result);
						if ($count_all > 0) {

							echo "<h4><b>Related Menu</b></h4>";
							while ($rows = pg_fetch_assoc($result)) {
							
								$menu_id = $rows['menu_id'];

								?>
								
									<div class="col-lg-4 col-md-6 special-grid active">
										<div class="gallery-single fix">
											<!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
											<?php echo "<img src='admin/admin-menu/menu-img/" . $rows['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
											<div class="why-text">
												<h4><?php echo $rows['menu_name'] ?></h4>
												<p></p>
												<h5>₹<?php echo $rows['menu_price'] ?></h5>
												<a href="admin-menu/show_menu.php?menu_id=<?php echo $menu_id; ?>"><i title="Details" style="font-size: 25px;" class="fa fa-arrow-right" aria-hidden="true"></i></a>
												<?php 
													if (isset($customer_username)) {
														?>
															<a style="padding: 10px;" href="manage_cart.php?menu_id=<?php echo $menu_id; ?>"><i title="Add to Cart" style="font-size: 25px;" class="fa fa-shopping-cart" aria-hidden="true" onclick="add_to_cart()"></i></a>
														<?php
													}
												?>
											</div>
										</div>
									</div>

								<?php
							}
						} else {
							
							echo "<h4><b>Menu is Not Available</b></h4>";
						}
					}
				?>
			</div>
		</div>
	</div>
	<!-- End Menu -->

	
	
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+91 9604183192
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							samjagtap041@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
						Park Plaza, 465/C1, CTS - 1085, Ganeshkhind Rd, next to Central Mall
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Park Plaza, 465/C1, CTS - 1085, Ganeshkhind Rd, next to Central Mall</p>
					<p class="lead"><a href="#">+91 9604183192</a></p>
					<p><a href="#"> samjagtap041@gmail.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Admin Login</h3>
					<div class="subscribe_form">
						<form class="subscribe_form" action="admin/admin-login-process.php" method="POST">
							<input name="username" id="subs-email" class="form_input" placeholder="Username" type="text">
							<input name="password" id="subs-email" class="form_input" placeholder="Password" type="password">
							<?php

								if (isset($_SESSION['admin-login-msg'])) {
									echo $_SESSION['admin-login-msg'] . 
									'<br> <a style="text-decoration: none;" href="forgot-password.php"><p>Forgot Password ?</p></a>';
									unset($_SESSION['admin-login-msg']);
								}

							?>
							<button type="submit" class="submit" name="submit">LOGIN</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Yamifood Restaurant</a> Design By : 
					<a href="https://html.design/">sam jagtap</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			//jquery for toggle sub menus
			$('.sub-btn').click(function(){
				$(this).next('.sub-menu').slideToggle();
				$(this).find('.dropdown').toggleClass('rotate');
			});

			//jquery for expand and collapse the sidebar
			$('.menu-btn').click(function(){
				$('.side-bar').addClass('active');
				$('.menu-btn').css("visibility", "hidden");
			});

			$('.close-btn').click(function(){
				$('.side-bar').removeClass('active');
				$('.menu-btn').css("visibility", "visible");
			});
		});
    </script>

</body>
</html>
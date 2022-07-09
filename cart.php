<?php 

    include('customer/login-check.php');
    include('constant/coneection.php');
	$cust = $_SESSION['cust_id'];

	// $cart_res = pg_query($pgcon,"SELECT * FROM tbl_cart");
	// if ($cart_res > 0) {
	// 	while ($cart_rows = pg_fetch_assoc($cart_res)) {
	// 		$cart_id = $cart_rows['cart_id'];
	// 		$menu_id = $cart_rows['menu_id'];
	// 		$cust_id = $cart_rows['cust_id'];
	// 	}
	// }

	// $menu_res = pg_query($pgcon,"SELECT * FROM tbl_menu WHERE menu_id = '$menu_id' ");
	// if ($menu_res > 0) {
    //     while ($menu_rows = pg_fetch_assoc($menu_res)) {
    //         $menu_id = $menu_rows['menu_id'];
    //         $menu_name = $menu_rows['menu_name'];
    //         $menu_img = $menu_rows['menu_img'];
    //         $menu_description = $menu_rows['menu_description'];
    //         $menu_price = $menu_rows['menu_price'];
    //     }
	// }


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
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/customer-section.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>

/* ----------------------------cart page design------------------------ */


.cart-page{
    margin: 80px auto;
}

table{
    /* margin-left: 220px; */
    width: 70%;
    border-collapse: collapse;
}

.cart-info{
    display: flex;
    flex-wrap: wrap;
}

th{
    text-align: left;
    padding: 5px;
    color: #fff;
    background: #d0a772;
    font-weight: normal;
}

td{
    padding: 10px 5px;
}

td input{
    width: 40px;
    height: 30px;
    padding: 5px;
}

td a{
    color: #ff523b;
    font-size: 12px;
}

td img{
    width: 80px;
    height: 80px;
    margin-right: 10px;
}


.remove-btn{
    font-size: 14px;
    padding: 5px;
    border: 1px solid #d0a772;
    border-radius: 50%;
}
.remove-btn:hover{
    background: #d0a772;
	color: #ffffff;
}

.total-price{
    display: flex;
    justify-content: flex-end;
}

.total-price table {
    border-top: 3px solid #d0a772;
    width: 70%;
    max-width: 400px;
    margin-right: 15%;
}

td:last-child{
    text-align: right;
}

th:last-child{
    text-align: right;
}


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
							<!-- <section class="main">
								<h1>Sidebar Menu With<br>Sub-Menus</h1>
							</section> -->
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
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
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
									<li class="nav-item active"><a class="nav-link" href="cart.php"><i title="cart" class="fas fa-shopping-cart"></i></a></li>
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
					<h1>Cart</h1>
					<?php 
						if (isset($_SESSION['cart_added'])) {
							echo $_SESSION['cart_added'];
							unset($_SESSION['cart_added']);
						}
						if (isset($_SESSION['delete-cart-msg'])) {
							echo $_SESSION['delete-cart-msg'];
							unset($_SESSION['delete-cart-msg']);
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

    <div class="small-container cart-page">
        <center>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
				<?php 
					$total = null;
					$shipping_total = null;
					$cart_res = pg_query($pgcon,"SELECT * FROM tbl_cart WHERE cust_id = '$cust' ORDER BY cart_id DESC ");
					$cart_count = pg_num_rows($cart_res);
					$_SESSION['cart_count'] = $cart_count;
					if ($cart_res > 0) {
						while ($cart_rows = pg_fetch_assoc($cart_res)) {

							$cart_id = $cart_rows['cart_id'];
							$menu_id = $cart_rows['menu_id'];
							$cust_id = $cart_rows['cust_id'];

							$menu_res = pg_query($pgcon,"SELECT * FROM tbl_menu WHERE menu_id = '$menu_id' ");
							if ($menu_res > 0) {
								while ($menu_rows = pg_fetch_assoc($menu_res)) {
									$menu_id = $menu_rows['menu_id'];
									$menu_name = $menu_rows['menu_name'];
									$menu_img = $menu_rows['menu_img'];
									$menu_description = $menu_rows['menu_description'];
									$menu_price = $menu_rows['menu_price'];

									
									$total += $menu_price;
								}
							}

								?>
									<tr>
										<td>
											<div class="cart-info">
												<a href="product.php?menu_id=<?php echo $menu_id ?>">
													<!-- <img class="remove-btn" src="admin/admin-menu/menu-img/Pomegranate-mojito-mocktail.jpg.jpg" alt=""> -->
													<?php echo "<img class='remove-btn' src='admin/admin-menu/menu-img/" . $menu_img . " ' alt='user' width='100'>"; ?>
												</a>
												<div>
													<p><?php echo $menu_name ?></p>
													<small>Price : ₹ <?php echo $menu_price ?> </small>
													<br>
													<a href="delete_cart.php?cart_id=<?php echo $cart_id ?>" class="remove-btn"><i class="fas fa-trash-alt"></i></a>
												</div>
											</div>
										</td>
										<td>
											<select name="qty" id="qty_<?php echo $menu_id; ?>">
												<?php 
													for ($i=1; $i <= 10; $i++) { 
														?>
														<option value=""><?php echo $i; ?></option>
														<?php
													}
												?>
											</select>
										</td>
										<td>₹ <?php echo $menu_price ?> </td>
									</tr>
								<?php
						}
					}
					
				?>

            </table>
        </center>
        <center>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal <?php echo "( " . $cart_count . " Items )" ?></td>
                        <td>₹ <?php echo $total; ?> </td>
                    </tr>
                    <tr>
                        <td>Shipping Charges per Menu</td>
                        <td>₹50.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>₹<?php echo ($total + ($cart_count * 50)); ?></td>
                    </tr>
                </table>
            </div>
        </center>
    </div>

















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
									'<br> <a style="text-decoration: none;" href="admin/admin-forgot-password.php"><p>Forgot Password ?</p></a>';
									unset($_SESSION['admin-login-msg']);
								}
								if (isset($_SESSION['pass-change'])) {
									echo $_SESSION['pass-change'];
									unset($_SESSION['pass-change']);
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


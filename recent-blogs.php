<?php 

	$blog_id = $_GET['blog_id'];
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
						<li class="nav-item active dropdown">
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
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Blog</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<?php 
				
		include('constant/coneection.php');

		//query to display blogs
		$query = "SELECT * FROM tbl_blog WHERE blog_id = $blog_id ";

		//execute the query
		$result = pg_query($pgcon,$query);

		$count = pg_num_rows($result);

        if ($count > 0) {

            while ($rows = pg_fetch_assoc($result)) {
            
				$blog_id = $rows['blog_id'];
				$blog_title = $rows['blog_title'];
				$content = $rows['content'];
				$writer_name = $rows['writer_name'];
				$img = $rows['img'];
				$admin_id = $rows['admin_id'];
				$time_stamp = $rows['time_stamp'];
            }
        }

	?>


	<!-- Start blog details -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Blog</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
								<!-- <img class="img-fluid" src="images/inner-blog-img.jpg" alt=""> -->
								<?php 
								echo "<img class='img-fluid' src='images/" . $img . " '  alt=''>"; 
								?>							
								<div class="date-blog-up">
									<?php echo $time_stamp ?>
								</div>
							</div>
							<div class="inner-blog-detail details-page">
								<h3><?php echo $blog_title ?></h3>
								<ul>
									<li><i class="zmdi zmdi-account"></i>Posted By Admin : <span><?php echo $writer_name ?></span></li>
									<li>|</li>
									<li><i class="zmdi zmdi-time"></i>Time : <span><?php echo $time_stamp ?></span></li>
								</ul>
								<p><blockquote><?php echo $content ?></blockquote></p>
							</div>
						</div>
						<div class="blog-comment-box">
							<h3>Comments</h3>
							<div class="comment-item">
								<div class="comment-item-left">
									<img src="images/avt-img.jpg" alt="">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<a href="#">Rubel Ahmed</a>
									</div>
									<div class="pull-right">
										<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>11.30 am</span>
									</div>
									<div class="des-l">
										<p>Morbi lacinia ultrices lorem id tincidunt. Cras id dui risus. Pellentesque consectetur id mi sed pharetra. Proin imperdiet gravida nisl, sit amet varius urna. In auctor.</p>
									</div>
									<a href="#" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
								</div>
							</div>
							<div class="comment-item children">
								<div class="comment-item-left">
									<img src="images/avt-img.jpg" alt="">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<a href="#">Admin</a>
									</div>
									<div class="pull-right">
										<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>1.30 pm</span>
									</div>
									<div class="des-l">
										<p>Morbi lacinia ultrices lorem id tincidunt. Cras id dui risus. Pellentesque consectetur id mi sed pharetra. Proin imperdiet gravida nisl, sit amet varius urna. In auctor.</p>
									</div>
									<a href="#" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
								</div>
							</div>
							<div class="comment-item">
								<div class="comment-item-left">
									<img src="images/avt-img.jpg" alt="">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<a href="#">Rubel Ahmed</a>
									</div>
									<div class="pull-right">
										<i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span>11.30 am</span>
									</div>
									<div class="des-l">
										<p>Morbi lacinia ultrices lorem id tincidunt. Cras id dui risus. Pellentesque consectetur id mi sed pharetra. Proin imperdiet gravida nisl, sit amet varius urna. In auctor.</p>
									</div>
									<a href="#" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
								</div>
							</div>
							
							
						</div>
						<div class="comment-respond-box">
							<h3>Leave your comment </h3>
							<div class="comment-respond-form">
								<form id="commentrespondform" class="comment-form-respond row" method="post">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input id="name_com" class="form-control" name="name" placeholder="Name" type="text">
										</div>
										<div class="form-group">
											<input id="email_com" class="form-control" name="email" placeholder="Your Email" type="email">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<textarea class="form-control" id="textarea_com" placeholder="Your Message" rows="2"></textarea>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-submit">Submit comment</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
					<div class="right-side-blog">
						<h3>Search</h3>
						<div class="blog-search-form">
							<input name="search" placeholder="Search blog" type="text">
							<button class="search-btn">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						<h3>Categories</h3>
						<div class="blog-categories">
							<ul>
								<li><a href="#"><span>Food</span></a></li>
								<li><a href="#"><span>Pizza</span></a></li>
								<li><a href="#"><span>Drink</span></a></li>
								<li><a href="#"><span>Lorem Sit</span></a></li>
								<li><a href="#"><span>Burger</span></a></li>
								<li><a href="#"><span>Music</span></a></li>
							</ul>
						</div>
						<h3>Recent Post</h3>
						<div class="post-box-blog">
							<div class="recent-post-box">

							<?php 
				
								include('constant/coneection.php');

								//query to display blogs
								$query = "SELECT * FROM tbl_blog ORDER BY random() LIMIT 5 ";

								//execute the query
								$result = pg_query($pgcon,$query);

								$count = pg_num_rows($result);

								if ($count > 0) {

									while ($rows = pg_fetch_assoc($result)) {
									
										$blog_id = $rows['blog_id'];
										?>

											<a href="recent-blogs.php?blog_id=<?php echo $blog_id ?>">	
												<div class="recent-box-blog">
													<div class="recent-img">
														<!-- <img class="img-fluid" src="images/post-img-01.jpg" alt=""> -->
														<?php echo "<img class='img-fluid' src='images/" . $rows['img'] . " '  alt=''>"; ?>
													</div>
													<div class="recent-info">
														<ul>
															<li><i class="zmdi zmdi-account"></i>Posted By Admin : <span><?php echo $rows['writer_name'] ?></span></li>
															<li>|</li>
															<li><i class="zmdi zmdi-time"></i>Time : <span><?php echo $rows['time_stamp'] ?></span></li>
														</ul>
														<h4><?php echo $rows['blog_title'] ?></h4>
													</div>
												</div>
											</a>
											

										<?php
									}
								}

							?>

								<!-- <a href="#">
									<div class="recent-box-blog">
										<div class="recent-img">
											<img class="img-fluid" src="images/post-img-01.jpg" alt="">
										</div>
										<div class="recent-info">
											<ul>
												<li><i class="zmdi zmdi-account"></i>Posted By Admin : <span>Rubel Ahmed</span></li>
												<li>|</li>
												<li><i class="zmdi zmdi-time"></i>Time : <span>11.30 am</span></li>
											</ul>
											<h4>Duis feugiat neque sed dolor cursus, sed lacinia nisl pretium.</h4>
										</div>
									</div>
								</a>
								<a href="#">
									<div class="recent-box-blog">
										<div class="recent-img">
											<img class="img-fluid" src="images/post-img-01.jpg" alt="">
										</div>
										<div class="recent-info">
											<ul>
												<li><i class="zmdi zmdi-account"></i>Posted By Admin : <span>Rubel Ahmed</span></li>
												<li>|</li>
												<li><i class="zmdi zmdi-time"></i>Time : <span>11.30 am</span></li>
											</ul>
											<h4>Duis feugiat neque sed dolor cursus, sed lacinia nisl pretium.</h4>
										</div>
									</div>
								</a> -->
							</div>
						</div>
						<h3>Recent Tag</h3>
						<div class="blog-tag-box">
							<ul class="list-inline tag-list">
								<li class="list-inline-item"><a href="#">Food</a></li>
								<li class="list-inline-item"><a href="#">Drink</a></li>
								<li class="list-inline-item"><a href="#">Nature</a></li>
								<li class="list-inline-item"><a href="#">Italian</a></li>
								<li class="list-inline-item"><a href="#">Bootstrap4</a></li>
								<li class="list-inline-item"><a href="#">Fashion</a></li>
								<li class="list-inline-item"><a href="blog.php">See All Blogs</a></li>
							</ul>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
	<!-- End details -->
	
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
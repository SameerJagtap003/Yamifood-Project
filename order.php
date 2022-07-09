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

    <!-- Bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

     <!-- font awesome icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/product.css">

</head>

<style>


    .update{
        width: 15%;
        line-height: 10%;
        font-size: 14px;
        padding: 22px 10px;
    }
    .btn-process{
        border-radius: 30px;
    }
    .fas{
        border-radius: 50%;
    }
    .p-0{
        font-size: 12px;
        background-color: white;
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

    /* css for radio button */

    .main-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .radio-buttons {
        width: 100%;
        margin: 0 auto;
        text-align: center;
      }

      .custom-radio input {
        display: none;
      }

      .radio-btn {
        margin: 10px;
        width: 180px;
        height: 50px;
        border: 3px solid transparent;
        display: inline-block;
        border-radius: 10px;
        position: relative;
        text-align: center;
        box-shadow: 0 0 20px #c3c3c367;
        cursor: pointer;
      }

      .radio-btn > i {
        color: #ffffff;
        background-color: #009879;
        font-size: 20px;
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%) scale(4);
        border-radius: 50px;
        padding: 3px;
        transition: 0.2s;
        pointer-events: none;
        opacity: 0;
      }

      .radio-btn .hobbies-icon {
        width: 100px;
        height: 10px;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
      }


      .radio-btn .hobbies-icon h3 {
        color: #009879;
        font-family: "Raleway", sans-serif;
        font-size: 16px;
        font-weight: 400;
        text-transform: uppercase;
      }

      .custom-radio input:checked + .radio-btn {
        border: 3px solid #009879;
      }

      .custom-radio input:checked + .radio-btn > i {
        opacity: 1;
        transform: translateX(-50%) scale(1);
      }
      /* ----------------------------------------------- */



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
					<h1>Product</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->



<?php 

    $qty = $_GET['qty'];
    $size = $_GET['size'];
    $menu_id = $_GET['menu_id'];

    // echo "Menu id : " . $menu_id;
    // echo "qty : " . $qty;
    // echo "size : " . $size;

    // $menu_id = $_GET['menu_id'];
    // //show top sell menus
    $menu_query = "SELECT * FROM tbl_menu 
        WHERE category_id in (SELECT category_id FROM tbl_category WHERE category_active = 'Active') 
        AND menu_active = 'Active'
        AND menu_id = $menu_id
    ";

    $menu_result = pg_query($pgcon,$menu_query);

    $menu_count = pg_num_rows($menu_result);
    if ($menu_count > 0) {
        
        $menu_rows = pg_fetch_assoc($menu_result);
        $menu_id = $menu_rows['menu_id'];
        $menu_name = $menu_rows['menu_name'];
        $menu_img = $menu_rows['menu_img'];
        $menu_description = $menu_rows['menu_description'];
        $menu_active = $menu_rows['menu_active'];
        $category_id = $menu_rows['category_id'];
        $menu_price = $menu_rows['menu_price'];

    }


    //for customer
    if (isset($_SESSION['customer_username'])) {
        
        //show customer details
       $customer = $_SESSION['customer_username'];

       $cust_query = "SELECT * FROM tbl_customer WHERE cust_username = '$customer' ";
       
       $cust_result = pg_query($pgcon,$cust_query);

       $cust_count = pg_num_rows($cust_result);
       if ($cust_count > 0) {
           
           $cust_rows = pg_fetch_assoc($cust_result);
           $cust_id = $cust_rows['cust_id'];
           $cust_name = $cust_rows['cust_name'];
           $cust_phone = $cust_rows['cust_phone'];
           $cust_username = $cust_rows['cust_username'];
           $cust_email = $cust_rows['cust_email'];
           $cust_address = $cust_rows['cust_address'];

       }
   }
?>


    <main id="main-site">

            <!--   product  -->
                <section id="product" class="py-3">
                    <div class="container">
                        <div class="row">
                            <div style="padding-top: 40px;" class="col-sm-6">
                                <!-- <img src="images/blog-img-01.jpg" alt="product" class="img-fluid"> -->
                                <?php echo "<img src='admin/admin-menu/menu-img/" . $menu_img . " ' class='img-fluid' alt='user' width='400'>"; ?>
                                
                            </div>
                            <div class="col-sm-6 py-5">
                                <h5 class="font-baloo font-size-20"><?php echo $menu_name ?></h5>
                                <small>by Yamifood Restaurant</small>
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                                </div>
                                <hr class="m-0">

                                <!---    product price       -->
                                    <table class="my-3">
                                        <tr class="font-rale font-size-14">
                                            <td>Menu Price:</td>
                                            <td class="font-size-20 text-danger">₹<span><?php echo $menu_price ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                                        </tr>
                                        <tr class="font-rale font-size-14">
                                            <td>Shipping Charges : </td>
                                            <td><span class="font-size-16 text-danger">₹50.00</span></td>
                                        </tr>
                                        <tr class="font-rale font-size-14">
                                            <td>Quantity : </td>
                                            <td><span class="font-size-16 text-danger"><?php echo $qty ?></span></td>
                                        </tr>
                                        <tr class="font-rale font-size-14">
                                            <td>Size : </td>
                                            <td><span class="font-size-16 text-danger"><?php echo $size ?></span></td>
                                        </tr>
                                        <tr class="font-rale font-size-14">
                                            <td>Total Price : </td>
                                            <td><span class="font-size-16 text-danger"><?php echo $total = ($menu_price * $qty) + (50 * $qty) ?></span></td>
                                        </tr>
                                    </table>
                                <!---    !product price       -->

                                    <hr>

                                <!-- order-details -->
                                    <div id="order-details" class="font-rale d-flex flex-column text-dark">
                                        <small>Delivery by : Yamifood Restaurant</small>
                                        <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer : 
                                            <?php 
                                                    if (isset($_SESSION['customer_username'])) {

                                                        echo $cust_name;
                                                        echo "<br>";
                                                        echo $cust_username;
                                                        echo "<br>"; 
                                                        echo $cust_phone;
                                                        echo "<br>"; 
                                                        echo $cust_email;
                                                        echo "<br>";
                                                        echo $cust_address;
                                                        echo "<br>";
                                                    } else {
                                                        echo "<a href='login.php'>Please Login</a>";
                                                    }
                                            ?>
                                        </small>
                                    </div>
                                <!-- !order-details -->
                                <br>
                                <form action="payment.php" method="get">
                                    <div class="form-row pt-4 font-size-16 font-baloo">
                                        <label class="custom-radio">
											<input type="radio" name="pay_type" value="Credit/Debit/ATM-Card" disabled>
                                            <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
												<div class="hobbies-icon">
													<h5><b>Credit/Debit/ATM Card</b></h5>
												</div>
											</span>
                                        </label>
                                        <label class="custom-radio">
											<input type="radio" name="pay_type" value="Cash-on-Delivery">
                                            <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
												<div class="hobbies-icon">
													<h5><b>Cash on Delivery</b></h5>
												</div>
											</span>
                                        </label>
                                        <input type="number" hidden name="cust_id" value="<?php echo $cust_id ?>">
                                        <input type="number" hidden name="menu_id" value="<?php echo $menu_id ?>">
                                        <input type="number" hidden name="qty" value="<?php echo $qty ?>">
                                        <input type="text" hidden name="size" value="<?php echo $size ?>">
                                        <input type="number" hidden name="shipping_carges" value="50">
                                        <input type="number" hidden name="total" value="<?php echo $total ?>">
                                        <input type="text" hidden name="status" value="Placed">
                                    </div>
                                    <!-- <a href="manage_cart.php?menu_id=<?php echo $menu_id; ?>"> -->
                                        <button type="submit" class="btn btn-process btn-warning form-control" class="first-button">
                                            Continue
                                        </button>
                                    <!-- </a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            <!--   !product  -->

            <!-- Start Menu -->
    </main>










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


<?php

	include('login-check.php');
	include('../constant/coneection.php');

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
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">    
	<link rel="stylesheet" href="../admin/admin-css/admin-home.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/customer-section.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
/* 
.wrapper{
	position: absolute;
	top: 100%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 550px;
	display: flex;
	box-shadow: 0 5px 30px 0 rgba(69,90,100,.08);
	margin-top: 10%;
} */

.contact-imfo-box{
	margin-top: 30%;
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

	  /* css for status */
	  .prog i{
		  width: 80px;
	  }
	  .prog ul{
		  text-align: center;
	  }
	  .prog ul li{
		  display: inline-block;
		  width: 200px;
		  position: relative;
	  }
	  /* .prog ul li .fa{
		  background: #ccc;
		  width: 16px;
		  height: 16px;
		  color: #fff;
		  border-radius: 50%;
		  padding: 10px;
	  } */
	  .prog ul li .fa::after{
		  content: '';
		  background: #ccc;
		  height: 5px;
		  width: 200px;
		  display: block;
		  position: absolute;
		  left: 0;
		  /* top: 110px;
		  z-index: -1; */
	  }

	  /* ------------------------------------------------- */

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
								<?php echo "<img src='img/" . $rows['cust_img'] . " ' alt='User Name'>"; ?>
							</div>
							<div class="side-bar">
								<div class="close-btn">
									<i class="fas fa-times"></i>
								</div>
								<div class="menu">
									<div class="item"><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
									<div class="item"><a href="account.php"><i class="fas fa-user"></i>Account</a></div>
									<div class="item"><a href="orders.php"><i class="fas fa-shipping-fast"></i>Orders</a></div>
									<div class="item"><a href="table_booking_history.php" class="sub-item"><i class="fas fa-calendar-alt"></i>Booking History</a></div>
									<div class="item">
										<a class="sub-btn"><i class="fas fa-binoculars"></i>Explore<i class="fas fa-angle-right dropdown"></i></a>
										<div class="sub-menu">
											<?php 
												$query_category ="SELECT category_name FROM tbl_category ORDER BY random() LIMIT 5";
												$result_category = pg_query($pgcon,$query_category);
												while($rows_category = pg_fetch_assoc($result_category)){
													?>
														<a href="../search.php?search_item=<?php echo $rows_category['category_name'] ?>" class="sub-item"><?php echo $rows_category['category_name'] ?></a>
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
									<div class="item"><a href="../logout.php" class="sub-item"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></div>
									<!-- <div class="item">
										<a class="sub-btn"><i class="fas fa-cogs"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
										<div class="sub-menu">
											<a href="messages.php" class="sub-item">Messages</a>
											<a href="../logout.php" class="sub-item">Logout</a>
										</div>
									</div> -->
									<div class="item"><a href="../about.php"><i class="fas fa-info-circle"></i>About</a></div>
								</div>
							</div>
							<!-- <section class="main">
								<h1>Sidebar Menu With<br>Sub-Menus</h1>
							</section> -->
						<?php
					}
				?>
				<a class="navbar-brand" href="index.html">
					<img src="../images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="../menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="../about.php">About</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../reservation.php">Reservation</a>
								<a class="dropdown-item" href="../stuff.php">Stuff</a>
								<a class="dropdown-item" href="../gallery.php">Gallery</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../blog.php">blog</a>
								<a class="dropdown-item" href="../blog-details.php">blog Single</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="../login.php"><i title="signin/up" class="fas fa-sign-in-alt"></i></a></li>
						<li class="nav-item"><a class="nav-link" href="../logout.php"><i title="logout" class="fas fa-sign-out-alt"></i></a></li>
						<?php 
							if (isset($_SESSION['customer_username'])) {
								?>
									<li class="nav-item"><a class="nav-link" href="../cart.php"><i title="cart" class="fas fa-shopping-cart"></i></a></li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
<?php include('login-check.php'); ?>


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
	hr{
		width: 70%;
		align-items: center;
	}
	.checkboxes{
		width: 10%;
		margin-left: 80px;
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
						<li class="nav-item"><a class="nav-link" href="admin-dashboard.php">DashBoard</a></li>
						<li class="nav-item active"><a class="nav-link" href="admin-menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-category.php">Category</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-orders.php">Orders</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Employee</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="admins.php">Admins</a>
								<a class="dropdown-item" href="stuff.php">Stuff</a>
							</div>
						</li>
						<!-- <li class="nav-item"><a class="nav-link" href="admins.php">Admins</a></li>
						<li class="nav-item"><a class="nav-link" href="stuff.php">Stuff</a></li> -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Messages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="admin-blogs.php">Blogs</a>
								<a class="dropdown-item" href="admin-messages.php">Messages</a>
							</div>
						</li>
						<!-- <li class="nav-item"><a class="nav-link" href="admin-blogs.php">Blogs</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-messages.php">Messages</a></li> -->
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

    <!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
            <div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>

            <form style="margin-left: 15%;" action="filter.php" method="get">
            <h3>Serach using Filter</h3>
                <?php 
                                    
                    include('../constant/coneection.php');
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
                    <input class="submit2" type="submit" value="search" name="submit">
                </div>
            </form>

            <div class="row special-list">
			
                <?php 


                   	if (isset($_GET['submit'])) {
						
						include('../constant/coneection.php');
						$category_id = $_GET['category'];

						if (is_array($category_id)) {
							foreach ($category_id as $value) {
								
								$result = pg_query($pgcon,"SELECT * FROM tbl_menu WHERE category_id = $value");
								while ($rows = pg_fetch_assoc($result)) {

									$menu_id = $rows['menu_id'];

									?>

										<div class="col-lg-4 col-md-6 special-grid active">
											<div class="gallery-single fix">
												<!-- <img src="../images/img-02.jpg" class="img-fluid" alt="Image"> -->
												<?php echo "<img src='admin-menu/menu-img/" . $rows['menu_img'] . " ' class='img-fluid' alt='Image'>"; ?>
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
							}
						}
				   	}

                ?>
            </div>
        </div>
    </div>















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


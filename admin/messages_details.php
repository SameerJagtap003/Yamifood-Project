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
    <link rel="stylesheet" href="admin-css/admin-home.css">
    <link rel="stylesheet" href="../css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
						<li class="nav-item"><a class="nav-link" href="admin-menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-category.php">Category</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-orders.php">Orders</a></li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Employee</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="admins.php">Admins</a>
								<a class="dropdown-item" href="stuff.php">Stuff</a>
							</div>
						</li>
                        <li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Messages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="admin-blogs.php">Blogs</a>
								<a class="dropdown-item" href="admin-messages.php">Messages</a>
							</div>
						</li>
						<!-- <li class="nav-item"><a class="nav-link" href="admins.php">Admins</a></li>
						<li class="nav-item"><a class="nav-link" href="admin-blogs.php">Blogs</a></li>
						<li class="nav-item active"><a class="nav-link" href="admin-messages.php">Messages</a></li> -->
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
					<h1>Messages</h1>
                    <?php 
                        if (isset($_SESSION['delete-msg'])) {
                            echo $_SESSION['delete-msg'];
                            unset($_SESSION['delete-msg']);
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

    <div class="blog-box">
		<div class="container">
            <div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
                        <div class="blog-comment-box">
							<h3>Messages</h3>
                            <?php 
                            
                                $query = "SELECT * FROM tbl_contact ORDER BY cont_id DESC";
                                $result = pg_query($pgcon,$query);
                                $count = pg_num_rows($result);
                                if ($count > 0) {
                                    
                                    while ($rows = pg_fetch_assoc($result)) {
                                        $cont_id = $rows['cont_id'];
                                        ?>

                                            <div class="comment-item">
                                                <div class="comment-item-left">
                                                    <img src="images/avt-img.jpg" alt="">
                                                </div>
                                                <div class="comment-item-right">
                                                    <div class="pull-left">
                                                        <a href="#"><?php echo $rows['name'] ?></a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>Time : <span><?php echo $rows['time_stamp'] ?></span>
                                                    </div>
                                                    <div class="des-l">
                                                        <p><?php echo $rows['message'] ?></p>
                                                    </div>
                                                    <a href="delete_message.php?cont_id=<?php echo $cont_id; ?>" class="left-btn-re"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                    <a href="#" class="right-btn-re"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                                </div>
                                            </div><br>
                                            <hr>
                                        <?php
                                    }
                                }
                            
                            ?>

                            <a href="admin-messages.php" class="left-btn-re">Go Back</a>
							
						</div>
                    </div>
                </div>
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


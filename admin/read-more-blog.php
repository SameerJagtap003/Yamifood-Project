<?php 
	
	include('login-check.php');

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
    .back-btn{
        border: 1px solid #d0a772;
        border-radius: 5px;
        width: 25%;
        color: black;
        text-decoration: none;
        font-style: italic;
    }
    .back-btn:hover{
        background-color: #d0a772;
        color: white;
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
						<!-- <li class="nav-item"><a class="nav-link" href="admins.php">Admins</a></li>
						<li class="nav-item"><a class="nav-link" href="stuff.php">Stuff</a></li> -->
						<li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Messages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="admin-blogs.php">Blogs</a>
								<a class="dropdown-item" href="admin-messages.php">Messages</a>
							</div>
						</li>
						<!-- <li class="nav-item active"><a class="nav-link" href="admin-blogs.php">Blogs</a></li>
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
					<h1>Blogs</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->


    <?php 
    
        include('../constant/coneection.php');
        $blog_id = $_GET['blog_id'];
        $result = pg_query($pgcon,"SELECT * FROM tbl_blog WHERE blog_id = $blog_id");
        $rows = pg_fetch_assoc($result);
    
    ?>

   <!-- start #main-site -->
   <main id="main-site">

    <!--   product  -->
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div style="padding-top: 40px;" class="col-sm-6">
                        <!-- <img src="images/blog-img-01.jpg" alt="product" class="img-fluid"> -->
                        <?php echo "<img src='../images/" . $rows['img'] . " ' class='img-fluid' alt='user' width='400'>"; ?>
                        
                    </div>
                    <div style="text-align: center;" class="col-sm-6 py-5">
                        <h2 class="font-baloo font-size-20"><?php echo $rows['blog_title'] ?></h2>
                        <h3>by <?php echo $rows['writer_name'] ?></h3>
                        <!---    blog    -->
                            <p><?php echo $rows['content'] ?></p>
                            <a href="admin-blogs.php">
                            <div class="back-btn">
                                Go back
                            </div>
                            </a>
                        <!---    blog    -->
                    </div>
                </div>
            </div>
        </section>
    <!--   !product  -->

    


    </main>
    <!-- !start #main-site -->











    


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


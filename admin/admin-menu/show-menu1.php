<?php include('../login-check.php'); ?>

<?php 

    include('../../constant/coneection.php');

    $menu_id = $_GET['menu_id'];
    
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


    $cat_res = pg_query($pgcon,"SELECT * FROM tbl_category WHERE category_id = $category_id");
    while ($cat_rows = pg_fetch_assoc($cat_res)) {
        $category_name = $cat_rows['category_name'];
    }

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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../../css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/custom.css">

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



</style>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="../../images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="../admin-home.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="../admin-dashboard.php">DashBoard</a></li>
						<li class="nav-item active"><a class="nav-link" href="../admin-menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="../admin-category.php">Category</a></li>
						<li class="nav-item"><a class="nav-link" href="../admin-orders.php">Orders</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Employee</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../admins.php">Admins</a>
								<a class="dropdown-item" href="../stuff.php">Stuff</a>
							</div>
						</li>
						<!-- <li class="nav-item"><a class="nav-link" href="admins.php">Admins</a></li>
						<li class="nav-item"><a class="nav-link" href="stuff.php">Stuff</a></li> -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Messages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../admin-blogs.php">Blogs</a>
								<a class="dropdown-item" href="../admin-messages.php">Messages</a>
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
					<h1>Product</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->











    <!-- start #main-site -->
    <main id="main-site">

        <!--   product  -->
            <section id="product" class="py-3">
                <div class="container">
                    <div class="row">
                        <div style="padding-top: 40px;" class="col-sm-6">
                            <!-- <img src="images/blog-img-01.jpg" alt="product" class="img-fluid"> -->
                            <?php echo "<img src='menu-img/" . $menu_img . " ' class='img-fluid' alt='user' width='400'>"; ?>
                            
                        </div>
                        <div class="col-sm-6 py-5">
                            <h5 class="font-baloo font-size-20"><b><?php echo $menu_name ?></b></h5>
                            <small>by Yamifood Restaurant</small>
                            
                            <hr class="m-0">

                            <!---    product price       -->
                                <table class="my-3">
                                    <tr class="font-rale font-size-14">
                                        <td><b>Price : </b></td>
                                        <td style="float: right;"><?php echo $menu_price ?></td>
                                    </tr>
                                    <tr class="font-rale font-size-14">
                                        <td><b>Active : </b></td>
                                        <td style="float: right;"><?php echo $menu_active ?></td>
                                    </tr>
                                    <tr class="font-rale font-size-14">
                                        <td><b>Category : </b></td>
                                        <td style="float: right;"><?php echo $category_name ?></td>
                                    </tr>
                                </table>
                            <!---    !product price       -->
                            <div id="order-details" class="font-size-14 d-flex flex-column ">
                                <td><b>Description</b></td>
                                <?php echo $menu_description ?>
                            </div>

                            <hr>
                           
                            <a href="update-menu.php?menu_id=<?php echo $menu_id; ?>" class="btn btn-process btn-danger form-control update">Update</a>
                            <a href="delete-menu.php?menu_id=<?php echo $menu_id; ?>" class="btn btn-process btn-danger form-control update">Delete</a>
                            <a href="../admin-menu.php" class="btn btn-process btn-danger form-control update">Go Back</a>
                            

                        </div>
                        
                    </div>
                </div>
            </section>
        <!--   !product  -->

        














    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../../js/jquery.superslides.min.js"></script>
    <script src="../../js/images-loded.min.js"></script>
    <script src="../../js/isotope.min.js"></script>
    <script src="../../js/baguetteBox.min.js"></script>
    <script src="../../js/form-validator.min.js"></script>
    <script src="../../js/contact-form-script.js"></script>
    <script src="../../js/custom.js"></script>
</body>
</html>


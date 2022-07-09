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
	.img-fluid{
		min-height: 450px;
		height: 450px;
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
	<br>
	<!-- button to add menu -->
	<div class="subscribe_form">
		<h4>Want to Add Blog
		<?php 
			if (isset($_SESSION['blog-add'])) {
				echo "<br>" . $_SESSION['blog-add'];
				unset($_SESSION['blog-add']);
			}
		?>
		</h4>
		<a href="blogs-add.php"><button class="submit">ADD</button></a>
	</div>

	<hr>

	<!-- Start blog -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Blog</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
						<?php 
							if (isset($_SESSION['delete-blog'])) {
								echo $_SESSION['delete-blog'];
								unset($_SESSION['delete-blog']);
							}
							if (isset($_SESSION['blog-update'])) {
								echo $_SESSION['blog-update'];
								unset($_SESSION['blog-update']);
							}
						?>
					</div>
				</div>
			</div>
			<div class="row">

				<?php 
				
					include('../constant/coneection.php');

					//query to display blogs
					$query = "SELECT * FROM tbl_blog ORDER BY blog_id DESC";

					//execute the query
					$result = pg_query($pgcon,$query);

					$count = pg_num_rows($result);
					if ($count > 0) {
						
						while ($rows = pg_fetch_assoc($result)) {
							
							$blog_id = $rows['blog_id'];
							$content = substr($rows['content'],0,350);
							$blog_title = substr($rows['blog_title'],0,30);
							// $content = substr($content,0,strpos($content, ' ')) . '...';

							?>

								<div class="col-lg-4 col-md-6 col-12">
									<div class="blog-box-inner">
										<div class="blog-img-box">
											<?php echo "<img class='img-fluid' src='../images/" . $rows['img'] . " '  alt='' width='500'>"; ?>
											<?php 
											// echo "<img class='img-fluid' src='../images/" . $rows['img'] . " ' alt='' >"; 
											?>
										</div>
										<div class="blog-detail">
											<h4><?php echo $blog_title . '...' ?></h4>
											<ul>
												<li><span>Post by Admin <?php echo $rows['writer_name'] ?> </span></li>
												<li>|</li>
												<li><span><?php echo $rows['time_stamp'] ?></span></li>
											</ul>
											<p><?php echo $content . '...' ?></p>
											<a style="padding: 5px 5px; border-radius: 20px;" class="btn btn-lg btn-circle btn-outline-new-white" href="read-more-blog.php?blog_id=<?php echo $blog_id ?>">Read More</a>
											<a style="padding: 5px 5px; margin-left: 50px; border-radius: 20px;" class="btn btn-lg btn-circle btn-outline-new-white" href="update-blog.php?blog_id=<?php echo $blog_id ?>">Update</a>
											<a style="padding: 5px 5px; float: right; border-radius: 20px;" class="btn btn-lg btn-circle btn-outline-new-white" href="delete-blog.php?blog_id=<?php echo $blog_id ?>"><i style="font-size: 20px;" class="fa fa-trash" aria-hidden="true"></i></a>
											
										</div>
									</div>
								</div>

							<?php
						}
					}
				?>
			</div>
		</div>
	</div>
	<!-- End blog -->


		<!-- <div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-02.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-03.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-04.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-05.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-06.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-07.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-08.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="../images/blog-img-09.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div> -->



	<!-- <div class="subscribe_form">
		<a href="#"><button class="submit">Show More</button></a>
	</div> -->

	<br><br><br>







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


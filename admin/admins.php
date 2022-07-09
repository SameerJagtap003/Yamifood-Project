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
	<link rel="stylesheet" href="admin-css/admin-home.css">
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

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin: 5%;
  text-align: center;
  margin-left: 20%;
}

.content-table thead tr {
  /* background-color: #009879; */
  background: linear-gradient(to right,#009879,#03a9ac,#a4d0ee);
  color: #ffffff;
  text-align: left;
  font-weight: bold;
  text-align: center;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

h4{
	color: #ffffff;
	font-weight: bold;
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
						<li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Employee</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="admins.php">Admins</a>
								<a class="dropdown-item" href="stuff.php">Stuff</a>
							</div>
						</li>
						<!-- <li class="nav-item active"><a class="nav-link" href="admins.php">Admins</a></li>
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
					<h1>Admins</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

	<table class="content-table">
		<thead>
			<tr>
				<td class="active-row" colspan="7">
				<div class="subscribe_form" style="width: 50%;">
				<h4>Want To add Admin</h4>
					<?php 
					
						if (isset($_SESSION['delete-admin-msg'])) {
							echo $_SESSION['delete-admin-msg'];
							unset($_SESSION['delete-admin-msg']);
						}
						if (isset($_SESSION['data-inserted'])) {
							echo $_SESSION['data-inserted'];
							unset($_SESSION['data-inserted']);
						}
					
					?>
            		<a href="admin-add.php"><button type="submit" class="submit" name="submit">Add</button></a>
            	</div>
				</td>
			</tr>
			<tr>
				<th>Sr.No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Address</th>
				<th>Phone No</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php 

				//Connection to postgreSQL
				$pgcon = pg_connect("host=localhost user=postgres dbname=new_food password=samsj@2010")
				or die("Failed to Connect Server");
				
				//Query for data
				$query = "SELECT * FROM tbl_admin";

				//execute the query 
				$result = pg_query($pgcon,$query);
				$sr = 1;
				
				//display the date
				while ($rows = pg_fetch_assoc($result)) {
					
					$admin_id = $rows['admin_id'];
					?>
						<tr class="active-row">
							<td><?php echo $sr++ ?></td>
							<td><?php echo $rows['admin_name'] ?></td>
							<td><?php echo $rows['admin_username'] ?></td>
							<td><?php echo wordwrap($rows['admin_address'],50,"<br>") ?></td>
							<td><?php echo $rows['admin_phone'] ?></td>
							<td><?php echo $rows['admin_email'] ?></td>
							<td><a href="admin-delete.php?admin_id=<?php echo $admin_id; ?>">Delete</a></td>
						</tr>
					<?php
				}

			?>
		</tbody>
	</table>

    








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


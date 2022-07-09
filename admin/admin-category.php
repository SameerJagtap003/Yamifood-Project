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

	<!-- Line Awesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />

</head>

<style>

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 1000px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin: 5%;
  text-align: center;
  padding-left: 50%;
  margin-left: 17%;
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
						<li class="nav-item active"><a class="nav-link" href="admin-category.php">Category</a></li>
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
					<h1>Category</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

	<div class="text-center">
		<?php 
			if (isset($_SESSION['category_update_msg'])) {
				echo "<br><h3>" . $_SESSION['category_update_msg'] . "</h3>";
				unset($_SESSION['category_update_msg']);
			}  
		?>
	</div>

	<table class="content-table">
		<thead>
			<tr>
				<td class="active-row" colspan="4">
				<div class="subscribe_form" style="width: 50%;">
					<h4>Want To add Category</h4>
					<?php 
						if (isset($_SESSION['cat_add'])) {
							echo $_SESSION['cat_add'];
							unset($_SESSION['cat_add']);
						}
						if (isset($_SESSION['delete-cat'])) {
							echo $_SESSION['delete-cat'];
							unset($_SESSION['delete-cat']);
						}
					?>
            		<a href="category-add.php"><button type="submit" class="submit" name="submit">Add</button></a>
            	</div>
				</td>
			</tr>
			
			<tr>
				<th>Sr.No</th>
				<th>Category Name</th>
				<th>Active</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			<?php 

				//Connection to postgreSQL
				$pgcon = pg_connect("host=localhost user=postgres dbname=new_food password=samsj@2010")
				or die("Failed to Connect Server");
				
				//Query for data
				$query = "SELECT * FROM tbl_category";

				//execute the query 
				$result = pg_query($pgcon,$query);
				$sr = 1;
				
				//display the date
				while ($rows = pg_fetch_assoc($result)) {
				
					$name = $rows['category_name'];
					$category_id = $rows['category_id'];
					?>
					
						<tr class="active-row">
							<td><?php echo $sr++ ?></td>
							<td><?php echo $rows['category_name'] ?></td>
							<td>

									<div class="main-container">
										<div class="radio-buttons">
											<label class="custom-radio">
												<input type="radio" name="<?php echo $name; ?>" 
													<?php
														if ($rows['category_active'] == 'Active' || $rows['category_active'] == 'active') {
														echo 'checked';
														}
													?> 
												/>
												<span class="radio-btn"><i class="las la-check"></i>
													<div class="hobbies-icon">
														<h5><b>Active</b></h5>
													</div>
												</span>
											</label>
											<label class="custom-radio">
												<input type="radio" name="<?php echo $rows['category_name']; ?>"
													<?php
														if ($rows['category_active'] == 'Not Active' || $rows['category_active'] == 'not active') {
														echo 'checked';
														}
													?> 
												/>
												<span class="radio-btn"><i class="las la-check"></i>
													<div class="hobbies-icon">
														<h5><b>Not Active</b></h5>
													</div>
												</span>
											</label>
										</div>
									</div>
									<div class="submit">
										<a href="update-category.php?category_id=<?php echo $category_id; ?>">Update</a>
									</div>
							</td>
							<td><a href="delete-category.php?category_id=<?php echo $category_id; ?>">Delete</a></td>
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



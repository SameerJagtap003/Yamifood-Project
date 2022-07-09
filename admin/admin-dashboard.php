<?php include('login-check.php'); ?>


<?php 

    include('../constant/coneection.php');

    //for admin how loged in
    $username = $_SESSION['admin_username'];
    $admin_result = pg_query($pgcon,"SELECT * FROM tbl_admin WHERE admin_username = '$username'");
    while ($admin_rows = pg_fetch_assoc($admin_result)) {
      $admin_username = $admin_rows['admin_username'];
    }


    //for total employee
    $stuff_result = pg_query($pgcon,"SELECT * FROM tbl_stuff ");
    $stuff_count = pg_num_rows($stuff_result);


    //for chart
    // echo "Today date" . $today_date = date("M d, Y") . "<br>";
    $chart_pendding = pg_query($pgcon,"SELECT * FROM tbl_orders WHERE date_time =  CURRENT_DATE AND status = 'Placed' OR status = 'In-Kitchen' OR status = 'On-The-Way' ");
    $pendding_count = pg_num_rows($chart_pendding);

    $chart_delivered = pg_query($pgcon,"SELECT * FROM tbl_orders WHERE date_time =  CURRENT_DATE AND status = 'Delivered' ");
    $delivered_count = pg_num_rows($chart_delivered);

    
    //table booking
    $table_booking = pg_query($pgcon,"SELECT * FROM tbl_table WHERE booking_date = CURRENT_DATE AND status = 0");
    $table_booking_count = pg_num_rows($table_booking);

    //total order income
    $orders_income = pg_query($pgcon,"SELECT SUM(total) as total FROM tbl_orders WHERE status = 'Delivered' ");
    $total = pg_fetch_array($orders_income);

    //orders
    $total_orders_result = pg_query($pgcon,"SELECT * FROM tbl_orders ");
    $total_orders_count = pg_num_rows($total_orders_result);

    //users
    $cust_result = pg_query($pgcon,"SELECT * FROM tbl_customer ");
    $cust_count = pg_num_rows($cust_result);


    //for notifications
    $notification_result = pg_query($pgcon,"SELECT * FROM tbl_order_cancel_msg WHERE status = 0");
		$notification_count = pg_num_rows($notification_result);

    //table booking income
    $tbl_income = pg_query($pgcon,"SELECT SUM(income) as income FROM tbl_table WHERE status = 1 ");
    $tbl_income = pg_fetch_array($tbl_income);


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
  <link rel="stylesheet" href="../css/admin-dashboard-style.css" />

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
						<li class="nav-item active"><a class="nav-link" href="admin-dashboard.php">DashBoard</a></li>
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
					<h1>DashBoard</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->


<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    /> -->
    <!-- <link rel="stylesheet" href="../css/admin-dashboard-style.css" /> -->
    <title>Admin DASHBOARD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

  <!-- </head> -->
  <body id="body">
    <div class="container">

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="../images/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>Hello <?php echo $admin_username ?></h1>
              <p>Welcome to your admin dashboard</p>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <a href="admin-orders.php">
              <div class="card">
                <i style="font-size: 24px;" class="fa fa-truck text-lightblue" aria-hidden="true"></i>
                <div class="card_inner">
                  <p class="text-primary-p">Pendding Orders</p>
                  <span class="font-bold text-title text-ali"><?php echo $pendding_count ?></span>
                </div>
              </div>
            </a>

            <a href="table_bookings.php">
              <div class="card">
                <!-- <i style="font-size: 20px;" class="fa fa-cutlery text-green" aria-hidden="true"></i> -->
                <i style="font-size: 20px;" class="fas fa-utensils text-green"></i>
                <div class="card_inner">
                  <p class="text-primary-p">Today's Table Booking</p>
                  <span class="font-bold text-title text-ali"><?php echo $table_booking_count ?></span>
                </div>
              </div>  
            </a>

            <a href="stuff.php">
              <div class="card">
                  <!-- <i style="font-size: 20px;" class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i> -->
                  <i style="font-size: 20px;" class="fas fa-user-alt text-lightblue"></i>
                <div class="card_inner">
                  <p class="text-primary-p">Total Employee</p>
                  <span class="font-bold text-title text-ali"><?php echo $stuff_count ?></span>
                </div>
              </div>
            </a>

            <a href="order-cancel-msg.php">
            <div class="card">
              <!-- <i style="font-size: 20px;" class="fa fa-file-text text-yellow" aria-hidden="true"></i> -->
              <i style="font-size: 20px;" class="fas fa-bell text-yellow" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">New Notifications</p>
                <span class="font-bold text-title text-ali"><?php echo $notification_count ?></span>
              </div>
            </div>
            </a>

            
          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Daily Reports</h1>
                  <p>Yamifood Restaurant</p>
                </div>
                <i class="fa fa-inr" aria-hidden="true"></i>
              </div>
              <div class="container2">
                <canvas id="myChart"></canvas>
              </div>
              <script>

                let myChart = document.getElementById('myChart').getContext('2d');
          
                Chart.defaults.global.defaultFontFamily = 'Lato';
                Chart.defaults.global.defaultFontSize = 18;
                Chart.defaults.global.defaultFontColor = '#777';
          
                let massPopChart = new Chart(myChart,{
                    type:'doughnut',//bar, horizontalBar, pie, line, doughnut, radar, polarArea
                    data:{
                        labels:['Delivered','Pendding'],
                        datasets:[{
                            label:'Orders',
                            data:[
                                <?php echo $delivered_count ?>,
                                <?php echo $pendding_count ?>
                                // 10,
                                // 20,
                                // 15,
                                // 5
                            ],
                            backgroundColor:[
                                // 'rgba(54, 162, 235, 0.6)',
                                // 'rgba(255, 99, 132, 0.6)',
                                // 'rgba(255, 206, 86, 0.6)',
                                // 'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                // 'rgba(255, 99, 132, 0.6)',
                            ],
                            borderWidth:2,
                            borderColor:'#777',
                            hoverBorderWidth:3,
                            hoverBorderColor:'#000'
                        }]
                    },
                    options:{
                        title:{
                            display:true,
                            text:'Order Statistics',
                            fontSize:25
                        },
                        legend:{
                            display:false,
                            position:'right',
                            labels:{
                                fontColor:'#000'
                            }
                        },
                        layout:{
                            padding:{
                                left:50,
                                right:0,
                                bottom:0,
                                top:0 
                            }
                        },
                        tooltips:{
                            enabled:true
                        }
                    }
                });
          
          
            </script>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Stats Reports</h1>
                  <p>Yamifood Restaurant</p>
                </div>
                <i class="fa fa-inr" aria-hidden="true"></i>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1>Table Booking Income</h1>
                  <p>₹ <?php echo $tbl_income['income'] ?></p>
                </div>

                <div class="card2">
                  <h1>Total Orders Income</h1>
                  <p>₹ <?php echo $total['total'] ?> </p>
                </div>

                <div class="card3">
                  <h1>Users</h1>
                  <p><?php echo $cust_count ?></p>
                </div>

                <div class="card4">
                  <h1>Orders</h1>
                  <p><?php echo $total_orders_count ?></p>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
      </main>
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


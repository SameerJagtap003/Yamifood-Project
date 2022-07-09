<?php include('header.php'); ?>
<?php include('../constant/coneection.php'); ?>

    <!-- Start header -->
    <div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Order History</h1>
					<?php 
						if (isset($_SESSION['order_canceled'])) {
							echo $_SESSION['order_canceled'];
							unset($_SESSION['order_canceled']);
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

	<?php 
	
		//for customer 
		$customer_usrname = $_SESSION['customer_username'];
		$cust_result = pg_query($pgcon,"SELECT * FROM tbl_customer WHERE cust_username =  '$customer_usrname' ");
		$cust_rows = pg_fetch_assoc($cust_result);
		$cust_id = $cust_rows['cust_id'];
		$cust_name = $cust_rows['cust_name'];
		$cust_phone = $cust_rows['cust_phone'];
		$cust_username = $cust_rows['cust_username'];
		$cust_email = $cust_rows['cust_email'];
		$cust_address = $cust_rows['cust_address'];

	?>

<?php 

	$order_result = pg_query($pgcon,"SELECT * FROM tbl_orders WHERE cust_id = $cust_id ORDER BY order_id DESC");
	$order_counter = pg_num_rows($order_result);
	if ($order_counter > 0) {

		while ($order_rows = pg_fetch_assoc($order_result)) {
			$order_id = $order_rows['order_id'];
			$menu_id = $order_rows['menu_id'];
			$qty = $order_rows['qty'];
			$shipping_charges = $order_rows['shipping_charges'];
			$total = $order_rows['total'];
			$status = $order_rows['status'];
			$date_time = $order_rows['date_time'];
			$size = $order_rows['size'];

			//for ordered menu
			$menu_result = pg_query($pgcon,"SELECT * FROM tbl_menu WHERE menu_id = $menu_id");
			$menu_rows = pg_fetch_assoc($menu_result);
			$menu_id = $menu_rows['menu_id'];
			$menu_img = $menu_rows['menu_img'];
			$menu_id = $menu_rows['menu_id'];
			$menu_name = $menu_rows['menu_name'];
			$menu_description = $menu_rows['menu_description'];
			$menu_active = $menu_rows['menu_active'];
			$category_id = $menu_rows['category_id'];
			$menu_price = $menu_rows['menu_price'];
			?>

				<main id="main-site">

				<!--   product  -->
					<section id="product" class="py-3">
						<div class="container">
							<div class="row">
								<div style="padding-top: 40px;" class="col-sm-6">
									<!-- <img src="images/blog-img-01.jpg" alt="product" class="img-fluid"> -->
									<?php echo "<img src='../admin/admin-menu/menu-img/" . $menu_img . " ' class='img-fluid' alt='user' width='400'>"; ?>
									
								</div>
								<div class="col-sm-6 py-5">
									<h5 class="font-baloo font-size-20"><?php echo $menu_name ?></h5>
									<small>by Yamifood Restaurant</small>
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
												<td><span class="font-size-16 text-danger"><?php echo $total ?></span></td>
											</tr>
										</table>
									<!---    !product price       -->

										<hr>

									<!-- order-details -->
										<div id="order-details" class="font-rale d-flex flex-column text-dark">
											<small>Delivery by : Yamifood Restaurant</small>
											<small>Delivery at : In Next 2 Hours</small>
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
										</div><br>
										<?php 
											if ($status != 'On-The-Way' && $status != 'Delivered' && $status != 'Canceled') {
												?>
												<div class="col">
													<a class="btn btn-process btn-warning form-control" href="cancel-order.php?order_id=<?php echo $order_id ?>">Cancel Order</a>
												</div>
												<?php
											}

											else if ($status == 'Canceled' || $status == 'Delivered') {
												?>
												<div class="col">
													<a class="btn btn-process btn-warning form-control" href="../product.php?menu_id=<?php echo $menu_id ?>">Order Again</a>
												</div>
												<?php
											}
										?>
									<!-- !order-details -->
								</div>
							</div>
						</div>
						<div class="prog">
						<h1 style="text-align: center;">Track Your Order</h1>
						<ul>
							<?php 
								if ($status == 'Placed') {
									?>
										<li>
											<i class="fas fa-mouse"></i><br>
											<i class="fa fa-check"></i>
											<p>Order Placed</p>
										</li>
									<?php
								}
							?>
							<?php 
								if ($status == 'In-Kitchen') {
									?>
										<li>
											<i class="fas fa-mouse"></i><br>
											<i class="fa fa-check"></i>
											<p>Order Placed</p>
										</li>
										<li>
											<i class="fas fa-utensils"></i><br>
											<i class="fa fa-check"></i>
											<p>In kitchen</p>
										</li>
									<?php
								}
							?>
							<?php 
								if ($status == 'On-The-Way') {
									?>
										<li>
											<i class="fas fa-mouse"></i><br>
											<i class="fa fa-check"></i>
											<p>Order Placed</p>
										</li>
										<li>
											<i class="fas fa-utensils"></i><br>
											<i class="fa fa-check"></i>
											<p>In kitchen</p>
										</li>
										<li>
											<i class="fas fa-road"></i><br>
											<i class="fa fa-check"></i>
											<p>On The Way</p>
										</li>
									<?php
								}
							?>
							
							<?php 
								if ($status == 'Delivered') {
									?>
										<li>
											<i class="fas fa-mouse"></i><br>
											<i class="fa fa-check"></i>
											<p>Order Placed</p>
										</li>
										<li>
											<i class="fas fa-utensils"></i><br>
											<i class="fa fa-check"></i>
											<p>In kitchen</p>
										</li>
										<li>
											<i class="fas fa-road"></i><br>
											<i class="fa fa-check"></i>
											<p>On The Way</p>
										</li>
										<li>
											<i class="fas fa-truck-loading"></i><br>
											<i class="fa fa-check"></i>
											<p>Delivered</p>
										</li>
								<?php
								}
							?>

							
							<?php 
								if ($status == 'Canceled') {
									?>
										<li>
											<i class="fas fa-mouse"></i><br>
											<i class="fa fa-check"></i>
											<p>Order Placed</p>
										</li>
										<li>
											<i class="fas fa-ban"></i><br>
											<i class="fa fa-check"></i>
											<p>Order Cancled</p>
										</li>
								<?php
								}
							?>


						</ul>
					</div>
					</section>
					
				<!--   !product  -->

				<!-- Start Menu -->
				</main>
				<hr>
			<?php
		}
	} else {
		
		echo "<h1 style='text-align: center;'> Not Order Yet</h1>";

	}

?>
		

	

<?php include('footer.php') ?>
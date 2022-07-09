<?php include('header.php'); ?>

    <!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Account</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				
            <?php 
                
                //get username who loged in
                $customer_username = $_SESSION['customer_username'];

                //Connection to PostgreSQL
                include('../constant/coneection.php');

                //query to fetch data of admin
                $query = "SELECT * FROM tbl_customer WHERE cust_username = '$customer_username'; ";

                //execute the query
                $result = pg_query($pgcon,$query);

                while ($rows = pg_fetch_assoc($result)) {
                    
                    
                    ?>

                    <div class="wrapper">
                        <div class="left">
                            <?php echo "<img src='img/" . $rows['cust_img'] . " ' alt='user' width='100'>"; ?>
                            <h4><?php echo $rows['cust_name'] ?></h4>
                            <p>User</p>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Information</h3>
                                <div class="info_data">
                                    <div class="data">
                                        <h4>Email</h4>
                                        <p><?php echo $rows['cust_email'] ?></p>
                                    </div>
                                    <div class="data">
                                        <h4>Phone</h4>
                                        <p><?php echo $rows['cust_phone'] ?></p>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="projects">
                                <div class="projects_data">
                                    <div class="data">
                                        <h4>Address</h4>
                                        <p><?php echo wordwrap($rows['cust_address'],50,"<br>") ?>.</p>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="social_media">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <div class="subscribe_form" style="padding-top: 10%;">
                                    <a href="customer-update.php"><button type="submit" class="submit" name="submit">Update</button></a>
                                </div>
                                <?php 
                                    if (isset($_SESSION['customer-updated'])) {
                                        echo $_SESSION['customer-updated'];
                                        unset($_SESSION['customer-updated']);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>    

                    <?php
                }

            ?>

			</div>
		</div>
	</div>
    <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
	<!-- End About -->

<?php include('footer.php'); ?>
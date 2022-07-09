<?php include('header.php'); ?>

    <!-- Start header -->
    <div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Table Booking History</h1>
                    <?php 
                        if (isset($_SESSION['cancel-order'])) {
                            echo $_SESSION['cancel-order'];
                            unset($_SESSION['cancel-order']);
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->

    <?php 
    
        
        include('../constant/coneection.php');
        $cust_id = $_SESSION['cust_id'];

        $cust_result = pg_query($pgcon,"SELECT * FROM tbl_customer WHERE cust_id = $cust_id");
        while ($cust_rows = pg_fetch_assoc($cust_result)) {
            
            $cust_name = $cust_rows['cust_name'];
        }

        $booking_res = pg_query($pgcon,"SELECT * FROM tbl_table WHERE cust_id = $cust_id AND status = 0");
        $booking_count = pg_num_rows($booking_res);
        if ($booking_count > 0) {
            while ($booking_rows = pg_fetch_assoc($booking_res)) {
                $table_id = $booking_rows['table_id']; ?>

                                    
                    <main id="main-site">

                        <!--   product  -->
                            <section id="product" class="py-3">

                                <div class="container">
                                    <div class="row">
                                        <div style="padding-top: 40px;" class="col-sm-6">
                                            <img style="margin-left: 20%;" src="../images/tbl_booking1.png" alt="product" width="300" class="img-fluid">
                                        </div>
                                        <div class="col-sm-6 py-5">
                                            <small>by Yamifood Restaurant</small>
                                            <hr class="m-0">

                                            <!---    product price       -->
                                                <table class="my-3">
                                                    <tr class="font-rale font-size-14">
                                                        <td>Booking By: <?php echo $cust_name ?></td>
                                                        <td class="font-size-20 text-danger">
                                                    </tr>
                                                    <tr class="font-rale font-size-14">
                                                        <td>Booking Date : <?php echo $booking_rows['booking_date'] ?></td>
                                                        <td><span class="font-size-16 text-danger"></span></td>
                                                    </tr>
                                                    <tr class="font-rale font-size-14">
                                                        <td>Booking Time : <?php echo $booking_rows['booking_time'] ?></td>
                                                        <td><span class="font-size-16 text-danger"></span></td>
                                                    </tr>
                                                    <tr class="font-rale font-size-14">
                                                        <td>No of Persons : <?php echo $booking_rows['no_of_persons'] ?></td>
                                                        <td><span class="font-size-16 text-danger"></span></td>
                                                    </tr>
                                                    <tr class="font-rale font-size-14">
                                                        <td>Total Price : 
                                                            <span class="font-size-16 text-danger">₹<?php echo $booking_rows['income'] ?></span>
                                                            <small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small> 
                                                        </td> 
                                                    </tr>
                                                </table>
                                            <!---    !product price       -->

                                                <hr>

                                            <!-- order-details -->
                                                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                                                    <small>Booking at : Yamifood Restaurant</small>
                                                    </small>
                                                </div><br>
                                            <a class="btn btn-process btn-warning form-control" href="cancel_table_booking.php?table_id=<?php echo $table_id ?>">Cancel Booking</a>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        <!--   !product  -->

                    </main>

                <?php
            }
        } else {
            echo "<h1 style='text-align: center;'> Not Booking Yet</h1>";
        }
    
    ?>

<?php include('footer.php'); ?>




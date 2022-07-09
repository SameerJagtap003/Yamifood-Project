<?php 

    include('login-check.php');
    include('../constant/coneection.php');
    $order_id = $_GET['order_id'];


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

    
     <!-- font awesome icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
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


.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
  margin-left: 580px;
  margin-top: 10px;
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.btn{
    border-radius: 50px;
}
img{
    margin-left: 670px;
}

</style>

<body>


    <?php 
    
    $result = pg_query($pgcon,"SELECT * FROM tbl_orders WHERE order_id = " . $_GET['order_id'] );
    while($rows = pg_fetch_assoc($result)){
        $order_id = $rows['order_id'];
        $status = $rows['status'];


        ?>

            <a class="navbar-brand" href="#">
                    <img src="../images/logo.png" alt="" />
                </a>
                <div class="wrapper">
                    <div class="title-text">
                        <div class="title login">Update Category</div>
                    </div>
                    <div class="form-container">
                        
                        <div class="form-inner">
                            <form action="update-order-status.php" method="GET" class="login">
                                <div class="main-container">
                                    <div class="radio-buttons">
                                        <?php
                                        
                                        if ($status != 'Delivered' && $status != 'Canceled') {

                                            ?>
                                                     <label class="custom-radio">
                                                        <input type="radio" name="status" value="Placed"
                                                            <?php
                                                                if ($status == 'Placed') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>Placed</b></h5>
                                                            </div>
                                                        </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="radio" name="status" value="In-Kitchen"
                                                            <?php
                                                                if ($status == 'In-Kitchen') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>In Kitchen</b></h5>
                                                            </div>
                                                        </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="radio" name="status" value="On-The-Way"
                                                            <?php
                                                                if ($status == 'On-The-Way') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>On The Way</b></h5>
                                                            </div>
                                                        </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="radio" name="status" value="Delivered"
                                                            <?php
                                                                if ($status == 'Delivered') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>Delivered</b></h5>
                                                            </div>
                                                        </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="radio" name="status" value="Canceled"
                                                            <?php
                                                                if ($status == 'Canceled') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>Canceled</b></h5>
                                                            </div>
                                                        </span>
                                                    </label>
                                                   
                                            <?php
                                        }

                                        ?>

                                        <?php 
                                        
                                            if ($status == 'Delivered') {
                                                ?>
                                                      <label class="custom-radio">
                                                        <input type="radio" name="status" value="Delivered"
                                                            <?php
                                                                if ($status == 'Delivered') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>Delivered</b></h5>
                                                            </div>
                                                        </span>
                                                    </label>
                                                    <p>Can't Update Status Becouse Order is Delivered</p>
                                                <?php
                                            }
                                        
                                        ?>
                                    
                                        
                                       
                                        <?php 
                                        
                                            if ($status == 'Canceled') {
                                                ?>
                                                    <label class="custom-radio">
                                                        <input type="radio" name="status" value="Canceled"
                                                            <?php
                                                                if ($status == 'Canceled') {
                                                                echo 'checked';
                                                                }
                                                            ?> 
                                                        />
                                                        <span class="radio-btn"><i style="font-size: 12px;" class="fas fa-check"></i>
                                                            <div class="hobbies-icon">
                                                                <h5><b>Canceled</b></h5>
                                                            </div>
                                                        </span>
                                                        <p>Can't Update Status Becouse Order is Canceled</p>
                                                    </label>
                                                <?php
                                            }
                                        
                                        ?>
                                    </div>
                                </div>
                                <input type="text" name="order_id" hidden value="<?php echo $order_id ?>">
                                <button class="btn btn-process btn-danger form-control" name="submit" type="submit">Update</button>
                                <a href="admin-orders.php" class="btn btn-process btn-warning form-control">Go Back</a>
                            </form>
                        </div>
                    </div>
                </div>

        <?php
    }
    
    ?>


    



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


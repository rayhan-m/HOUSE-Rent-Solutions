 <?php
 @session_start();
   if ($_SESSION['tenant_login'] == TRUE) {
 include('include/ten-header.php');

 if (isset($_POST['button'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$payment_month = $_POST['payment_month'];

 	$user_name= $_SESSION['user_name'];
 	$sql3 = "SELECT flatid, owner FROM tenant WHERE user_name='$user_name'";
 	$query = $connection->query($sql3);
 	$flat = mysqli_fetch_assoc($query);
 	$flatid= $flat['flatid'];
 	$owner= $flat['owner'];

 	$sql3 = "SELECT rent FROM flat WHERE flatid='$flatid'";
 	$query = $connection->query($sql3);
 	$flat = mysqli_fetch_assoc($query);
 	$rent= $flat['rent'];

 	$payment_date= date('d').' '.date('M Y');
 	$tr_id=$_POST['tr_id'];
 	$payment_type='Bkash';
 	$status='Unpaid';


 	$sql = "INSERT INTO payment (flatid,user_name,owner,rent,payment_date,payment_month,tr_id,payment_type,status)VALUES ('$flatid','$user_name','$owner','$rent','$payment_date','$payment_month','$tr_id','$payment_type','$status')";
 	$query = $connection->query($sql);

 	$_SESSION['message'] = 'Payment Send Successfully';
 	header('location:payment.php');
	}
 ?>

 <div style="background-image: url('img/banner2.jpg')" class="banner_section1">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<h3>Tenant Feedback</h3>
 			</div>
 		</div>
 	</div>
 </div>

</div>
<div class="main_content_section">
	<div class="col-md-12">
		<?php include('include/menubar.php')?>

		<div class="content_list">

			<div class="col-md-offset-2 col-md-8">
				<!-- MAIN CONTENT-->
				<div class="panel panel-default col-md-12"> 
					<?php 
					$connection = mysqli_connect('localhost', 'root', '', 'homerent');
					$user_name= $_SESSION['user_name'];
				 	$sql3 = "SELECT flatid FROM tenant WHERE user_name='$user_name'";
				 	$query = $connection->query($sql3);
				 	$flat = mysqli_fetch_assoc($query);
				 	$flatid= $flat['flatid'];

					$sql5 = "SELECT bkash FROM flat WHERE flatid='$flatid'";
				 	$query5 = $connection->query($sql5);
				 	$bkash = mysqli_fetch_assoc($query5);
				 	$Bkash= $bkash['bkash'];

					?>
					<h1 class="text-center" style="color: #fff; background-color:  #66016c ;">BKash No:(+880) <?php echo @$Bkash; ?></h>
					<h2 class="text-center" style="color: #fff; background-color: #0a1647;">Make Rent Payment</h2>
						<form action="" method="post" enctype="multipart/form-data" >
							<div class="form-row" style="color: #000">

								<div class="form-group form-float">
									<div class="form-group form-float">
			                        	<div class="form-line">
			                        		<select class="form-control" name="payment_month" required>
			                        			<option value="">Select Payment Month</option>
			                        			<option value="January">January</option>
		                                        <option value="February">February</option>
		                                        <option value="March">March</option>
		                                        <option value="April">April</option>
		                                        <option value="May">May</option>
		                                        <option value="June">June</option>
		                                        <option value="July">July</option>
		                                        <option value="August">August</option>
		                                        <option value="September">September</option>
		                                        <option value="October">October</option>
		                                        <option value="November">November</option>
		                                        <option value="December">December</option>
			                        		</select>
			                        	</div>
			                        </div>
									<div class="form-line">
										<label>Transaction ID</label>
										<input type="text" class="form-control" name="tr_id" placeholder="TrxID">
									</div>
								</div>
								<button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
		</div>   
	</div>  
</div>
</div>
<!--Inspiration from: http://ertekinn.com/loginsignup/-->


<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
	window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
	ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
<?php }else{
    header('location:login.php');
}
?>
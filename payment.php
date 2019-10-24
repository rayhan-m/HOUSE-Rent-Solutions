 <?php
 @session_start();
   if ($_SESSION['tenant_login'] == TRUE) {
 include('include/ten-header.php');
 $query = $DBM->ViewPayment();
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
 ?>

 <div style="background-image: url('img/banner2.jpg')" class="banner_section1">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<h3>Rent Payment</h3>
 			</div>
 		</div>
 	</div>
 </div>

</div>
<div class="main_content_section">
	<div class="col-md-12">
		<?php include('include/menubar.php')?>

		<div class="content_list">

			<div class="col-md-offset-1 col-md-10">
				<!-- MAIN CONTENT-->
				<div class="panel panel-default col-md-12"> 
					<a href="make-payment.php" class="btn btn-primary text-center" >Make Payment</a>
					<?php if(@$message){?>
			               <div>
			                <h4 class="text-center" style="padding: 10px; color: #fff; background-color: green;"><?php echo @$message ?></h4>
			            </div>
			        <?php }else{?>
			            <div id="hide">

			            </div>
			        <?php }?>
					<h2 class="text-center" style="color: #fff; background-color: #0a1647;"> Monthly Rent Payment List</h2>
					<table class="table table-striped" style="color:  #000;">
						<thead>
							<tr>
								<th>Payment ID</th>
								<th>Flat ID</th>
								<th>Payment Date</th>
								<th>Payment Month</th>
								<th>Amount</th>
								<th>Trx ID</th>
								<th>Payment Type</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ($ViewPayment = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?php echo @$ViewPayment['paymentid']; ?></td>
								<td><?php echo @$ViewPayment['flatid']; ?></td>
								<td><?php echo @$ViewPayment['payment_date']; ?></td>
								<td><?php echo @$ViewPayment['payment_month']; ?></td>
								<td><?php echo @$ViewPayment['rent']; ?></td>
								<td><?php echo @$ViewPayment['tr_id']; ?></td>
								<td><?php echo @$ViewPayment['payment_type']; ?></td>

								<?php if($ViewPayment['status'] == 'Paid'){?>
								<td class="btn" style="background-color: green; color: #fff;"><?php echo @$ViewPayment['status']; ?></td>
								<?php } else{?>
									<td class="btn" style="background-color: pink; color: #000;"><?php echo @$ViewPayment['status']; ?></td>
								<?php }?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
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
<script>
	function downloadSample() {
		window.open("leaveNotice/sampleNotice/Sample-Notice.docx");
	}
</script>
</body>

</html>

<?php }else{
    header('location:login.php');
}
?>
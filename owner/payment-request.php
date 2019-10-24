 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewTenPaymentReq();

 if (isset($_SESSION['message'])) {
 	$message = $_SESSION['message'];
 	unset($_SESSION['message']);
 }
 if (isset($_POST['btn'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$paymentid = $_POST['paymentid'];

 	$sql = "UPDATE payment SET status='Paid' WHERE paymentid='$paymentid'";
 	$query = $connection->query($sql);
 	$_SESSION['message'] = 'Payment Paid Successfully';
 	header('location:payment-request.php');
 }
 ?>
 <?php include('include/sitebar.php')?>
 <section class="content">
 	<div class="container-fluid">
 		<?php if($message){?>
 			<div>
 				<h4 class="text-center text-success bg-green btn-block waves-effect" style="padding: 10px;"><?php echo $message ?></h4>
 			</div>
 		<?php }else{?>
 			<div id="hide">

 			</div>
 		<?php }?>
 		<!-- Exportable Table -->
 		<div class="row clearfix">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<div class="card">
 					<div class="header">
 						<h1 class="text-center">
 							Tenant Rent Payment

 						</h1>

 						<ul class="header-dropdown m-r--5">
 							<li class="dropdown">
 								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
 									<i class="material-icons">more_vert</i>
 								</a>
 								<ul class="dropdown-menu pull-right">
 									<li><a href="javascript:void(0);">Action</a></li>
 									<li><a href="javascript:void(0);">Another action</a></li>
 									<li><a href="javascript:void(0);">Something else here</a></li>
 								</ul>
 							</li>
 						</ul>
 					</div>
 					<div class="body">
 						<div class="table-responsive">
 							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
										<th>Action</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>Payment ID</th>
										<th>Flat ID</th>
										<th>Payment Date</th>
										<th>Payment Month</th>
										<th>Amount</th>
										<th>Trx ID</th>
										<th>Payment Type</th>
										<th>Status</th>
										<th>Action</th>
 									</tr>
 								</tfoot>
 								<tbody>
 									<?php
								while ($viewTenPaymentReq = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?php echo @$viewTenPaymentReq['paymentid']; ?></td>
								<td><?php echo @$viewTenPaymentReq['flatid']; ?></td>
								<td><?php echo @$viewTenPaymentReq['payment_date']; ?></td>
								<td><?php echo @$viewTenPaymentReq['payment_month']; ?></td>
								<td><?php echo @$viewTenPaymentReq['rent']; ?></td>
								<td><?php echo @$viewTenPaymentReq['tr_id']; ?></td>
								<td><?php echo @$viewTenPaymentReq['payment_type']; ?></td>
								<td class="btn" style="background-color: pink; color: #000;"><?php echo @$viewTenPaymentReq['status']; ?></td>

								<td>
 									<form action="" method="post">
 										<input type="hidden" name="paymentid" value="<?php echo $viewTenPaymentReq['paymentid']; ?>" class="form-control" >
 										<button type="submit" name="btn" class="btn bg-deep-purple waves-effect">Paid</button>
 									</form>
 								</td>
							</tr>
							<?php } ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>
</div>
<!-- #END# Exportable Table -->
</div>
</section>

<?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>
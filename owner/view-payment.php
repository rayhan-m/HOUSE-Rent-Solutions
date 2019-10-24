 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewTenPayment();

 if (isset($_SESSION['message'])) {
 	$message = $_SESSION['message'];
 	unset($_SESSION['message']);
 }
 if (isset($_POST['btn'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$paymentid = $_POST['paymentid'];

 	$sql = "UPDATE payment SET status='Paid' WHERE paymentid='$paymentid'";
 	$query = $connection->query($sql);

 	header('location:view-payment.php');
 }
 if (isset($_GET['delete'])) {
		$paymentid = $_GET['delete'];
		$message = $DBM->deletePayment($paymentid);
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
 						<div class="button-demo">
                                <a type="button" href="make-payment.php" class="btn bg-deep-purple waves-effect">Make Payment</a>
                            </div>

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
								while ($ViewTenPayment = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?php echo @$ViewTenPayment['paymentid']; ?></td>
								<td><?php echo @$ViewTenPayment['flatid']; ?></td>
								<td><?php echo @$ViewTenPayment['payment_date']; ?></td>
								<td><?php echo @$ViewTenPayment['payment_month']; ?></td>
								<td><?php echo @$ViewTenPayment['rent']; ?></td>
								<td><?php echo @$ViewTenPayment['tr_id']; ?></td>
								<td><?php echo @$ViewTenPayment['payment_type']; ?></td>

								<?php if($ViewTenPayment['status'] == 'Paid'){?>
								<td class="btn" style="background-color: green; color: #fff;"><?php echo @$ViewTenPayment['status']; ?></td>
								<?php } else{?>
									<td class="btn" style="background-color: pink; color: #000;"><?php echo @$ViewTenPayment['status']; ?></td>
								<?php }?>

								<td>
 									<form action="" method="post">
 										<input type="hidden" name="paymentid" value="<?php echo $ViewTenPayment['paymentid']; ?>" class="form-control" >
 										<button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($ViewTenPayment['status'] == 'Paid'){?> disabled <?php } ?> >CONFIRM</button>
 									</form>
 									<a href="?delete=<?php echo $ViewTenPayment['paymentid']; ?>" class="btn btn-danger <?php if($ViewTenPayment['status'] =='Paid'){?> disabled <?php } ?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="material-icons">delete</i></a>
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
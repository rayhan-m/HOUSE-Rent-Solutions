 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->ViewExpense();

 if (isset($_SESSION['message'])) {
 	$message = $_SESSION['message'];
 	unset($_SESSION['message']);
 }
 if (isset($_POST['btn'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$expenseid = $_POST['expenseid'];

 	$sql = "UPDATE expense SET status='Confirmed' WHERE expenseid='$expenseid'";
 	$query = $connection->query($sql);

 	header('location:expense.php');
 }
 if (isset($_GET['delete'])) {
		$expenseid = $_GET['delete'];
		$message = $DBM->deleteExpense($expenseid);
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
 							Expense List

 						</h1>
 						<div class="button-demo">
                                <a type="button" href="make-voucher.php" class="btn bg-deep-purple waves-effect">Make Voucher</a>
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
 										<th>Expense ID</th>
										<th>Expense Type</th>
										<th>Amount</th>
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>Expense ID</th>
										<th>Expense Type</th>
										<th>Amount</th>
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>
 									</tr>
 								</tfoot>
 								<tbody>
 									<?php
								while ($ViewExpense = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?php echo @$ViewExpense['expenseid']; ?></td>
								<td><?php echo @$ViewExpense['expense_type']; ?></td>
								<td><?php echo @$ViewExpense['amount']; ?></td>
								<td><?php echo @$ViewExpense['date']; ?></td>

								<?php if($ViewExpense['status'] == 'Confirmed'){?>
								<td class="btn" style="background-color: green; color: #fff;"><?php echo @$ViewExpense['status']; ?></td>
								<?php } else{?>
									<td class="btn" style="background-color: pink; color: #000;"><?php echo @$ViewExpense['status']; ?></td>
								<?php }?>

								<td>
 									<form action="" method="post">
 										<input type="hidden" name="expenseid" value="<?php echo $ViewExpense['expenseid']; ?>" class="form-control" >
 										<button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($ViewExpense['status'] == 'Confirmed'){?> disabled <?php } ?> >CONFIRM</button>
 									</form>
 									<a href="?delete=<?php echo $ViewExpense['expenseid']; ?>" class="btn btn-danger <?php if($ViewExpense['status'] =='Confirmed'){?> disabled <?php } ?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="material-icons">delete</i></a>
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
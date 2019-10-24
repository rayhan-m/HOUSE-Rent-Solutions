 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->ViewExpenseReport();

	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
	$user_name=$_SESSION['user_name'];
    $sql = "SELECT rent FROM payment WHERE owner='$user_name' AND status='Paid'";
	$query1 = $connection->query($sql);
	$TotalRent = 0;
	while ($Trent = $query1->fetch_assoc()) {
		$TotalRent += $Trent['rent'];
	}

 ?>
 <?php include('include/sitebar.php')?>
 <section class="content">
 	<div class="container-fluid">
 		<!-- Exportable Table -->
 		<div class="row clearfix">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<div class="card">
 					<div class="header">
 						<h1 class="text-center">
 							Total Expense Report

 						</h1>
 					</div>
 					<div class="body">
 						<div class="table-responsive">
 							<table class="table table-bordered table-striped table-hover dataTable js-exportable">
 								<thead>
 									<tr>
										<th>Expense ID</th>
										<th>Expense Type </th>
										<th>Expense Date</th>
										<th>Amount</th>
										<th >Total Expense</th>
 									</tr>
 								</thead>
 								<tbody>
 									<?php
								while ($ViewExpenseReport = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<th><?php echo @$ViewExpenseReport['expenseid']; ?></th>
								<th><?php echo @$ViewExpenseReport['expense_type']; ?></th>
								<th><?php echo @$ViewExpenseReport['date']; ?></th>
								<th><?php echo @$ViewExpenseReport['amount']; ?></th>
								<th style="background-color:  #a83aa8 ; color: #fff;"><?php echo @$total+=$ViewExpenseReport['amount']; ?></th>
							</tr>
						<?php }?>
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
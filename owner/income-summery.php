 <?php
 session_start();
 if ($_SESSION['owner_login'] == TRUE) {
 $connection = mysqli_connect('localhost', 'root', '', 'homerent');
 $user_name=$_SESSION['user_name'];

 $sql = "SELECT rent FROM payment WHERE owner='$user_name' AND status='Paid'";
 $query1 = $connection->query($sql);
 $TotalRent = 0;
 while ($Trent = $query1->fetch_assoc()) {
 	$TotalRent += $Trent['rent'];
 }

 $sql = "SELECT rent FROM payment WHERE owner='$user_name' AND status='Unpaid'";
 $query1 = $connection->query($sql);
 $TotalDue = 0;
 while ($TDue = $query1->fetch_assoc()) {
 	$TotalDue += $TDue['rent'];
 }

 $sql = "SELECT amount FROM expense WHERE user_name='$user_name' AND status='Confirmed'";
 $query2 = $connection->query($sql);
 $TotalExpense = 0;
 while ($TExpense = $query2->fetch_assoc()) {
 	$TotalExpense += $TExpense['amount'];
 }

$NetIncome= $TotalRent-$TotalExpense;
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
 							Income Summery Report

 						</h1>
 					</div>
 					<div class="body">
 						<div class="table-responsive">
 							<table class="table table-bordered table-striped  dataTable js-exportable">
 								<thead>
 									<tr>
 										<th>SL No</th>
 										<th>Title of Account</th>
 										<th>Total Cost</th>
 									</tr>
 								</thead>
 								<tbody>
 									<tr class="primary">
 										<td>1</td>
 										<td>Total Revenue</td>
 										<td><?php echo $TotalRent;?> TK</td>
 									</tr>
 									<tr class="warning">
 										<td>2</td>
 										<td>Total Due</td>
 										<td><?php echo $TotalDue;?> TK</td>
 									</tr>
 									<tr class="danger">
 										<td>3</td>
 										<td>Total Expense</td>
 										<td><?php echo $TotalExpense;?> TK</td>
 									</tr>
 									<tr class="success">
 										<td>4</td>
 										<td>Net Income</td>
 										<td><?php if($NetIncome<0){echo "0";}else{echo $NetIncome;}?> TK</td>
 									</tr>

 								</tbody>
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
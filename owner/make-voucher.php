 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 $message = "";
 require_once './DBManager.php';
 $DBM = new DBManager();
 if (isset($_SESSION['message'])) {
 	$message = $_SESSION['message'];
 	unset($_SESSION['message']);
 }
 if (isset($_POST['button'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$expense_type = $_POST['expense_type'];
 	$amount = $_POST['amount'];
 	$date= date('d').' '.date('M Y');
 	$month= date("F");
 	$user_name=$_SESSION['user_name'];
 	$status='Pending';


 	$sql = "INSERT INTO expense (expenseid,expense_type,amount,date,month,user_name,status)VALUES ('$expenseid','$expense_type','$amount','$date','$month','$user_name','$status')";
 	$query = $connection->query($sql);

 	$_SESSION['message'] = 'Voucher Added Successfully';
 	header('location:expense.php');

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
 		<!-- Basic Validation -->
 		<div class="row clearfix">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<div class="card">
 					<div class="header">
 						<h2 class="text-center bg-deep-orange" style="padding: 10px;">Voucher Information</h2>
 					</div>
 					<div class="body">
 						<form action="" method="POST" enctype="multipart/form-data">
 							<div class="form-group form-float">
 								<div class="form-line">
 									<select class="form-control" name="expense_type" required>
 										<option value="">Select Expense Type</option>
 										<option value="Utility Bill">Utility Bill</option>
 										<option value="Water Bill">Water Bill</option>
 										<option value="Gass Bill">Gass Bill</option>
 										<option value="Reparing">Reparing</option>
 										<option value="Other">Other</option>
 									</select>
 								</div>
 							</div>
 							<br/>
 							<br/>
 							<div class="form-group form-float">
 								<div class="form-line">
 									<input type="number" class="form-control" name="amount" >
 									<label class="form-label">Amount</label>
 								</div>
 							</div>
 							<br/>
 							<button class="btn btn-primary waves-effect text-center btn-block" type="submit" name="button">SUBMIT</button>
 						</form>
 					</div>

 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <script src="js/pages/ui/notifications.js"></script>
 <?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>
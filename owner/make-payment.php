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
 	$flatid = $_POST['flatid'];
 	$payment_month = $_POST['payment_month'];

 	$sql3 = "SELECT rent FROM flat WHERE flatid='$flatid'";
 	$query = $connection->query($sql3);
 	$flat = mysqli_fetch_assoc($query);
 	$rent= $flat['rent'];

 	$sql2 = "SELECT user_name FROM tenant WHERE flatid='$flatid'";
 	$query = $connection->query($sql2);
 	$name = mysqli_fetch_assoc($query);
 	$usname= $name['user_name'];

 	$owner=$_SESSION['user_name'];
 	$payment_date= date('d').' '.date('M Y');
 	$tr_id='-----';
 	$payment_type='Cash';
 	$status='Unpaid';


 	$sql = "INSERT INTO payment (flatid,user_name,owner,rent,payment_date,payment_month,tr_id,payment_type,status)VALUES ('$flatid','$usname','$owner','$rent','$payment_date','$payment_month','$tr_id','$payment_type','$status')";
 	$query = $connection->query($sql);

 	$_SESSION['message'] = 'Payment Added Successfully';
 	header('location:view-payment.php');

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
 						<h2 class="text-center bg-deep-orange" style="padding: 10px;">Payment Information</h2>
 					</div>
 					<div class="body">
 						<form action="" method="POST" enctype="multipart/form-data">
 							<div class="form-group form-float">
 								<div class="form-line">
 									<select class="form-control" name="flatid" required>
 										<option value="">Select Flat ID</option>
 										<?php
 										$user_name=$_SESSION['user_name'];
 										$connection = mysqli_connect('localhost', 'root', '', 'homerent');

 										$sql = "SELECT flatid from flat WHERE user_name='$user_name'";
 										$result = $connection->query($sql);

 										while ($row = $result->fetch_array()) {
 											echo "<option value='" . $row['flatid'] . "'>" . $row['flatid'] . "</option>";
						                                    } // while

						                                    ?>
						                                </select>
		                            			</div>
				                        </div>
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
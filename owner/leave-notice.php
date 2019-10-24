 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewTenLeaveNotice();

 if (isset($_SESSION['message'])) {
 	$message = $_SESSION['message'];
 	unset($_SESSION['message']);
 }
 if (isset($_POST['btn'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$lnid = $_POST['lnid'];

 	$sql3 = "SELECT flatid,user_name FROM leave_notice WHERE lnid='$lnid'";
	$query = $connection->query($sql3);
	$viewTenLN = mysqli_fetch_assoc($query);
	$flid= $viewTenLN['flatid'];
	$user_name= $viewTenLN['user_name'];

	$sql2 = "UPDATE booking SET status='Leaved' WHERE user_name='$user_name' AND flatid='$flid'";
	$query = $connection->query($sql2);

	$sql2 = "UPDATE flat SET availability='Available' WHERE flatid='$flid'";
	$query = $connection->query($sql2);

	$exit_month= date("F Y");
	$sql4 = "UPDATE tenant SET exit_month='$exit_month' WHERE flatid='$flid'";
	$query = $connection->query($sql4);

 	$sql = "UPDATE leave_notice SET approvement='Accepted', type='old' WHERE lnid='$lnid'";
 	$query = $connection->query($sql);

 	header('location:leave-notice.php');
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
 							Tenant Leave Notice

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
 										<th>SL</th>
 										<th>User Name</th>
 										<th>Date</th>
 										<th>Approvement</th>
 										<th>Notice</th>
 										<th>Action</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>SL</th>
 										<th>User Name</th>
 										<th>Date</th>
 										<th>Approvement</th>
 										<th>Notice</th>
 										<th>Action</th>
 									</tr>
 								</tfoot>
 								<tbody>
 									<?php
 									while ($viewTenLeaveNotice = mysqli_fetch_assoc($query)) {
 										?>
 										<tr>
 											<td><?php echo @$viewTenLeaveNotice['lnid']; ?> </td>
 											<td><?php echo @$viewTenLeaveNotice['user_name']; ?></td>
 											<td><?php echo @$viewTenLeaveNotice['date']; ?></td>
 										<?php if(@$viewTenLeaveNotice['approvement']=='Pending'){?>
 											<td class="bg-deep-orange waves-effect"><?php echo @$viewTenLeaveNotice['approvement']; ?>

 										</td>
 									<?php } else{?>
 										<td class="bg-green waves-effect"><?php echo @$viewTenLeaveNotice['approvement']; ?>
 									</td>
 								<?php }?>
 								<td>
 									<a class="btn btn-success glyphicon glyphicon-eye-open" target="_blank" href="../<?php echo $viewTenLeaveNotice['file'];?>"></a> 
 								</td>
 								<td>
 									<form action="" method="post">
 										<input type="hidden" name="lnid" value="<?php echo $viewTenLeaveNotice['lnid']; ?>" class="form-control" >
 										<button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($viewTenLeaveNotice['approvement'] == 'Accepted'){?> disabled <?php } ?> >Accept</button>
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
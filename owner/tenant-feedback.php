 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewTenFeedback();

 if (isset($_SESSION['message'])) {
 	$message = $_SESSION['message'];
 	unset($_SESSION['message']);
 }
 if (isset($_POST['btn'])) {
 	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
 	$feedbackid = $_POST['feedbackid'];

 	$sql3 = "SELECT flatid FROM feedback WHERE feedbackid='$feedbackid'";
 	$query = $connection->query($sql3);
 	$viewTenLN = mysqli_fetch_assoc($query);
 	$flid= $viewTenLN['flatid'];


 	$sql = "UPDATE feedback SET approvement='Accepted' WHERE feedbackid='$feedbackid' AND flatid='$flid'";
 	$query = $connection->query($sql);

 	header('location:tenant-feedback.php');
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
 							Tenant Feedback

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
 										<th>Flat ID</th>
 										<th>Title</th>
 										<th>Comment</th>
 										<th>Date</th>
 										<th>Status</th>
 										<th>Image</th>
 										<th>Approvement</th>
 										<th>Action</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>SL</th>
 										<th>Flat ID</th>
 										<th>Title</th>
 										<th>Comment</th>
 										<th>Date</th>
 										<th>Status</th>
 										<th>Image</th>
 										<th>Approvement</th>
 										<th>Action</th>
 									</tr>
 								</tfoot>
 								<tbody>
 									<?php
 									while ($viewTenFeedback = mysqli_fetch_assoc($query)) {
 										?>
 										<tr>
 											<td><?php echo @$viewTenFeedback['feedbackid']; ?> </td>
 											<td><?php echo @$viewTenFeedback['flatid']; ?></td>
 											<td><?php echo @$viewTenFeedback['title']; ?></td>
 											<td><?php echo @$viewTenFeedback['comment']; ?></td>
 											<td><?php echo @$viewTenFeedback['date']; ?></td>
 											<?php if(@$viewTenFeedback['status']=='Not Done'){?>
 												<td class="bg-deep-orange waves-effect"><?php echo @$viewTenFeedback['status']; ?>

 											</td>
		 										<?php } else{?>
		 											<td class="bg-green waves-effect"><?php echo @$viewTenFeedback['status']; ?>
		 										</td>
		 									<?php }?>

 											
 									<td class="text-center"><?php echo "<img src='../". @$viewTenFeedback['img'] . "'height='70' width='120'>"; ?>
									</td>
									<?php if(@$viewTenFeedback['approvement']=='Pending'){?>
										<td class="bg-deep-orange waves-effect"><?php echo @$viewTenFeedback['approvement']; ?>
											</td>
										<?php } else{?>
											<td class="bg-green waves-effect"><?php echo @$viewTenFeedback['approvement']; ?>
										</td>
									<?php }?>
 									<td>
 										<form action="" method="post">
 											<input type="hidden" name="feedbackid" value="<?php echo $viewTenFeedback['feedbackid']; ?>" class="form-control" >
 											<button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($viewTenFeedback['approvement'] == 'Accepted'){?> disabled <?php } ?> >Accept</button>
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
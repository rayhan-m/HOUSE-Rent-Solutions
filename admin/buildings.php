 <?php
 session_start();
   if ($_SESSION['admin_login'] == TRUE) {
 require_once '../owner/DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewBuildings();

 include('inc/header.php')
 ?>

 <!-- MAIN CONTENT-->
 <div class="main-content">
 	<div class="section__content section__content--p30">
 		<div class="row m-t-30">
 			<div class="col-md-12">
 				<h1 style="text-align: center; background-color: #673AB7; color: #fff;">Buildings List</h1>
 				<!-- DATA TABLE-->
 				<div class="table-responsive m-b-40">
 					<table class="table table-borderless table-data3">
 						<thead>
 							<tr>
 								<th>Building ID</th>
 								<th>House Name</th>
 								<th>House Number</th>
 								<th>Road Number</th>
 								<th>Address</th>
 								<th>Post Code</th>
 								<th>Documents</th>
 								<th>Status</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php
 							while ($viewBuldings = mysqli_fetch_assoc($query)) {
 								?>
 								<tr>
 									<td><?php echo @$viewBuldings['bid']; ?></td>
 									<td><?php echo @$viewBuldings['house_name']; ?></td>
 									<td><?php echo @$viewBuldings['house_number']; ?></td>
 									<td><?php echo @$viewBuldings['road_number']; ?></td>
 									<td><?php echo @$viewBuldings['location']; ?></td>
 									<td><?php echo @$viewBuldings['post_code']; ?></td>
 									<td>
                                        <a href="../<?php echo @$viewBuldings['verify_house']; ?>" class="btn btn-success" target="_blank"  title="VIEW" ><i class="fas fa-eye"></i></a> 
                                    </td>
 									<td style="background-color: green; color:#fff;"><?php echo @$viewBuldings['status']; ?></td>

 								</tr>
 							<?php } ?>
 						</tbody>
 					</table>
 				</div>
 				<!-- END DATA TABLE-->
 			</div>
 		</div>
<?php include('inc/footer.php');
}else{
    header('location:login.php');
}
?>
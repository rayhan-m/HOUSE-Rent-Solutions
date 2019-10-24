 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
 require_once './DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewTenant();

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
 							Tenant List
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
 										<th>Tenant ID</th>
 										<th>Name</th>
 										<th>Email</th>
 										<th>Phone No</th>
 										<th>Address</th>
		                                <th>Entry Month</th>
                               			<th>Exit Month</th>
 										<th>Image</th>
 										<th>Action</th>
 									</tr>
 								</thead>
 								<tfoot>
 									<tr>
 										<th>Tenant ID</th>
 										<th>Name</th>
 										<th>Email</th>
 										<th>Phone No</th>
 										<th>Address</th>
		                                <th>Entry Month</th>
                               			<th>Exit Month</th>
 										<th>Image</th>
 										<th>Action</th>
 									</tr>
 								</tfoot>
 								<tbody>
 									<?php
 									while ($viewTenant = mysqli_fetch_assoc($query)) {
 										?>
 										<tr>
 											<td><?php echo @$viewTenant['user_id']; ?></td>
 											<td><?php echo @$viewTenant['fname']; ?></td>
 											<td><?php echo @$viewTenant['email']; ?></td>
 											<td><?php echo @$viewTenant['phn_no']; ?></td>
 											<td><?php echo @$viewTenant['address']; ?></td>
 											<td><?php echo @$viewTenant['entry_month']; ?></td>
                                			<td><?php echo @$viewTenant['exit_month']; ?></td>
 											<td class="text-center"><?php echo "<img src='../". @$viewTenant['img'] . "'height='70' width='120'>"; ?>
 										</td>
 										<td>
 											<a href="tenant-reg-form.php?tenantid=<?php echo $viewTenant['user_id']; ?>" class="btn btn-success"   title="Details" ><i class="material-icons">visibility</i></a> 
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
<script>
	<?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>
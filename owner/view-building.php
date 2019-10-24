 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
	require_once './DBManager.php';
	$message = "";

	$DBM = new DBManager();
	$query = $DBM->viewBuilding();
	if (isset($_GET['edit'])) {
		$bid = $_GET['edit'];
		$bid = $_GET['bid'];
		$editBuilding = $DBM->editBuilding($bid);
		$building = mysqli_fetch_assoc($editBuilding);
	}
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
	if (isset($_GET['delete'])) {
		$bid = $_GET['delete'];
		$message = $DBM->deleteBuilding($bid);
	}
     if (isset($_POST['btn'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'homerent');
    $bid = $_POST['bid'];

    $sql = "UPDATE building SET status='Public' WHERE bid='$bid'";
    $query = $connection->query($sql);

    header('location:view-building.php');
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
                                Building Information
                            </h1>
                            <div class="button-demo">
                                <a type="button" href="add-building.php" class="btn bg-deep-purple waves-effect">Add Building</a>
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
                                            <th>BID</th>
                                            <th>House Name</th>
                                            <th>House Number</th>
                                            <th>Road Number</th>
                                            <th>location</th>
                                            <th>Post Code</th>
                                            
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Documents</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>BID</th>
                                            <th>House Name</th>
                                            <th>House Number</th>
                                            <th>Road Number</th>
                                            <th>location</th>
                                            <th>Post Code</th>
                                            
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Documents</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
											while ($viewBuilding = mysqli_fetch_assoc($query)) {
										?>
                                        <tr>
                                            <td><?php echo @$viewBuilding['bid']; ?></td>
                                            <td><?php echo @$viewBuilding['house_name']; ?></td>
                                            <td><?php echo @$viewBuilding['house_number']; ?></td>
                                            <td><?php echo @$viewBuilding['road_number']; ?></td>
                                            <td><?php echo @$viewBuilding['location']; ?></td>
                                            <td><?php echo @$viewBuilding['post_code']; ?></td>
                                            
                                            <td class="text-center"><?php echo "<img src='../". @$viewBuilding['img'] . "'height='70' width='120'>"; ?>
														</td>
                                            <td <?php if($viewBuilding['status'] == 'Accepted'){?>class="bg-green waves-effect"<?php }else{?> class="bg-deep-orange waves-effect" <?php }?> ><?php echo @$viewBuilding['status']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="../<?php echo @$viewBuilding['verify_house']; ?>" class="btn btn-success" target="_blank"  title="VIEW" ><i class="material-icons">visibility</i></a> 
                                            </td>
                                            <td>
												<a href="edit-building.php?bid=<?php echo $viewBuilding['bid']; ?>" class="btn btn-success<?php if($viewBuilding['status'] == 'Accepted'){?> disabled <?php }?>"   title="Edit" ><i class="material-icons">launch</i></a> 
												<a href="?delete=<?php echo $viewBuilding['bid']; ?>" class="btn btn-danger <?php if($viewBuilding['status'] == 'Accepted'){?> disabled <?php }?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="material-icons">delete</i></a>
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
 <?php
 session_start();
	require_once './DBManager.php';
	$message = "";

	$DBM = new DBManager();
	$query = $DBM->viewFlatType();
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
	if (isset($_GET['edit'])) {
		$typeid = $_GET['edit'];
		$typeid = $_GET['typeid'];
		$editFlatType = $DBM->editFlatType($typeid);
		$building = mysqli_fetch_assoc($editFlatType);
	}

	if (isset($_GET['delete'])) {
		$typeid = $_GET['delete'];
		$message = $DBM->deleteFlatType($typeid);
		
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
                                Flat Type
                            </h1>
                            <div class="button-demo">
                                <a type="button" href="add-flat-type.php" class="btn bg-deep-purple waves-effect">Add Flat Type</a>
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
                                            <th>TypeID</th>
                                            <th>Type Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>TypeID</th>
                                            <th>Type Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
											while ($viewFlatType = mysqli_fetch_assoc($query)) {
										?>
                                        <tr>
                                            <td><?php echo @$viewFlatType['typeid']; ?></td>
                                            <td><?php echo @$viewFlatType['type_name']; ?></td>
                                            <td>
												<a href="edit-flat-type.php?typeid=<?php echo $viewFlatType['typeid']; ?>" class="btn btn-success"   title="Edit" ><i class="material-icons">launch</i></a> 
												<a href="?delete=<?php echo $viewFlatType['typeid']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="material-icons">delete</i></a>
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
    
    <?php include('include/footer.php')?>

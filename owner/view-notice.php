 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
	require_once './DBManager.php';
	$message = "";

	$DBM = new DBManager();
	$query = $DBM->viewNotice();
	if (isset($_GET['edit'])) {
		$noticeid = $_GET['edit'];
		$noticeid = $_GET['noticeid'];
		$editNotice = $DBM->editNotice($noticeid);
		$notice = mysqli_fetch_assoc($editNotice);
	}
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
	if (isset($_GET['delete'])) {
		$noticeid = $_GET['delete'];
		$message = $DBM->deleteNotice($noticeid);
	}

	if (isset($_POST['btn'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'homerent');
        $noticeid = $_POST['noticeid'];
        $sql = "UPDATE notice SET status='Published' WHERE noticeid='$noticeid'";
        $query = $connection->query($sql);
        
        $_SESSION['message'] = 'Notice Published Successfully.';
        header('location:view-notice.php');
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
                                Notice  Board
                            </h1>
                            <div class="button-demo">
                                <a type="button" href="add-notice.php" class="btn bg-deep-purple waves-effect">Add Notice</a>
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
                                            <th>Notice ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Notice ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
											while ($viewNotice = mysqli_fetch_assoc($query)) {
										?>
                                        <tr>
                                            <td><?php echo @$viewNotice['noticeid']; ?></td>
                                            <td><?php echo @$viewNotice['title']; ?></td>
                                            <td><?php echo @$viewNotice['date']; ?></td>
                                            <?php if(@$viewNotice['status']=='Not Published'){?>
	                                            <td class="bg-deep-orange waves-effect"><?php echo @$viewNotice['status']; ?>
	                                            </td>
	                                        <?php } else{?>
	                                            <td class="bg-green waves-effect"><?php echo @$viewNotice['status']; ?>
	                                            </td>
	                                        <?php }?>
                                            <td>
												<a class="btn btn-success" target="_blank" href="../<?php echo $viewNotice['file'];?>"><i class="material-icons">visibility</i></a>
												<a href="edit-notice.php?noticeid=<?php echo $viewNotice['noticeid']; ?>" class="btn btn-success <?php if($viewNotice['status'] == 'Published'){?> disabled <?php } ?>"   title="Edit" ><i class="material-icons">launch</i></a> 
												<a href="?delete=<?php echo $viewNotice['noticeid']; ?>" class="btn btn-danger <?php if($viewNotice['status'] == 'Published'){?> disabled <?php } ?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" <?php if($viewNotice['status'] == 'Published'){?> disabled <?php } ?> ><i class="material-icons">delete</i></a>
											</td>
											<td>
                                                <form action="" method="post">
                                                <input type="hidden" name="noticeid" value="<?php echo $viewNotice['noticeid']; ?>" class="form-control" >
                                                <button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($viewNotice['status'] == 'Published'){?> disabled <?php } ?> >Publish</button>
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
    <script>
    <?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>
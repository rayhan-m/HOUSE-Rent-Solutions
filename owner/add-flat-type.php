 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
$message = "";
	require_once './DBManager.php';
	$DBM = new DBManager();
	if (isset($_POST['button'])) {
		$DBM->addFlatType($_POST);
	}
 ?>
 <?php include('include/sitebar.php')?>
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center bg-deep-orange" style="padding: 10px;">Add New Flat Type</h2>
                        </div>
                        <div class="body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="type_name" >
                                        <label class="form-label">Type Name</label>
                                    </div>
                                </div>
                                <br/>
                                <button class="btn btn-primary waves-effect text-center btn-block"  type="submit" name="button">SUBMIT</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/pages/ui/notifications.js"></script>
<?php include('include/footer.php')?>
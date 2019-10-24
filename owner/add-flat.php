 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
$message = "";
	require_once './DBManager.php';
	$DBM = new DBManager();
	if (isset($_POST['button'])) {
		$message = $DBM->addFlat($_POST);
	}
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
 ?>
 <script>
    function myFunction() {
        var x = document.getElementById("rent");
        if(x.value <=0){
          x.value="";
        } 
    }
    function myFunction1() {
        var x = document.getElementById("service_charge");
        if(x.value <=0){
          x.value="";
        } 
    }

  </script>

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
                            <h2 class="text-center bg-deep-orange" style="padding: 10px;">Add New Flat Info</h2>
                        </div>
                        <div class="body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <div class="form-line">
                                        <select class="form-control" name="house_number" required>
                                            <option value="">Select House</option>
                                            <?php
                                            $user_name=$_SESSION['user_name'];
                                                $connection = mysqli_connect('localhost', 'root', '', 'homerent');
                                                
                                                $sql = "SELECT house_number from building WHERE user_name='$user_name' AND status='Accepted'";
                                                $result = $connection->query($sql);

                                                while ($row = $result->fetch_array()) {
                                                    echo "<option value='" . $row['house_number'] . "'>" . $row['house_number'] . "</option>";
                                                    } // while

                                                ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group ">
                                    <div class="form-line">
                                        <select class="form-control" name="flat_type" required>
                                            <option value="">Select Flat Type</option>
                                            <option value="Family House">Family House</option>
                                            <option value="Sublet">Sublet</option>
                                            <option value="Bachelor Mess">Bachelor Mess</option>
                                            <option value="Female Mess">Female Mess</option>
                                            <option value="Office">Office</option>
                                            <option value="Warehouse">Warehouse</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="flat_no" required>
                                        <label class="form-label">Flat No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control"  onblur="myFunction()" name="rent" id="rent" required>
                                        <label class="form-label">Rent/Month</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" onblur="myFunction1()" id="service_charge" class="form-control" name="service_charge" required>
                                        <label class="form-label">Service Charge</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="security_deposit" required>
                                        <label class="form-label">Security Deposit</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="flat_release_policy" required>
                                        <label class="form-label">Flat Release Policy</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="address" required>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="flat_size" required>
                                        <label class="form-label">Flat Size</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bedroom" required>
                                        <label class="form-label">Bedroom</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bathroom" required>
                                        <label class="form-label">Bathroom</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="phn_no" required >
                                        <label class="form-label">Phone No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bkash" required>
                                        <label class="form-label">BKash No</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="conditions" cols="30" rows="5" class="form-control no-resize" ></textarea>
                                        <label class="form-label">Conditions</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="facilities" cols="30" rows="5" class="form-control no-resize" ></textarea>
                                        <label class="form-label">Facilities</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Image</label>
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="fileToUpload" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Flat Video (Youtube URL)</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="flat_video">
                                    </div>
                                </div>
                              	<div class="form-group form-float">
                                	<div class="form-line">
	                                    <select class="form-control" name="status" required>
	                                    	<option value="">Select Status</option>
	                                        <option value="Public">Public</option>
	                                        <option value="Private">Private</option>
	                                    </select>
	                                    
                                    </div>
                                </div>
                               
                                <br/>
                                <br/>
                                <button class="btn btn-primary waves-effect text-center btn-block" type="submit" name="button" >SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('include/footer.php');
}else{
    header('location:login.php');
}
?>
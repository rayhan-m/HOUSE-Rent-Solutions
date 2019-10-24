<?php
@session_start();
 if ($_SESSION['owner_login'] == TRUE) {
	$connection = mysqli_connect('localhost', 'root', '', 'homerent');
	$tenantid=$_GET['tenantid'];
	$sql = "SELECT * from tenant_reg_form where tenantid='$tenantid'";
	$result = $connection->query($sql);
	$TenRegForm = mysqli_fetch_assoc($result);
?>

<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<section class="content">

		<div class="content_list">

			<div class=" col-md-8 col-md-offset-2">
 				<a href="view-tenants.php" class="btn btn-primary" title="Back" >GO BACK</a>
				<!-- MAIN CONTENT-->
				<div class="panel panel-default col-md-12"> 
					
					<h2 class="text-center" style="color: #0a2269">ভাড়াটিয়া নিবন্ধন ফরম</h2>  
					<form action="" method="post" >

					<div class="form-row" style="color: #000">
							<div class="form-group col-md-4">
						<label>Tenant ID</label>
						<input type="text" name="house_number" class="form-control" value="<?php echo @$TenRegForm['tenantid']; ?>"  readonly>
					</div>
					<div class="form-group col-md-4">
						<label>বাড়ি/হোল্ডিং</label>
						<input type="text" name="house_number" value="<?php echo @$TenRegForm['house_number']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>রাস্তা</label>
						<input type="text" name="road_number" value="<?php echo @$TenRegForm['road_number']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>এলাকা</label>
						<input type="text" name="location" value="<?php echo @$TenRegForm['location']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>পোস্ট কোড</label>
						<input type="number" name="post_code" value="<?php echo @$TenRegForm['post_code']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-10">
						<label>ভাড়াটিয়া/ বাড়িওলার নামঃ</label>
						<input type="text" name="tenant_name" value="<?php echo @$TenRegForm['tenant_name']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-10">
						<label>পিতার নাম</label>
						<input type="text" name="father_name" value="<?php echo @$TenRegForm['father_name']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জন্ম তারিখ</label>
						<input type="text" name="dob" value="<?php echo @$TenRegForm['dob']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>বৈবাহিক অবস্থা</label>
						<input type="text" name="marital_status" value="<?php echo @$TenRegForm['marital_status']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-12">
						<label>স্থায়ী ঠিকানা</label>
						<input type="text" name="address1" value="<?php echo @$TenRegForm['address1']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-12">
						<label>পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা</label>
						<input type="text" name="job" value="<?php echo @$TenRegForm['job']; ?>" class="form-control"readonly>
					</div>

					<div class="form-group col-md-6">
						<label>ধর্ম</label>
						<input type="text" name="religion" value="<?php echo @$TenRegForm['religion']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>শিক্ষাগত যোগ্যতা</label>
						<input type="text" name="education" value="<?php echo @$TenRegForm['education']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num1" value="<?php echo @$TenRegForm['phn_num1']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ইমেইল আইডি</label>
						<input type="email" name="email" value="<?php echo @$TenRegForm['email']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no1" value="<?php echo @$TenRegForm['nid_no1']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>পাসপোর্ট নম্বর(যদি থাকে)</label>
						<input type="number" name="passport_no" value="<?php echo @$TenRegForm['passport_no']; ?>" class="form-control"readonly>
					</div>

					<div class="form-group col-md-6">
						<label>নাম (জরুরী যোগাযোগ) </label>
						<input type="text" name="ref_name" value="<?php echo @$TenRegForm['ref_name']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>সম্পর্ক</label>
						<input type="text" name="relation" value="<?php echo @$TenRegForm['relation']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address2" value="<?php echo @$TenRegForm['address2']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num2" value="<?php echo @$TenRegForm['phn_num2']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-6">
						<label>গৃহকর্মীর নাম</label>
						<input type="text" name="housewife_name" value="<?php echo @$TenRegForm['housewife_name']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no2" value="<?php echo @$TenRegForm['nid_no2']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address3" value="<?php echo @$TenRegForm['address3']; ?>" class="form-control"readonly >
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num3" value="<?php echo @$TenRegForm['phn_num3']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ড্রাইভারের নাম</label>
						<input type="text" name="driver_name" value="<?php echo @$TenRegForm['driver_name']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>জাতীয় পরিচয় পত্র নম্বর</label>
						<input type="number" name="nid_no3" value="<?php echo @$TenRegForm['nid_no3']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address4" value="<?php echo @$TenRegForm['address4']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num4" value="<?php echo @$TenRegForm['phn_num4']; ?>" class="form-control"readonly>
					</div>
					<div class="form-group col-md-6">
						<label>পূর্ববর্তী বাড়িওলার নাম</label>
						<input type="text" name="pre_owner_name" value="<?php echo @$TenRegForm['pre_owner_name']; ?>" class="form-control" readonly>
					</div>

					<div class="form-group col-md-6">
						<label>ঠিকানা</label>
						<input type="text" name="address5" value="<?php echo @$TenRegForm['address5']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>মোবাইল নম্বর</label>
						<input type="number" name="phn_num5" value="<?php echo @$TenRegForm['phn_num5']; ?>" class="form-control" readonly>
					</div>
					<div class="form-group col-md-6">
						<label>পূর্ববর্তী বাসা ছাড়ার কারণ</label>
						<input type="text" name="reason" value="<?php echo @$TenRegForm['reason']; ?>" class="form-control" readonly>
					</div>
				</div>
			</form>		
		</div>
	</div>
	<!-- END MAIN CONTENT-->
</div>
</section>

<?php
}else{
    header('location:login.php');
}
?>

<?php
 @session_start();
	require_once 'owner/DBManager.php';
	$DBM = new DBManager();
	$sql = $DBM->viewTenantProfile();
	$pro = mysqli_fetch_assoc($sql);
?>
<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="site.webmanifest">
	<link rel="apple-touch-icon" href="icon.png">
	<!-- Place favicon.ico in the root directory -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/normalize.css">


	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<div class="header_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="col-md-3 left">
					<a href="dashboard.php"><h3>Home Rent Solutions</h3></a>
				</div>
				<div class="col-md-9 sidebar">
					
					<a href="#" class="right"><span class=""> <?php echo "(". $pro['user_name'].")";?></span></a>
					<a href="logout.php" class="right"><span class="glyphicon glyphicon-log-out"></span></a>
					<a href="profile.php"><img src="<?php echo $pro['img'];?>" alt="" class="image design1"></a>
				</div>
			</div>
		</div>
	</div>
</div>

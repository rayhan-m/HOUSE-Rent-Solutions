 <?php
 @session_start();
   if ($_SESSION['tenant_login'] == TRUE) {
 include('include/ten-header.php');
 $query = $DBM->ViewFeedback();
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
	if (isset($_GET['delete'])) {
		$feedbackid = $_GET['delete'];
		$message = $DBM->deleteFeedback($feedbackid);
	}
	if (isset($_POST['btn'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'homerent');
        $feedbackid = $_POST['feedbackid'];
        $sql = "UPDATE Feedback SET status='Done' WHERE feedbackid='$feedbackid'";
        $query = $connection->query($sql);
        
        $_SESSION['message'] = 'Confirmation "Done"';
        header('location:Feedback.php');
    }
 ?>

 <div style="background-image: url('img/banner2.jpg')" class="banner_section1">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<h3>Tenant Feedback</h3>
 			</div>
 		</div>
 	</div>
 </div>

</div>
<div class="main_content_section">
	<div class="col-md-12">
		<?php include('include/menubar.php')?>

		<div class="content_list">

			<div class="col-md-offset-1 col-md-10">
				<!-- MAIN CONTENT-->
				<div class="panel panel-default col-md-12"> 
					<a href="add-feedback.php" class="btn btn-primary text-center" >New Feedback</a>
					<?php if(@$message){?>
			               <div>
			                <h4 class="text-center" style="padding: 10px; color: #fff; background-color: green;"><?php echo @$message ?></h4>
			            </div>
			        <?php }else{?>
			            <div id="hide">

			            </div>
			        <?php }?>
					<h2 class="text-center" style="color: #fff; background-color: #0a1647;">Tenant Feedback List</h2>
					<table class="table table-striped" style="color:  #000;">
						<thead>
							<tr>
								<th>SL No</th>
								<th>Flat ID</th>
								<th>Title</th>
								<th>comments</th>
								<th>Status</th>
								<th>Image</th>
								<th>Approvement</th>
								<th>Action</th>
								<th>Confirmation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while ($ViewFeedback = mysqli_fetch_assoc($query)) {
							?>
							<tr>
								<td><?php echo @$ViewFeedback['feedbackid']; ?></td>
								<td><?php echo @$ViewFeedback['flatid']; ?></td>
								<td><?php echo @$ViewFeedback['title']; ?></td>
								<td><?php echo @$ViewFeedback['comment']; ?></td>
								<?php if($ViewFeedback['status'] == 'Done'){?>
								<td class="btn" style="background-color: green; color: #fff;"><?php echo @$ViewFeedback['status']; ?></td>
							<?php } else{?>
								<td class="btn" style="background-color: pink; color: #000;"><?php echo @$ViewFeedback['status']; ?></td>
							<?php }?>

								<td class="text-center"><?php echo "<img src='". @$ViewFeedback['img'] . "'height='70' width='120'>"; ?>
								</td>
								<?php if($ViewFeedback['approvement'] == 'Accepted'){?>
								<td class="btn" style="background-color: green; color: #fff;"><?php echo @$ViewFeedback['approvement']; ?></td>
							<?php } else{?>
								<td class="btn" style="background-color: pink; color: #000;"><?php echo @$ViewFeedback['approvement']; ?></td>
							<?php }?>
								<td>
									<a href="edit-feedback.php?feedbackid=<?php echo $ViewFeedback['feedbackid']; ?>" class="btn btn-success glyphicon glyphicon-edit <?php if($ViewFeedback['approvement'] == 'Accepted'){?> disabled <?php } ?>"   title="Edit" ></a> 
									<a href="?delete=<?php echo $ViewFeedback['feedbackid']; ?>" class="btn btn-danger glyphicon glyphicon-trash <?php if($ViewFeedback['approvement'] == 'Accepted'){?> disabled <?php } ?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" <?php if($ViewFeedback['approvement'] == 'Accepted'){?> disabled <?php } ?> ></a>
								</td>
								<td>
	                                <form action="" method="post">
		                                <input type="hidden" name="feedbackid" value="<?php echo $ViewFeedback['feedbackid']; ?>" class="form-control" >
		                                <button type="submit" name="btn" class="btn" style="<?php if($ViewFeedback['status'] == 'Done'){?>background-color: green; color: #fff; <?php } else{?> background-color: pink <?php } ?>"  <?php if($ViewFeedback['status'] == 'Done' || $ViewFeedback['approvement'] == 'Pending' ){?> disabled <?php } ?> > Done</button>
	                            	</form>
	                            </td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
		</div>   
	</div>  
</div>
</div>
<!--Inspiration from: http://ertekinn.com/loginsignup/-->


<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
	window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
	ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<script>
	function downloadSample() {
		window.open("leaveNotice/sampleNotice/Sample-Notice.docx");
	}
</script>
</body>

</html>
<?php }else{
    header('location:login.php');
}
?>
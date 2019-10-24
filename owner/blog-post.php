 <?php
 session_start();
  if ($_SESSION['owner_login'] == TRUE) {
	require_once './DBManager.php';
	$message = "";

	$DBM = new DBManager();
	$query = $DBM->viewBlog();
	if (isset($_GET['edit'])) {
		$postid = $_GET['edit'];
		$postid = $_GET['postid'];
		$editPost = $DBM->editBlog($postid);
		$post = mysqli_fetch_assoc($editPost);
	}
	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message'];
		unset($_SESSION['message']);
	}
	if (isset($_GET['delete'])) {
		$postid = $_GET['delete'];
		$message = $DBM->deleteBlog($postid);
	}

	if (isset($_POST['btn'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'homerent');
        $postid = $_POST['postid'];
        $sql = "UPDATE blog SET status='Published' WHERE postid='$postid'";
        $query = $connection->query($sql);
        
        $_SESSION['message'] = 'Post Published Successfully.';
        header('location:blog-post.php');
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
                                Blog
                            </h1>
                            <div class="button-demo">
                                <a type="button" href="add-post.php" class="btn bg-deep-purple waves-effect">Add Blog Post</a>
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
                                            <th>Post ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Post ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
											while ($viewBlog = mysqli_fetch_assoc($query)) {
										?>
                                        <tr>
                                            <td><?php echo @$viewBlog['postid']; ?></td>
                                            <td><?php echo @$viewBlog['title']; ?></td>
                                            <td><?php echo @$viewBlog['date']; ?></td>
                                            <td><?php echo @$viewBlog['details']; ?></td>
                                            <?php if(@$viewBlog['status']=='Not Published'){?>
	                                            <td class="bg-deep-orange waves-effect"><?php echo @$viewBlog['status']; ?>
	                                            </td>
	                                        <?php } else{?>
	                                            <td class="bg-green waves-effect"><?php echo @$viewBlog['status']; ?>
	                                            </td>
	                                        <?php }?>

	                                        <td class="text-center"><?php echo "<img src='../". @$viewBlog['img'] . "'height='70' width='120'>"; ?>
 										</td>
                                            <td>
												<a href="edit-post.php?postid=<?php echo $viewBlog['postid']; ?>" class="btn btn-success <?php if($viewBlog['status'] == 'Published'){?> disabled <?php } ?>"   title="Edit" ><i class="material-icons">launch</i></a> 
												<a href="?delete=<?php echo $viewBlog['postid']; ?>" class="btn btn-danger <?php if($viewBlog['status'] == 'Published'){?> disabled <?php } ?>" title="Delete" onclick="return confirm('Are You Sure To Delete!');" <?php if($viewBlog['status'] == 'Published'){?> disabled <?php } ?> ><i class="material-icons">delete</i></a>
											</td>
											<td>
                                                <form action="" method="post">
                                                <input type="hidden" name="postid" value="<?php echo $viewBlog['postid']; ?>" class="form-control" >
                                                <button type="submit" name="btn" class="btn bg-deep-purple waves-effect"  <?php if($viewBlog['status'] == 'Published'){?> disabled <?php } ?> >Publish</button>
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
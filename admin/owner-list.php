 <?php
 session_start();
    if ($_SESSION['admin_login'] == TRUE) {
 require_once '../owner/DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewOwner();

include('inc/header.php')
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Owner ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    while ($viewOwner = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo @$viewOwner['ownerid']; ?></td>
                                            <td><?php echo @$viewOwner['full_name']; ?></td>
                                            <td><?php echo @$viewOwner['phn_no']; ?></td>
                                            <td><?php echo @$viewOwner['email']; ?></td>
                                            <td style="background-color: green; color:#fff;"><?php echo @$viewOwner['status']; ?></td>
                                        <td>
                                            <a href="owner-profile.php?ownerid=<?php echo $viewOwner['ownerid']; ?>" class="btn btn-success"   title="Details" ><i class="fas fa-eye"></i></a> 
                                        </td>
                                    </tr>
                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
<?php include('inc/footer.php');
}else{
    header('location:login.php');
}
?>
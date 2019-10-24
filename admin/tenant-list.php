 <?php
 session_start();
    if ($_SESSION['admin_login'] == TRUE) {
 require_once '../owner/DBManager.php';
 $message = "";

 $DBM = new DBManager();
 $query = $DBM->viewTenants();

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
                                                <th>Tenant ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    while ($viewTenants = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo @$viewTenants['user_id']; ?></td>
                                            <td><?php echo @$viewTenants['fname']; ?></td>
                                            <td><?php echo @$viewTenants['email']; ?></td>
                                            <td><?php echo @$viewTenants['phn_no']; ?></td>
                                        <td>
                                            <a href="tenant-profile.php?user_id=<?php echo $viewTenants['user_id']; ?>" class="btn btn-success"   title="Details" ><i class="fas fa-eye"></i></a> 
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

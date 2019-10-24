                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 House Rent Solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script type="text/javascript">

        function getTime( ) {
            var d = new Date( ); 
            d.setHours( d.getHours() + 0 ); // offset from local time
            var h = (d.getHours() % 12) || 12; // show midnight & noon as 12
            return (
                ( h < 10 ? '0' : '') + h +
                ( d.getMinutes() < 10 ? ':0' : ':') + d.getMinutes() +
                        // optional seconds display
                 ( d.getSeconds() < 10 ? ':0' : ':') + d.getSeconds() + 
                ( d.getHours() < 12 ? ' AM' : ' PM' )
            );
            
        }

        var clock = document.getElementById('clock');
        setInterval( function() { clock.innerHTML = getTime(); }, 1000 );
    </script>

</body>

</html>
<!-- end document-->

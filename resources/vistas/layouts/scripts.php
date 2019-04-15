<?php
class Scripts
{
    public function __construct($extra = null)
    {
        try {
            switch ($extra) {
                case 'consulta':
                    $ext_scrits = '<script src="js/consulta.js"></script>';
                    break;
                case 'login':
                    $ext_scrits = '<script src="js/login.js"></script>';
                    break;
                default:
                    # code...
                    break;
            }
            $this->scripts($ext_scrits);
        } catch (\Eception $e) {
            die('ERROR_SCRIPTS: ' . $e->getMessage());
        }
    }

    public function scripts($ext = null)
    {
        ?>


    <!-- Jquery JS-->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendors/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendors/slick/slick.min.js">
    </script>
    <script src="vendors/wow/wow.min.js"></script>
    <script src="/node_modules/animsition/dist/js/animsition.min.js"></script>
    <script src="/node_modules/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendors/circle-progress/circle-progress.min.js"></script>
    <script src="/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="vendors/chartjs/Chart.bundle.min.js"></script>
    <script src="/node_modules/select2/dist/js/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <?php echo $ext; ?>
</body>

</html>
<!-- end document-->


        <?php
}
}

?>

<!DOCTYPE html>
<html lang="en" style="background-image:url(<?php echo base_url() . $image_url; ?>img/Artboard.png); background-size: cover;">

<link rel="shortcut icon" href="<?php echo base_url() . $css_url; ?>img/Logo2.png" />

<head>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
            // window.location.href = "<?php echo base_url() ?>Login/Account"
        };

    </script>

    <meta charset="utf-8" />
    <title><?php echo $page_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url() . $css_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css:300,400,600" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url() . $css_url; ?>css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body id="page-top" style="padding-top:0px !important;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php echo $page_menu; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php echo $page_header; ?>
                <?php echo $page_content; ?>
                <?php echo $page_footer; ?>
            </div>
            <!-- End Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
</body>

</html>
</script>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>



<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

<!-- *************************************************************************************************** -->
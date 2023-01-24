<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reset Password</h1>
        </div> -->

        <!-- Project Card Example -->
        <div class="card shadow lg-6">
            <div class="card-header py-3">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>Reset Password</h1>
                <!-- <h6 class="m-0 font-weight-bold text-primary">Projects</h6> -->
            </div>
            <form class="card-body">
                <div style="width:100%; text-align:right">
                    <div class="card-body col-md-10 row mb-3">
                        <label class="col-sm-4 col-form-label">Old Password :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control ng-pristine ng-valid ng-empty ng-touched">
                        </div>
                    </div>

                    <div class="card-body col-md-10 row mb-3">
                        <label class="col-sm-4 col-form-label">New Password :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control ng-pristine ng-valid ng-empty ng-touched"
                                ng-model="Newpassword" ng-change="checkconfig()">
                        </div>
                    </div>

                    <div class="card-body col-md-10 row mb-3">
                        <label class="col-sm-4 col-form-label">Confirm Password :</label>
                        <div class="col-sm-8">
                            <input ng-model="rePassword" type="password"
                                class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-change="checkre()">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div> -->
</body>

</html>
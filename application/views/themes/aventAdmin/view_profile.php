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
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div> -->

        <!-- Project Card Example -->
        <div class="card shadow lg-6">
            <div class="card-header py-3">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</h1>
                <!-- <h6 class="m-0 font-weight-bold text-primary">Projects</h6> -->
            </div>

            <div class="card mb-3">
                <div class="row g-10">
                    <div class="col-md-4 text-right">
                        <img src="<?php echo base_url()?>assets/img/undraw_profile.svg" width="300" height="400"
                            class="img-thumbnail" />
                        <div class="card-body ">
                            <h4 class="card-text col-sm-10">SD464</h4>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form class="card-body">
                            <div style="text-align: right">
                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label">First Name :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="
                      form-control
                      ng-pristine ng-valid ng-empty ng-touched
                    " />
                                    </div>
                                </div>

                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label">Last Name :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="
                      form-control
                      ng-pristine ng-valid ng-empty ng-touched
                    " ng-model="Newpassword" ng-change="checkconfig()" />
                                    </div>
                                </div>

                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label">Email :</label>
                                    <div class="col-sm-8">
                                        <input ng-model="rePassword" type="password" class="
                      form-control
                      ng-pristine ng-valid ng-empty ng-touched
                    " ng-change="checkre()" />
                                    </div>
                                </div>

                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label">Plant :</label>
                                    <div class="col-sm-4 dropdown">
                                        <button class="btn btn dropdown-toggle col-sm" style="border-color:#d1d3e2"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Select Plant...
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Plant 8</a></li>
                                            <li><a class="dropdown-item" href="#">Plant 10</a></li>
                                        </ul>
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

            <!-- <form class="card-body">
                <div>
                    <img src="<?php echo base_url()?>assets/img/undraw_profile.svg" width="200" height="200"
                        class="img-thumbnail">
                </div>

                <div style="text-align:right">
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
            </form> -->
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


</body>

</html>
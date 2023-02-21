<!DOCTYPE html>
<html lang="en" style="background-image:url(<?php echo base_url() . $image_url; ?>/img/Artboard.png); background-size: cover;">

<link rel="shortcut icon" href="<?php echo base_url() . $css_url; ?>img/Logo2.png" />

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Traceability System</title>



    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() . $css_url; ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url() . $css_url; ?>img/Logo2.png" />


</head>
<style>
    .bg-gradient-primary {
        background-color: #4e73df00;
        background-image: linear-gradient(180deg, #4e73df00 10%, #224abe00 100%);
        background-size: cover;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-10 col-md-3">
                <!-- <br><br><br><br><br><br> -->
                <div class="card o-hidden border-15 shadow-lg my-5 ">
                    <div>
                        <div class="card-body">

                            <div class="text-center">
                                <img src="<?php echo base_url() . $image_url; ?>/img/Logo2.png" width="130" height="130"><br><br>
                                <h1 class="h10S text-gray-900 mb-5">Traceability</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="empcode" aria-describedby="emailHelp" placeholder="Enter User Code">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="emppass" placeholder="Enter User Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>

                                </div>
                                <a class="btn btn-primary btn-user btn-block" id="login">
                                    Login
                                </a>
                                <hr>
                                <!-- <div class="text-center">
                                    <a href="<?php echo base_url() ?>Forgot_Password/forgotPassword" class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <!-- <div class="text-center">
                                    <a href="<?php echo base_url() ?>Forgot_Password/forgotPassword" class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->

                            </form>


                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() . $js_url; ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() . $js_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() . $js_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() . $js_url; ?>js/sb-admin-2.min.js"></script>


        <!-- ************************************************************************************************************************** -->


</body>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() . $js_url; ?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function() {
    //     window.history.pushState(null, "", window.location.href);
    //     // window.history.forward(null, "", window.location.href);
    //     window.onpopstate = function() {
    //         window.history.pushState(null, "", window.location.href);
    //     };

    // });
    // function preventBack() {
    //         window.history.forward();
    //     }
    //     setTimeout("preventBack()", 0);
    //     window.onunload = function() {
    //         null
    //         // window.location.href = "<?php echo base_url() ?>Login/Account"
    //     };





    $("#login").click(function() {
        login()
    })



    function login() {
        var empcode = $("#empcode").val();
        var emppass = $("#emppass").val();


        var code = document.getElementById("empcode");
        var pass = document.getElementById("emppass");

        if (code.value == "" && pass.value == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please check the uaername and password again.',
                confirmButtonColor: '#F7B267',
                
            })
        } else if (pass.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'Please check the password again.',
                confirmButtonColor: '#F7B267',
            })
        } else if (code.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'Please check the username again.',
                confirmButtonColor: '#F7B267',
            })
        } else {
            var path = $.ajax({
                method: "post",
                url: "<?php echo base_url(); ?>Login/checkUserLogin",
                data: {
                    empcode: empcode,
                    emppass: emppass

                }
            })
            path.done(function(rs) {
                // alert(rs)
                // console.log(rs);

                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome to Traceability',
                        text: 'You signed up successfully',
                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/Homepage";
                    })
                } else if(rs === "duplicate"){
                    Swal.fire({
                        icon: 'error',
                        title: 'You failed to signed up',
                        text: 'โปรดตรวจสอบสถานะการใช้งาน !!',
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You failed to signed up',
                        text: 'โปรดตรวจสอบชื่อ ผู้ใช้งาน และ รหัสผ่าน ของท่านอีกครั้ง',
                    })
                }
            })
        }

    }
</script>
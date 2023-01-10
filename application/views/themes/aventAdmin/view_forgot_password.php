<!DOCTYPE html>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

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

            <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->



            <!-- Nested Row within Card Body -->


            <div class="col-xl-5 col-lg-10 col-md-3">
                <div class="card o-hidden border-15 shadow-lg my-5">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                            <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                to reset your password!</p>
                        </div>
                        <form class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="Email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="Pass" aria-describedby="emailHelp" placeholder="Enter New Password....">
                            </div>
                            <a class="btn btn-primary btn-user btn-block" id="forgotPassword">
                                Reset Password </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url() ?>Login/Account">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>




            <!-- </div> -->

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
 <!-- ************************************************************************************************************************** -->
 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() . $js_url; ?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $("#forgotPassword").click(function() {
        forgotPass()
    })

    function forgotPass() {
        var Email = $("#Email").val();
        var Pass = $("#Pass").val();
        // alert(Email)
        // alert(Pass)
        var path = $.ajax({
            method: "post",
            url: "<?php echo base_url(); ?>Forgot_Password/checkEmail",
            data: {
                Email: Email,
                Pass: Pass
            }
        })
        path.done(function(rsForpass) {
            // alert(rsForpass)
            console.log(rsForpass);
            if (rsForpass === "1") {
                Swal.fire({
                    icon: 'success',
                    title: 'Welcome to website',
                    text: 'You signed up successfully',
                }).then(function(){
                    window.location.href="<?php echo base_url() ?>Login/Account";
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Data not found',
                    text: 'You failed to forgot password',
                })
            }
        })
    }
</script>

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
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>Change
                    Password</h1>
                <!-- <h6 class="m-0 font-weight-bold text-primary">Projects</h6> -->
            </div>

            <div class="col-lg-18">
                <form class="card-body">
                    <div class="row-lg-16">
                        <div class="card-body col-md-12 row mb-3">
                            <label class="col-sm-4 col-form-label">Current Password :</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control ng-pristine ng-valid ng-empty ng-touched"  id="oldpass">
                            </div>
                        </div>

                        <div class="card-body col-md-12 row mb-3">
                            <label class="col-sm-4 col-form-label">New Password :</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control ng-pristine ng-valid ng-empty ng-touched"  id="newpass">
                            </div>
                        </div>

                      
                        <div class="card-body col-md-12 row mb-3">
                            <label class="col-sm-4 col-form-label">Confirm Password :</label>
                            <div class="col-sm-6">
                                <input ng-model="rePassword" type="password" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-change="checkre()" id="compass">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg mb-3 text-right">
                <button type="submit" class="btn btn-primary" id="saveCheng">Save</button>
                <button type="submit" class="btn btn-secondary" id="canCheng">Cancel</button>
            </div>
        </div>
    </div> 
    <!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer> -->
    <!-- End of Footer -->
</body>

</html> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script type="text/javascript">
    $("#saveCheng").click(function() {
        // alert("1111");
        saveChengPass()
    });

    $("#canCheng").click(function() {
        //alert("1111");
        cancelChengPass()
    });

    function cancelChengPass() {
        Swal.fire({
            title: 'Are you sure?',
            text: "คุณต้องการที่จะยกเลิกใช่หรือไม่ ?( Do you want to cancel? )",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: ' Yes '
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url() ?>manage/Homepage";
            }
        })
    }

    function saveChengPass() {
        var oldpass = $("#oldpass").val();
        var newpass = $("#newpass").val();
        var compass = $("#compass").val();

        var cheoldpass = document.getElementById("oldpass");
        var chenewpass = document.getElementById("newpass");
        var checompass = document.getElementById("compass");

        // if(cheoldpass.value == "" ||chenewpass.value == "" ||checompass.value == "" ){
        //     Swal.fire({
        //         icon: 'warning',
        //         title: 'Are you sure?',
        //         text: 'You failed to chenge password',
        //         confirmButtonColor: '#F7B267',
        //     })
        // }else{
            var path = $.ajax({
                method: "post",
                url: "<?php echo base_url(); ?>ResetPassword/checkRePass",
                data: {
                    oldpass: oldpass,
                    newpass: newpass,
                    compass: compass,
                }
            }) 
            path.done(function(rs) {
               // alert(rs);
                console.log(rs);
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully',
                        text: 'You have successfully edit profile',
                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>manage/Homepage";
                    })
                } else if(rs == "old pass fail") {

                    Swal.fire({
                        icon: 'error',
                        title: 'Data not found',
                        text: 'You failed to current password',
                    })

                }else if(rs == "confirm pass fail" ){
                    Swal.fire({
                        icon: 'error',
                        title: 'Data not found',
                        text: 'You failed to Change Password',
                    })
                }
            })
        // }

    }
</script>
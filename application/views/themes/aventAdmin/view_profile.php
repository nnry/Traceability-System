<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

            <div class="card-body">
                <div class="row md-2">
                    <div class="col-lg-4 text-center">
                        <img src="<?php echo base_url() ?>assets/img/pat.jpg" width="300" height="400" class="img-thumbnail" />
                        <div class="card-body">
                            <h4 class="card-text"><?php echo $user; ?></h4>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form class="card-body">
                            <div class="row-md-16">
                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label">First Name :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="fname" value="<?php echo $fname; ?>" disabled />
                                    </div>
                                </div>

                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label ">Last Name :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-model="Newpassword" ng-change="checkconfig()" id="lname" value="<?php echo $lname; ?>" disabled />
                                    </div>
                                </div>

                                <div class="card-body col-md-10 row mb-3">
                                    <label class="col-sm-4 col-form-label">Email :</label>
                                    <div class="col-sm-8">
                                        <input ng-model="rePassword" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-change="checkre()" id="email" value="<?php echo $email; ?>" disabled />
                                    </div>
                                </div>

                                <div class="card-body col-md-10 row mb-3">
                                <label class="col-sm-4 col-form-label">Plant :</label>
                                    <div class="col-sm-8">
                                        <input ng-model="rePassword" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-change="checkre()" id="phase" value="<?php echo $phase; ?>" disabled />
                                    </div>
                                    <!-- <//label class="col-sm-4 col-form-label">Plant :</label> &nbsp; &nbsp; -->
                                    <!-- <select class="form-select col-sm-6" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="plant" disabled> -->
                                    <!-- <option></option> -->
                                    <!-- <option value="1">Plant 8</option>
                                        <option value="2">Plant 10</option> -->
                                    <!-- <//?php
                                        // foreach ($plant as $plant) {
                                        ?>
                                            <option value=?php echo $plant["mpa_id"]; ?>"><//?php echo $plant["mpa_name"]; ?></option>
                                        //<//?php } ?> -->
                                    <!-- </select> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-lg text-right">
                    <button type="submit" id="saveEditPro" class="btn btn-primary">Save</button>
                    <button type="submit" id="cancelEditPro" class="btn btn-secondary">Cancel</button>
                </div> -->
            </div>
        </div>
    </div>
    <?php
    session_reset();
    ?>
</body>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script type="text/javascript">
    $("#saveEditPro").click(function() {
        // alert("1111");
        save()
    });

    $("#cancelEditPro").click(function() {
        //alert("1111");
        cancel()
    });

    function cancel() {
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

    function save() {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var plant = $("#plant").val();


        var chefname = document.getElementById("fname");
        var chelname = document.getElementById("lname");
        var cheemail = document.getElementById("email");
        var cheplant = document.getElementById("plant");

        if (chefname.value == "" || chelname.value == "" || cheemail.value == "" || cheplant.value == "Select Plant...") {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You failed to edit profile',
                confirmButtonColor: '#F7B267',
            })
        } else {
            var path = $.ajax({
                method: "post",
                url: "<?php echo base_url(); ?>Profile/saveProfile",
                data: {
                    fname: fname,
                    lname: lname,
                    email: email,
                    plant: plant
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Data not found',
                        text: 'You failed to edit profile',
                    })
                }
            })

        }
    }
</script>
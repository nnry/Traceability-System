<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Management User</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4"><br>
            <div class="card-header py" style="width:100%; text-align:right">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#adduser><i class="fas fa-user-plus fa-sm"></i> Add User</a>
                <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Employees Code</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Group Permission</th>
                                <th>E-mail</th>
                                <th>Plant</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($resultUser as $value) {
                                //$i = $value["sa_id"];
                                $i++;
                                echo "<tr>";
                                echo "<td>" . $value["sa_id"] . "</td>";
                                echo "<td>" . $value["sa_code"] . "</td>";
                                echo "<td>" . $value["sa_fname"] . "</td>";
                                echo "<td>" . $value["sa_lname"] . "</td>";
                                echo "<td>" . $value["spg_name"] . "</td>";
                                echo "<td>" . $value["sa_email"] . "</td>";
                                echo "<td>" . $value["mpa_name"] . "</td>";
                                // echo "<td>" . "Edit and Status" . "</td>";

                                if ($value["sa_status"] == "1") {
                                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=status$i checked onclick='status(" . $value["sa_id"] . ")'>
                                                <label class=\"custom-control-label\" for=status$i></label>
                                            </div>
                                       
                                    </td>";
                                } else {
                                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=status$i onclick='status(" . $value["sa_id"] . ")'>
                                            <label class=\"custom-control-label\" for=status$i></label>
                                        </div>
                                    </td>";
                                }

                                echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#edituser\"  onclick='edit(" . $value["sa_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <!-- Edit Modal-->
                <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit User</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group">
                                    <label for="empcode">Employee Code :</label>
                                    <input class="form-control" type="empcode" id="editempcode" required="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="fristname">Frist Name :</label>
                                    <input class="form-control" type="fristname" id="editfirstname" required="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name :</label>
                                    <input class="form-control" type="lastname" required="" id="editlastname" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="username">Group Permission :</label>
                                    <div>
                                        <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editgroup">

                                            <?php
                                            foreach ($groupper as $groupPer) {
                                            ?>
                                                <option><?php echo $groupPer["spg_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="emailaddress">Email :</label>
                                    <input class="form-control" type="email" id="editemailaddress" required="">
                                </div>

                                <div class="form-group">
                                    <label for="password">Plant :</label>
                                    <div>
                                        <input class="form-control" type="text" id="editplant" aria-label="Default select example" disabled>
                                        </input>
                                    </div>
                                </div>
                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveEdit">Save</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- addUser Modal-->
                <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add User</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group">
                                    <label for="empcode">Employee Code :</label>
                                    <input class="form-control" type="text" id="addempcode" required="" placeholder="Enter your employee code">
                                </div>

                                <div class="form-group">
                                    <label for="fristname">First Name :</label>
                                    <input class="form-control" type="text" id="addfirstname" required="" placeholder="Enter your frist name">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name :</label>
                                    <input class="form-control" type="text" required="" id="addlastname" placeholder="Enter your last name">
                                </div>

                                <div class="form-group">
                                    <label for="username">Group Permission :</label>
                                    <div>
                                        <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addgroup" placeholder="Enter your plant">
                                            <option>Please select group permission</option>
                                            <?php
                                            foreach ($groupper as $groupPer) {
                                            ?>
                                                <option><?php echo $groupPer["spg_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="emailaddress">Email :</label>
                                    <input class="form-control" type="email" id="addemailaddress" required="" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input class="form-control" type="password" id="addpassword" required="" placeholder="Enter your password">
                                </div>

                                <div class="form-group">
                                    <label for="password">Plant :</label>
                                    <div>
                                        <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="addplant" aria-label="Default select example" placeholder="Enter your plant">
                                            <option>Please select plant</option>
                                            <?php
                                            foreach ($plant as $plant) {
                                            ?>
                                                <option><?php echo $plant["mpa_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveAdd">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <script>
                    function from

                </script> -->


                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
                <script src="<?php echo base_url() . $js_url; ?>js/jquery-2.1.4.min.js"></script>
                <script type="text/javascript">
                    $("#btnSaveEdit").click(function() {
                        // alert("1111");
                        saveedit()
                    });
                    $("#btnSaveAdd").click(function() {
                        //alert("btnSaveAdd")
                        addUser()
                    });

                    function status(sa_id) {
                        var path = $.ajax({
                            method: "get",
                            url: "<?php echo base_url(); ?>manageUser/swiftStatus?sa_id=" + sa_id,
                        })
                    };

                    function edit(sa_id) {
                        var path = $.ajax({
                            method: "get",
                            dataType: "json",
                            url: "<?php echo base_url(); ?>manageUser/editManageUser?sa_id=" + sa_id,
                        })
                        path.done(function(rs) {
                            // alert(rs)
                            console.log(rs);
                            $("#editempcode").val(rs[0]["sa_code"]);
                            $("#editfirstname").val(rs[0]["sa_fname"]);
                            $("#editlastname").val(rs[0]["sa_lname"]);
                            $("#editgroup").val(rs[0]["spg_name"]);
                            $("#editemailaddress").val(rs[0]["sa_email"]);
                            $("#editplant").val(rs[0]["mpa_name"]);
                        })
                    };

                    function saveedit() {
                        var editempcode = $("#editempcode").val();
                        var editgroup = $("#editgroup").val();
                        var editemil = $("#editemailaddress").val();

                        var email = document.getElementById("editemailaddress");

                        if (email.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Are you sure?',
                                text: 'You failed to edit user',
                                confirmButtonColor: '#F7B267',
                            })
                        } else {
                            var path = $.ajax({
                                method: "post",
                                url: "<?php echo base_url(); ?>manageUser/saveEdit",
                                data: {
                                    empcode: editempcode,
                                    groupper: editgroup,
                                    editemail: editemil,
                                }
                            })
                            path.done(function(rs) {
                                // alert(rs);
                                if (rs === "true") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Successfully',
                                        text: 'You have successfully edit user',
                                    }).then(function() {
                                        window.location.href = "<?php echo base_url() ?>manageUser/ManagementUser";
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Data not found',
                                        text: 'You failed to edit user',
                                    })
                                }
                            })
                        }

                    };

                    function addUser() {
                        var empcode = $('#addempcode').val();
                        var firstname = $('#addfirstname').val();
                        var lastname = $('#addlastname').val();
                        var groupper = $('#addgroup').val();
                        var email = $('#addemailaddress').val();
                        var password = $('#addpassword').val();
                        var plant = $('#addplant').val();

                        var addempcode = document.getElementById("addempcode");
                        var addfirstname = document.getElementById("addfirstname");
                        var addlastname = document.getElementById("addlastname");
                        var addgroup = document.getElementById("addgroup");
                        var addemailaddress = document.getElementById("addemailaddress");
                        var addpassword = document.getElementById("addpassword");
                        var addplant = document.getElementById("addplant");



                        if (addempcode.value == "" || addfirstname.value == "" || addlastname.value == "" || addgroup.value == "" || addemailaddress.value == "" || addpassword.value == "" || addplant.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Are you sure?',
                                text: 'You failed to add user',
                                confirmButtonColor: '#F7B267',
                            })
                        } else {
                            var path = $.ajax({
                                method: "POST",
                                url: "<?php echo base_url(); ?>manageUser/addManageUser",
                                data: {
                                    empcode: empcode,
                                    firstname: firstname,
                                    lastname: lastname,
                                    groupper: groupper,
                                    email: email,
                                    password: password,
                                    plant: plant,
                                }
                            })
                            path.done(function(rs) {
                                console.log(rs);
                                alert(rs);
                                if (rs === "true") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Successfully',
                                        text: 'You have successfully add user.',

                                    }).then(function() {
                                        window.location.href = "<?php echo base_url() ?>manageUser/ManagementUser";
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to register',
                                    })
                                }
                            })
                        }


                    };
                </script>
            </div>
        </div>

    </div>

</body>

</html>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
</head>


<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Management Menu</h1>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py" style="width:100%; text-align:right">
                <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addmenu><i class="fas fa-plus-square"></i> Add Menu</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Menu</th>
                                <th>Submenu</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($tableMenu as $value) {
                                $i++;
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $value["sm_name"] . "</td>";
                                if ($value["sm_status"] == "1") {
                                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusmenu$i  name = statusmenu$i  checked onclick='statusmenu(" . $value["sm_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusmenu$i ></label>
                                            </div>
                                    </td>";
                                } else {
                                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusmenu$i name = statusmenu$i onclick='statusmenu(" . $value["sm_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusmenu$i></label>
                                        </div>
                                    </td>";
                                }
                                echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#showsubmenu\"   id=showsubmenu$i name=showsubmenu$i onclick='editsubmenu(" . $value["sm_id"] . ")'><i
                                     class=\"fas fa-info-circle fa-sm\"></i>&nbsp;&nbsp;info</button>
                                    </div>
                                </td>";
                                echo "<td>
                                <div class=\"text-wrap text-center\" >
                                 <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editmenu\"   id=editmenu$i name=editmenu$i onclick='editmenu(" . $value["sm_id"] . ")'><i
                                 class=\"fas fa-edit fa-sm\"></i> &nbsp;Edit</button>
                                </div>
                            </td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- Edit Modal-->
                <div class="modal fade" id="editmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Menu</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group" hidden>
                                    <label for="empcode">ID :</label>
                                    <input class="form-control" type="text" id="idmenu" required="">
                                </div>
                                <div class="form-group">
                                    <label for="empcode">Menu :</label>
                                    <input class="form-control" type="text" id="editmenuname" required="">
                                </div>

                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveEditMenu">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------END  Edit Modal ----------------------------->

                <!----------------------ADD Menu Modal ----------------------------->
                <div class="modal fade" id="addmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-square"></i> Add Menu</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group">
                                    <label for="empcode">Menu :</label>
                                    <input class="form-control" type="text" id="addmmenu" required="" placeholder="Enter menu name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Icon :</label>
                                    <input class="form-control" type="text" required="" id="addicons" placeholder="Enter path name">
                                </div>

                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveAddmenu">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------END Menu ADD Modal ----------------------------->
            </div>

            <!-- *************************************************************************************** -->
            <!-- *************************************************************************************** -->
            <!-- *************************************************************************************** -->
            <div class="card-body" id="showsubmenu" style="display: none">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Tablesubmenu" width="100%" cellspacing="0">
                        <!-- style="display: none"-->
                        <div class="card-header py" style="width:100%; text-align:right">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addsubmenu id="btnaddsubmenu" name="btnaddsubmenu"><i class="fas fa-user-plus fa-sm"></i> Register submenu</a>
                        </div>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Submenu</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbsubmenu">
                            <?php
                            $j = 0;
                            foreach ($tablesubmenu as $submenu) {
                                $j++;
                                echo "<tr>";
                                echo "<td>" .$j. "</td>";
                                echo "<td>" . $submenu["ss_name"] . "</td>";
                                echo "<td>" . $submenu["ss_name"] . "</td>";
                                if ($submenu["ss_status"] == "1") {
                                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetil$j  id=statusdetail$j checked onclick='statussubmenu(" . $submenu["ss_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusdetail$j ></label>
                                            </div>
                                    </td>";
                                } else {
                                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetail$j  id=statusdetail$j onclick='statussubmenu(" . $submenu["ss_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusdetail$j></label>
                                        </div>
                                    </td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="addpermenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add Permission Group Menu</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">

                                <div class="form-group">
                                    <!-- <label for="lastname">ID :</label> -->
                                    <input class="form-control" type="text" required="" id="idregis" hidden>
                                </div>

                                <div class="form-group">
                                    <label for="username">Menu :</label>
                                    <div>
                                        <select class="form-control col-md" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="regismenu" placeholder="Enter your Group Permission">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username">Submenu :</label>
                                    <div>
                                        <select class="form-control col-md" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="regissubmenu" placeholder="Enter your Group Permission">

                                        </select>
                                    </div>
                                </div>
                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" name="btnSaveAddRegis" id="btnSaveAddRegis">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
            <script type="text/javascript">
                function isValidInput(input) {
                    var pattern = new RegExp(/^([a-z0-9])+$/i);
                    return pattern.test(input);
                }

                $("#btnSaveEditMenu").click(function() {
                    // alert("wowowowo")
                    saveeditmenu()
                });
                $("#btnSaveAddmenu").click(function() {
                    // alert("wowowowo")
                    addmenu()
                });

                function editmenu(sm_id) {
                    var path = $.ajax({
                        method: "get",
                        dataType: "json",
                        url: "<?php echo base_url(); ?>manageMenu/editMenu?sm_id=" + sm_id,
                    })
                    path.done(function(rs) {
                        // alert(rs)
                        console.log(rs);
                        $("#idmenu").val(rs[0]["sm_id"]);
                        $("#editmenuname").val(rs[0]["sm_name"]);



                    })

                }

                function statusmenu(sm_id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "คุณต้องการแก้ไขสถานะใช่หรือไม่? ( Do you want to edit your status? )",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes' //ชื่อปุ่ม
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var path = $.ajax({
                                method: "get",
                                url: "<?php echo base_url(); ?>manageMenu/statusMenu?sm_id=" + sm_id,
                            })
                            path.done(function(rs) {
                                // alert(rs);
                                if (rs === "true") {
                                    Swal.fire(
                                        'Success!',
                                        'เปลี่ยนแปลงข้อมูลสำเร็จ',
                                        'success'
                                    ).then(function() {
                                        window.location.href = "<?php echo base_url() ?>manageMenu/ManagementMenu";
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Data not found',
                                        text: 'You failed to edit status',
                                    })
                                }
                            })

                        } else {
                            window.location.href = "<?php echo base_url() ?>manageMenu/ManagementMenu";
                        }

                    })

                }

                function saveeditmenu() {
                    var idmenu = $("#idmenu").val();
                    var menu = $("#editmenuname").val();

                    var chmenu = document.getElementById("editmenuname");


                    if (chmenu.value == "") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Are you sure?',
                            text: 'You failed to edit menu',
                            confirmButtonColor: '#F7B267',
                        })
                    } else {
                        if (addmmenu != 0) {
                            if (isValidInput(addmmenu)) {
                                // $("#alertinput").html("<font color='green'>ผ่าน</font>");
                                // alert("อีเมล์ถูกต้อง")
                                var path = $.ajax({
                                    method: "post",
                                    url: "<?php echo base_url(); ?>manageMenu/saveEditMenu",
                                    data: {
                                        idmenu: idmenu,
                                        menu: menu,
                                    }
                                })
                                path.done(function(rs) {
                                    // console.log(rs);
                                    // alert(rs);
                                    if (rs === "true") {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Successfully',
                                            text: 'You have successfully edit menu',
                                        }).then(function() {
                                            window.location.href = "<?php echo base_url() ?>manageMenu/ManagementMenu";
                                        })
                                    } else if (rs === "repeat") {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'You failed to edit menu',
                                            text: 'ชื่อซ้ำ! โปรดตรวจสอบอีกครั้ง'
                                        })

                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'You failed to edit menu',
                                        })
                                    }
                                })

                            } else {
                                // $("#alertinput").html("<font color='red'>โปรดตรวจสอบชื่ออีกครั้ง</font>");
                                // alert("อีเมล์ไม่ถูกต้อง")
                                Swal.fire({
                                    icon: 'error',
                                    title: 'You failed to add menu',
                                    text: 'ไม่สามารถใช้ตัวอักษรพิเศษได้'
                                })

                            }

                        }
                    }
                }


                function addmenu() {

                    var addmmenu = $("#addmmenu").val();
                    var addicons = $("#addicons").val();

                    var chemenu = document.getElementById("addmenu");
                    var cheicons = document.getElementById("addicons");


                    if (chemenu.value == "" || cheicons.value == "") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Are you sure?',
                            text: 'You failed to add menu',
                            confirmButtonColor: '#F7B267',
                        })
                    } else {
                        if (addmmenu != 0) {
                            if (isValidInput(addmmenu)) {
                                // $("#alertinput").html("<font color='green'>ผ่าน</font>");
                                // alert("อีเมล์ถูกต้อง")
                                var path = $.ajax({
                                    method: "post",
                                    url: "<?php echo base_url(); ?>manageMenu/insertMenu",
                                    data: {
                                        addmmenu: addmmenu,
                                        addicons: addicons,
                                    }
                                })
                                path.done(function(rs) {
                                    // console.log(rs);
                                    // alert(rs);
                                    if (rs === "true") {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Successfully',
                                            text: 'You have successfully add menu',
                                        }).then(function() {
                                            window.location.href = "<?php echo base_url() ?>manageMenu/ManagementMenu";
                                        })
                                    } else if (rs === "repeat") {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'You failed to add menu',
                                            text: 'ชื่อซ้ำ! โปรดตรวจสอบอีกครั้ง'
                                        })

                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'You failed to add menu',
                                        })
                                    }
                                })

                            } else {
                                // $("#alertinput").html("<font color='red'>โปรดตรวจสอบชื่ออีกครั้ง</font>");
                                // alert("อีเมล์ไม่ถูกต้อง")
                                Swal.fire({
                                    icon: 'error',
                                    title: 'You failed to add menu',
                                    text: 'ไม่สามารถใช้ตัวอักษรพิเศษได้'
                                })

                            }

                        }
                    }
                }

                function editsubmenu(sm_id) {
                    $("#showsubmenu").show("fast")
                    
                    try {

                    } catch (err) {

                    }

                };
            </script>
        </div>

    </div>
    <!-- /.container-fluid -->



    <!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer> -->
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

</html>
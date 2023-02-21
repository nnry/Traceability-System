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
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addmenu><i class="fas fa-plus-square"></i>&nbsp; Add Menu</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Menu</th>
                                <th>Status</th>
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
                                            <button  class=\"d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  me-md-2 \"   id=infosubmenu$i name=infosubmenu$i onclick='showsubmenu(" . $value["sm_id"] . ")'><i
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
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit
                                    Menu</h5>
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
                                <div class="form-group" hidden>
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

            </div>
            <!-- *************************************Table TWO*************************************** -->
            <div class="card-body" id="showtablesubmenu" style="display: none">
                <div class="table-responsive">
                    <div class="card-header py" style="width:100%; text-align:right">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addsubmenu><i class="fas fa-plus-square"></i>&nbsp; Add SubMenu</a>
                    </div>
                    <table class="table table-bordered" id="dataSubmenu" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Submenu</th>
                                <th>Path</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbsubmenu">
                            <?php
                            $i = 0;
                            foreach ($tablesubmenu as $value) {
                                $i++;
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $value["ss_name"] . "</td>";
                                echo "<td>" . $value["ss_method"] . "</td>";
                                if ($value["ss_status"] == "1") {
                                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" checked id=statussubmenu$i  name = statussubmenu$i   onclick='statussubmenu(" . $value["ss_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statussubmenu$i ></label>
                                            </div>
                                    </td>";
                                } else {
                                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statussubmenu$i name = statussubmenu$i onclick='statussubmenu(" . $value["ss_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statussubmenu$i></label>
                                        </div>
                                    </td>";
                                }
                                echo "<td>
                                            <div class=\"text-wrap text-center\">
                                            <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#modeleditsubmenu\"   id=editsubmenu$i name=editsubmenu$i onclick='cceditsubmenu(" . $value["ss_id"] . ")'><i
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
                <div class="modal fade" id="modeleditsubmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit
                                    SubMenu</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group" hidden>
                                    <label for="empcode">ID : </label>
                                    <input class="form-control" type="text" id="idsubmenu" required="">
                                </div>
                                <div class="form-group">
                                    <label for="empcode">SubMenu :</label>
                                    <input class="form-control" type="text" id="editsubmenuname" required="">
                                </div>
                                <div class="form-group">
                                    <label for="empcode">Path :</label>
                                    <input class="form-control" type="text" id="editpathmenuname" required="">
                                </div>

                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveEditSubMenu">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------END  Edit Modal ----------------------------->

                <!----------------------ADD Menu Modal ----------------------------->
                <div class="modal fade" id="addsubmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-square"></i>&nbsp; Add SubMenu</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group" hidden>
                                    <label for="empcode">ID :</label>
                                    <input class="form-control" type="text" id="idmenuaddsub" required="" placeholder="Enter menu name">
                                </div>
                                <div class="form-group">
                                    <label for="empcode">SubMenu :</label>
                                    <input class="form-control" type="text" id="addsubmenuname" required="" placeholder="Enter menu name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Path :</label>
                                    <input class="form-control" type="text" required="" id="addpathname" placeholder="Enter path name">
                                </div>

                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveAddsubmenu">Save</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- /.container-fluid -->

        <!-- <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a> -->

    </div>
</body>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
    function isValidInput(input) {
        var pattern = new RegExp(/^([a-z0-9-" "])+$/i);
        return pattern.test(input);
    }

    function isValidpath(input) {
        var pattern = new RegExp(/^([a-z0-9-/])+$/i);
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
    $("#btnSaveEditSubMenu").click(function() {
        // alert("wowowowo")
        saveeditsubmenu()
    });
    $("#btnSaveAddsubmenu").click(function() {
        // alert("wowowowo")
        addsubmenu()
    });


    function getSubmenu(rs) {
        var tb = " "
        var j = 1
        var i = 0
        $.each(rs, function(key, value) {
            tb += "<tr><td>" + parseInt(i + 1) + "</td>"
            tb += "<td>" + value["ss_name"] + "</td>"
            tb += "<td>" + value["ss_method"] + "</td>"
            if (value["ss_status"] == "1") {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statussubmenu" + j + "'  id='statussubmenu" + j + "' checked onclick='statussubmenu(" + value["ss_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statussubmenu" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            } else {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statussubmenu" + j + "'  id='statussubmenu" + j + "'  onclick='statussubmenu(" + value["ss_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statussubmenu" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            }
            tb += "<td>"
            tb += "<div class=\"text-wrap text-center\" >"
            tb += "<button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#modeleditsubmenu\"   id=editsubmenu" + j + "' name=editsubmenu" + j + "' onclick='cceditsubmenu(" + value["ss_id"] + ")'><i class=\"fas fa-edit fa-sm\"></i> Edit</button>"
            tb += "</div>"
            tb += "</td>"


            tb += "</tr>"
            j++
            i++

        })
        $("#tbsubmenu").html(tb)

    }

    function editmenu(sm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>manageMenu/editMenu?sm_id=" + sm_id,
        })
        path.done(function(rs) {
            // alert(rs)
            // console.log(rs);
            $("#idmenu").val(rs[0]["sm_id"]);
            // $("#idmenuaddsub").val(rs[0]["sm_id"]);
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

    function statussubmenu(ss_id) {
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
                    url: "<?php echo base_url(); ?>manageMenu/statusSubMenu?ss_id=" + ss_id,
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
            if (menu != 0) {
                if (isValidInput(menu)) {
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
        // var addicons = $("#addicons").val();

        var chemenu = document.getElementById("addmenu");
        // var cheicons = document.getElementById("addicons");


        if (chemenu.value == "" ) {
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
                            // addicons: addicons,
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



    function showsubmenu(sm_id) {
        // $("#showtablesubmenu").show("fast")
        try {
            var path = $.ajax({ // ajax frist
                method: "get",
                dataType: "json",
                url: "<?php echo base_url(); ?>manageMenu/getsubbyid?sm_id=" + sm_id,
            })
            path.done(function(rs) {
                // alert(rs)
                // console.log(rs)
                getSubmenu(rs)
                $("#showtablesubmenu").show("fast")

            })

            $("#idmenuaddsub").val(sm_id);
            

        } catch (err) {
            $("#showtablesubmenu").show("fast")
            $("#tbsubmenu").html("")
        }

    };

    function cceditsubmenu(ss_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>manageMenu/geteditsub?ss_id=" + ss_id,
        })
        path.done(function(rs) {
            // alert(rs)
            // console.log(rs);
            $("#idsubmenu").val(rs[0]["ss_id"]);
            $("#editpathmenuname").val(rs[0]["ss_method"]);
            $("#editsubmenuname").val(rs[0]["ss_name"]);
        })

    }

    function saveeditsubmenu() {
        var idmenu = $("#idsubmenu").val();
        var submenu = $("#editsubmenuname").val();
        var path = $("#editpathmenuname").val();

        var chmenu = document.getElementById("editsubmenuname");
        var chpath = document.getElementById("editpathmenuname");


        if (chmenu.value == "" || chpath.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You failed to edit submenu',
                confirmButtonColor: '#F7B267',
            })
        } else {
            // alert(path)
            if (submenu != 0) {
                if (isValidInput(submenu)) {
                    if (path != 0) {
                        if (isValidpath(path)) {
                            var path = $.ajax({
                                method: "post",
                                url: "<?php echo base_url(); ?>manageMenu/saveEditSubMenu",
                                data: {
                                    idmenu: idmenu,
                                    submenu: submenu,
                                    path: path,
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
                                } else if (rs === "Submenufalse") {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to edit Submenu',
                                        text: 'ชื่อซ้ำ! โปรดตรวจสอบอีกครั้ง'
                                    })

                                } else if (rs === "pathfalse") {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to edit Path',
                                        text: 'path ซ้ำ! โปรดตรวจสอบอีกครั้ง'
                                    })

                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to edit Submenu',
                                    })
                                }
                            })

                        } else {
                            // alert("2")
                            Swal.fire({
                                icon: 'error',
                                title: 'โปรดตรวจสอบ path อีกครั้ง'
                            })

                        }

                    }

                } else {
                    // alert("1")
                    Swal.fire({
                        icon: 'error',
                        title: 'You failed to edit Submenu',
                        text: 'ไม่สามารถใช้ตัวอักษรพิเศษได้'
                    })

                }

            }
        }
    }

    function addsubmenu() {

        var idmenu = $("#idmenuaddsub").val();

        var subname = $("#addsubmenuname").val();
        var pathname = $("#addpathname").val();

        var chesubmenu = document.getElementById("addsubmenuname");
        var chepath = document.getElementById("addpathname");

        // alert(idmenu);
        if (chesubmenu.value == "" || chepath.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You failed to add submenu',
                confirmButtonColor: '#F7B267',
            })
        } else {
            if (subname != 0) {
                // alert(subname)
                if (isValidInput(subname)) {
                    if (pathname != 0) {
                        // alert(pathname)
                        if (isValidpath(pathname)) {
                            var path = $.ajax({
                                method: "post",
                                url: "<?php echo base_url(); ?>manageMenu/insertSubmenu",
                                data: {
                                    idmenu: idmenu,
                                    subname: subname,
                                    pathname: pathname,
                                }
                            })
                            path.done(function(rs) {
                                // console.log(rs);
                                // alert(rs);
                                if (rs === "true") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Successfully',
                                        text: 'You have successfully add submenu',
                                    }).then(function() {
                                        window.location.href = "<?php echo base_url() ?>manageMenu/ManagementMenu";
                                    })
                                } else if (rs === "Submenufalse") {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to add Submenu',
                                        text: 'ชื่อซ้ำ! โปรดตรวจสอบอีกครั้ง'
                                    })

                                } else if (rs === "pathfalse") {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to add Path',
                                        text: 'path ซ้ำ! โปรดตรวจสอบอีกครั้ง'
                                    })

                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to add Submenu',
                                    })
                                }
                            })

                        } else {
                            // alert("2")
                            Swal.fire({
                                icon: 'error',
                                title: 'โปรดตรวจสอบ path อีกครั้ง'
                            })

                        }

                    }

                } else {
                    // alert("1")
                    Swal.fire({
                        icon: 'error',
                        title: 'You failed to add Submenu',
                        text: 'ไม่สามารถใช้ตัวอักษรพิเศษได้'
                    })

                }

            }

        }

    }
</script>
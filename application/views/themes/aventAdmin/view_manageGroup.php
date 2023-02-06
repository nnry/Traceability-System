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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Management Group Permission</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py" style="width:100%; text-align:right">
                <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addgroupper><i class="fas fa-user-plus fa-sm"></i> Add Permission</a>
            </div>

            <!---------------------------------------------------------- dataTable1 ------------------------------------------------------->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" name="dataTable1" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Permission</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 0;
                            foreach ($groupper as $value1) {
                                $j++;
                                echo "<tr>";
                                echo "<td>" . $value1["spg_id"] . "</td>";
                                echo "<td>" . $value1["spg_name"] . "</td>";
                                if ($value1["spg_status"] == "1") {
                                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=groupstatus$j  name = groupstatus$j  checked onclick='groupstatus(" . $value1["spg_id"] . ")'>
                                                <label class=\"custom-control-label\" for=groupstatus$j ></label>
                                            </div>
                                    </td>";
                                } else {
                                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=groupstatus$j name = groupstatus$j onclick='groupstatus(" . $value1["spg_id"] . ")'>
                                            <label class=\"custom-control-label\" for=groupstatus$j></label>
                                        </div>
                                    </td>";
                                }
                                echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                        <button  class=\"d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  me-md-2 \"   id=showtable$j  name =showtable$j  onclick='detailgroup(" . $value1["spg_id"] . ")'><i
                                        class=\"fas fa-info-circle fa-sm\"></i>&nbsp;info</button>                              
                                    </div>
                                </td>";
                                echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editgroupper\"   id=editgroup$j name=editgroup$j onclick='editgroup(" . $value1["spg_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!---------------------------------------------------------- dataTable1 ------------------------------------------------------->
                </div>

                <!--------------------------------------------- Edit Modal--------------------------------------------------->
                <div class="modal fade" id="editgroupper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Permission Group Name</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group">
                                    <label for="pername">Permission Group :</label>
                                    <input class="form-control" type="hidden" id="hideID" name="hideID" required="" value="">
                                    <input class="form-control" type="pername" id="editName" name="editName" required="" value="">
                                </div>
                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" id="btnSaveEditgroup" name="btnSaveEditgroup">Save</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--------------------------------------------- addUser Modal---------------------------------------------------------->

                <div class="modal fade" id="addgroupper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add Permission Group</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form class="card-body" action="#">
                                <div class="form-group">
                                    <label for="pgn_name">Permission Group :</label>
                                    <input class="form-control" type="hidden" id="hideIDadd" name="hideIDadd" required="" value="">
                                    <input class="form-control" type="text" id="addname" name="addname" required="" placeholder="Enter your permission group name">
                                </div>
                            </form>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" type="submit" name="btnSaveAdd" id="btnSaveAdd">Save</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------------------------------------ End addUser Modal---------------------------------------------------------->

                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                <script type="text/javascript">
                    function GetDetail(rs) {
                        console.log("data ==== >", rs)
                        var tb = ""
                        var j = 1
                        var i = 0

                        $.each(rs, function(key, value) {
                            tb += "<tr><td>" + parseInt(i + 1) + "</td>"
                            tb += "<td>" + value["sm_name"] + "</td>"
                            tb += "<td>" + value["ss_name"] + "</td>"
                            if (value["ss_status"] == "1") {
                                tb += "<td>"
                                tb += "<div class=\"custom-switch text-center\" >"
                                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetail" + j + "'  id='statusdetail" + j + "' checked onclick='statusdetail(" + value["spd_id"] + ")'>"
                                tb += "<label class=\"custom-control-label\" for='statusdetail" + j + "' ></label>"
                                tb += "</div>"
                                tb += "</td>"
                            } else {
                                tb += "<td>"
                                tb += "<div class=\"custom-switch text-center\" >"
                                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetail" + j + "'  id='statusdetail" + j + "'  onclick='statusdetail(" + value["spd_id"] + ")'>"
                                tb += "<label class=\"custom-control-label\" for='statusdetail" + j + "' ></label>"
                                tb += "</div>"
                                tb += "</td>"
                            }
                            tb += "</tr>"
                            j++
                            i++
                        })
                        // alert(tb)
                        $("#tbsubmenu").html(tb)
                    }
                    $("#btnSaveEditgroup").click(function() {
                        //alert("1111");
                        saveeditgroup()
                    });
                    $("#btnSaveAdd").click(function() {
                        //alert("1111");
                        addPerGroup()
                    });

                    function detailgroup(spd_id) {
                        var path = $.ajax({
                            method: "get",
                            dataType: "json",
                            url: "<?php echo base_url(); ?>manageGroup/getDetailGroup?spd_id=" + spd_id,
                        })
                        path.done(function(rs) {
                            GetDetail(rs);
                            $("#bodyshow").show("fast")
                        })

                    };

                    function statusdetail(spd_id) {
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
                                    url: "<?php echo base_url(); ?>manageGroup/statusDetail?spd_id=" + spd_id,
                                })
                                Swal.fire(
                                    'Success!',
                                    'เปลี่ยนแปลงข้อมูลสำเร็จ',
                                    'success'
                                )
                            }
                            window.location.href = "<?php echo base_url() ?>manageGroup/ManagementGroupPer";
                        })

                    };

                    function groupstatus(spg_id) {
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
                                    url: "<?php echo base_url(); ?>manageGroup/swiftStatus?spg_id=" + spg_id,
                                })
                                Swal.fire(
                                    'Success!',
                                    'เปลี่ยนแปลงข้อมูลสำเร็จ',
                                    'success'
                                )
                            }
                            window.location.href = "<?php echo base_url() ?>manageGroup/ManagementGroupPer";
                        })

                    };

                    function editgroup(spg_id) {
                        var path = $.ajax({
                            method: "get",
                            dataType: "json",
                            url: "<?php echo base_url(); ?>manageGroup/editNameGroup?spg_id=" + spg_id,
                        })
                        path.done(function(rs) {
                            // alert(rs)
                            console.log(rs);
                            $("#hideID").val(rs[0]["spg_id"]);
                            $("#editName").val(rs[0]["spg_name"]);
                        })
                    };

                    function saveeditgroup() {
                        var name = $("#editName").val();
                        var id = $("#hideID").val();

                        var editname = document.getElementById("editName");
                        if (editname.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Are you sure?',
                                text: 'You failed to edit name group permission',
                                confirmButtonColor: '#F7B267',
                            })
                        } else {
                            var path = $.ajax({
                                method: "post",
                                url: "<?php echo base_url(); ?>manageGroup/saveEditPer",
                                data: {
                                    id: id,
                                    name: name
                                }
                            })
                            path.done(function(rs) {
                                //alert(rs);
                                if (rs === "true") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Successfully',
                                        text: 'You have successfully edit  name group permission',
                                    }).then(function() {
                                        window.location.href = "<?php echo base_url() ?>manageGroup/ManagementGroupPer";
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Data not found',
                                        text: 'You failed to edit  name group permission',
                                    })
                                }
                            })
                        }


                    }

                    function addPerGroup() {
                        var name = $('#addname').val();
                        // var id = $('#hideIDadd').val();
                        var addname = document.getElementById("addname");

                        if (addname.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Are you sure?',
                                text: 'You failed to edit name group permission',
                                confirmButtonColor: '#F7B267',
                            })
                        } else {
                            var path = $.ajax({
                                method: "POST",
                                url: "<?php echo base_url(); ?>manageGroup/addPergroup",
                                data: {
                                    // id:id,
                                    name: name
                                }
                            })
                            path.done(function(rs) {
                                console.log(rs);
                                // alert(rs);
                                if (rs === "true") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Successfully',
                                        text: 'You have successfully add  name group permission',

                                    }).then(function() {
                                        window.location.href = "<?php echo base_url() ?>manageGroup/ManagementGroupPer";
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'You failed to register',
                                    })
                                }
                            })
                        }



                    }
                </script>
            </div>

            <!---------------------------------------------------------- Tabledetail ------------------------------------------------------->

            <div class="card-body" id="bodyshow" style="display: none">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Tabledetail" width="100%" cellspacing="0">
                        <!-- style="display: none"-->
                        <div class="card-header py" style="width:100%; text-align:right">
                            <a hidden href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addpermenu id="btnaddpermenu"><i class="fas fa-user-plus fa-sm"></i> Register </a>
                        </div>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Menu</th>
                                <th>Submenu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbsubmenu">
                            <?php
                            $j = 0;
                            foreach ($tabledetail as $detail) {
                                $j++;
                                echo "<tr>";
                                echo "<td>" . $detail["spg_id"] . "</td>";
                                echo "<td>" . $detail["sm_name"] . "</td>";
                                echo "<td>" . $detail["ss_name"] . "</td>";
                                if ($detail["ss_status"] == "1") {
                                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetil$j  id=statusdetail$j checked onclick='statusdetail(" . $detail["spd_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusdetail$j ></label>
                                            </div>
                                    </td>";
                                } else {
                                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetail$j  id=statusdetail$j onclick='statusdetail(" . $detail["spd_id"] . ")'>
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
            </div>
            <!-------------------------------------------------- Tabledetail --------------------------------------->
        </div>

    </div>
    <!-- /.container-fluid -->

</body>

</html>
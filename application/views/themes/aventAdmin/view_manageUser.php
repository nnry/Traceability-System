<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-user-plus fa-sm"></i> Add User</a>
                <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Permission</th>
                                <th>User Code </th>
                                <th>Frist Name</th>
                                <th>Last Name</th>
                                <th>User E-mail</th>
                                <th>Plant</th>
                                <th>Status</th>
                                <th>Actoin</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($resultUser as $value) {
                                $i++;
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $value["spg_name"] . "</td>";
                                echo "<td>" . $value["sa_code"] . "</td>";
                                echo "<td>" . $value["sa_fname"] . "</td>";
                                echo "<td>" . $value["sa_lname"] . "</td>";
                                echo "<td>" . $value["sa_email"] . "</td>";
                                echo "<td>" . $value["mpa_name"] . "</td>";
                                // echo "<td>" . "Edit and Status" . "</td>";
                                echo "<td>
                                <div class=\"custom-switch text-center\">
                                    <input type=\"checkbox\" class=\"custom-control-input\" id=\"customSwitch$i\">
                                    <label class=\"custom-control-label\" for=\"customSwitch$i\"></label>
                                </div>
                                </td>";
                                echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                        <button class=\"d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  me-md-2 \"><i
                                        class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>
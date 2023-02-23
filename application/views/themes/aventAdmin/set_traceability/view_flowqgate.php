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
  <link href="<?php echo base_url() ?>assets/css/codepen.css" rel="stylesheet">

</head>

<body id="page-top">
  <style>
    .main-timeline .content {
      color: #909090 !important;
      width: 100% !important;
      padding: 20px !important;
      display: inline-block !important;
      /* float: right; */
    }

    .main-timeline .timeline-year {
      color: #65c7d0;
      font-size: 23px;
      font-weight: 600;
      display: inline-block;
      transform: translatey(-50%);
      position: absolute;
      top: 50%;
      left: 10%;
    }

    .clock {
      border-radius: 60px;
      border: 3px solid #36b9cc;
      height: 80px;
      width: 80px;
      position: relative;
      top: 28%;
      top: -webkit-calc(50% - 43px);
      top: calc(50% - 43px);
      left: 35%;
      left: -webkit-calc(50% - 43px);
      left: calc(50% - 43px);
    }

    .clock:after {
      content: "";
      position: absolute;
      background-color: #36b9cc;
      top: 2px;
      left: 48%;
      height: 38px;
      width: 4px;
      border-radius: 5px;
      -webkit-transform-origin: 50% 97%;
      transform-origin: 50% 97%;
      -webkit-animation: grdAiguille 10s linear infinite;
      animation: grdAiguille 10s linear infinite;
    }

    @-webkit-keyframes grdAiguille {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes grdAiguille {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .clock:before {
      content: "";
      position: absolute;
      background-color: #36b9cc;
      top: 6px;
      left: 48%;
      height: 35px;
      width: 4px;
      border-radius: 5px;
      -webkit-transform-origin: 50% 94%;
      transform-origin: 50% 94%;
      -webkit-animation: ptAiguille 120s linear infinite;
      animation: ptAiguille 120s linear infinite;
    }
  </style>

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Q - Gate</h1>

      <!-- <form class="d-none d-sm-inline-block form-inline col-md-4 ml-auto mr ml-md my-2 my-md-0 mw-100 navbar-search"
        style="width:30%; text-align:right">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-2" placeholder="Search for..." aria-label="Search"
            aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-warning" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form> -->
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50" onclick="createPDF()"></i> Generate Report</a>
    </div>
    <!-- Search Data -->
    <div class="card shadow mb-4"><br>
      <div class="card-body ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="<?php echo base_url() ?>assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>

                      <div class="row">
                        <div class="card-body col-md-12 row mb-3">
                          <label class="col-sm-6 col-form-label">Plant :</label>
                          <div class="col-md-12">
                            <div class="col-md-12">
                              <select class="form-control" aria-label="Default select example" id="selectplant" name="selectplant" value="Select Plant" placeholder="Select Plant">
                                <option></option>
                                <?php
                                foreach ($plantqgate as $key) {
                                ?>
                                  <option value="<?php echo $key["mpa_id"]; ?>"><?php echo $key["mpa_name"]; ?></option>
                                <?php } ?>

                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="card-body col-md-12 row mb-3">
                          <label class="col-sm-6 col-form-label">Zone :</label>
                          <div class="col-md-12">
                            <div class="col-md-12">
                              <select class="form-control" aria-label="Default select example" id="selectzone" name="selectzone">
                                <option selected>Select...</option>
                                <option value="1">...</option>
                                <option value="2">...</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="card-body col-md-12 row mb-3">
                          <label class="col-sm-6 col-form-label">Station :</label>
                          <div class="col-md-12">
                            <div class="col-md-12">
                              <select class="form-control" aria-label="Default select example" id="selectstation" name="selectzone" s>
                                <option selected>Select...</option>
                                <option value="1">...</option>
                                <option value="2">...</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="card-body col-md-12 row mb-3">
                          <label class="col-sm-6 col-form-label">Part no. :</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="oldpass">
                          </div>
                        </div>

                        <div class="card-body col-md-12 row mb-3">
                          <label class="col-sm-6 col-form-label">Delivery Date :</label>
                          <div class="col-md-12">
                            <input type="date" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-change="checkre()" id="compass">
                          </div>
                        </div>

                        <div class="card-body col-md-12 row mb-3">
                          <label class="col-sm-8 col-form-label">Scan Q-Gate TAG :</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="newpass">
                          </div>
                        </div>


                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <button type="submit" id="strt" class="btn btn-outline-light btn-rounded get-started-btn col-md-5">Start</button>
                          <button type="submit" id="end" class="btn btn-outline-light btn-rounded get-started-btn col-md-5">End</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Flow -->
    <div class="card shadow mb-4"><br>
      <div class="card-body ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="main-timeline">
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">COMING SOON</span>
                    <div class="timeline-icon">
                      <i class="far fa-clock" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="time_line-content">
                                <div class="time_line-descr text-left">
                                  <label>&nbsp;</label>
                                </div>
                                <div class="clock" style="margin-top:-4%"></div>
                                <div class="time_line-descr text-center" style="color:#36b9cc"><label>WEB POST</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 1</span>
                    <div class="timeline-icon">
                      <i class="fas fa-fw fa-cog" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="machine1_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine1_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine1_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine1_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 2</span>
                    <div class="timeline-icon">
                      <i class="fas fa-fw fa-cogs" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="machine2_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine2_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine2_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine2_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 3</span>
                    <div class="timeline-icon">
                      <i class="fas fa-screwdriver" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="machine3_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine3_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine3_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine3_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 4</span>
                    <div class="timeline-icon">
                      <i class="fas fa-wrench" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="machine4_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine4_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine4_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine4_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">WASHING</span>
                    <div class="timeline-icon">
                      <i class="fas fa-clipboard-list" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="washing_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="washing_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="washing_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="washing_scan_date">xxxxx</label></div>
                            </div>
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">Q-GATE</span>
                    <div class="timeline-icon">
                      <i class="fas fa-clipboard-check" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="qgate_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="qgate_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="qgate_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="qgate_scan_date">xxxxx</label></div>
                            </div>
                            <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">TRANSFER</span>
                    <div class="timeline-icon">
                      <i class="fa fa-boxes" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="transfer_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="transfer_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="transfer_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="transfer_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">PICKING</span>
                    <div class="timeline-icon">
                      <i class="fas fa-dolly-flatbed" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="picking_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="picking_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="picking_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="picking_scan_date">xxxxx</label></div>
                            </div>
                            <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a href="#" class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">SHIPPING</span>
                    <div class="timeline-icon">
                      <i class="fas fa-shipping-fast" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <h5 class="time_line-title"><label id="shipping_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="shipping_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="shipping_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="shipping_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
  var datafullbody = {}
  $(document).ready(function() {
    $("#selectplant")
      .change(function() {
        var str = "";
        var tb = ""
        var para = this.value
        $("#selectplant option:selected").each(function() {
          // alert(para)
          // console.log(rs)
          loadzone(para)

        });

      })
  })


  function loadzone(para) {
    // console.log("para ==> " ,para)
    $("#selectzone").html("")
    var tb = " "
    var i = 0
    var path = $.ajax({ // ajax frist
        method: "get",
        dataType: "json",
        url: "<?php echo base_url(); ?>Trace_Qgate/getzonebyid?para=" + para,
      })
      .done(function(rs) {
        // var data = JSON.parse(rs)
        // console.log("data",data)

        var zoneall = rs.zoneall
        var byid = rs.byid
        // console.log("zoneall", zoneall)
        // console.log("data", data)



        $.each()
      })



  }




  // function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
  //       $dompdf = new Dompdf\DOMPDF();
  //       $dompdf->load_html($html);
  //       $dompdf->set_paper($paper, $orientation);
  //       $dompdf->render();
  //       if($download)
  //           $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
  //       else
  //           $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
  //   }
</script>
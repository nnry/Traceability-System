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

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->


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

    /* .swal2-close {
      z-index: 2;
      align-items: center;
      justify-content: center;
      width: 1.2em;
      height: 1.2em;
      margin-top: 0;
      margin-right: 0;
      margin-bottom: -1.2em;
      padding: 0;
      overflow: hidden;
      transition: color .1s, box-shadow .1s;
      border: none;
      border-radius: 5px;
      background: rgba(0, 0, 0, 0);
      color: #ccc;
      font-family: serif;
      font-family: monospace;
      font-size: 2.5em;
      cursor: pointer;
      justify-self: end;
    } */
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
      <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row">
              <div class="card-body col-md-8 row mb-3">
                <label class="col-form-label">Delivery Date :</label>
                <div class="col-md-7">
                  <input type="date" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-change="checkre()" id="delidate">
                </div>
              </div>

              <div class="card-body col-md-6 row mb-3">
                <label class="col-form-label">Plant :</label>
                <div class="col-md-8">
                  <select class="form-control" aria-label="Default select example" id="selectplant" name="selectplant" value="Select Plant" placeholder="Select Plant">
                    <option>Select...</option>
                    <?php
                    foreach ($plantqgate as $key) {
                    ?>
                      <option value="<?php echo $key["mpa_id"]; ?>"><?php echo $key["mpa_name"]; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="card-body col-md-6 row mb-3">
                <label class="col-form-label">Zone :</label>
                <div class="col-md-8">
                  <select class="form-control" aria-label="Default select example" id="selectzone" name="selectzone">
                    <option>Select...</option>
                    <!-- <option value="1">...</option>
                                <option value="2">...</option> -->
                  </select>
                </div>
              </div>

              <div class="card-body col-md-6 row mb-3">
                <label class="col-form-label">Station :</label>
                <div class="col-md-8">
                  <select class="form-control" aria-label="Default select example" id="selectstation" name="selectstation">
                    <option>Select...</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="card-body col-md-6 row mb-3">
                <label class="col-form-label">Part no. :</label>
                <div class="col-md-8">
                  <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="inputpart">
                </div>
              </div>

              <div class="card-body col-md-8 row mb-3">
                <label class="col-form-label">Scan Q-Gate TAG :</label>
                <div class="col-md-8">
                  <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="inputscantag">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg mb-3 text-right">
        <button type="submit" class="btn btn-warning" id="btnsearchqgate" onclick='searchqgate()'>Submit</button>
      </div>
    </div>

    <!-- Flow -->
    <div class="card shadow mb-4" id="flowTrace"><br>
      <div class="card-body ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="main-timeline">
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">COMING SOON</span>
                    <div class="timeline-icon">
                      <i class="far fa-clock" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="detailcomingsoon" onclick="clickcoming()">
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
                  <a class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 1</span>
                    <div class="timeline-icon">
                      <i class="fas fa-fw fa-cog" aria-hidden="true"></i>
                    </div>
                    <div class="content" id=clickma1>
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailmachine1">
                              <h5 class="time_line-title"><label id="machine1_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine1_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine1_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine1_scan_date">xxxxx</label></div>
                            </div>
                            <!-- <span id="imgdetailmachine1">
                              <img src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                            </span> -->
                            <img id="imgdetailmachine1" src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>


                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 2</span>
                    <div class="timeline-icon">
                      <i class="fas fa-fw fa-cogs" aria-hidden="true"></i>
                    </div>
                    <div class="content" id=clickma2>
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailmachine2">
                              <h5 class="time_line-title"><label id="machine2_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine2_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine2_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine2_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img id="imgdetailmachine2" src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 3</span>
                    <div class="timeline-icon">
                      <i class="fas fa-screwdriver" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clickma3">
                      <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailmachine3">
                              <h5 class="time_line-title"><label id="machine3_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine3_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine3_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine3_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img id="imgdetailmachine3" src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">MACHINE ZONE 4</span>
                    <div class="timeline-icon">
                      <i class="fas fa-wrench" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clickma4">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailmachine4">
                              <h5 class="time_line-title"><label id="machine4_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="machine4_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="machine4_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="machine4_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img id="imgdetailmachine4" src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">WASHING</span>
                    <div class="timeline-icon">
                      <i class="fas fa-clipboard-list" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clickwashing">
                      <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailwashing">
                              <h5 class="time_line-title"><label id="washing_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="washing_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="washing_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="washing_scan_date">xxxxx</label></div>
                            </div>
                            <img id="imgdetailwashing" src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">Q-GATE</span>
                    <div class="timeline-icon">
                      <i class="fas fa-clipboard-check" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clickQgate">
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailqgate">
                              <h5 class="time_line-title"><label id="qgate_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="qgate_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="qgate_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="qgate_scan_date">xxxxx</label></div>
                            </div>
                            <img id="imgdetailqgate" src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">TRANSFER</span>
                    <div class="timeline-icon">
                      <i class="fa fa-boxes" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clicktransfer">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailtransfer">
                              <h5 class="time_line-title"><label id="transfer_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="transfer_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="transfer_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="transfer_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img id="imgdetailtransfer" src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-left: 50%;padding: 20px;">
                    <span class="timeline-year">PICKING</span>
                    <div class="timeline-icon">
                      <i class="fas fa-dolly-flatbed" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clickpick">
                      <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailpicking">
                              <h5 class="time_line-title"><label id="picking_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="picking_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="picking_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="picking_scan_date">xxxxx</label></div>
                            </div>
                            <img id="imgdetailpicking" src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="timeline">
                  <a class="timeline-content" style="width: 50%;position: static;margin-right: 50%;padding: 20px;">
                    <span class="timeline-year">SHIPPING</span>
                    <div class="timeline-icon">
                      <i class="fas fa-shipping-fast" aria-hidden="true"></i>
                    </div>
                    <div class="content" id="clickship">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2" id="detailshipping">
                              <h5 class="time_line-title"><label id="shipping_user_name">XXX</label></h5>
                              <div class="time_line-descr">USER ID : <label id="shipping_user_id">xxxxx</label></div>
                              <div class="time_line-descr">PART NO : <label id="shipping_part_no">xxxxx</label></div>
                              <div class="time_line-descr">SCAN DATE : <label id="shipping_scan_date">xxxxx</label>
                              </div>
                            </div>
                            <img id="imgdetailshipping" src="https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png" class="img-circle" style="width: 30%;" alt="Cinque Terre" />
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
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
  </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
  function createPDF() {


  }

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

  // $('#btnsearchqgate').click(function() {
  //   searchqgate()
  // })

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
        // var byid = rs.byid
        // console.log("zoneall", zoneall)
        // console.log("data", data)
        tb += "<option>" + "Select..." + "</option>"
        $.each(zoneall, function(key, value) {
          if (para == value["mpa_id"]) {

            tb += "<option value='" + value["mza_id"] + "'>" + value["mza_name"] + "</option>"

          }
          i++
        })

        $("#selectzone").html(tb)
      })

    $(document).ready(function() {
      $("#selectzone")
        .change(function() {
          var str = "";
          var tb = ""
          var zone = this.value
          $("#selectzone option:selected").each(function() {
            // alert(para)
            // console.log(rs)
            loadstation(para, zone)

          });

        })
    })
  }


  function loadstation(para, zone) {
    $("#selectstation").html("")
    var tb = " "
    var i = 0
    var path = $.ajax({ // ajax frist
        method: "get",
        dataType: "json",
        url: "<?php echo base_url(); ?>Trace_Qgate/getstationload?zone="+zone+"&para="+para,
      })
      .done(function(rs) {
        // alert(rs);
        // console.log("rs =>" , rs)
        var station = rs.all
        var all = rs.all
        tb += "<option>" + "Select..." + "</option>"
        $.each(station, function(key, value) {
          if (para == value["mpa_id"]) {
            if (zone == value["mza_id"]) {
              tb += "<option value='" + value["msa_id"] + "'>" + value["msa_station"] + "</option>"
            }
          }
          i++

        })
        $("#selectstation").html(tb)
      })
  }


  function searchqgate() {

    var delidate = $('#delidate').val();
    var selectplant = $('#selectplant').val();
    var selectzone = $('#selectzone').val();
    var selectstation = $('#selectstation').val();
    var inputpart = $('#inputpart').val();
    var inputscantag = $('#inputscantag').val();

    var chdelidate = document.getElementById('delidate');
    var chselectplant = document.getElementById('selectplant');
    var chselectzone = document.getElementById('selectzone');
    var chselectstation = document.getElementById('selectstation');
    // var chinputpart = document.getElementById('inputpart');
    // var chinputscantag = document.getElementById('inputscantag');

    if (inputscantag != 0) {

      getwashing(inputscantag);
      getQgate(inputscantag);
      getTransfer(inputscantag);
      getPicking(inputscantag);
      getShipping(inputscantag);

      var path = $.ajax({
        method: "post",
        url: "<?php echo base_url(); ?>Trace_Qgate/searchByScanTag",
        data: {
          // delidate: delidate,
          // selectplant: selectplant,
          // selectzone: selectzone,
          // selectstation: selectstation,
          inputscantag: inputscantag
        }
      })

      path.done(function(rs) {

        // alert(rs)
        if (rs == "undefined") {
          // alert("wow");
          getNotFoundmachine()


        } else {
          var data = JSON.parse(rs)
          Getmachine(data)
        }


      })

    } else {
      if (chdelidate.value == "") {
        Swal.fire({
          icon: 'warning',
          title: 'โปรดตรวจสอบข้อมูลของวันที่อีกครั้ง',
          text: 'Are you sure?',
          confirmButtonColor: '#F7B267',
        })
      } else if (chselectplant.value == "Select..." || chselectzone.value == "Select..." || chselectstation.value == "Select...") {
        Swal.fire({
          icon: 'warning',
          title: 'โปรดตรวจสอบข้อมูลอีกครั้ง',
          text: 'Are you sure?',
          confirmButtonColor: '#F7B267',
        })
      } else if (inputpart != 0) {
        console.log("delidate==>> ",delidate)
        var path = $.ajax({
          method: "post",
          url: "<?php echo base_url(); ?>Trace_Qgate/searchbypart",
          data: {
            delidate: delidate,
            selectplant: selectplant,
            selectzone: selectzone,
            selectstation: selectstation,
            inputpart: inputpart,
          }
        })
        path.done(function(rs) {
          alert(rs)
          console.log(" rs==>> ",rs)
          


        })
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'โปรดตรวจสอบข้อมูล Part no. อีกครั้ง',
          text: 'Are you sure?',
          confirmButtonColor: '#F7B267',
        })
      }

    }



  }

  function Getmachine(data) {
    // alert(data)
    // console.log("data ==> ",data)
    // console.log("data.zone ==> ",data.zone)
    var zone = data.zone
    var mt = " "
    // alert(zone)
    if (zone === '1') {
      $("#detailmachine1").html("");
      $("#imgdetailmachine1").show();
      // alert("1")
      // $("#machine1_user_name").html(data.line);
      // $("#machine1_user_id").html(data.byUser);
      // $("#machine1_part_no").html(data.part_no);
      // $("#machine1_scan_date").html(data.date);

      mt += "<h5 class='time_line-title'><label id='machine1_user_name'>" + data.line + "</label></h5>"
      mt += "<div class='time_line-descr'>USER ID : <label id='machine1_user_name'>" + data.byUser + "</label></div>"
      mt += "<div class='time_line-descr'>PART NO : <label id='machine1_user_name'>" + data.part_no + "</label></div>"
      mt += "<div class='time_line-descr'>SCAN DATE : <label id='machine1_user_name'>" + data.date + "</label>"
      $("#detailmachine1").html(mt)

      var idTagFa = data.idFa
      var pathmc1 = $.ajax({
        method: "get",
        url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
        data: {
          "idTagFa": idTagFa
        }

      })
      pathmc1.done(function(mc1) {
        var remc1 = JSON.parse(mc1)
        var str = "<br><img src='https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
          "<div class='time_line-descr'>USER NAME : <label>" + remc1.empName + "</label></div>\n" +
          "<div class='time_line-descr'>PART NO : <label>" + remc1.partNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>LINE NO : <label>" + remc1.lineFA + "</label></div>\n" +
          "<div class='time_line-descr'>LOT  NO : <label>" + remc1.lotNoProd + "</label></div>\n" +
          "<div class='time_line-descr'>BOX  NO : <label>" + remc1.boxNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>QTY     : <label>" + remc1.spnFA + "</label></div>\n" +
          "<div class='time_line-descr'>DATE : <label>" + remc1.datecom + "</label></div>";

        $("#clickma1").click(function() {
          Swal.fire({
            // '<pre>' + str + '</pre>'
            html: '<pre>' + str + '</pre>',
            showCloseButton: true,
            showConfirmButton: false,
          })

        });

      });

    } else {
      // alert("1  else")
      // detailmachine1
      $("#clickma1").click(function() {
        // alert("wowowowo")
        Swal.fire(
          'ไม่มีข้อมูล',
          'No Data Found!',
          'error'
        )

      });
      $("#detailmachine1").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
      $("#imgdetailmachine1").hide();

    }
    if (zone === '2') {
      $("#detailmachine2").html("");
      $("#imgdetailmachine2").show();

      // $("#machine2_user_name").html(data.line);
      // $("#machine2_user_id").html(data.byUser);
      // $("#machine2_part_no").html(data.part_no);
      // $("#machine2_scan_date").html(data.date);

      // alert("2") 
      mt += "<h5 class='time_line-title'><label id='machine2_user_name'>" + data.line + "</label></h5>"
      mt += "<div class='time_line-descr'>USER ID : <label id='machine2_user_id'>" + data.byUser + "</label></div>"
      mt += "<div class='time_line-descr'>PART NO : <label id='machine2_part_no'>" + data.part_no + "</label></div>"
      mt += "<div class='time_line-descr'>SCAN DATE : <label id='machine2_scan_date'>" + data.date + "</label>"
      $("#detailmachine2").html(mt)


      var idTagFa = data.idFa
      var pathmc2 = $.ajax({
        method: "get",
        url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
        data: {
          "idTagFa": idTagFa
        }

      })
      pathmc2.done(function(mc2) {
        var remc2 = JSON.parse(mc2)
        var str = "<br><img src='https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
          "<div class='time_line-descr'>USER NAME : <label>" + remc2.empName + "</label></div>\n" +
          "<div class='time_line-descr'>PART NO : <label>" + remc2.partNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>LINE NO : <label>" + remc2.lineFA + "</label></div>\n" +
          "<div class='time_line-descr'>LOT  NO : <label>" + remc2.lotNoProd + "</label></div>\n" +
          "<div class='time_line-descr'>BOX  NO : <label>" + remc2.boxNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>QTY     : <label>" + remc2.spnFA + "</label></div>\n" +
          "<div class='time_line-descr'>DATE : <label>" + remc2.datecom + "</label></div>";



        $("#clickma2").click(function() {
          Swal.fire({
            // '<pre>' + str + '</pre>'
            html: '<pre>' + str + '</pre>',
            showCloseButton: true,
            showConfirmButton: false,
          })
        });

      })

    } else {
      // alert("2  else")
      $("#detailmachine2").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
      $("#imgdetailmachine2").hide();

      $("#clickma2").click(function() {
        // alert("wowowowo")

        Swal.fire(
          'ไม่มีข้อมูล',
          'No Data Found!',
          'error'
        )

      });
    }

    if (zone === '3') {
      $("#detailmachine3").html("");
      $("#imgdetailmachine3").show();
      // alert("3")
      // $("#machine3_user_name").html(data.line);
      // $("#machine3_user_id").html(data.byUser);
      // $("#machine3_part_no").html(data.part_no);
      // $("#machine3_scan_date").html(data.date);

      mt += "<h5 class='time_line-title'><label id='machine3_user_name'>" + data.line + "</label></h5>"
      mt += "<div class='time_line-descr'>USER ID : <label id='machine3_user_name'>" + data.byUser + "</label></div>"
      mt += "<div class='time_line-descr'>PART NO : <label id='machine3_user_name'>" + data.part_no + "</label></div>"
      mt += "<div class='time_line-descr'>SCAN DATE : <label id='machine3_user_name'>" + data.date + "</label>"
      $("#detailmachine3").html(mt)
      var idTagFa = data.idFa
      var pathmc2 = $.ajax({
        method: "get",
        url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
        data: {
          "idTagFa": idTagFa
        }

      })
      pathmc3.done(function(mc3) {
        var remc3 = JSON.parse(mc3)
        var str = "<br><img src='https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
          "<div class='time_line-descr'>USER NAME : <label>" + remc3.empName + "</label></div>\n" +
          "<div class='time_line-descr'>PART NO : <label>" + remc3.partNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>LINE NO : <label>" + remc3.lineFA + "</label></div>\n" +
          "<div class='time_line-descr'>LOT  NO : <label>" + remc3.lotNoProd + "</label></div>\n" +
          "<div class='time_line-descr'>BOX  NO : <label>" + remc3.boxNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>QTY     : <label>" + remc3.spnFA + "</label></div>\n" +
          "<div class='time_line-descr'>DATE : <label>" + remc3.datecom + "</label></div>";


        $("#clickma3").click(function() {
          Swal.fire({
            // '<pre>' + str + '</pre>'
            html: '<pre>' + str + '</pre>',
            showCloseButton: true,
            showConfirmButton: false,
          })
        });

      })


    } else {
      // alert("3  else")
      $("#detailmachine3").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
      $("#imgdetailmachine3").hide();
      $("#clickma3").click(function() {
        // alert("wowowowo")

        Swal.fire(
          'ไม่มีข้อมูล',
          'No Data Found!',
          'error'
        )
      });
    }

    if (zone == '4') {
      $("#detailmachine4").html("");
      $("#imgdetailmachine4").show();
      // alert("4")
      // $("#machine4_user_name").html(data.line);
      // $("#machine4_user_id").html(data.byUser);
      // $("#machine4_part_no").html(data.part_no);
      // $("#machine4_scan_date").html(data.date);

      mt += "<h5 class='time_line-title'><label id='machine4_user_name'>" + data.line + "</label></h5>"
      mt += "<div class='time_line-descr'>USER ID : <label id='machine4_user_name'>" + data.byUser + "</label></div>"
      mt += "<div class='time_line-descr'>PART NO : <label id='machine4_user_name'>" + data.part_no + "</label></div>"
      mt += "<div class='time_line-descr'>SCAN DATE : <label id='machine4_user_name'>" + data.date + "</label>"
      $("#detailmachine4").html(mt)


      var idTagFa = data.idFa
      var pathmc4 = $.ajax({
        method: "get",
        url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
        data: {
          "idTagFa": idTagFa
        }

      })
      pathmc4.done(function(mc4) {
        var remc4 = JSON.parse(mc4)
        var str = "<br><img src='https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
          "<div class='time_line-descr'>USER NAME : <label>" + remc4.empName + "</label></div>\n" +
          "<div class='time_line-descr'>PART NO : <label>" + remc4.partNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>LINE NO : <label>" + remc4.lineFA + "</label></div>\n" +
          "<div class='time_line-descr'>LOT  NO : <label>" + remc4.lotNoProd + "</label></div>\n" +
          "<div class='time_line-descr'>BOX  NO : <label>" + remc4.boxNoFA + "</label></div>\n" +
          "<div class='time_line-descr'>QTY     : <label>" + remc4.spnFA + "</label></div>\n" +
          "<div class='time_line-descr'>DATE : <label>" + remc4.datecom + "</label></div>";


        $("#clickma4").click(function() {
          Swal.fire({
            // '<pre>' + str + '</pre>'
            html: '<pre>' + str + '</pre>',
            showCloseButton: true,
            showConfirmButton: false,

          })

        });

      })





    } else {
      // alert("else")
      $("#detailmachine4").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
      $("#imgdetailmachine4").hide();
      $("#clickma4").click(function() {
        // alert("wowowowo")
        Swal.fire(
          'ไม่มีข้อมูล',
          'No Data Found!',
          'error'
        )

      });
    }
  }

  function getwashing(inputscantag) {
    var mt = " "

    var path = $.ajax({
      method: "get",
      url: "<?php echo base_url(); ?>Trace_Qgate/searchwashing?inputscantag=" + inputscantag,

    })
    path.done(function(rs) {
      // alert(rs)

      if (rs == "undefined") {
        $("#detailwashing").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
        $("#imgdetailwashing").hide();
        $("#clickwashing").click(function() {
          // alert("wowowowo")
          Swal.fire(
            'ไม่มีข้อมูล',
            'No Data Found!',
            'error'
          )

        });

      } else {
        $("#detailwashing").html("");
        $("#imgdetailwashing").show();
        var data = JSON.parse(rs)
        // $("#washing_user_name").html(data.line);
        // $("#washing_user_id").html(data.byUser);
        // $("#washing_part_no").html(data.partNo);
        // $("#washing_scan_date").html(data.date);
        mt += "<h5 class='time_line-title'><label id='washing_user_name'>" + data.line + "</label></h5>"
        mt += "<div class='time_line-descr'>USER ID : <label id='washing_user_id'>" + data.byUser + "</label></div>"
        mt += "<div class='time_line-descr'>PART NO : <label id='washing_part_no'>" + data.partNo + "</label></div>"
        mt += "<div class='time_line-descr'>SCAN DATE : <label id='washing_scan_date'>" + data.date + "</label>"
        $("#detailwashing").html(mt)

        var idTagFa = data.tagId
        // alert(idTagFa);
        // console.log("===>",idTagFa);
        var pathwashing = $.ajax({
          method: "get",
          url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
          data: {
            "idTagFa": idTagFa
          }

        })
        pathwashing.done(function(was) {
          // alert(was)
          // console.log(was);
          var resultwashing = JSON.parse(was)

          var str = "<br><img src='https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
            "<div class='time_line-descr'>USER NAME : <label>" + resultwashing.empName + "</label></div>\n" +
            "<div class='time_line-descr'>PART NO : <label>" + resultwashing.partNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>LINE NO : <label>" + resultwashing.lineFA + "</label></div>\n" +
            "<div class='time_line-descr'>LOT  NO : <label>" + resultwashing.lotNoProd + "</label></div>\n" +
            "<div class='time_line-descr'>BOX  NO : <label>" + resultwashing.boxNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>QTY     : <label>" + resultwashing.spnFA + "</label></div>\n" +
            "<div class='time_line-descr'>DATE : <label>" + resultwashing.datecom + "</label></div>";

          $("#clickwashing").click(function() {
            Swal.fire({
              // '<pre>' + str + '</pre>'
              html: '<pre>' + str + '</pre>',
              showCloseButton: true,
              showConfirmButton: false,

            })

          });

        })




      }


    })


  }

  function getNotFoundmachine() {
    $("#detailmachine1").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
    $("#imgdetailmachine1").hide();


    $("#detailmachine2").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
    $("#imgdetailmachine2").hide();

    $("#detailmachine3").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
    $("#imgdetailmachine3").hide();

    $("#detailmachine4").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
    $("#imgdetailmachine4").hide();

    $("#clickma2").click(function() {
      // alert("wowowowo")

      Swal.fire(
        'ไม่มีข้อมูล',
        'No Data Found!',
        'error'
      )

    });
    $("#clickma3").click(function() {
      // alert("wowowowo")

      Swal.fire(
        'ไม่มีข้อมูล',
        'No Data Found!',
        'error'
      )
    });
    $("#clickma4").click(function() {
      // alert("wowowowo")
      Swal.fire(
        'ไม่มีข้อมูล',
        'No Data Found!',
        'error'
      )

    });

    $("#clickma1").click(function() {
      // alert("wowowowo")
      Swal.fire(
        'ไม่มีข้อมูล',
        'No Data Found!',
        'error'
      )

    });

  }


  function getQgate(inputscantag) {
    var mt = " "
    var path = $.ajax({
      method: "get",
      url: "<?php echo base_url(); ?>Trace_Qgate/searchQgateByScan?inputscantag=" + inputscantag,

    })
    path.done(function(rs) {
      // alert(rs)

      if (rs == "undefined") {
        $("#detailqgate").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
        $("#imgdetailqgate").hide();
        $("#clickQgate").click(function() {
          // alert("wowowowo")
          Swal.fire(
            'ไม่มีข้อมูล',
            'No Data Found!',
            'error'
          )

        });

      } else {
        var data = JSON.parse(rs)
        $("#detailqgate").html("");
        $("#imgdetailqgate").show();

        // $("#qgate_user_name").html(data.byUserName);
        // $("#qgate_user_id").html(data.byUserId);
        // $("#qgate_part_no").html(data.partNo);
        // $("#qgate_scan_date").html(data.date);

        mt += "<h5 class='time_line-title'><label id='qgate_user_name'>" + data.byUserName + "</label></h5>"
        mt += "<div class='time_line-descr'>USER ID : <label id='qgate_user_id'>" + data.byUserId + "</label></div>"
        mt += "<div class='time_line-descr'>PART NO : <label id='qgate_part_no'>" + data.partNo + "</label></div>"
        mt += "<div class='time_line-descr'>SCAN DATE : <label id='qgate_scan_date'>" + data.date + "</label>"
        $("#detailqgate").html(mt)

        var idTagFa = data.idFa


        var pathqgate = $.ajax({
          method: "get",
          url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
          data: {
            "idTagFa": idTagFa
          }

        })
        pathqgate.done(function(qgate) {
          // alert(reqgate)
          var reqgate = JSON.parse(qgate)
          var str = "<br><img src='https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
            "<div class='time_line-descr'>USER NAME : <label>" + reqgate.empName + "</label></div>\n" +
            "<div class='time_line-descr'>PART NO : <label>" + reqgate.partNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>LINE NO : <label>" + reqgate.lineFA + "</label></div>\n" +
            "<div class='time_line-descr'>LOT  NO : <label>" + reqgate.lotNoProd + "</label></div>\n" +
            "<div class='time_line-descr'>BOX  NO : <label>" + reqgate.boxNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>QTY     : <label>" + reqgate.spnFA + "</label></div>\n" +
            "<div class='time_line-descr'>DATE : <label>" + reqgate.datecom + "</label></div>";



          $("#clickQgate").click(function() {
            Swal.fire({
              // '<pre>' + str + '</pre>'
              html: '<pre>' + str + '</pre>',
              showCloseButton: true,
              showConfirmButton: false,

            })

          });


        })




      }




    })
  }

  function getTransfer(inputscantag) {
    var mt = " "
    var path = $.ajax({
      method: "get",
      url: "<?php echo base_url(); ?>Trace_Qgate/searchQgateByScan?inputscantag=" + inputscantag,

    })
    path.done(function(rs) {
      // alert(rs)

      if (rs == "undefined") {
        $("#detailtransfer").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
        $("#imgdetailtransfer").hide();
        $("#clicktransfer").click(function() {
          // alert("wowowowo")
          Swal.fire(
            'ไม่มีข้อมูล',
            'No Data Found!',
            'error'
          )

        });

      } else {
        var data = JSON.parse(rs)
        // $("#transfer_user_name").html(data.byUserName);
        // $("#transfer_user_id").html(data.byUserId);
        // $("#transfer_part_no").html(data.partNo);
        // $("#transfer_scan_date").html(data.date);

        $("#detailtransfer").html("");
        $("#imgdetailtransfer").show();


        mt += "<h5 class='time_line-title'><label id='transfer_user_name'>" + data.byUserName + "</label></h5>"
        mt += "<div class='time_line-descr'>USER ID : <label id='transfer_user_id'>" + data.byUserId + "</label></div>"
        mt += "<div class='time_line-descr'>PART NO : <label id='transfer_part_no'>" + data.partNo + "</label></div>"
        mt += "<div class='time_line-descr'>SCAN DATE : <label id='transfer_scan_date'>" + data.date + "</label>"
        $("#detailtransfer").html(mt)

        var idTagFa = data.idFa

        var pathtran = $.ajax({
          method: "get",
          url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
          data: {
            "idTagFa": idTagFa
          }

        })
        pathtran.done(function(tranf) {
          // alert(was)
          // console.log(was);
          var resulttranf = JSON.parse(tranf)

          var str = "<br><img src='https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
            "<div class='time_line-descr'>USER NAME : <label>" + resulttranf.empName + "</label></div>\n" +
            "<div class='time_line-descr'>PART NO : <label>" + resulttranf.partNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>LINE NO : <label>" + resulttranf.lineFA + "</label></div>\n" +
            "<div class='time_line-descr'>LOT  NO : <label>" + resulttranf.lotNoProd + "</label></div>\n" +
            "<div class='time_line-descr'>BOX  NO : <label>" + resulttranf.boxNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>QTY     : <label>" + resulttranf.spnFA + "</label></div>\n" +
            "<div class='time_line-descr'>DATE : <label>" + resulttranf.datecom + "</label></div>";


          $("#clicktransfer").click(function() {
            Swal.fire({
              // '<pre>' + str + '</pre>'
              html: '<pre>' + str + '</pre>',
              showCloseButton: true,
              showConfirmButton: false,

            })

          });

        })



      }


    })
  }

  function getPicking(inputscantag) {
    var mt = " "
    var path = $.ajax({
      method: "get",
      url: "<?php echo base_url(); ?>Trace_Qgate/searchQgateByScan?inputscantag=" + inputscantag,

    })
    path.done(function(rs) {
      // alert(rs)

      if (rs == "undefined") {
        $("#detailpicking").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
        $("#imgdetailpicking").hide();
        $("#clickpick").click(function() {
          // alert("wowowowo")
          Swal.fire(
            'ไม่มีข้อมูล',
            'No Data Found!',
            'error'
          )

        });

      } else {
        var data = JSON.parse(rs)
        // $("#picking_user_name").html(data.byUserName);
        // $("#picking_user_id").html(data.byUserId);
        // $("#picking_part_no").html(data.partNo);
        // $("#picking_scan_date").html(data.date);
        $("#detailpicking").html("");
        $("#imgdetailpicking").show();


        mt += "<h5 class='time_line-title'><label id='picking_user_name'>" + data.byUserName + "</label></h5>"
        mt += "<div class='time_line-descr'>USER ID : <label id='picking_user_id'>" + data.byUserId + "</label></div>"
        mt += "<div class='time_line-descr'>PART NO : <label id='picking_part_no'>" + data.partNo + "</label></div>"
        mt += "<div class='time_line-descr'>SCAN DATE : <label id='picking_scan_date'>" + data.date + "</label>"
        $("#detailpicking").html(mt)

        var idTagFa = data.idFa

        var pathpick = $.ajax({
          method: "get",
          url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
          data: {
            "idTagFa": idTagFa
          }

        })
        pathpick.done(function(pic) {

          var resultpick = JSON.parse(pic)

          var str = "<br><img src='https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
            "<div class='time_line-descr'>USER NAME : <label>" + resultpick.empName + "</label></div>\n" +
            "<div class='time_line-descr'>PART NO : <label>" + resultpick.partNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>LINE NO : <label>" + resultpick.lineFA + "</label></div>\n" +
            "<div class='time_line-descr'>LOT  NO : <label>" + resultpick.lotNoProd + "</label></div>\n" +
            "<div class='time_line-descr'>BOX  NO : <label>" + resultpick.boxNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>QTY     : <label>" + resultpick.spnFA + "</label></div>\n" +
            "<div class='time_line-descr'>DATE : <label>" + resultpick.datecom + "</label></div>";

          $("#clickpick").click(function() {
            Swal.fire({
              // '<pre>' + str + '</pre>'
              html: '<pre>' + str + '</pre>',
              showCloseButton: true,
              showConfirmButton: false,

            })

          });


        })




      }


    })
  }

  function getShipping(inputscantag) {
    var mt = " "
    var path = $.ajax({
      method: "get",
      url: "<?php echo base_url(); ?>Trace_Qgate/searchQgateByScan?inputscantag=" + inputscantag,

    })
    path.done(function(rs) {
      // alert(rs)

      if (rs == "undefined") {
        $("#detailshipping").html("<img src='https://i.pinimg.com/originals/c9/22/68/c92268d92cf2dbf96e3195683d9e14fb.png' class='img-circle' style='width: 100%; text-center;' alt='Cinque Terre'>");
        $("#imgdetailshipping").hide();
        $("#clickship").click(function() {
          // alert("wowowowo")
          Swal.fire(
            'ไม่มีข้อมูล',
            'No Data Found!',
            'error'
          )

        });
      } else {
        var data = JSON.parse(rs)
        // $("#shipping_user_name").html(data.byUserName);
        // $("#shipping_user_id").html(data.byUserId);
        // $("#shipping_part_no").html(data.partNo);
        // $("#shipping_scan_date").html(data.date);

        $("#detailshipping").html("");
        $("#imgdetailshipping").show();


        mt += "<h5 class='time_line-title'><label id='shipping_user_name'>" + data.byUserName + "</label></h5>"
        mt += "<div class='time_line-descr'>USER ID : <label id='shipping_user_id'>" + data.byUserId + "</label></div>"
        mt += "<div class='time_line-descr'>PART NO : <label id='shipping_part_no'>" + data.partNo + "</label></div>"
        mt += "<div class='time_line-descr'>SCAN DATE : <label id='shipping_scan_date'>" + data.date + "</label>"
        $("#detailshipping").html(mt)

        var idTagFa = data.idFa


        var pathship = $.ajax({
          method: "get",
          url: "<?php echo base_url(); ?>Trace_Qgate/getWashing",
          data: {
            "idTagFa": idTagFa
          }

        })
        pathship.done(function(ship) {
          // alert(was)
          // console.log(was);
          var resultshipp = JSON.parse(ship)

          var str = "<br><img src='https://www.kindpng.com/picc/m/163-1636340_user-avatar-icon-avatar-transparent-user-icon-png.png' class='img-circle' style='width: 20%;' alt='Cinque Terre'/>\n\n<br>" +
            "<div class='time_line-descr'>USER NAME : <label>" + resultshipp.empName + "</label></div>\n" +
            "<div class='time_line-descr'>PART NO : <label>" + resultshipp.partNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>LINE NO : <label>" + resultshipp.lineFA + "</label></div>\n" +
            "<div class='time_line-descr'>LOT  NO : <label>" + resultshipp.lotNoProd + "</label></div>\n" +
            "<div class='time_line-descr'>BOX  NO : <label>" + resultshipp.boxNoFA + "</label></div>\n" +
            "<div class='time_line-descr'>QTY     : <label>" + resultshipp.spnFA + "</label></div>\n" +
            "<div class='time_line-descr'>DATE : <label>" + resultshipp.datecom + "</label></div>";


          $("#clickship").click(function() {
            Swal.fire({
              // '<pre>' + str + '</pre>'
              html: '<pre>' + str + '</pre>',
              showCloseButton: true,
              showConfirmButton: false,

            })

          });


        })

      }


    })
  }
</script>
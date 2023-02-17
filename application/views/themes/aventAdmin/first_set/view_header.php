  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow " id="navbar">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
      </button>


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </li>

          <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" id="searchDropdown">
                  <span style="font-size: 12px" class="m-r-sm text-muted welcome-message ng-binding">TBKK
                      (THAILAND) CO., LTD..</span>
              </a>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fullname; ?></span>
                  <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?php echo base_url() ?>Profile/profile">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                  </a>
                  <a class="dropdown-item" href="<?php echo base_url() ?>ResetPassword/RePassword">
                      <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                      Change Password
                  </a>
                  <!-- onclick="logLogout(<//?php echo $id;?>)"  -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" id="logout">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                  </a>
              </div>
              <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <div class="modal-body">Select "Logout" below if you are ready to end your current
                              session.</div>
                          <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <a class="btn btn-primary" id="btnlogout" onclick="logLogout(<?php echo $id; ?>)">Logout</a>
                              <!-- href="<//?php echo base_url(); ?>Login/Account" -->
                              <!-- onclick="logLogout(<?php echo $id; ?>)"y -->
                          </div>
                      </div>
                  </div>
              </div>
          </li>

      </ul>

  </nav>
  <!-- End of Topbar -->


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
  <script type="text/javascript">
      //   function preventBack() {
      //       window.history.forward();
      //   }
      //   setTimeout("preventBack()", 0);
      //   window.onunload = function() {
      //       null
      //       // window.location.href = "<?php echo base_url() ?>Login/Account"
      //   };

      //     $(document).ready(function() {
      //     window.history.pushState(null, "", window.location.href);
      //     // window.history.forward(null, "", window.location.href);
      //     window.onpopstate = function() {
      //         window.history.pushState(null, "", window.location.href);
      //     };

      // });

      function logLogout($id) {
        //   alert($id)
          console.log($id)
          var path = $.ajax({
              method: "get",
              dataType: "json",
              url: "<?php echo base_url(); ?>Login/logout?id=" + $id,
          })
          path.done(function(rs) {
            //   alert(rs)
            //   console.log(rs)
              window.location.href = "<?php echo base_url() ?>Login/Account";

          })

      }
  </script>
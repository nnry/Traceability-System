<!-- ******************************** MENU ****************************ddssd-->

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>Manage/Homepage">
            <div class="sidebar-brand-icon rotate-n">
                <img src="<?php echo base_url() ?>assets/img/Logo2.png" width="40" height="40">
            </div>
            <div class="sidebar-brand-text mx-3">Traceability</div>
        </a>
        
            <?php
            // echo $data_menu;

            $name = "";
            foreach ($menu as $key => $values) {
                if ($name != $values["sm_name"]) {
            ?>
                    <li class="nav-item active">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#<?php echo "list" . $key; ?>" aria-expanded="false" aria-controls="<?php echo "list" . $key; ?>">
                            <i class="<?php echo $values["sm_icon"] ?>"></i>
                            <span><?php echo $values["sm_name"]; ?></span>
                        </a>

                        <div class="collapse" id="<?php echo "list" . $key; ?>">
                            <?php foreach ($menu as $key1 => $values1) {
                                if ($values["sm_name"] == $values1["sm_name"]) {
                            ?>
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <a class="collapse-item" href="<?php echo base_url() . $values1["ss_method"] ?>"><?php echo $values1["ss_name"] ?></a>
                                    </div>

                            <?php
                            }
                        } ?>
                        </div>

                    </li>
            <?php
                }
                $name = $values["sm_name"];
            }
            ?>
       


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

    </ul>

    <!-- End of Sidebar -->

    <?php

    ?>
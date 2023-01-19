<!-- ******************************** MENU ****************************ddssd-->

<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>Manage/Homepage">   
            <div class="sidebar-brand-icon rotate-n">
                <img src="<?php echo base_url()?>assets/img/Logo2.png" width="40" height="40">
            </div>
            <div class="sidebar-brand-text mx-3">Traceability</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() ?>Manage/Homepage">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home Page</span></a>
            </li>

            <!-- Divider -->
             <hr class="sidebar-divider">
            <!-- Heading
            <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Administrator</span>    
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="">Management User</a>
                        <a class="collapse-item" href="">Management  Group <br> Permission</a>
                        <a class="collapse-item" href="">Management Add Menu</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Traceability"
                    aria-expanded="true" aria-controls="Traceability">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Traceability</span>    
                </a>
                <div id="Traceability" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" id ="manageUser">Management User</a>
                        <a class="collapse-item" href="">Management  Group <br> Permission</a>
                        <a class="collapse-item" href="">Management Add Munu</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Report</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="">Daily</a>
                        <a class="collapse-item" href="">Weekly</a>
                        <a class="collapse-item" href="">Monthly</a>

                    </div>
                </div>
            </li>

             <!-- Nav Item - Utilities Collapse Menu Test -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Testmenu"
                    aria-expanded="true" aria-controls="Testmenu">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Testmenu</span>
                </a>
                <div id="Testmenu" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Daily</a>
                        <a class="collapse-item" href="">Weekly</a>
                        <a class="collapse-item" href="">Monthly</a>

                    </div>
                </div>
            </li>

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
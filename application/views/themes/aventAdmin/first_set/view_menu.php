 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>Manage/Homepage">
         <div class="sidebar-brand-icon rotate-n">
             <img src="<?php echo base_url() ?>assets/img/Logo2.png" width="40" height="40">
         </div>
         <div class="sidebar-brand-text mx-3">Traceability</div>
     </a>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <?php
        $resMenu = $this->backoffice_model->ShowMenu(); // Edit
        // var_dump($resMenu);
        // exit;
        if ($this->router->fetch_method() == 'edit' || $this->router->fetch_method() == 'rule') {

            $set_method = 'manage';
        } else {

            $set_method = $this->router->fetch_method();
        }

        $submenu_active = $this->router->fetch_class() . '/' . $set_method;

        $mem = $this->router->fetch_class();

        //var_dump($resMenu); 
        $i = 0;
        foreach ($resMenu as $m) {
            //var_dump($m); exit;
            if ($m["sub_menu"][0]['method'] == $mem) {
                $str_active1 = 'class="nav-item active"';
                $str_active2 = 'class="nav-link"';
                $str_active3 = 'class="collapse show"';
            } else {
                $str_active1 = 'class="nav-item"';
                $str_active2 = 'class="nav-link collapsed"';
                $str_active3 = 'class="collapse"';
            }
            //echo $i;
            //var_dump($resMenu);
            //  exit;

            if ($i == 1) {
                $id = "collapsePages";
            } else if ($i == 2) {
                $id = "collapseTwo";
            } else if ($i == 3) {
                $id = "collapseUtilities";
            }
        ?>

         <!-- Nav Item - Pages Collapse Menu -->
         <!-- <li class="nav-item"> -->
         <?php if ($i == 0) { ?>
             <li class="nav-item active">

                 <a class="nav-link" href="<?php echo base_url() . "manage/Homepage"; ?>"> <!-- edit homepage -->
                     <i class="fas fa-home"></i>
                     <span>Dashboard</span></a> <!-- edit homepage -->
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

         <?php } else if ($i <> 0) { ?>
            
             <li class="nav-item active">
                 <a <?php echo $str_active2; ?> href="#" data-toggle="collapse" data-target="<?php echo '#' . $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                     <i class="<?php echo $m['icon_menu']; ?>"></i> <!-- edit parameter -->
                     <span><?php echo $m['g_name']; ?></span> <!-- edit parameter -->
                 </a>

                 <div id="<?php echo $id; ?>" <?php echo $str_active3; ?> aria-labelledby="headingPages" data-parent="#accordionSidebar">

                     <div class="bg-white py-2 collapse-inner rounded">
                         <?php
                            foreach ($m['sub_menu'] as $sm) {   //  <!-- edit parameter --> 
                                if ($sm['method'] == $submenu_active) {
                                    // echo $submenu_active;
                                    $str2 = 'class="collapse-item active"';
                                } else {
                                    //echo $submenu_active;
                                    $str2 = 'class="collapse-item"';
                                }
                            ?>

                             <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
                         <?php
                                //edit parameter
                                echo '<a ' . $str2 . ' href="' . base_url() . $sm['method'] . '" title="' . $sm['name'] . '">' . $sm['name'] . '</a>';
                            }
                            ?>
                     </div>
                 </div>
             </li>
     <?php
            }
            $i++;
             
        }
        ?>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
  
 </ul>
 <!-- End of Sidebar -->
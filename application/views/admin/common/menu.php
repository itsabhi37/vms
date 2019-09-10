<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <?php
            // Admin's Details Showing on Left Bar
            $admin_name = $this->session->userdata('admin_name');
            $admin_image = $this->session->userdata('admin_image');
        ?>
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo $admin_image;?>" width="40px" alt="Admin Image">
        <div>
            <p class="app-sidebar__user-name"><?php echo $admin_name; ?></p>
            <p class="app-sidebar__user-designation">Admin</p>
        </div>
    </div>
    <ul class="app-menu">
        
        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="admin"){echo 'active' ;} ?>" href="<?=base_url('admin/home')?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="registration"){echo 'active' ;} ?>" href="<?=base_url('registration')?>"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label"> Visitor Details</span></a></li>
        
        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="signup"){echo 'active' ;} ?>" href="<?=base_url('signup')?>"><i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label"> Admin Details</span></a></li>
        
         <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="booking"){echo 'active' ;} ?>" href="<?=base_url('booking')?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label"> Book PC</span></a></li>
        
        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="pcmaster"){echo 'active' ;} ?>" href="<?=base_url('pcmaster')?>"><i class="app-menu__icon fa fa-desktop"></i><span class="app-menu__label"> PC Master</span></a></li>

        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="reports"){echo 'active' ;} ?>" href="<?=base_url('reports')?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Reports</span></a></li>
        
        

    </ul>
</aside>
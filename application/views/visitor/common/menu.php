<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <?php
            // Visitor's Details Showing on Left Bar
            $visitor_name = $this->session->userdata('visitor_name');
            $visitor_image = $this->session->userdata('visitor_image');
        ?>
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo $visitor_image; ?>" width="40px" alt="User Image">
        <div>            
            <p class="app-sidebar__user-name"><?php echo $visitor_name; ?></p>
            <p class="app-sidebar__user-designation">Visitor</p>
        </div>
    </div>
    <ul class="app-menu">
        		
		<li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="visitor"){echo 'active' ;} ?>" href="<?=base_url('visitor/home')?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="bookpc"){echo 'active' ;} ?>" href="<?=base_url('bookpc')?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label"> Book PC</span></a></li>

        <li><a class="app-menu__item <?php $pg=$this->uri->segment(1); if($pg=="visitor_report"){echo 'active' ;} ?>" href="<?=base_url('visitor_report')?>"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Reports</span></a></li>
    </ul>
    
</aside>
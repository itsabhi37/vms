<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Visitor Management System">
    <title>Visitor Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <?=link_tag('assets/css/main.css')?>
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?=base_url()?>/assets/img/favicon.png" type="image/gif">
</head>


<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?=base_url('admin/home')?>">VMS</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                    <li><a onclick="getAdminProfileTop('<?php echo $this->session->userdata('user_name');?>');" href="#" data-href="#" style="outline:none;" class="dropdown-item" data-toggle="modal" data-target="#myModalViewTop" title="View Profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="<?=base_url('home/logout')?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <script>
        var base_url = '<?php echo base_url();?>';
    </script>
    <script>
        
    function getAdminProfileTop(val) {
        $.ajax({
            type: "POST",
            url: base_url+"signup/show_profile/" + val,
            beforeSend: function() {
                $("#showdataTop").html('<img src="/vms/assets/img/btn-ajax-loader.gif" />');
            },
            success: function(data) {
                $("#showdataTop").html(data);
            }
        });
    }
    </script>
    <!-- Profile Modals-->

    <div class="modal fade" id="myModalViewTop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabelTop"><b><font color='#F0677C'><i class="fa fa-user-secret"></i> Admin's Profile </font></b></h4>
                    <button type="button" style="outline:none;" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    
                </div>
                <div class="modal-body" id="showdataTop">
                    Profile Contents Load Here
                </div>
                <div class="modal-footer">
    
                    <a href="#" class="btn btn-primary" id="btnPrint" onclick=printDiv();><i class="fa fa-print"></i> Print</a>
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
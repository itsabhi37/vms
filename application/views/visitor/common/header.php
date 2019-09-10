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
    <header class="app-header"><a class="app-header__logo" href="<?=base_url('visitor/home')?>">VMS</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">

                    <li><a onclick="#" href="#" data-href="#" style="outline:none;" class="dropdown-item" data-toggle="modal" data-target="#settingModelView" title="Settings"><i class="fa fa-cog fa-lg"></i> Settings</a></li>

                    <li><a onclick="getVisitor('<?php echo $this->session->userdata('user_name');?>');" href="#" data-href="#" style="outline:none;" class="dropdown-item" data-toggle="modal" data-target="#myModalView" title="View Profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>

                    <li><a class="dropdown-item" href="<?=base_url('home/logout')?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>

                </ul>
            </li>
        </ul>
    </header>
<script>
        var base_url = '<?php echo base_url();?>';
    </script>
    
    <!-- Profile Modals-->

    <div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b><font color='#F0677C'><i class="fa fa-user"></i> Visitor's Profile </font></b></h4>
                    <button type="button" style="outline:none;" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <div class="modal-body" id="showdata">
                    Profile Contents Load Here
                </div>
                <div class="modal-footer">

                    <a href="#" class="btn btn-primary" id="btnPrint" onclick=printDiv();><i class="fa fa-print"></i> Print</a>
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Setting Modals-->

    <div class="modal fade" id="settingModelView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b><font color='#F0677C'><i class="fa fa-cog fa-lg"></i> Change Password </font></b></h4>
                    <button type="button" style="outline:none;" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <form method="post" action="">
                <div class="modal-body" id="senddata">

                        <label for="basic-url">Current Password</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-lock"></i></span>
                          </div>
                          <input type="password" class="form-control" name="txtCurrentPassword" id="txtCurrentPassword" required>
                        </div>
                        
                        <label for="basic-url">New Password</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-lock"></i></span>
                          </div>
                          <input type="password" class="form-control" name="txtNewPassword" id="txtNewPassword" required>
                        </div>

                        <label for="basic-url">Confirm New Password</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"><i class="fa fa-lock"></i></span>
                          </div>
                         <input type="password" class="form-control" name="txtConfirmPassword" id="txtConfirmPassword" required>
                        </div>
                </div>
                <!-- Invalid Login -->
                <?php if($error=$this->session->flashdata('error')):?>                
                    <div id="errordismiss">
                        <p class="text-danger"><i class="fa fa-warning"></i> &nbsp; <?php echo $error;?></p> 
                    </div>
                <?php endif; ?>

                <div class="modal-footer">
                    <button type="submit" id="ChangePassword" class="btn btn-primary"><i class="fa fa-key"></i> Change Password</button>
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                </div>
                 </form>
            </div>
        </div>
    </div>

    <script>
    function getVisitor(val) {
        $.ajax({
            type: "POST",
            url: base_url+"visitor/show_profile/" + val,
            beforeSend: function() {
                $("#showdata").html('<img src="/vms/assets/img/btn-ajax-loader.gif" />');
            },
            success: function(data) {
                $("#showdata").html(data);
            }
        });
    }
    </script>
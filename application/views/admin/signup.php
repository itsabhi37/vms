<?php include_once('common/header.php');?>

<?php include_once('common/menu.php');?>

<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-user-secret"></i> Admin Details</h1>
          <p>New Admin Sign Up & Existing Admin Details View Section...</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?=base_url('signup')?>">admin details</a></li>
        </ul>
      </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Admin Registration</h3>
                <div class="tile-body">
                    <?php 
                    if($this->uri->segment(3)){ 
                        echo form_open_multipart('signup/update_admin','class="form-horizontal style-form"');
                    } 
                    else{
                         echo form_open_multipart('signup/add_admin','class="form-horizontal style-form"');
                    }                    
                   ?>

                    <?php 
                                    if($this->uri->segment(3)){ 
                                        $uname=$adm->uname;   
                                        $name=$adm->name;   
                                        $designation=$adm->designation; 
                                        $department=$adm->department;                                         
                                        $email=$adm->email;                                        
                                        $mob=$adm->mobile; 
                                        $gender=$adm->gender;
                                    } 
                                    else{
                                        $name='';   
                                        $designation=''; 
                                        $department='';                                         
                                        $email='';                                         
                                        $mob=''; 
                                        $gender='';
                                    }
                            ?>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtName','class'=>'form-control','value'=>$name,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter full name']);
                                        /*echo form_input(['name'=>'txtUserName','class'=>'form-control','value'=>$uname,'hidden'=>'true','readonly'=>'true']);*/
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtName','class'=>'form-control','value'=>set_value('txtName'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter full name']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">User Name</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtUserName','class'=>'form-control','value'=>$uname,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter unique user name','readonly'=>'true']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtUserName','class'=>'form-control','value'=>set_value('txtUserName'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter unique user name']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Designation</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtDesignation','class'=>'form-control','value'=>$designation,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter your designation']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtDesignation','class'=>'form-control','value'=>set_value('txtDesignation'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter your designation']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Department</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtDepartment','class'=>'form-control','value'=>$department,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter department name']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtDepartment','class'=>'form-control','value'=>set_value('txtDepartment'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter department name']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtEmail','type'=>'email','class'=>'form-control','value'=>$email,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter email address']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtEmail','type'=>'email','class'=>'form-control','value'=>set_value('txtEmail'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter email address']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Mobile No.</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtMobile','class'=>'form-control','value'=>$mob,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter mobile number','maxlength'=>'10','onkeypress'=>"return IsNumeric(event,'error');",'onpaste'=>'return false;', 'ondrop'=>'return false;']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtMobile','class'=>'form-control','value'=>set_value('txtMobile'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter mobile number','maxlength'=>'10','onkeypress'=>"return IsNumeric(event,'error');",'onpaste'=>'return false;', 'ondrop'=>'return false;']);
                                    }
                                ?>
                                    <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <div class="animated-radio-button">

                                    <?php
                                    if($this->uri->segment(3)){ 
                                        if($gender=="Male"){
                                        echo'<label><input type="radio" name="radGender" value="Male" checked><span class="label-text">Male</span></label>

                                        <label><input type="radio" name="radGender" value="Female" ><span class="label-text">Female</span></label>';
                                        }else{
                                        echo'<label><input type="radio" name="radGender" value="Male" ><span class="label-text">Male</span></label>

                                        <label><input type="radio" name="radGender" value="Female" checked><span class="label-text">Female</span></label>';
                                        }
                                        
                                    }
                                    else
                                    {
                                        echo'<label><input type="radio" name="radGender" value="Male" checked><span class="label-text">Male</span></label>

                                        <label><input type="radio" name="radGender" value="Female" ><span class="label-text">Female</span></label>';
                                    }
                                ?>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="control-label col-md-3">Image</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){ 
                                        echo '<input class="form-control" name="adminimage" type="file" disabled>';
                                    }else{
                                        echo '<input class="form-control" name="adminimage" type="file" required>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?=base_url('signup')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <!-- Validation Error Section -->
                        <?php if(validation_errors()==TRUE):/*if($error=$this->session->flashdata('error')):*/?>
                        <div id="error">

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
                                <?php echo validation_errors();?>
                            </div>

                        </div>

                        <?php endif; ?>

                        <!-- Upload Error Section -->
                        <?php if(isset($upload_error)&&$upload_error!=""):/*if($error=$this->session->flashdata('error')):*/?>
                        <div id="error">

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
                                <?php echo $upload_error;?>
                            </div>

                        </div>

                        <?php endif; ?>

                        <!-- Success Section -->
                        <?php if($success=$this->session->flashdata('success')):?>
                        <div id="success">

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check"></i> &nbsp;
                                <?php echo $success;?>
                            </div>

                        </div>

                        <?php endif; ?>

                        <!-- Error Section -->
                        <?php if($error=$this->session->flashdata('error')):?>
                        <div id="error">

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
                                <?php echo $error;?>
                            </div>

                        </div>

                        <?php endif; ?>

                        <!-- Update Error Section -->
                        <?php if($upderror=$this->session->flashdata('upderror')):?>
                        <div id="upderror">

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
                                <?php echo $upderror;?>
                            </div>

                        </div>

                        <?php endif; ?>

                    </form>
                </div>

            </div>
        </div>
        <div class="clearix"></div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="btn-group pull-right" role="group">
                        <button class="btn btn-primary btn-sm dropdown-toggle" id="btnGroupDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-align-justify"></i>Export to</button>
                        <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" href="#" onclick="exportTableAs('exportopdf','xls');"><b><i class="fa fa-file-excel-o"></i></b>XLS</a>
                            <a class="dropdown-item" href="#" onclick="exportTableAs('exportopdf','pdf');"><b><i class="fa fa-file-pdf-o"></i></b>PDF</a>                           
                        </div>
                    </div>                    
                    <table class="table table-hover table-bordered exportopdf" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($admins)):?>
                            <?php $sln=0; foreach($admins as $adm):$sln=$sln+1; ?>
                            <tr>
                                <td>
                                    <?php echo $sln;?>
                                </td>
                                <td>
                                    <?php echo $adm->name;?>
                                </td>
                                <td>
                                    <?php echo $adm->uname;?>
                                </td>
                                <td>
                                    <?php echo $adm->designation;?>
                                </td>
                                <td>
                                    <?php echo $adm->department;?>
                                </td>
                                <td>
                                    <?php echo $adm->mobile;?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <?php
                                            if($this->uri->segment(3)){       
                                            echo '<a class="btn btn-primary btn-sm" disabled><i style="color:#fff;" class="fa fa-eye"></i></a>';
                                            }else{
                                                ?>
                                            <a onclick="getAdmin('<?php echo $adm->uname;?>');" href="#" data-href="#" style="outline:none;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalView" title="View Profile"><i style="color:#fff;" class="fa fa-eye"></i></a>
                                            <?php
                                            }
                                        ?>
                                                <a class="btn btn-primary btn-sm" href="<?=base_url('signup/edit_admin/'.$adm->uname)?>" title="Edit"><i style="color:#fff;" class="fa fa-edit"></i></a>
                                                <a data-href="<?=base_url('signup/delete_admin/'.$adm->uname)?>" class="btn btn-primary btn-sm deletModel" title="Delete"><i style="color:#fff;" class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Modals-->

    <div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b><font color='#F0677C'><i class="fa fa-user-secret"></i> Admin's Profile </font></b></h4>
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

    <!-- End Profile Modals-->
</main>
<?php include_once('common/footer.php');?>
<script type="text/javascript">
    $('#demoNotify').click(function() {
        $.notify({
            title: "Update Complete : ",
            message: "Something cool is just updated!",
            icon: 'fa fa-check'
        }, {
            type: "info"
        });
    });
    $('.deletModel').click(function() {
        var deldata = $(this).attr('data-href');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Admin has been deleted.", "success");
                window.location.href = deldata;
            } else {
                swal("Cancelled", "Deletion Cancelled.", "error");
            }
        });
    });

    function getAdmin(val) {
        $.ajax({
            type: "POST",
            url: "signup/show_profile/" + val,
            beforeSend: function() {
                $("#showdata").html('<img src="/vms/assets/img/btn-ajax-loader.gif" />');
            },
            success: function(data) {
                $("#showdata").html(data);
            }
        });
    }

    function exportTableAs(tableClass, exportType) {
        $("table." + tableClass).tableExport({
            type: exportType
        });
    }
</script>
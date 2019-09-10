<?php include_once('common/header.php');?>

<?php include_once('common/menu.php');?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-desktop"></i> PC Master</h1>
            <p>New PC or Laptop Entry & Existing Component Details View Section...</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url('pcmaster')?>">pc master</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Hardware Registration</h3>
                <div class="tile-body">
                    <?php 
                    if($this->uri->segment(3)){ 
                        echo form_open_multipart('pcmaster/update_pc','class="form-horizontal style-form"');
                    } 
                    else{
                         echo form_open_multipart('pcmaster/add_pc','class="form-horizontal style-form"','name="form1"');
                    }                    
                   ?>

                    <?php 
                                    if($this->uri->segment(3)){ 
                                        $name=$pcinfo->name; 
                                        $systemtype=$pcinfo->systemtype;
                                        $uname=$pcinfo->uname;   
                                        $password=$pcinfo->password;  
                                        $ip=$pcinfo->ip; 
                                        $networktype=$pcinfo->networktype;
                                    } 
                                    else{
                                        $name='';  
                                        $uname='';    
                                        $password='';  
                                        $ip='';                                           
                                    }
                            ?>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-md-3">PC Name</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtPCName','class'=>'form-control','value'=>$name,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter PC/Laptop name']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtPCName','class'=>'form-control','value'=>set_value('txtPCName'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter PC/Laptop name']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">System Type</label>
                            <div class="col-md-9">
                                <div class="animated-radio-button">
                                    <?php
                                    if($this->uri->segment(3)){ 
                                        if($systemtype=="Desktop"){
                                        echo'<label><input type="radio" name="radSystemType" value="Desktop" checked><span class="label-text">Desktop</span></label>

                                        <label><input type="radio" name="radSystemType" value="Laptop" ><span class="label-text">Laptop</span></label>';
                                        }else{
                                        echo'<label><input type="radio" name="radSystemType" value="Desktop" ><span class="label-text">Desktop</span></label>

                                        <label><input type="radio" name="radSystemType" value="Laptop" checked><span class="label-text">Laptop</span></label>';
                                        }
                                        
                                    }
                                    else
                                    {
                                        echo'<label><input type="radio" name="radSystemType" value="Desktop" checked><span class="label-text">Desktop</span></label>

                                        <label><input type="radio" name="radSystemType" value="Laptop" ><span class="label-text">Laptop</span></label>';
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtUserName','class'=>'form-control','value'=>$uname,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter system user name']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtUserName','class'=>'form-control','value'=>set_value('txtUserName'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter system user name']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtPassword','class'=>'form-control','value'=>$password,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter system password']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtPassword','class'=>'form-control','value'=>set_value('txtPassword'),'required'=>'true','autofocus'=>'true','placeholder'=>'Enter system password']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">IP Address</label>
                            <div class="col-md-8">
                                <?php
                                    if($this->uri->segment(3)){        
                                        echo form_input(['name'=>'txtIP','class'=>'form-control ip_address','value'=>$ip,'required'=>'true','autofocus'=>'true','placeholder'=>'000.000.000.000','readonly'=>'true']);
                                    }
                                    else
                                    {
                                        echo form_input(['name'=>'txtIP','class'=>'form-control ip_address','value'=>set_value('txtIP'),'required'=>'true','autofocus'=>'true','placeholder'=>'000.000.000.000']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Network Type</label>
                            <div class="col-md-9">
                                <div class="animated-radio-button">

                                    <?php
                                    if($this->uri->segment(3)){ 
                                        if($networktype=="Internet"){
                                        echo'<label><input type="radio" name="radNetworkType" value="Internet" checked><span class="label-text">Internet</span></label>

                                        <label><input type="radio" name="radNetworkType" value="Intranet" ><span class="label-text">Intranet</span></label>';
                                        }else{
                                        echo'<label><input type="radio" name="radNetworkType" value="Internet" ><span class="label-text">Internet</span></label>

                                        <label><input type="radio" name="radNetworkType" value="Intranet" checked><span class="label-text">Intranet</span></label>';
                                        }
                                        
                                    }
                                    else
                                    {
                                        echo'<label><input type="radio" name="radNetworkType" value="Internet" checked><span class="label-text">Internet</span></label>

                                        <label><input type="radio" name="radNetworkType" value="Intranet" ><span class="label-text">Intranet</span></label>';
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?=base_url('pcmaster')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
                                <th>System Type</th>
                                <th>User Name</th>
                                <th>Password</th>
                                <th>IP Address</th>
                                <th>Network Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($pcs)):?>
                            <?php $sln=0; foreach($pcs as $pc):$sln=$sln+1; ?>
                            <tr>
                                <td>
                                    <?php echo $sln;?>
                                </td>
                                <td>
                                    <?php echo $pc->name;?>
                                </td>
                                <td>
                                    <?php echo $pc->systemtype;?>
                                </td>
                                <td>
                                    <?php echo $pc->uname;?>
                                </td>
                                <td>
                                    <?php echo $pc->password;?>
                                </td>
                                <td>
                                    <?php echo $pc->ip;?>
                                </td>
                                <td>
                                    <?php echo $pc->networktype;?>
                                </td>
                                <td>
                                    <div class="btn-group">                                        
                                                <a class="btn btn-primary btn-sm" href="<?=base_url('pcmaster/edit_pc/'.$pc->ip)?>" title="Edit"><i style="color:#fff;" class="fa fa-edit"></i></a>
                                                <a data-href="<?=base_url('pcmaster/delete_pc/'.$pc->ip)?>" class="btn btn-primary btn-sm deletModel" title="Delete"><i style="color:#fff;" class="fa fa-trash-o"></i></a>
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

    /*function getVisitor(val) {
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
    }*/

    function exportTableAs(tableClass, exportType) {
        $("table." + tableClass).tableExport({
            type: exportType
        });
    }
</script>
<script type="text/javascript">
    var options = {
        onKeyPress: function(cep, event, currentField, options) {
            //console.log('An key was pressed!:', cep, ' event: ', event,'currentField: ', currentField, ' options: ', options);
            if (cep) {
                var ipArray = cep.split(".");
                var lastValue = ipArray[ipArray.length - 1];
                if (lastValue !== "" && parseInt(lastValue) > 255) {
                    ipArray[ipArray.length - 1] = '255';
                    var resultingValue = ipArray.join(".");
                    currentField.attr('value', resultingValue);
                }
            }
        }
    };

    $('.ip_address').mask("000.000.000.000", options);
</script>
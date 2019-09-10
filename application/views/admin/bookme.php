<?php include_once('common/header.php');?>
<?php include_once('common/menu.php');?>

<?=link_tag('assets/css/jquerysctipttop.css')?>
<?=link_tag('assets/css/mdtimepicker.css')?>
    <style>
        .error_form {
            font-size: 15px;
            font-family: Arial;
            color: #FF0052;
        }
		/*.error{
			display: none;
			margin-left: 10px;
		}
		.error_show{
			color: red;
			margin-left: 10px;
		}*/
	</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> PC or Laptop Booking</h1>
            <p>Booking Of PC or Laptop Section...</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url('booking')?>">book system</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">System Details</h3>
                <div class="tile-body">
                            <?php 
                                        $name=$sys->name; 
                                        $systemtype=$sys->systemtype;
                                        $uname=$sys->uname;   
                                        $password=$sys->password;  
                                        $ip=$sys->ip; 
                                        $networktype=$sys->networktype;                                    
                                ?>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-md-3">PC Name</label>
                            <div class="col-md-8">
                                <?php
                                    echo form_input(['name'=>'txtPCName','class'=>'form-control ','value'=>$name,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter PC/Laptop name','disabled'=>'true','style'=>'background-color:#fff;']);                                    
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">System Type</label>
                            <div class="col-md-9">
                                <div class="animated-radio-button">
                                    <?php 
                                        if($systemtype=="Desktop"){
                                        echo'<label><input type="radio" name="radSystemType" value="Desktop" checked ><span class="label-text">Desktop</span></label>

                                        <label><input type="radio" name="radSystemType" value="Laptop" disabled><span class="label-text">Laptop</span></label>';
                                        }else{
                                        echo'<label><input type="radio" name="radSystemType" value="Desktop" disabled><span class="label-text">Desktop</span></label>

                                        <label><input type="radio" name="radSystemType" value="Laptop" checked><span class="label-text">Laptop</span></label>';
                                        }   
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-8">
                                <?php                                            
                                        echo form_input(['name'=>'txtUserName','class'=>'form-control ','value'=>$uname,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter system user name','disabled'=>'true','style'=>'background-color:#fff;']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-8">
                                <?php
                                        echo form_input(['name'=>'txtPassword','class'=>'form-control ','value'=>$password,'required'=>'true','autofocus'=>'true','placeholder'=>'Enter system password','disabled'=>'true','style'=>'background-color:#fff;']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">IP Address</label>
                            <div class="col-md-8">
                                <?php
                                        echo form_input(['name'=>'txtIP','class'=>'form-control ip_address ','value'=>$ip,'required'=>'true','autofocus'=>'true','placeholder'=>'000.000.000.000','disabled'=>'true','style'=>'background-color:#fff;']); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Network Type</label>
                            <div class="col-md-9">
                                <div class="animated-radio-button">
                                    <?php
                                        if($networktype=="Internet"){
                                        echo'<label><input type="radio" name="radNetworkType" value="Internet" checked><span class="label-text">Internet</span></label>

                                        <label><input type="radio" name="radNetworkType" value="Intranet" disabled><span class="label-text">Intranet</span></label>';
                                        }else{
                                        echo'<label><input type="radio" name="radNetworkType" value="Internet" disabled><span class="label-text">Internet</span></label>

                                        <label><input type="radio" name="radNetworkType" value="Intranet" checked><span class="label-text">Intranet</span></label>';
                                        }
                                ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Visitor Details</h3>
                <div class="tile-body">
                    <?php              
                    echo form_open_multipart('booking/book_system','class="form-horizontal style-form" id="booking"');
                   ?>

                            <?php 
                                        $visitorname=''; 
                                        $designation='';
                                        $department='';   
                                        $email='';  
                                        $mobile='';  
                                        $gender='';
                                ?>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-6">
                                <?php
                                    echo form_input(['name'=>'txtVisitorName','class'=>'form-control','value'=>$visitorname,'required'=>'true','autofocus'=>'true','placeholder'=>'Cick on Find for getting Visitor Info','readonly'=>'true','id'=>'name','style'=>'background-color:#fff;']); 
                                
                                    echo form_input(['name'=>'txtUname','class'=>'form-control','required'=>'true','autofocus'=>'true','hidden'=>'true','readonly'=>'true','id'=>'Uname']);
                                    echo form_input(['name'=>'txtHiddenIP','value'=>$ip,'hidden'=>'true']);
                                ?>
                                <span class="error_form" id="visitorname_error_message"></span>
                            </div>
                            <div class="col-md-2">
                                <a onclick="getVisitor();" data-href="#" style="outline:none;" href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModalView" title="Find Visitor Details" ><i class="fa fa-search"></i>Find</a>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Designation</label>
                            <div class="col-md-8">
                                <?php
                                    echo form_input(['name'=>'txtDesignation','class'=>'form-control','value'=>$designation,'required'=>'true','autofocus'=>'true','disabled'=>'true','id'=>'Designation','style'=>'background-color:#fff;']); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Department</label>
                            <div class="col-md-8">
                                <?php                                            
                                        echo form_input(['name'=>'txtDepartment','class'=>'form-control','value'=>$department,'required'=>'true','autofocus'=>'true','disabled'=>'true','id'=>'Department','style'=>'background-color:#fff;']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <div class="animated-radio-button">
                                    <label><input disabled="disabled" id="genderMale" type="radio" name="radGender" value=""><span class="label-text">Male</span></label>

                                    <label><input disabled="disabled" id="genderFemale" type="radio" name="radGender" value=""><span class="label-text">Female</span></label> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <?php
                                        echo form_input(['name'=>'txtEmail','class'=>'form-control','value'=>$email,'required'=>'true','autofocus'=>'true','disabled'=>'true','id'=>'Email','style'=>'background-color:#fff;']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Mobile</label>
                            <div class="col-md-8">
                                <?php
                                        echo form_input(['name'=>'txtMob','class'=>'form-control','value'=>$mobile,'required'=>'true','autofocus'=>'true','disabled'=>'true','id'=>'Mobile','style'=>'background-color:#fff;']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-8">
                                <input type="text" name="txtDate" class="form-control" required="true" autofocus="true" placeholder="Select Date" id="demoDate" readonly="true" style="background-color:#fff;"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Start Time</label>
                            <div class="col-md-8">
                                <input type="text" id="starttime" name="txtStartTime" class="form-control timepicker" required="true" autofocus="true" style="background-color:#fff;"/>
                                <span class="error_form" id="starttime_error_message"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">End Time</label>
                            <div class="col-md-8">
                                <input type="text" id="endtime" name="txtEndTime" class="form-control timepicker" required="true" autofocus="true" style="background-color:#fff;"/>
                                <span class="error_form" id="endtime_error_message"></span>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit" id="btnSubmit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Book Now</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?=base_url('booking')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
    

    <!-- Profile Modals-->

    <div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><b><font color='#F0677C'><i class="fa fa-user-plus"></i> Visitor's Details </font></b></h4>
                    <button type="button" style="outline:none;" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="showdata">
                    
                </div>
                <div class="modal-footer">

                    <!--<a href="#" class="btn btn-primary" id="btnPrint" onclick=printDiv();><i class="fa fa-print"></i> Print</a>-->
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Profile Modals-->
</main>
<?php include_once('common/footer.php');?>
<script src="<?=base_url('assets/js/plugins/bootstrap-datepicker.min.js')?>"></script>

<!-- JavaScript Code -->
	
<script type="text/javascript">
$(document).ready(function() {

	$("#visitorname_error_message").hide();
	$("#starttime_error_message").hide();
	$("#endtime_error_message").hide();

	var error_visitorname = false;
	var error_starttime = false;
	var error_endtime = false;

	$("#name").focusout(function() {
		check_visitorname();		
	});

	$("#starttime").focusout(function() {
		check_starttime();		
	});

	$("#endtime").focusout(function() {
		check_endtime();		
	});
    
	function check_visitorname() {	
		var visitorname_length = $("#name").val().length;
		if(visitorname_length < 1) {
			$("#visitorname_error_message").html("You must select visitor first");
			$("#visitorname_error_message").show();
			error_visitorname = true;
		} else {
			$("#visitorname_error_message").hide();
		}
	}

	function check_starttime() {	
		var start_time = $("#starttime").val().length;	
		if(start_time < 1) {
			$("#starttime_error_message").html("Please choose Start time");
			$("#starttime_error_message").show();
			error_starttime = true;
		} else {
			$("#starttime_error_message").hide();
		}
	}

	function check_endtime() {	
		var end_time = $("#endtime").val().length;	
		if(end_time < 1) {
			$("#endtime_error_message").html("Please choose End time");
			$("#endtime_error_message").show();
			error_endtime = true;
		} else {
			$("#endtime_error_message").hide();
		}
	}
    
    $("#btnSubmit").click(function() {
        error_visitorname = false;
        error_starttime = false;
	    error_endtime = false;
        
		check_visitorname();
		check_starttime();        
		check_endtime();
		
		if(error_visitorname == false && error_starttime == false && error_endtime == false) {
            return true;
            
		} else {
			return false;	
		}
	});

});
</script>

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

    function getVisitor() {
        $.ajax({
            type: "POST",
            url: "/vms/booking/show_visitors/",
            beforeSend: function() {
                $("#showdata").html('<img src="/vms/assets/img/btn-ajax-loader.gif" />');
            },
            success: function(data) {
                $("#showdata").html(data);
            }
        });
    }

    //Get User Info And Fill Auto To The Form Fields
    $(document).on('click','.uname_cbx', function() {
        
        var uname = $(this).data('user-name');
        //Ajax starts here
        $.ajax({
            type:"POST",
            url:"/vms/booking/get_visitor_data/",
            cache:false,
            data:{uname:uname},
            success: function(r){
                $("#myModalView").modal('hide');
                $("#name").val(r.name);
                $("#Uname").val(r.uname);
                $("#Designation").val(r.designation);
                $("#Department").val(r.department);
                $("#Email").val(r.email);
                $("#Mobile").val(r.mobile);
                if (r.gender == 'Male') {
                    $("#genderMale").val('Male');
                    $("#genderMale").removeAttr('disabled');
                    $("#genderMale").attr('checked','checked');

                    $("#genderFemale").val('');
                    $("#genderFemale").removeAttr('checked');
                    $("#genderFemale").attr('disabled','disabled');
                }
                else if(r.gender == 'Female'){
                    $("#genderFemale").val('Female');
                    $("#genderFemale").removeAttr('disabled');
                    $("#genderFemale").attr('checked','checked');

                    $("#genderMale").val('');
                    $("#genderMale").removeAttr('checked');
                    $("#genderMale").attr('disabled','disabled');
                }
                // alert(r);
            }
        });
    });

    function exportTableAs(tableClass, exportType) {
        $("table." + tableClass).tableExport({
            type: exportType
        });
    }
    
    $('#demoDate').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
    
    $(document).ready(function() {
        $('#demoDate').datepicker().datepicker('setDate', 'today');
    });
    
    
</script>
<!--Time Ticker JS Start-->
<script src="<?=base_url('assets/js/mdtimepicker.js')?>"></script>
<script>
  $(document).ready(function(){
    $('.timepicker').mdtimepicker(); //Initializes the time picker
  });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--Time Ticker JS END-->

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
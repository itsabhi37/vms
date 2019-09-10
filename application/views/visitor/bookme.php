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
	</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> PC or Laptop Booking</h1>
            <p>Booking Of PC or Laptop Section...</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url('bookpc')?>">Book PC</a></li>
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
                    echo form_open_multipart('bookpc/book_system','class="form-horizontal style-form" id="booking"');
                   ?>
                            <?php 
                                        $vistrusername=$vis->uname; 
                                        $visitorname=$vis->name; 
                                        $designation=$vis->designation; 
                                        $department=$vis->department; 
                                        $email=$vis->email; 
                                        $mobile=$vis->mobile; 
                                        $gender=$vis->gender; 
                                ?>
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                                <?php
                                    echo form_input(['name'=>'txtVisitorName','class'=>'form-control','value'=>$visitorname,'required'=>'true','autofocus'=>'true','disabled'=>'true','id'=>'name','style'=>'background-color:#fff;']); 
                                
                                    echo form_input(['name'=>'txtUname','class'=>'form-control','required'=>'true','autofocus'=>'true','hidden'=>'true','readonly'=>'true','value'=>$vistrusername]);
                                    echo form_input(['name'=>'txtHiddenIP','value'=>$ip,'hidden'=>'true']);
                                ?>
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
                                    <?php 
                                        if($gender=="Male"){
                                        echo'<label><input type="radio" name="radGender" value="Male" checked ><span class="label-text">Male</span></label>

                                        <label><input type="radio" name="radGender" value="Female" disabled><span class="label-text">Female</span></label>';
                                        }else{
                                        echo'<label><input type="radio" name="radGender" value="Male" disabled><span class="label-text">Male</span></label>

                                        <label><input type="radio" name="radGender" value="Female" checked><span class="label-text">Female</span></label>';
                                        }   
                                ?>
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
                                    <a class="btn btn-secondary" href="<?=base_url('bookpc')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
    

</main>
<?php include_once('common/footer.php');?>
<script src="<?=base_url('assets/js/plugins/bootstrap-datepicker.min.js')?>"></script>

<!-- JavaScript Code -->
	
<script type="text/javascript">
$(document).ready(function() {

	$("#starttime_error_message").hide();
	$("#endtime_error_message").hide();

	var error_starttime = false;
	var error_endtime = false;

	$("#starttime").focusout(function() {
		check_starttime();		
	});

	$("#endtime").focusout(function() {
		check_endtime();		
	});
    
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
        error_starttime = false;
	    error_endtime = false;
        
		check_starttime();        
		check_endtime();
		
		if(error_starttime == false && error_endtime == false) {
            return true;
            
		} else {
			return false;	
		}
	});

});
</script>

<script type="text/javascript">
    
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
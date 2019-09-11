<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <?=link_tag('assets/css/main.css')?>
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="<?=base_url()?>/assets/img/favicon.png" type="image/gif">
        <title>Login - VMS</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Visitors Management System</h1>
        </div>
        <div class="login-box">
            <?php echo form_open('home/verify_login','class="login-form"');?>
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" name="txtuname" type="text" placeholder="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" name="txtpwd" type="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                  <input type="checkbox" name="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?> ><span class="label-text">Remember Me</span>
                </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                </div>
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
              <!-- Invalid Login -->
                <?php if($error=$this->session->flashdata('error')):?>                
                    <div id="errordismiss">
                        <p class="text-danger"><i class="fa fa-warning"></i> &nbsp; <?php echo $error;?></p> 
                    </div>
                <?php endif; ?>
            </div>
            </form>
            <?php echo form_open('home/ForgotPassword','class="forget-form"');?>
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">USER TYPE</label>
                    <select class="form-control" name="usertype" required>
                        <option value="">Please select User Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Visitor">Visitor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="Email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                </div>
            </form>

        </div>

    </section>


    <!-- Essential javascripts for application to work-->

    <script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/js/main.js')?>"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?=base_url('assets/js/plugins/pace.min.js')?>"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
    <script type="text/javascript"> 
      $(document).ready( function() {
        $('#errordismiss').delay(5000).fadeOut();
      });
    </script>
</body>

</html>
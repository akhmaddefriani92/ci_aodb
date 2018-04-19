<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>chger aodb</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>CHGER 3.0</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="POST" action="<?php echo site_url('auth/login');?>">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div id="infoMessage"><?php echo $message;?></div>
          <div class="form-group">
            <?php echo lang('login_identity_label', 'identity');?>
            <?php echo form_input($identity);?>
          </div>
          <div class="form-group">
            <?php echo lang('login_password_label', 'password');?>
            <?php echo form_input($password);?>
          </div>
          
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        
      </div>
    </section>
  </body>
  <!-- Essential javascripts for application to work-->
  <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/main.js');?>"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?php echo base_url('assets/js/plugins/pace.min.js');?>"></script>
</html>
<script type="text/javascript">
  // Login Page Flipbox control
  $('.login-content [data-toggle="flip"]').click(function() {
  	$('.login-box').toggleClass('flipped');
  	return false;
  });
</script>
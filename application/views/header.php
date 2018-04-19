<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 
    foreach($css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
      <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
       <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url();?>assets/js/plugins/pace.min.js"></script>
    <!-- <link href="<?php echo base_url('assets/jquery-ui-biru/jquery-ui.css')?>" rel="stylesheet"> -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script>


    <!-- <script src="<?php echo base_url();?>assets/jquery-ui-biru/jquery-ui.js"></script> -->

    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/select2.min.js"></script>
<!--     <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.min.js"></script> -->

    <title>BRS ADMIN</title>
  </head>
  <body class="app sidebar-mini sidenav-toggled">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">BRS</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>

        <a class="dropdown-item" href="<?php echo site_url('auth/logout');?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url();?>assets/img/admin.png" alt="User Image">
        <div>
          <!-- <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p> -->
        </div>
      </div>
      <ul class="app-menu">
        <!-- <?php
            // $this->load->view('sidemenu');                      
        ?> -->
      </ul>
    </aside>


<!DOCTYPE html>
<html lang="en">
<title>Chger</title>
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.jqueryui.min.css">
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
       <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/dataTables.jqueryui.min.js"></script>


    <!-- <script src="<?php echo base_url();?>assets/jquery-ui-biru/jquery-ui.js"></script> -->

     <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/bootstrap-datepicker.min.js"></script> 
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/select2.min.js"></script> -->


    <style type="text/css">
      /*table.dataTable tr.odd  { background-color: #E2E4FF; }
    table.dataTable tr.even { background-color: blue; }*/
    </style>
  </head>
  <body class="app sidebar-mini sidenav-toggled">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">Chger Mysql</a>
      <!-- Sidebar toggle button-->
      <a id="sidelah" class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>
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
      <!-- <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url();?>assets/img/admin.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div> -->
      <ul class="app-menu">
         <?php
            $this->load->view('v_sidemenu');                      
        ?>
      </ul>
    </aside>
    <main class="app-content">
      <div class="tile">
        <div class="row">    
          <div class="col-md-12">
            <div style='height:20px;'></div>  
            <?php echo $contents; ?>
          </div>
        </div>
      </div>      
    </main>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidelah').click(function(event) {
        // alert('test');
        event.preventDefault();
        $('.app').toggleClass('sidenav-toggled');
      });
    });  
  </script>
    
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!-- <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> -->
  </body>
</html>
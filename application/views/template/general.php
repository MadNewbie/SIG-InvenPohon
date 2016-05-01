<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistem Informasi Geografis Inventarisasi Pohon</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/css/images/logotrans.png">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.jgrowl.css" type="text/css"/>
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jgrowl.js"></script>
    <script type="text/javascript" src="http://openlayers.org/api/OpenLayers.js"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?v=3.21&key=AIzaSyBudCW2l_5UPV0-a58fCJ4GjWfPZeHbH0k"></script>
  </head>
  <body>
    <header role="banner" class="main-nav-outer navbar bs-doc-nav" id="navigation">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
            <span class="sr-only">Toggle navigation</span>
            <span style="background-color:red" class="icon-bar"></span>
            <span style="background-color:white" class="icon-bar"></span>
            <span style="background-color:red" class="icon-bar"></span>
          </button>
          <a href="<?php echo base_url(); ?>Home">
              <img src="<?php echo base_url();?>assets/css/images/logotrans.png" height="50px">
          </a>
        </div>
        <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href=# data-toggle="modal" data-target="#modal-login">Masuk</a></li>
            <!-- href="<?php echo base_url(); ?>auth/login" -->
          </ul>
        </nav>
      </div>
    </header>
    <div id="holder">
      <div class="container" id="isi">
        <?php echo "$contents"; ?>
      </div>
    </div>
  <script type="text/javascript">
        $(document).ready(function(e) {
            $('#navigation').scrollToFixed();
            $('.res-nav_click').click(function(){
                $('.main-nav').slideToggle();
                return false
            });
        });
        <?php if(!isempty($notif)):?>
          $.jGrowl("<?php echo $notif?>");
        <?php endif;?>
  </script>
  </body>
</html>

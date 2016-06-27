<!DOCTYPE html>
  <head>
<html>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jscharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/markerclusterer.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.21&key=AIzaSyBudCW2l_5UPV0-a58fCJ4GjWfPZeHbH0k"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-scrolltofixed.js"></script>
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
            <li><a href="<?php echo base_url(); ?>rekap">Rekap Data</a></li>
            <li><a href="<?php echo base_url();?>info_grafis">Info Grafis</a></li>
            <li><a href="<?php echo base_url(); ?>user">Kelola Akun</a></li>
            <li><a href="<?php echo base_url(); ?>jalan">Kelola Nama Jalan</a></li>
            <li><a href="<?php echo base_url(); ?>jenis_pohon">Kelola Jenis Pohon</a></li>
            <li><a href="<?php echo base_url();?>pantau_surveyor">Pantau Surveyor</a></li>
            <li><a href="<?php echo base_url();?>bantuan">Bantuan</a></li>
            <li role="presentation" class="dropdown">
              <a href="<?php echo base_url(); ?>" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>Admin/update_account/<?php echo $_SESSION['id_user'];?>">Ubah</a></li>
                <li><a href="<?php echo base_url(); ?>Auth/logout">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <div id="holder">
    </div>
    <div class="container" id="isi">
      <?php echo "$contents"; ?>
    </div>
    <div class="footer">
      <p class="text-center">Page rendered in <strong><?php echo $this->benchmark->elapsed_time('start','end');?></strong> seconds.  <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
    <script type="text/javascript">
      function editUser(id){
        var user;
        $.ajax({
          'type':'POST',
          'url':'<?php echo base_url() ?>user/retrieve/'+id,
          'success':function(data){
            user = JSON.parse(data);
            $("#modal-ubah-user .modal-body #id_user").val(user[0].id_user);
            $("#modal-ubah-user .modal-body #nama_lengkap").val(user[0].nama_lengkap);
            $("#modal-ubah-user .modal-body #username").val(user[0].username);
            $("#modal-ubah-user .modal-body #tanggal_lahir").val(user[0].tanggal_lahir);
            $("#modal-ubah-user .modal-body #tinggi").val(user[0].tinggi);
          }
        });
      }
      function editJenisPohon(id){
        var jenisPohon;
        $.ajax({
          'type':'POST',
          'url':'<?php echo base_url() ?>jenis_pohon/retrieve/'+id,
          'success':function(data){
            jenisPohon = JSON.parse(data);
            $("#modal-ubah-jenis .modal-body #id_jenis_pohon").val(jenisPohon[0].id_jenis_pohon);
            $("#modal-ubah-jenis .modal-body #nama_lokal").val(jenisPohon[0].nama_lokal);
            $("#modal-ubah-jenis .modal-body #nama_ilmiah").val(jenisPohon[0].nama_ilmiah);
          }
        });
      }
        function editNamaJalan(id){
          var jalan;
          $.ajax({
            'type':'POST',
            'url':'<?php echo base_url() ?>jalan/retrieve/'+id,
            'success':function(data){
              jalan = JSON.parse(data);
              $("#modal-ubah-jalan .modal-body #id_nama_jalan").val(jalan[0].id_nama_jalan);
              $("#modal-ubah-jalan .modal-body #nama_jalan").val(jalan[0].nama_jalan);
            }
          });
      }
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#navigation').scrollToFixed();
            $('.res-nav_click').click(function(){
                $('.main-nav').slideToggle();
                return false
            });
        });
    </script>
    <script type="text/javascript">
      <?php if($notif!=""):?>
      $.jGrowl("<?php echo $notif?>");
      <?php endif;?>
    </script>
  </body>
</html>

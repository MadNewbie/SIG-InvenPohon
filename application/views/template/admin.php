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
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jgrowl.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui.all.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/classie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
  </head>
  <body>
    <div id="holder">
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
              <li><a href=#>Rekap Data</a></li>
              <li><a href="<?php echo base_url(); ?>user">Kelola Akun</a></li>
              <li><a href="<?php echo base_url(); ?>jalan">Kelola Nama Jalan</a></li>
              <li><a href="<?php echo base_url(); ?>jenis_pohon">Kelola Jenis Pohon</a></li>
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
        <?php if($notif!=""):?>
          $.jGrowl("<?php echo $notif?>");
        <?php endif;?>
    </script>

      <script>
        wow = new WOW(
          {
            animateClass: 'animated',
            offset:       100
          }
        );
        wow.init();
        document.getElementById('').onclick = function() {
          var section = document.createElement('section');
          section.className = 'wow fadeInDown';
          this.parentNode.insertBefore(section, this);
        };
      </script>


    <script type="text/javascript">
    	$(window).load(function(){

    		$('.main-nav li a').bind('click',function(event){
    			var $anchor = $(this);

    			$('html, body').stop().animate({
    				scrollTop: $($anchor.attr('href')).offset().top - 102
    			}, 1500,'easeInOutExpo');
    			/*
    			if you don't want to use the easing effects:
    			$('html, body').stop().animate({
    				scrollTop: $($anchor.attr('href')).offset().top
    			}, 1000);
    			*/
    			event.preventDefault();
    		});
    	})
    </script>

    <script type="text/javascript">

    $(window).load(function(){


      var $container = $('.portfolioContainer'),
          $body = $('body'),
          colW = 375,
          columns = null;


      $container.isotope({
        // disable window resizing
        resizable: true,
        masonry: {
          columnWidth: colW
        }
      });

      $(window).smartresize(function(){
        // check if columns has changed
        var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
        if ( currentColumns !== columns ) {
          // set new column count
          columns = currentColumns;
          // apply width to container manually, then trigger relayout
          $container.width( columns * colW )
            .isotope('reLayout');
        }

      }).smartresize(); // trigger resize to set container width
      $('.portfolioFilter a').click(function(){
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).attr('data-filter');
            $container.isotope({

                filter: selector,
             });
             return false;
        });

    });

    $('#myCarousel').carousel({interval:5000});
    </script>
  </body>
</html>

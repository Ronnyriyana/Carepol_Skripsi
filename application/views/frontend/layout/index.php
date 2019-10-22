<!DOCTYPE html>
<html>
  <head>
    <title><?php echo isset ($title_page)?$title_page." | ":'' ?>Carepol</title>
    <meta name="keywords" content="" />
	  <meta name="description" content="" />
    <!-- 
    Smoothy Template 
    https://templatemo.com/tm-396-smoothy
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets_frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_frontend/css/templatemo_style.css" rel="stylesheet">
   	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/css/templatemo_misc.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/css/nivo-slider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_frontend/css/slimbox2.css" type="text/css" media="screen" /> 
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets_frontend/js/jquery.min.js"></script>
    <script type="text/JavaScript" src="<?php echo base_url(); ?>assets_frontend/js/slimbox2.js"></script> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_frontend/css/ddsmoothmenu.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_frontend/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets_frontend/js/ddsmoothmenu.js"></script>

<!--/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

-->


<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_flicker", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

  </head>
  <body>
    <header>
    <!-- start menu -->
    <?php echo $menu;?> 
    <div class="clear"></div>
    <!-- end menu -->
    <?php if(isset($active_menu_home)){ ?>
      	<div  id="slider"  class="nivoSlider templatemo_slider">
        	<a href="#"><img src="<?php echo base_url(); ?>assets_frontend/images/slider/apps fitur.jpg" alt="slide 1" /></a>           	
			<a href="#"><img src="<?php echo base_url(); ?>assets_frontend/images/slider/perangkat.jpg" alt="slide 2" /></a>  
            <a href="#"><img src="<?php echo base_url(); ?>assets_frontend/images/slider/web_profile.jpg" alt="slide 3" /></a>
			<a href="#"><img src="<?php echo base_url(); ?>assets_frontend/images/slider/fitur apps.jpg" alt="slide 4" /></a> 	
    	</div>
        <div class="templatemo_caption">
            <div class="templatemo_slidetitle">REPOLLUTION</div>
            <div class="clear"></div>
            <h1>CAREPOL - Air Pollution Monitoring</h1>
            <div class="clear"></div>
            <p>"Udara yang bersih membuat kota sehat, nyaman, maju !!!".</p>
        </div>
    <?php }?>
  </header>

    <div class="clear"></div>
    <!--content Start -->
    <?php echo $content;?> 
    <!--content End-->
    
    <!--Footer Start-->
    <div class="templatemo_footer">
    	<div class="container">
       	  <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12">
            	<h2>Carepol</h2>
                <p>CAREPOL adalah sebuah sistem yang dapat memonitoring tingkat polusi udara perkotaan. Sistem ini memetakan tingkat polusi udara ke dalam sebuah peta zonasi dalam suatu wilayah.</p>
          </div>
            <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12">
            	<h2>Services</h2>
                <ul>
                  <li><a href="<?php echo base_url('index.php/frontend'); ?>" class="link">Home</a></li>
                  <li><a href="<?php echo base_url('index.php/frontend/map'); ?>">Map</a></li>
                  <li><a href="<?php echo base_url('index.php/frontend/Grafik'); ?>">Grafik</a></li>
                  <li><a href="<?php echo base_url('index.php/frontend/About'); ?>">About</a></li>
                  <li><a href="<?php echo base_url('index.php/frontend/Dashboard'); ?>">Dashboard</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 templatemo_col12">
            	<h2>Carepol APP</h2>
					<div id="templatemo_flicker" >
          <ul class="nobullet footer_gallery">
                <li><a href="<?php echo base_url(); ?>assets_frontend/images/google-play.png" data-rel="lightbox[gallery]"><img src="<?php echo base_url(); ?>assets_frontend/images/google-play.png" alt="image 1" /></a></li>
           </ul>
            <br style="clear: left" />
        </div>
          </div>
        </div>
    </div>
   <!--Footer End-->
	<!-- Bottom Start -->
    <div class="templatemo_bottom">
    	<div class="container">
        	<div class="row">
            	<div class="left">
                	<span>Copyright © 2019 <a href="#">Carepol</a> </span>
              </div>
                <div class="right">
                	<a href="#"><div class="fa fa-rss soc"></div></a>
                    <a href="#"><div class="fa fa-twitter soc"></div></a>
                    <a href="#"><div class="fa fa-linkedin soc"></div></a>
                    <a href="#"><div class="fa fa-dribbble soc"></div></a>
                    <a href="#"><div class="fa fa-facebook soc"></div></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom End -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://code.jquery.com/jquery.js"></script> -->
    <script src="<?php echo base_url(); ?>assets_frontend/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_frontend/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets_frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_frontend/js/jquery.cycle2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_frontend/js/jquery.cycle2.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_frontend/js/jquery.nivo.slider.pack.js"></script>
    <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
    <script type="text/javascript">
      $(function(){
          var default_view = 'grid';
          if($.cookie('view') !== 'undefined'){
              $.cookie('view', default_view, { expires: 7, path: '/' });
          } 
          function get_grid(){
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox-list');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          function get_list(){
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox');
                  $('.prod-cnt').addClass('dbox-list');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          if($.cookie('view') == 'list'){ 
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0});
              $('.prod-cnt').removeClass('dbox');
              $('.prod-cnt').addClass('dbox-list');
              $('.prod-cnt').stop().animate({opacity:1}); 
          } 

          if($.cookie('view') == 'grid'){ 
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0});
                  $('.prod-cnt').removeClass('dboxlist');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
          }

          $('#list').click(function(){   
              $.cookie('view', 'list'); 
              get_list()
          });

          $('#grid').click(function(){ 
              $.cookie('view', 'grid'); 
              get_grid();
          });

          /* filter */
          $('.menuSwitch ul li').click(function(){
              var CategoryID = $(this).attr('category');
              $('.menuSwitch ul li').removeClass('cat-active');
              $(this).addClass('cat-active');
              
              $('.prod-cnt').each(function(){
                  if(($(this).hasClass(CategoryID)) == false){
                     $(this).css({'display':'none'});
                  };
              });
              $('.'+CategoryID).fadeIn(); 
              
          });
      });
    </script>
	<script src="<?php echo base_url(); ?>assets_frontend/js/jquery.singlePageNav.js"></script>
	
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>
</body>
</html>
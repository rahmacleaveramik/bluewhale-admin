<?
session_start();
include "koneksi.php";
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Ripository - Amiki</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="screen" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="screen" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="style/js/cufon.yui.js"></script>
<script type="text/javascript" src="style/js/quicksand.js"></script>
<script type="text/javascript" src="style/js/jquery.coda-slider-2.0.js"></script>
<script type="text/javascript" src="style/js/zoombox.js"></script>
<script type="text/javascript" src="style/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="style/js/looped.js"></script>
<script type="text/javascript" src="style/js/twitter.min.js"></script>
<script type="text/javascript" src="style/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
<script type="text/javascript" src="style/js/switchstylesheet.js"></script>
<script type="text/javascript" src="style/js/custom.js"></script>
<!-- alternate css for backgrounds -->
<link rel="alternate stylesheet" type="text/css" href="style/switcher/bg1.css" title="1-bg" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="style/switcher/bg2.css" title="2-bg" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="style/switcher/bg3.css" title="3-bg" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="style/switcher/bg4.css" title="4-bg" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="style/switcher/bg5.css" title="5-bg" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="style/switcher/bg6.css" title="6-bg" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body,td,th {
	color: #FFF;
	font-size: 9pt;
}
-->
</style></head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper"> 
  <!-- Begin Navigation -->
  <div id="header">
    <div class="logo">REPOSITORY TUGAS AKHIR AMIK IBRAHIMY</div>
    <div id="nav">
      <div id="coda-nav-1" class="coda-nav">
        <ul id="menu">
          <li class="about"><a href="#about" title="About Me">Home</a></li>
          <li class="portfolio"><a href="#contact" title="Portfolio">Login</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <!-- End Navigation --> 
  <!-- Begin Content -->
  <div id="paper"> 
    <!-- Begin Slider -->
    <div class="coda-slider-wrapper">
      <div class="coda-slider preload" id="coda-slider-1"> 
        <!-- Begin About -->
        <div class="panel">
          <div class="panel-wrapper">
            <div class="about-content">
              
                <? include "content.php";?>
              <div class="clear"></div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <!-- End About --> 
        
        <!-- Begin Contact -->
        <div class="panel">
          <div class="panel-wrapper">
            <div class="contact-content">
              <div class="contact-content-left"> 
                <!-- Begin Form -->
                <div class="form-container">
                  <div class="response"></div>
                  <form class="forms" action="ceklogin.php" method="post">
                    <fieldset>
                      <ol>
                        <li class="form-row text-input-row">
                          <label>Username*</label>
                          <input type="text" name="username" class="text-input required" />
                        </li>
                        <li class="form-row text-input-row">
                          <label>Password*</label>
                          <input type="password" name="password" class="text-input required email" />
                        </li>
                        <li class="button-row">
                          <input type="submit" value="Login" name="submit" class="btn-submit" />
                        </li>
                      </ol>
                      <input type="hidden" name="v_error" class="v-error" value="Required" />
                      <input type="hidden" name="v_email" class="v-email" value="Enter a valid email" />
                    </fieldset>
                  </form>
                </div>
                <!-- End Form --> 
              </div>
              <div class="contact-content-right">
                <p>Untuk mendownload file premium anda harus login terlebih dahulu.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- End Contact --> 
      </div>
    </div>
    <!-- End Slider --> 
  </div>
  <div class="clear"></div>
  <!-- End Content --> 
  <!-- Begin Footer -->
  <div id="footer">&copy; 2014 Amiki.ac.id<br />
    <ul class="bg-switcher">
		<li><a class="changebg" title="1-bg"><img src="style/images/gray.jpg" alt="" /></a></li>
		<li><a class="changebg" title="2-bg"><img src="style/images/tan.jpg" alt="" /></a></li>
		<li><a class="changebg" title="3-bg"><img src="style/images/blue.jpg" alt="" /></a></li>
		<li><a class="changebg" title="4-bg"><img src="style/images/green.jpg" alt="" /></a></li>
		<li><a class="changebg" title="5-bg"><img src="style/images/notepad.jpg" alt="" /></a></li>
		<li><a class="changebg" title="6-bg"><img src="style/images/stripe.jpg" alt="" /></a></li>
	</ul>
  </div>
  <!-- End Footer --> 
</div>
<!-- End Wrapper -->
</body>
</html>
<?php
session_start();
require "includes/config.php";
require "includes/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>&trade; Repository AMIK Ibrahimy &copy;</title>
	<meta name="keywords" content="Shoe Store, Free Template, baju.com" />
	<meta name="description" content="Shoe Store - Free Website Template provided by baju.com" />
	<link href="includes/default.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="includes/styles.css" />

	<script language="javascript" type="text/javascript">
	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
	</script>

	<script language="javascript" type="text/javascript" src="includes/mootools-1.2.1-core.js"></script>
	<script language="javascript" type="text/javascript" src="includes/mootools-1.2-more.js"></script>
	<script language="javascript" type="text/javascript" src="includes/slideitmoo-1.1.js"></script>
	<script language="javascript" type="text/javascript">
		window.addEvents({
			'domready': function(){
				/* thumbnails example , div containers */
				new SlideItMoo({
							overallContainer: 'SlideItMoo_outer',
							elementScrolled: 'SlideItMoo_inner',
							thumbsContainer: 'SlideItMoo_items',		
							itemsVisible: 6,
							elemsSlide: 2,
							duration: 160,
							itemsSelector: '.SlideItMoo_element',
							itemWidth: 140,
							showControls:1 });
			},
			
		});
	</script>
	
	<!-- Favicon -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<!-- End of Favicon -->
	
	<!-- JQuery dan AJAX-->
	<script type="text/javascript" src="includes/ajax.js"></script>
	<script type="text/javascript" src="includes/jquery-1.4.2.min.js"></script>
	<script language="javascript">jQuery.noConflict();</script>
	<!-- End of JQuery dan AJAX -->
	
	<!-- popup calendar -->
	<link rel="stylesheet" href="includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
	<script type="text/javascript" src="includes/popup-calendar/dhtmlgoodies_calendar.js"></script>
	<!-- End of popup calendar -->
	
	<!-- popup window -->
	<link rel="stylesheet" href="includes/popup-window/subModal.css" media="screen"></link>
	<script type="text/javascript" src="includes/popup-window/common.js"></script>
	<script type="text/javascript" src="includes/popup-window/subModal.js"></script>
	<!-- End of popup window -->
</head>
<?php
if(!isset($_SESSION['s_page'])) $page = "home.php";
else $page = $_SESSION['s_page'];
?>
<body onload="javascript: sendRequest('<?php echo $page; ?>', '', 'content', 'div', '');" onmousemove="javascript: var $j = jQuery.noConflict(); $j('#message').fadeOut(3000);">
	<div id="baju_menu_wrapper">
		<div id="baju_menu">
			<ul>
				<li><a >&nbsp;</a></li>
				<li><a style="cursor:pointer;" onclick="javascript: sendRequest('home.php', '', 'content', 'div', '');">Beranda TA</a></li>
				<li><a style="cursor:pointer;" onclick="javascript: sendRequest('tentang.php', '', 'content', 'div', '');">Tentang&nbsp;Kami</a></li>
				<li><a style="cursor:pointer;" onclick="javascript: sendRequest('kontak.php', '', 'content', 'div', '');">Kontak&nbsp;Kami</a></li>
			</ul>
		</div> <!-- end of baju_menu -->
	</div> <!-- end of baju_menu_wrapper -->    
	<div id="baju_header_wrapper">
		<div id="baju_header">	
			<div id="site_title">		
				<h1><a><img src="images/logo.png" alt="Site Title" /><span>REPOSITORY TUGAS AKHIR AMIK IBRAHIMY</span></a></h1>			
			</div> <!-- end of site_title -->
		</div> <!-- end of baju_header -->
	</div> <!-- end of baju_header_wrapper -->
	<div id="baju_slider_wrapper">
		<div id="baju_slider">	
			<div id="latest_product_slider">	
				<div id="SlideItMoo_outer">	
					<div id="SlideItMoo_inner">			
						<div id="SlideItMoo_items">
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/01.png" alt="product 1" /></a>
							</div>	
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/02.png" alt="product 2" /></a>
							</div>
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/03.png" alt="product 3" /></a>
							</div>
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/04.png" alt="product 4" /></a>
							</div>
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/05.png" alt="product 5" /></a>
							</div>
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/06.png" alt="product 6" /></a>
							</div>
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/07.png" alt="product 7" /></a>
							</div>
							<div class="SlideItMoo_element">
								<a style="cursor:pointer;">
								<img src="images/08.png" alt="product 8" /></a>
							</div>
						</div>			
					</div>
				</div>
			</div> <!-- end of latest_product_slider -->
		</div> <!-- end of baju_slider -->
	</div> <!-- end of baju_slider_wrapper -->
	<div id="baju_content_wrapper">
		<div id="baju_sidebar">		
			<div class="sidebar_section">
				<h2>&nbsp;Kategori</h2>
				<div class="sidebar_section_content">
					<?php include "users/menu_kategori.php"; ?>
				</div>
			</div>
			<div class="sidebar_section">
				<h2>&nbsp;Pencarian</h2>
				<div class="sidebar_section_content">	
					<form action="javascript: void(null);">
						<input type="text" value="Kata kunci..." name="txtcari" size="22" id="txtcari" title="Pencarian..." onfocus="clearText(this)" onblur="clearText(this)" style="color:grey;" />
						<input type="button" value="Cari" onclick="javascript: if(document.getElementById('txtcari').value != 'Kata kunci...') sendRequest('users/pencarian.php', 'keyword='+document.getElementById('txtcari').value, 'content', 'div', '');" />
					</form>
					<div class="cleaner"></div>
				</div>
			</div>
			<div class="sidebar_section">
				<h2>&nbsp;Calendar</h2>
				<div class="sidebar_section_content">	
					<?php include "includes/calendar.php"; ?>
				</div>
			</div>
		</div> <!-- end of baju_slider -->         
		<div id="baju_content">
			<div class="content_section">
				<h2>Selamat Datang</h2>
				<p>Di Repository Tugas Akhir Amik Ibahimy</p>
			</div>
			<!-- Isi content -->
			<div class="content_section" id="content">
			<?php include "content.php"; ?></div>
			<!-- Akhir isi content -->
		</div> <!-- end of baju_content -->
		<div class="cleaner"></div>
	</div> <!-- end of baju_content_wrapper -->
	<div id="baju_content_wrapper_bottom"></div>
	<div id="baju_footer">
		<ul class="footer_menu">
			<li><a style="cursor:pointer;" onclick="javascript: sendRequest('home.php', '', 'content', 'div', '');">Beranda TA</a></li>
			<li><a style="cursor:pointer;" onclick="javascript: sendRequest('tentang.php', '', 'content', 'div', '');">Tentang&nbsp;Kami</a></li>
			<li><a style="cursor:pointer;" onclick="javascript: sendRequest('kontak.php', '', 'content', 'div', '');">Kontak&nbsp;Kami</a></li>
		</ul>
		Copyright<?php echo date("Y"); ?> <a style="cursor:pointer;"></a> | Powered by <a href="mailto:sudaisaddairobi@gmail.com" ondblclick="javascript: window.open('http://sudaisaddairobi@gmail.com', '_blank');">Husnul Khotimah Ahmad</a>
	</div> <!-- end of footer -->
</body>
</html>
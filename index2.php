 
 <?php
	error_reporting(0);
//	session_start();
	include "konek.php";
//	include "login_dahulu.php";
	$hal 		= $_GET['hal'];
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Pengunjung</title>
	<link rel="shortcut icon" type="image/x-icon" href="gambar/kawasaki.awd">
	<link rel="stylesheet" type="text/css" href="settings/css/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="tanggal/jquery.min.js"></script>
	<script type="text/javascript" src="tanggal/jquery-ui.js"></script>
 
	<link rel="stylesheet" type="text/css" href="admin/index.css">
 
</head>
<body>
 		
		<div class="block-fixed">
		<div class="header no-print col-md-6">
			<div style="margin-right:10px">
			 <script src="jssor.slider.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 2000,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1090;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:1040;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1090px;height:350px;overflow:hidden;visibility:hidden;">

        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1090px;height:350px;overflow:hidden;">
            <div data-p="170.00">
                <img data-u="image" src="anggota/img/a.jpg" />
            </div>
            <div data-p="170.00">
                <img data-u="image" src="anggota/img/b.jpg" />
            </div>
			 <div data-p="170.00">
                <img data-u="image" src="anggota/img/c.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
			</div>
		</div>

	</div>
	<div style="border-bottom:1px solid #fff;padding:10px; background-color: #11BD28; color:white;"><marquee style="margin-top:10px;">Selamat Datang di Website Ivan Bakery Mayang Jambi</marquee></div> 
	<div class="menu no-print">
			<table class="menu">
				<tbody>
				<tr>
					<td class="nav-menu"><a href="index2.php?hal=barang2"><?php if($hal == "barang2"){ echo "@"; } ?>Barang</a></td>
					<td class="nav-menu"><a href="index2.php?hal=registrasi"><?php if($hal == "registrasi"){ echo "@"; } ?>Registrasi Anggota</a></td>
					<td class="nav-menu"><a href="anggota/login.php">Login</a></td>				
				</tr>
				</tbody>
			</table>
		</div>
	<div class="konten">
		<div class="isi">
			
			  <!-- utk ckeditor -->
		<script src="ckeditor/ckeditor.js"></script>
		  <!-- utk ckeditor -->


<!-- table -->	
<!-- <link rel="stylesheet" href="plugin_table/bootstrap.min.css"> -->
<script src="plugin_table/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="plugin_table/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="plugin_table/jquery.dataTables.css">
<script type="text/javascript" src="plugin_table/jquery.min.js"></script>
<script type="text/javascript" src="plugin_table/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
	   $('#example').DataTable();
	} );
</script>
<!-- table sampe sni -->	
<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Home</a>
	<div style="margin-left:870px">	
		<a href="#"><img src = "admin/gambar/fb.png" width="20px" height="20px"/></a>
		<a href="#"><img src = "admin/gambar/ig.png" width="20px" height="20px"/></a>
		<a href="#"><img src = "admin/gambar/gplus.png" width="20px" height="20px"/></a>
		<a href="#"><img src = "admin/gambar/twit.png" width="20px" height="20px"/></a>
	</div>	

		<?php  
		
		if($hal == "barang2"){
			include "barang2.php";
		}else if($hal == "registrasi"){
			include "registrasi.php";
		}else if($hal == "about"){
			include "about.php";	
		}else if($hal == "detail_barang"){
			include "detail_barang.php";		
		}else{
			include "barang2.php";
		}	
		
		?>	
			
		</div>
	</div>
	<script type="text/javascript" src="settings/js/slider.js"></script>
	<!-- setting footer -->
	<div style="text-align:center;background:#3E3C3C;padding:5px;color:#fff">&copy; 2017 - Ivan Bakery Mayang Jambi</div>
</body>
</html>
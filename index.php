<!DOCTYPE html> 
<!--
    Free  Template by Mohamed Sobhy
    https://www.facebook.com/Mido.HHH
-->
<html lang="en">
<head>
	<title>Ivan Bakery</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script src="js2/jquery.js"></script> 
	<script src="js2/jquery.glide.js"></script>
    
    <link rel="stylesheet" href="css2/style.css">
      <link rel="stylesheet" href="css2/animate.css">
    <script type="text/javascript" src="js2/MyJQ.js"></script>
    <script src="js2/jquery.localScroll.min.js" type="text/javascript"></script>
	<script src="js2/jquery.scrollTo.min.js" type="text/javascript"></script> 
    <script src="js2/wow.min.js" type="text/javascript"></script> 

<!-- scroll function -->
<script type="text/javascript">
$(document).ready(function() {
   $('#navigations').localScroll({duration:800});
});
</script>


<script src="js/wow.min.js"></script>
<script>
new WOW().init();
</script>


</head>
<body>

<!--============ Navigation ============-->

<div class="headerwrapper">
	<div id="header" class="container">
		<div class="logo"> <a href="#"><img src="images2/qw.jpg" alt="logo" width="95" height="74"></a></div> <!--end of Logo-->
        <nav>
            <ul id="navigations">
                <li><a href="index2.php?page=barang2">Mulai</a></li>
                <li><a href="index2.php?hal=registrasi">Registrasi Anggota</a></li>
                <li> <a href="anggota/">Login Anggota</a></li>
                <li><a href="admin/">Login Admin</a></li>
            </ul>
        </nav>
      </div> <!--end of header-->
</div> <!-- end of headerwrapper-->



<!--============ Slider ============-->


<div class="sliderwrapper">
      <div id="slider" class="container">
           <div class="slider">
      			<ul class="slides">
    		 	 	  <li class="slide">
                      	<h5 class="wow fadeInDown" data-wow-delay="0.8s">Donat</h5>
                      	<p class="wow fadeInUp" data-wow-delay="0.8s">Dibuat dari adonan tepung terigu, gula, telur dan mentega. Donat yang paling umum adalah donat berbentuk cincin dengan lubang di tengah dan donat berbentuk bundar dengan isi yang rasanya manis, seperti berbagai jenis selai, jelly, krim, dan custard.

Donat sama sekali berbeda dengan bagel, mulai dari bahan adonan, teknik pembuatan hingga cara menghidangkan, walaupun keduanya memiliki bentuk yang hampir sama.</p>
                      <img src="images2/donat.jpg" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slide1img"> 
                      </li>
      			 	  <li class="slide">
                      	<h5 class="wow fadeInDown" data-wow-delay="0.8s">Black Forest</h5>
                      	<p class="wow fadeInUp" data-wow-delay="0.8s">Black forest dibentuk menggunakan kue dasar rasa coklat, topping irisan coklat melengkung, krim dan yang terakhir dan yang khas dari black forest yaitu buah cherry membuat orang tetap menginginkan kue ini.</p>
                      <img src="images2/bf.jpg" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slideimg2"> 
                      </li>
     			 	  <li class="slide">
                      	<h5 class="wow fadeInDown" data-wow-delay="0.8s">Tar</h5>
                      	<p class="wow fadeInUp" data-wow-delay="0.8s"> Suatu makanan yang dipanggang, bahan dasarnya kue pastri dan diisi dengan sesuatu yang manis atau gurih, namun bagian atas makanan ini tidak ditutup atau dilapisi dengan pastri. Isi dari tart modern biasanya berbasis buah, terkadang dengan custard. Sedangkan tartlet adalah tart kecil.</p>
                      <img src="images2/tar.jpg" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slideimg2"> 
                      </li>
        		  </ul>
            </div>
      </div> <!-- End of Slider-->
</div> <!-- end of sliderwrapper-->



<!--============ Best Dishes ============-->


	

<script type="text/javascript">
    $('.sliderwrapper .slider').glide({
		autoplay: 7000,
		animationDuration: 3000,
		arrows: true,
		
		
	
		});
	
</script>
	
    <script type="text/javascript">
    $('.bestdisheswrapper .slider').glide({
		autoplay: false,
		animationDuration: 700,
		arrows: true,
		navigation:false,
		
		
	
		});
	
	
</script>
	
   
   

</body>

</html>
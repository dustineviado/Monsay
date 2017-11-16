		<!--start of grade school layer 1 -->

<div class="car container-fluid">
			<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="d-block img-fluid imgsize" src="images/school1.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid imgsize" src="images/school2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid imgsize" src="images/school3.jpg" alt="Third slide">
					</div>
				</div>
					<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
			</div>
		</div>	
		<!--end of grade school layer 1 -->

		<!--start of grade school layer 2 -->
				<h1 style="background-color:teal;font-style: 'helvetica'; color: white; font-size: 50px; margin-top: 0px;"> Grade School </h1>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							<h2 class="header1 text-center">Announcement<i class="fa fa-warning" style="padding: 20px; color:yellow;""></i></h2>
							<p class="gsp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique mi dui, nec venenatis magna suscipit ut. Nam lobortis lorem ut feugiat consectetur.</p>
					</div>	
					<div class="col-lg-3"></div>
				</div>
				<hr style="border: solid;">
		<!--end of grade school layer 2 -->


		<!--start of grade school photo gallery -->
	<div class="container-fluid">
		<div class="row">	
			<div class="col-lg-5">
			<h2 class="text-center" style="font-style: 'helvetica'; font-size: 40px;">Photo Gallery <i class="fa fa-camera" style="padding: 20px; color: blue;"></i></h2>
		
			<div class="front1">
   		 <img src="images/sample1.jpg" style="width: 100% ; height: 200px; padding: 10px;" onclick="openModal();currentSlide(1)" class="hover-shadow cursor"></div>
   		
   				<div class="front1">
   		 <img src="images/sample2.jpg" style="width: 100% ; height: 200px; padding: 10px;" onclick="openModal();currentSlide(2)" class="hover-shadow cursor"></div>
			

   				<div class="front1">
   		 <img src="images/sample3.jpg" style="width: 100% ; height: 200px; padding: 10px;" onclick="openModal();currentSlide(3)" class="hover-shadow cursor"></div>
   	

   				<div class="front1">
   		 <img src="images/sample4.jpg" style="width: 100% ; height: 200px; padding: 10px;" onclick="openModal();currentSlide(4)" class="hover-shadow cursor"></div>
   	   	

<div id="myModal" class="PGmodal modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="PGmodal-content modal-content">

    <div class="PGmySlides mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="images/sample1.jpg" style="width:100%; height: 500px;">
    </div>

    <div class="PGmySlides mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="images/sample2.jpg" style="width:100%; height: 500px;">
    </div>

    <div class="PGmySlides mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="images/sample3.jpg" style="width:100%; height: 500px;">
    </div>
    
    <div class="PGmySlides mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="images/sample4.jpg" style="width:100%; height: 500px;">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

     <div class="caption-container">
      <p id="caption"></p>
    </div>


    <center>
    <div class="front1">
      <img class="opa cursor" src="images/sample1.jpg" style="width:100%; height: 150px;" onclick="currentSlide(1)" alt="">
    </div>
    <div class="front1">
      <img class="opa cursor" src="images/sample2.jpg" style="width:100%; height: 150px;" onclick="currentSlide(2)" alt="">
    </div>
    <div class="front1">
      <img class="opa cursor" src="images/sample3.jpg" style="width:100%; height: 150px;" onclick="currentSlide(3)" alt="">
    </div>
    <div class="front1">
      <img class="opa cursor" src="images/sample4.jpg" style="width:100%; height: 150px;" onclick="currentSlide(4)" alt="">
    </div>
  </div>
 </center>
</div>

<script type="text/javascript">
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("opa");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

</div>
<!-- end of grade school photo gallery-->

<div class="col-lg-2"></div>

<!-- start of grade school video gallery -->
<div class="col-lg-5">
<h2 class="text-center" style="font-style: 'helvetica'; font-size: 40px;">Video Gallery <i class="fa fa-video-camera" style="padding: 20px; color: blue;"></i></h2>
			

<center>
<div class="vid1">
<div class="embed-responsive embed-responsive-21by9">
    <video autostart="false" controls="controls" poster="images/rmhslogo.jpg" style="cursor:pointer;"onclick="this.paused?this.play():this.pause();" 
    class="embed-responsive-item">
        <source src="images/hymn.mp4" type="video/mp4">
    </video>
</div>
</div>
</center>


<div class="front1">
<div class="embed-responsive embed-responsive-21by9">
    <video autostart="false" controls="controls"  style="cursor:pointer;"onclick="openFullscreen();" 
    class="embed-responsive-item">
        <source src="images/samplevid1.mp4" type="video/mp4">
    </video>
</div>
</div>


<div class="front1">
<div class="embed-responsive embed-responsive-21by9">
    <video autostart="false" controls="controls"  style="cursor:pointer;"onclick="this.paused?this.play():this.pause();" 
    class="embed-responsive-item">
        <source src="images/samplevid2.mp4" type="video/mp4">
    </video>
</div>
</div>

<div class="front1">
<div class="embed-responsive embed-responsive-21by9">
    <video autostart="false" controls="controls"  style="cursor:pointer;"onclick="this.paused?this.play():this.pause();" 
    class="embed-responsive-item">
        <source src="images/samplevid3.mp4" type="video/mp4">
    </video>
</div>
</div>
































</div>
</div>
</div>





				
<hr style="border: solid;">


<!-- start of grade school layer 4 -->

<div class="container-fluid" >
<div class="row">
	<div class="col-lg"></div>
<div class="col-lg-3 gsbord">
	<h3 class="header1 text-center">About us</h3>
	<p class="gsp"><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li> <li>Cras tristique mi dui, nec venenatis magna suscipit ut. Nam lobortis lorem ut feugiat consectetur.</li><li> Donec efficitur interdum laoreet. Fusce tincidunt vitae odio id semper.</li><li> Vestibulum quis elit ac purus interdum tincidunt id eget diam. Nunc interdum, dolor sed porta dapibus, est felis cursus massa, nec eleifend dolor augue pretium arcu.</li></p>
</div>
<div class="col-lg"></div>
<div class="col-lg-3 gsbord">
	<h3 class="header1 text-center">News and Events</h3>
	<p class="gsp"><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li> <li>Cras tristique mi dui, nec venenatis magna suscipit ut. Nam lobortis lorem ut feugiat consectetur.</li><li> Donec efficitur interdum laoreet. Fusce tincidunt vitae odio id semper.</li><li> Vestibulum quis elit ac purus interdum tincidunt id eget diam. Nunc interdum, dolor sed porta dapibus, est felis cursus massa, nec eleifend dolor augue pretium arcu.</li></p>
</div>
<div class="col-lg"></div>
<div class="col-lg-3 gsbord" >
	<h3 class="header1 text-center">Contact us</h3>
	<p class="gsp"><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li> <li>Cras tristique mi dui, nec venenatis magna suscipit ut. Nam lobortis lorem ut feugiat consectetur.</li><li> Donec efficitur interdum laoreet. Fusce tincidunt vitae odio id semper.</li><li> Vestibulum quis elit ac purus interdum tincidunt id eget diam. Nunc interdum, dolor sed porta dapibus, est felis cursus massa, nec eleifend dolor augue pretium arcu.</li></p>
</div>
<div class="col-lg"></div>
</div>
</div>
</div>

<!-- end of grade school layer 4 -->





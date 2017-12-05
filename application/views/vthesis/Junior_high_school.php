<!-- start of JHS layer 1 -->

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

<!-- end of JHS layer1 -->
<div class="container-fluid" style="background-color: brown;">

	<div class="row">
<h1 style="margin-left: 20px; font-family: 'helvetica'; color: white;">Junior High School</h1>
</div>
</div>



<div class="w3-container" style="margin-top: 30px;">
	


</div>

<div class="w3-content" style="max-width:1200px">
  <img class="mySlides" src="images/aa.jpg" style="width:100%; height: 300px;">
  <img class="mySlides" src="images/ss.jpg" style="width:100%; height: 300px;">
  <img class="mySlides" src="images/dd.jpg" style="width:100%; height: 300px;">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s4">
      <img class="JHSslide  w3-hover-sepia" src="images/aa.jpg" style="width:100%;height: 200px; cursor: pointer;" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s4">
      <img class="JHSslide  w3-hover-sepia" src="images/ss.jpg" style="width:100%;height: 200px; cursor: pointer;" onclick="currentDiv(2)">
    </div>
    <div class="w3-col s4">
      <img class="JHSslide  w3-hover-sepia" src="images/dd.jpg" style="width:100%;height: 200px; cursor: pointer;" onclick="currentDiv(3)">
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("JHSslide");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";

  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-sepia", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-sepia";

}
</script>


</div>







<div class="container-fluid">
	<div class="row">
	<div class="col-lg">


<center>
<p> Upcoming Events </p>
</center>






















	</div>
</div>


















<!-- star of JHS layer 2 -->


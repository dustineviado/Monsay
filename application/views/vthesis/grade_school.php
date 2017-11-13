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


		<!--start of grade school layer 3-->
				<h2 class="header1 text-center" style="margin-top: 40px; margin-bottom: 0px;">Photo Gallery<i class="fa fa-camera" style="padding: 20px; color: blue;"></i></h2><br>
				<div class="w3-container">
				<div class="w3-row gsgallery">
  <div class="w3-container w3-third">
    <img src="images/sample1.jpg" alt="Sample1" style="width:100%;height: 350px; cursor:pointer" 
    onclick="onClick(this)" class="w3-hover-opacity">
    <h5>Sample Picture 1</h5>
  </div>
  <div class="w3-container w3-third">
    <img src="images/sample2.jpg" alt="Sample2" style="width:100%; height: 350px;cursor:pointer" 
    onclick="onClick(this)" class="w3-hover-opacity">
    <h5>Sample Picture 2</h5>
  </div>
  <div class="w3-container w3-third">
    <img src="images/sample3.jpg" alt="Sample3" style="width:100%; height: 350px; ;cursor:pointer" 
    onclick="onClick(this)" class="w3-hover-opacity">
    <h5>Sample Picture 3</h5>
  </div>
</div>

<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <span class="w3-button w3-hover-red w3-xsmall w3-display-topright">&times;</span>
  <div class="w3-modal-content w3-animate-zoom">
    <img id="img01" style="width:100%">
  </div>
</div>

<script type="text/javascript">
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>
</div>
<hr style="border: solid;">

<!-- end of grade school layer 3 -->

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





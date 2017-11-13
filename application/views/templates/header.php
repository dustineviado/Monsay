<!DOCTYPE html>
<html>
<head>
	<!-- required tag for responsiveness -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="no-cache">

	<!-- jquery and popper JS CDN bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

	<!-- css bootstrap -->
		<link href=" //maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-reboot.min.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styledustine.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylejohn.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleralph.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleralphadmin.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/edit-delete.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/w3.css');?>">
	
	<!-- js bootstrap -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<title><?php echo $title?></title>
	<!--end of header-->
</head>
	
	<body>

	<!--start of navbar-->
		<br/>
		<div class="container-fluid"> 
			<div class="row">
				<div class="col-md-1">
				</div>
				
				<div class="col-md-5">
					<div>	
							<img id="rmhsimg" src="images/Rmhslogo.jpg">	
						<p> 
							<span id="rmhstitle">RAMON MAGSAYSAY&nbsp</span> <br>
							<span id="rmhstitle2">HIGH SCHOOL</span>
						</p>
					</div>	
				</div>
				
				<div class="col-md-5">
				</div>
				
				<div class="col-md-1">
				</div>
			
			</div>
		</div>
		
		<br/>
			
		<nav class="nav navbar navbar-expand-lg navbar-dark" style="background-color:#262626;">
			<div class="container-fluid">
				<button class="navbar-toggler navbar-toggler-right toggler1 " type="button" data-toggle="collapse" data-target="#misnavbar" aria-controls="misnavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
						<div class="collapse navbar-collapse" id="misnavbar">
							<ul class="nav navbar-nav nav-fill mr-auto ml-auto" id="asd2">
								<li class="nav-item dropdown">
									<a class="nav-link" id="asd3" id="dropdown1" aria-haspopup="true" aria-expanded="false" href="main_body_controller">Home</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="asd3" id="dropdown2" aria-haspopup="true" aria-expanded="false" >About Us</a>
										<div class="dropdown-menu dropdown-backdrop aria-labelledby="dropdown2">
											<a class="dropdown-item" id="dropbg" href="visionmission_controller">Vision and Mission</a>
											<a class="dropdown-item" id="dropbg" href="hymn_controller">RMHS Hymn</a>
											<a class="dropdown-item" id="dropbg" href="history_controller">History</a>
										</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="asd3" id="dropdown3" aria-haspopup="true" aria-expanded="false">Academics</a>
										<div class="dropdown-menu dropdown-backdrop aria-labelledby="dropdown3">
											<a class="dropdown-item" id="dropbg" href="grade_school_controller">Grade School</a>
											<a class="dropdown-item" id="dropbg" href="#">Junior High School</a>
											<a class="dropdown-item" id="dropbg" href="#">Senior High School</a>
										</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="asd3" id="dropdown4" aria-haspopup="true" aria-expanded="false">Announcements</a>
										<div class="dropdown-menu dropdown-backdrop aria-labelledby="dropdown4">
											<a class="dropdown-item" id="dropbg" href="news_controller">News</a>
											<a class="dropdown-item" id="dropbg" href="#">Events</a>
										</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="asd3" id="dropdown5" aria-haspopup="true" aria-expanded="false">Portals</a>
										<div class="dropdown-menu dropdown-backdrop aria-labelledby="dropdown5">
											<a class="dropdown-item" id="dropbg" href="login_page_controller">Students</a>
											<a class="dropdown-item" id="dropbg" href="login_page_controller">Parents</a>
											<a class="dropdown-item" id="dropbg" href="login_page_controller">Teachers</a>
										</div>
								</li>
							</ul>
						</div>
			</div>
		</nav>
	<!-- end of navbar -->			
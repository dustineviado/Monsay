<!DOCTYPE html>
<html>
<head>
	<!-- required tag for responsiveness -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="no-cache">
		
	<!-- jquery and popper JS CDN bootstrap -->
	<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.12.1/jquery-ui.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.12.1/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap4.min.js');?>"></script>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
	<!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>-->

	<!-- css bootstrap -->
		<link href=" //maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.css.map');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-reboot.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styledustine.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylejohn.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleralph.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ralphforms.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleralphadmin.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/edit-delete.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/w3.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/croppie.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/video-js.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap4.min.css');?>">
	
	<!-- js bootstrap -->
		<script src="<?php echo base_url('assets/js/croppie.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/croppie.js');?>"></script>	
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo base_url('assets/js/video-js.js');?>"></script>

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
							<a href="main_body_controller" style="color:black;"><img id="rmhsimg" src="images/hvea.jpg">	
						<p> 
							<span id="rmhstitle">Haven of Virtue And&nbsp;</span> <br>
							<b><span id="rmhstitle2">Excellence Academy Inc.</span></b>
						</p>
					</a>
					</div>	
				</div>
				
				<div class="col-md-2">
					
				</div>
				<div class="col-md-3">
					<a href = "login_controller " target="_" style="font-family: 'helvetica'; font-size: 18px; float: left; margin: 0 auto;"> Login&nbsp; </a> |<a href="news_controller" style="font-size: 18px; font-family: 'helvetica'; "> News </a> | <a href="main_body_controller" style="font-size: 18px; font-family:'helvetica';">Contact Us</a>

					
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
											<a class="dropdown-item" id="dropbg" href="hymn_controller">HVEA Hymn</a>
											<a class="dropdown-item" id="dropbg" href="history_controller">History</a>
										</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="asd3" id="dropdown3" aria-haspopup="true" aria-expanded="false">Academics</a>
										<div class="dropdown-menu dropdown-backdrop aria-labelledby="dropdown3">
											<a class="dropdown-item" id="dropbg" href="grade_school_controller">Grade School</a>
											<a class="dropdown-item" id="dropbg" href="junior_high_school_controller">Junior High School</a>
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
									
							


							</ul>
						</div>
			</div>
		</nav>

	<!-- end of navbar -->			
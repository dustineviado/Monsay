<!DOCTYPE html>
<html>
<head>
	<!-- required tag for responsiveness -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

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
	
	<!-- js bootstrap -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<title><?php echo $title?></title>

	
	<!--start of header-->
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
</head>
		<br/>
<body>
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-10 regbord">
				<br/>
				<table class="table table">
							  <thead>
							  	<th>REGISTER FORM</th>
							  	<th></th>
							  	<th></th>
							  </thead>
							  <tbody>
							    <tr>
							      <th colspan="1">Name</th>
							      <td colspan="2"><?php echo $this->session->userdata('name');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Email</th>
							      <td colspan="2"><?php echo $this->session->userdata('email');?></td>
							    </tr>
							   <tr>
							      <th colspan="1">Contact</th>
							      <td colspan="2"><?php echo $this->session->userdata('contact');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Date of Birth</th>
							      <td colspan="2"><?php echo $this->session->userdata('date');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Age</th>
							      <td colspan="2"><?php echo $this->session->userdata('age');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Sex</th>
							      <td colspan="2"><?php echo $this->session->userdata('sex');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Religion</th>
							      <td colspan="2"><?php echo $this->session->userdata('religion');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Address</th>
							      <td colspan="2"><?php echo $this->session->userdata('address');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Name of Mother</th>
							      <td colspan="2"><?php echo $this->session->userdata('mname');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Name of Father</th>
							      <td colspan="2"><?php echo $this->session->userdata('fname');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Name of Guardian</th>
							      <td colspan="2"><?php echo $this->session->userdata('gname');?></td>
							    </tr>
							    <tr>
							      <th colspan="1">Contact of Parent or Guardian</th>
							      <td colspan="2"><?php echo $this->session->userdata('pcontact');?></td>
							    </tr>
							  </tbody>
							</table>	
						<div class="divsubbtncontainer">
						<button type="submit" onclick="window.print()" class="prtbtn">Print</button>
						</div>
			</div>
			<div class="col-md-1">
				<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
			</div>
			
		</div>
		
	</div>
<br/>
</body>
</html>
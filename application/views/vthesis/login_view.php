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
<body style="background-image: url(images/back.jpg); background-repeat: no-repeat; background-size: 1400px; background-position: center;"">
	<div class="container-fluid" >
	<div class="row">
	<div class="col-lg-2">
	</div>

	<div class="col-lg-8 " style="margin-top: 100px;" >

	<form method="post" action="<?php echo base_url(); ?>login_controller/login_validation">
		<center>
	<img src="images/hvea.png" class="hveaimg">
	<br>
	</center>
	
	<select class="form-control" name="selectlogin" style="width: 300px; margin: 0 auto;">
		<option value="Admin">Admin</option>
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
      </select><br>


	<div class = "form-group" style="width: 300px; margin: 0 auto;"><i class="fa fa-user"></i>
		<label>Enter Id Number</label>
		<input type="text" name="id_number" class="form-control" required="">
		<span class="text-danger"><?php echo form_error('id_number'); ?></span>

	</div>
	<div class = "form-group" style="width: 300px; margin: 0 auto;"><i class="fa fa-lock"></i>
		<label>Enter Password</label>
		<input type="password" name="password" class="form-control" required="">
		<span class="text-danger"><?php echo form_error('password'); ?></span>
	</div>
	
	<div class="form-group" style="width: 200px; margin: 0 auto; padding: 20px;">
		<input type="submit" name="submit" value="Login" class="login1">
		<?php echo  '<label class="text-danger">' .$this->session->flashdata("error");?>
	</div>
</form>
</div>
<div class="col-lg-2" >
	</div>
</div>
</div>
</body>


























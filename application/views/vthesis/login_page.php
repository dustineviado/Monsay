</!DOCTYPE html>
<html>
<head>
	<title>Ramon Magsaysay High School</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- jquery and popper JS CDN bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

	<!-- css bootstrap -->
  		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.css');?>">
	<!-- js bootstrap -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<style >

.container{

	width: 500px;
	height: 450px;
	text-align: center;
	background-color: rgba(52,73,94,0.7);
	border-radius: 20px;
	margin: 0 auto;
	margin-top: 100px;
	margin-bottom: 50px;
	}
body{

margin: 0 auto;
background-repeat: no-repeat;
background-size: 100%, 720px;
height: 50px;


}
</style>

</head>
<body background="images/bg1.png">






<div class="container">
	<img src="images/png1.png">
	<form>

		<div class="form-input">
			
			<input type="text" name="username" placeholder="ENTER USERNAME">
		</div>


		<div class="form-input">
			
			<input type="password" name="password" placeholder="ENTER PASSWORD">
		</div>
		<input type="submit" name="submit" value="LOGIN" class="btn-login">
		<a href="#"><br>Forgot Password?</a>
	</form>
</div>




</body>
</html>
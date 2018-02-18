<?php  $username=$this->session->userdata('login_session');
if(! $username ){
redirect('login_controller/login_view');
}?>

<br>
<div class="container-fluid">
	<div class="row">

	<div class="col-lg-2">
		<style>
body {
    font-family: "helvetica", sans-serif;
}
.sidenav {
    height: 100%;
    width: 100%;
    border: solid;
    padding-top: 30px;
    margin: 0 auto;
}
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.5s;
}
.sidenav a:hover {
    color: #ff66ff;
}

#main {
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


<div id="sidebar" class="sidenav text-muted">
  
  <b><p class="text-center" style="font-family: 'helvetica';font-size: 30px; ">Welcome  </p></b>
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="studlog_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="#" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-star">&nbsp;&nbsp;Grades</a></i>
   <br>
  <br>
   <br>
  <br> <br>
  <br>
  <br>
  <br>
  <br>
    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  

  
</div>
	</div>
	<div class="col-lg-10">
		<h1 class="text-center"> Student Dashboard </h1>
	</div>










</div>



	</div>
<br>
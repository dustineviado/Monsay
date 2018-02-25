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
    background-color: white;
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
    background-color: gray;
    transition: .7s;

}
.shtycss{
  background-color: #ff66ff;
}

#main {
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.profile-pic {
    height: 150px;
    width: 150px;
    background-size: cover;
    background-position: center;
    background-blend-mode: multiply;
    transition: all .3s ease;

}

.profile-pic:hover {
    background-color: rgba(0,0,0,.5);
    z-index: 10000;
    color: #fff;
    transition: all .3s;
    text-decoration: none;
}
#upload_link{
    text-decoration:none;
}
#upload{
    display:none
}

</style>


<div id="sidebar" class="sidenav text-muted">
  
  <b><p class="text-center" style="font-family: 'helvetica';font-size: 30px; ">Welcome  </p></b>
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="studlog_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:   'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="viewgrades_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-star-o">&nbsp;&nbsp;Grades</a></i>
  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  

  
</div>
	</div>
	<div class="col-lg-10">

    		<h1 class="text-center"> Student Dashboard </h1>
        <hr class="hrline1"></hr>
        <center>
       <?php
date_default_timezone_set('Asia/Singapore');
echo date('M - d - Y');
?>
<script>
var d = new Date(<?php echo time() * 1000 ?>);
function digitalClock() {
  d.setTime(d.getTime() + 1000);
  var hrs = d.getHours();
  var mins = d.getMinutes();
  var secs = d.getSeconds();
  mins = (mins < 10 ? "0" : "") + mins;
  secs = (secs < 10 ? "0" : "") + secs;
  var apm = (hrs < 12) ? "am" : "pm";
  hrs = (hrs > 12) ? hrs - 12 : hrs;
  hrs = (hrs == 0) ? 12 : hrs;
  var ctime = hrs + ":" + mins + ":" + secs + " " + apm;
  document.getElementById("clock").firstChild.nodeValue = ctime;
}
window.onload = function() {
  digitalClock();
  setInterval('digitalClock()', 1000);
}
</script>
<div id="clock"> </div>
</center>
<br>
<br>
<h4><b><i>View My Report Cards</i></b></h4>
<a href="viewgrades_controller" class="text-success"><i class="fa fa-check"><u>&nbsp;My Grades</i></a></u>
<h4><b><i>You last signed in</i></b></h4>

<?php 

echo date('M-d-Y');



?>


</div>
	</div>
</div>
<br>
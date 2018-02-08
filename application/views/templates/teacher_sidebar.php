<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "helvetica", sans-serif;
    transition: background-color .5s;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
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
    color: yellow;
}
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#main {
    transition: margin-left .5s;
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav text-muted">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <b><p style="font-family: 'helvetica';font-size: 20px; margin-left: 60px;">Teacher  </p></b>
  <b><p style="font-family: 'helvetica'; font-size: 20px; margin-left: 50px;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="teacherlog_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-home">&nbsp;&nbsp;Home</a></i> 
  <a href="grading_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-check">&nbsp;&nbsp;Grading</a></i>

   <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  
</div>

<div id="main">

  <span style="font-size:20px;cursor:pointer; font-style: 'helvetica';"" onclick="openNav()">&#9776;&nbsp;&nbsp;Menu</span>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
     
</body>
</html> 
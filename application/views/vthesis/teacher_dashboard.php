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
.shtycss{
  background-color: #ff66ff;
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
  <a href="teacherlog_controller" class="<?=($menu=='active'?'shtycss':'')?>"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="grading_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-check">&nbsp;&nbsp;Grading</a></i></i>
<br>
<br>
<br>
<br>
<br>
<br>
    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  
  
  

  
</div>
	</div>

	<div class="col-lg-10">
		<h1 class="text-center"> Teacher Dashboard </h1>
     <hr class="hrline1"></hr>
        <center>
       <?php
date_default_timezone_set('Asia/Singapore');
echo date('M - d - Y');
?>
<script>
                        $.ajax({  
                              url:"<?php echo base_url() . 'teacherlog_controller/getschedule'; ?>",  
                              method:"POST",  
                              dataType:"json",  
                              success:function(data)  
                              {  
                                var sched_data= '';
                                var i;
                                for(i=0; i<data.length; i++){ 
                                  sched_data +='<tr class="d-flex">';
                                  sched_data +='<td class="col">'+data[i].day+'</td>';
                                  sched_data +='<td class="col">'+data[i].time+'</td>';
                                  sched_data +='<td class="col">'+data[i].subject+'</td>';
                                  sched_data +='<td class="col">'+data[i].section_name+'</td>';
                                  sched_data +='<td class="col">'+data[i].year_level+'</td>';
                                  sched_data +='<td class="col">'+data[i].room+'</td>';
                                  sched_data +='</tr>';
                                } 
                                $('#bodytable').html(sched_data);
                              }  
                         });

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

              <div class="container">
                <h1 class="studentfont">Schedule</h1>
                <div class="table-responsive">
                  <table id="viewtable" class="table table-striped table-bordered">
                    <thead class="thead-inverse">
                      <tr class="d-flex">
                        <th class="col">Day</th>
                        <th class="col">Time</th>
                        <th class="col">Subject</th>
                         <th class="col">Section</th>
                        <th class="col">Year Level</th>
                        <th class="col">Room</th>
                      </tr>
                    </thead>
                    <tbody id="bodytable">
                    </tbody>
                  </table>
                </div>  
              </div>


</div>



<br>
<?php  
if(! $_SESSION){
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
    color: black;
    display: block;
    transition: 0.5s;
}
.sidenav a:hover {
    color: black;
    background-color: #00ffaa;
    transition: .7;

}

#main {
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.shtycss{
  background-color: #ff9999;
}
</style>


<div id="sidebar" class="sidenav text-muted">
  
  <b><p class="text-center" style="font-family: 'helvetica';font-size: 30px; color: black; ">Welcome  </p></b>
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px; color: black;"><?php echo $fullname;?></p></b>
  <br>
  <br>
  <a href="studlog_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="viewgrades_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-star-o">&nbsp; &nbsp;Grades</a></i>


  <br>
  <br><br><br><br><br><br>

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
                          $.ajax({  
                              url:"<?php echo base_url() . 'studlog_controller/getschedule'; ?>",  
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
                                  sched_data +='<td class="col">'+data[i].lname+' '+data[i].fname+' '+data[i].mname+'</td>';
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
                        <th class="col">Teacher Name</th>
                        <th class="col">Room</th>
                      </tr>
                    </thead>
                    <tbody id="bodytable">
                    </tbody>
                  </table>
                </div>  
              </div>



</div>
	</div>
</div>
<br>
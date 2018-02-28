<?php  
if(! $_SESSION){
redirect('login_controller/login_view');
}?>


<br/>
<div class="container-fluid allfont">
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
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px; color: black;"><?php echo $this->session->userdata('id_number');?></p></b>
  <br>
  <br>
  <a href="admin_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
     <a href="schoolyear_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>
  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  
  
</div>
		</div>
		<div class="col-lg-10">
				<div class="container">
					<h1 class="studentfont">Schedules</h1>
					<script type="text/javascript">
							$(document).ready(function(){   
							      var dataTable = $('#scheduletable').DataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',  
							           "order":[],  
							           "ajax":{  
							                url:"<?php echo base_url() . 'schedules_controller/fetch_user'; ?>",  
							                type:"POST"  
							           },  
							           "columnDefs":[  
							                {  
							                     "targets":[1],  
							                     "orderable":false,  
							                },  
							           ],  
							      });

							      /*Start Add Schedule Subject*/
							      var sid;
							      $(document).on('click', '.addsched', function(){
							      	   sid = $(this).attr("id");  
							           $('#addschedform')[0].reset();
							           $("input[name*='scheduleid2']").val(sid);
							           $('.modal-title').text("Add Subject Schedule");  
							           $('#schedule3modal').modal('show'); 
							           $('.addedrows').remove();
						     	 });

							     $('.insertrow').click(function(event){
							      		event.preventDefault();
									        $('#addrowbody').append("<div class='row form-row addedrows'><div class='col-md'><label for='scheduleid2' class='col-form-label formmodalfont'></label><input name='scheduleid2' type='text' class='form-control scheduleid2' placeholder='Schedule ID' disabled value='$sid'></div><div class='col-md'><label for='scheduleday' class='col-form-label formmodalfont'></label><input name='scheduleday' type='text' class='form-control scheduleday' placeholder='Day'></div><div class='col-md'><label for='scheduletime' class='col-form-label formmodalfont'></label><input name='scheduletime' type='text' class='form-control scheduletime' placeholder='Time'></div><div class='col-md'><label for='schedulesubid' class='col-form-label formmodalfont'></label><input name='schedulesubid' type='text' class='form-control schedulesubid' placeholder='Subject ID'></div><div class='col-md'><label for='scheduleroom' class='col-form-label formmodalfont'></label><input name='scheduleroom' type='text' class='form-control scheduleroom' placeholder='Room'></div><div class='col-md'><label for='scheduleteacher' class='col-form-label formmodalfont'></label><input name='scheduleteacher' type='text' class='form-control scheduleteacher' placeholder='Teacher ID'></div><a href='#' class='remove_field'>X</a></div>"); 
									        $("input[name*='scheduleid2']").val(sid);
									    });
									    
									    $('#addrowbody').on("click",".remove_field", function(e){
									        e.preventDefault(); 
									        $(this).parent('div').remove();
									}); 

							      $(document).on('click', '#action2', function(event){  
							           event.preventDefault();    
							           var scheduleid = [];
							           var scheduleday = [];
							           var scheduletime = [];
							           var schedulesubid = [];
							           var scheduleroom = [];
							           var scheduleteacher = [];

							           $('.scheduleid2').each(function(){
							           		scheduleid.push($(this).val());
							           	});
							           $('.scheduleday').each(function(){
							           		scheduleday.push($(this).val());
							           	});
							           $('.scheduletime').each(function(){
							           		scheduletime.push($(this).val());
							           	});
							           $('.schedulesubid').each(function(){
							           		schedulesubid.push($(this).val());
							           	});
							            $('.scheduleroom').each(function(){
							           		scheduleroom.push($(this).val());
							           	});
							           $('.scheduleteacher').each(function(){
							           		scheduleteacher.push($(this).val());
							           	});
   											
							           if(scheduleid != '' && scheduleday != '' && scheduletime != '' && schedulesubid != '' && scheduleroom != '' && scheduleteacher != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'schedules_controller/addschedulesubjectaction'; ?>",  
							                     data:{
							                     	id:scheduleid,
							                     	day:scheduleday,
							                     	time:scheduletime,
							                     	subid:schedulesubid,
							                     	room:scheduleroom,
							                     	teachid:scheduleteacher
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#schedule3modal').modal('hide');  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                alert("All Fields are Required"); 
							           }  
							     	});
							      /*End Add Schedule Subject*/

								  /*Start of Edit Schedule JS*/
							      $(document).on('click','.edit', function(){  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'schedules_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 
							                	 $('.modal-title').text("Edit Schedule"); 
							                     $('#scheduleeditmodal').modal('show');  
							                     var edit_data= '';
							                	 var i;
							                	 for(i=0; i<data.length; i++){
							                	 	edit_data +="<div class='row form-group'>";	
							                		edit_data +="<div class='col-md'>";
							                		edit_data +="<label for='editscheid' class='col-form-label formmodalfont'>Schedule ID</label><input id='editscheid' name='editscheid' type='text' class='form-control editscheid' readonly='' value='"+ data[i].scheid +"'>";
							                		edit_data +="</div>";
							                		edit_data +="<div class='col-md'>";
							                		edit_data +="<label for='editday' class='col-form-label formmodalfont'>Day</label><input id='editday' name='editday' type='text' class='form-control editday' value='"+ data[i].day +"'>";
							                		edit_data +="</div>";
							                		edit_data +="<div class='col-md'>";
							                		edit_data +="<label for='edittime' class='col-form-label formmodalfont'>Time</label><input id='edittime' name='edittime' type='text' class='form-control edittime' value='"+ data[i].time +"'>";
							                		edit_data +="</div>";
							                		edit_data +="<input type='hidden' id='editsubid' name='editsubid' type='text' class='form-control editsubid' readonly='' value='"+ data[i].subid +"'>";
							                		edit_data +="<div class='col-md'>";
							                		edit_data +="<label for='editsubject' class='col-form-label formmodalfont'>Subject Name</label><input id='editsubject' name='editsubject' type='text' class='form-control editsubject' readonly='' value='"+ data[i].subject +"'>";
							                		edit_data +="</div>";
							                		edit_data +="<div class='col-md'>";
							                		edit_data +="<label for='editroom' class='col-form-label formmodalfont'>Room</label><input id='editteacher' name='editroom' type='text' class='form-control editroom' value='"+ data[i].room+"'>";
							                		edit_data +="</div>";
							                		edit_data +="<div class='col-md'>";
							                		edit_data +="<label for='editteacher' class='col-form-label formmodalfont'>Teacher ID</label><input id='editteacher' name='editteacher' type='text' class='form-control editteacher' value='"+ data[i].teacher_id +"'>";
							                		edit_data +="</div>";
							                		edit_data +="</div>";
							                	} 
							                	$('#editbody').html(edit_data);
							                }  
							           });  
							      });

							      $(document).on('click', '#action3', function(event){  
							           event.preventDefault();    
							           var editscheid = [];
							           var editday = [];
							           var edittime = [];
							           var editsubid = [];
							           var editroom = [];
							           var editteacher = [];

							           $('.editscheid').each(function(){
							           		editscheid.push($(this).val());
							           	});
							           $('.editday').each(function(){
							           		editday.push($(this).val());
							           	});
							           $('.edittime').each(function(){
							           		edittime.push($(this).val());
							           	});
							           $('.editsubid').each(function(){
							           		editsubid.push($(this).val());
							           	});
							           $('.editroom').each(function(){
							           		editroom.push($(this).val());
							           	});
							           $('.editteacher').each(function(){
							           		editteacher.push($(this).val());
							           	});
   											
							           if(editscheid != '' && editday != '' && edittime != '' && editsubid != '' && editroom != '' && editteacher != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'schedules_controller/editschedulesubject'; ?>",  
							                     data:{
							                     	id:editscheid,
							                     	day:editday,
							                     	time:edittime,
							                     	subid:editsubid,
							                     	room:editroom,
							                     	teachid:editteacher
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#scheduleeditmodal').modal('hide');  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                alert("All Fields are Required"); 
							           }  
							     	});  
							      /*End of Edit Schedule JS*/

							      /*Start View Schedule Javascript*/
								$(document).on('click','.view', function(){  
							           var sid = $(this).attr("id");
							           $('#viewtable tbody tr').remove();  
							           $.ajax({  
							                url:"<?php echo base_url() . 'schedules_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	$('.modal-title').text("View Schedule"); 
							                    $('#schedule2modal').modal('show');
							                	var sched_data= '';
							                	var i;
							                	for(i=0; i<data.length; i++){	
							                		sched_data +='<tr>';
							                		sched_data +='<td>'+data[i].scheid+'</td>';
							                		sched_data +='<td>'+data[i].day+'</td>';
							                		sched_data +='<td>'+data[i].time+'</td>';
							                		sched_data +='<td>'+data[i].subject+'</td>';
							                		sched_data +='<td>'+data[i].year_level+'</td>';
							                		sched_data +='<td>'+data[i].room+'</td>';
							                		sched_data +='<td>'+data[i].fname+' '+data[i].mname+' '+data[i].lname+'</td>';
							                		sched_data +='</tr>';
							                	} 
							                	$('#bodytable').html(sched_data);
							                }  
							           });  
							      });
								
							      $(document).on('click', '.delete', function(){  
							           var sid = $(this).attr("id");  
							           if(confirm("Are you sure you want to clear this schedule?"))  
							           {  
							                $.ajax({  
							                     url:"<?php echo base_url(); ?>schedules_controller/deleteschedule",  
							                     method:"POST",  
							                     data:{sid:sid},  
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#scheduletable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                return false;       
							           }  
							      });
							      /*End View Schedule Javascript*/        
							 });
						</script>
					<br>
					<div class="table-responsive">
						<table id="scheduletable" class="table table-striped">
							<thead class="thead-inverse">
								<tr>
									<th>Schedule ID</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>	
					<br>

				</div>

			<!--start of add Schedule ID -->
			<div class="container-fluid">
				<div class="modal fade" id="schedulemodal" tabindex="-1" role="dialog" aria-labelledby="scheduleaddmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="scheduleaddmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-row">
										<div class="col-md">
											<label for="scheduleid" class="col-form-label formmodalfont">Schedule ID</label>
											<input id="scheduleid" name="scheduleid" type="text" class="form-control" placeholder="Schedule ID">
										</div>
										<!--<div class="col-md">
											<label for="sectionid" class="col-form-label formmodalfont">schedule Name</label>
											<input id="sectionid" name="sectionid" type="text" class="form-control" placeholder="schedule Name">
										</div>-->
										<input type="hidden" name="schedulehid" id="schedulehid" value="">
										<input type="hidden" name="hiddenid" id="hiddenid">
									</div>
					  		</div>
							<div class="modal-footer">
								<input type="submit" name="action" id="action" class="btn addsubbtn2" value="Proceed">
							</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			<!--start of add Schedule ID -->

			<!--Start of View Schedule Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="schedule2modal" tabindex="-1" role="dialog" aria-labelledby="viewschedulemodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="viewschedulemodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
				      			<div class="table-responsive">
									<table id="viewtable" class="table table-striped">
										<thead class="thead-inverse">
											<tr>
												<th>Schedule Id</th>
												<th>Day</th>
												<th>Time</th>
												<th>Subject</th>
												<th>Year Level</th>
												<th>Room</th>
												<th>Teacher Name</th>
											</tr>
										</thead>
										<tbody id="bodytable">
										</tbody>
									</table>
								</div>	
					  		</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>

				</div>
			</div>
			<!--End of View Schedule Modal -->

			<!--Start of Schedule Add Modal-->
			<div class="container-fluid">
				<div class="modal fade" id="schedule3modal" tabindex="-1" role="dialog" aria-labelledby="scheduleaddmodal2" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addschedform">
				   		<div class="modal-content">
							<div class="modal-header">
								<div>
				        		<h1 class="modal-title" id="scheduleaddmodal2"><b></b></h1>
				        		<input type="button" name="addrow" id="addrow" class="btn insertrow" value="Add Row">
				        		</div>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body" id="addrowbody">
									<div class="row form-row">
										<div class="col-md">
											<label for="scheduleid2" class="col-form-label formmodalfont">Schedule ID</label>
											<input name="scheduleid2" type="text" class="form-control scheduleid2" placeholder="" readonly="">
										</div>
										<div class="col-md">
											<label for="scheduleday" class="col-form-label formmodalfont">Day</label>
											<input name="scheduleday" type="text" class="form-control scheduleday" placeholder="Day">
										</div>
										<div class="col-md">
											<label for="scheduletime" class="col-form-label formmodalfont">Time</label>
											<input name="scheduletime" type="text" class="form-control scheduletime" placeholder="Time">
										</div>
										<div class="col-md">
											<label for="schedulesubid" class="col-form-label formmodalfont">Subject ID</label>
											<input name="schedulesubid" type="text" class="form-control schedulesubid" placeholder="Subject ID">
										</div>
										<div class="col-md">
											<label for="scheduleroom" class="col-form-label formmodalfont">Room</label>
											<input name="scheduleroom" type="text" class="form-control scheduleroom" placeholder="Room">
										</div>
										<div class="col-md">
											<label for="scheduleteacher" class="col-form-label formmodalfont">Teacher ID</label>
											<input name="scheduleteacher" type="text" class="form-control scheduleteacher" placeholder="Teacher ID">
										</div>
										<p>&nbsp&nbsp</p>
									</div>
					  		</div>
					  		<br>
							<div class="modal-footer">
								<input type="submit" name="action2" id="action2" class="btn addsubbtn2" value="Proceed">
							</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			<!--End of Schedule Add Modal-->

			<!--Start of Edit Schedule Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="scheduleeditmodal" tabindex="-1" role="dialog" aria-labelledby="editschedulemodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="editschedulemodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body"  id="editbody">
				      			<div class="row form-group">
								</div>	
					  		</div>
							<div class="modal-footer">
								<input type="submit" name="action3" id="action3" class="btn addsubbtn2" value="Proceed">
							</div>
						</div>
					</div>

				</div>
			</div>	
			<!--End of Edit Schedule Modal -->

		</div>
	</div>
</div>
<br/>
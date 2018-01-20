<br/>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-lg">
		</div>
		<div class="col-lg-10">
				<div class="container">
					<h1 class="studentfont">Schedules</h1>
					<script type="text/javascript">
							$(document).ready(function(){
								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();  
							           $('.modal-title').text("Add Schedule ID");  
							           $('#schedulehid').val("Add");   
							      });    
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
							      $(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var scheduleid = $('#scheduleid').val();
							           var schedhid = $('#schedulehid').val();
							           var hiddenid = $('#hiddenid').val();      
							           
							           if(scheduleid != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'schedules_controller/scheduleaction'; ?>",  
							                     data:{
							                     	schedid:scheduleid,
							                     	hidden:schedhid,
							                     	hiddenid:hiddenid
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#schedulemodal').modal('hide');  
							                          $('#scheduletable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                alert("All Fields are Required"); 
							           }  
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
									        $('#addrowbody').append("<div class='row form-row addedrows'><div class='col-md'><label for='scheduleid2' class='col-form-label formmodalfont'></label><input name='scheduleid2' type='text' class='form-control scheduleid2' placeholder='Schedule ID' disabled value='$sid'></div><div class='col-md'><label for='scheduleday' class='col-form-label formmodalfont'></label><input name='scheduleday' type='text' class='form-control scheduleday' placeholder='Day'></div><div class='col-md'><label for='scheduletime' class='col-form-label formmodalfont'></label><input name='scheduletime' type='text' class='form-control scheduletime' placeholder='Time'></div><div class='col-md'><label for='schedulesubid' class='col-form-label formmodalfont'></label><input name='schedulesubid' type='text' class='form-control schedulesubid' placeholder='Subject ID'></div><a href='#' class='remove_field'>X</a></div>"); 
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
   											
							           if(scheduleid != '' && scheduleday != '' && scheduletime != '' && schedulesubid != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'schedules_controller/addschedulesubjectaction'; ?>",  
							                     data:{
							                     	id:scheduleid,
							                     	day:scheduleday,
							                     	time:scheduletime,
							                     	subid:schedulesubid
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

										/*var original = $("#addrowbody").html();
									    $(".insertrow").click(function(){
										    $("#thisthis").clone().appendTo("#addrowbody");

										    

										    $('#schedule3modal').on('hidden.bs.modal', function () {
											    $("#addrowbody").html(original);
											})

										    $('#addrowbody').on("click",".remove_field", function(e){
									        	e.preventDefault(); 
									        	$(this).parent('div').remove();
									        });
										});*/
										
										/*Start Add Schedule Subject*/

							      /*$(document).on('click','.edit', function(){  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'schedule_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('#addform')[0].reset();
							                	 $('.modal-title').text("Edit schedule"); 
							                     $('#schedulemodal').modal('show');  
							                     $('#scheduleidname').val(data.scheduleidname);
							                     $('#schedulename').val(data.schedulename);
							                     $('#scheduleemail').val(data.scheduleemail);
											     $('#schedulebirthday').val(data.schedulebirthday);
												 $('#scheduleage').val(data.scheduleage);
												 $('#schedulecontact').val(data.schedulecontact);
												 $('#schedulegender').val(data.schedulegender);
												 $('#schedulereligion').val(data.schedulereligion);
												 $('#scheduleaddress').val(data.scheduleaddress);
												 $('#scheduleparentguard').val(data.scheduleparentguard);
												 $('#schedulepgcontact').val(data.schedulepgcontact);
												 $('#scheduleyear').val(data.scheduleyear);
												 $('#schedulesection').val(data.schedulesection);
												 $('#schedulestatus').val(data.schedulestatus);
							                     $('#schedulehid').val("Edit");
							                     $('#hiddenid').val(sid); 
							                }  
							           });  
							      });*/  

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
							                		sched_data +='</tr>';
							                	} 
							                	$('#bodytable').html(sched_data);
							                }  
							           });  
							      });
							      $(document).on('click', '.delete', function(){  
							           var sid = $(this).attr("id");  
							           if(confirm("Are you sure you want to delete this?"))  
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
					<div>
						<button id="addmodalbtn" class="btn addschebtn" data-toggle="modal" data-target="#schedulemodal">Add Schedule ID</button>
					</div>
					<br>

					<table id="scheduletable" class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>Schedule ID</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
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
								<table id="viewtable" class="table table-responsive table-striped">
									<thead class="thead-inverse">
										<tr>
											<th>Schedule Id</th>
											<th>Day</th>
											<th>Time</th>
											<th>Subject</th>
											<th>Year Level</th>
										</tr>
									</thead>
									<tbody id="bodytable">
									</tbody>
								</table>	
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
											<input name="scheduleid2" type="text" class="form-control scheduleid2" placeholder="" disabled="">
										</div>
										<div class="col-md">
											<label for="scheduleday" class="col-form-label formmodalfont">Day</label>
											<input name="scheduleday" type="text" class="form-control scheduleday" placeholder="">
										</div>
										<div class="col-md">
											<label for="scheduletime" class="col-form-label formmodalfont">Time</label>
											<input name="scheduletime" type="text" class="form-control scheduletime" placeholder="">
										</div>
										<div class="col-md">
											<label for="schedulesubid" class="col-form-label formmodalfont">Subject ID</label>
											<input name="schedulesubid" type="text" class="form-control schedulesubid" placeholder="">
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

		</div>
		<div class="col-lg">
		</div>
	</div>
</div>
<br/>
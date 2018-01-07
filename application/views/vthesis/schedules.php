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
							           $('.modal-title').text("Add Schedule");  
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

							      $(document).on('click', '.addsched', function(event){  
							           event.preventDefault();    
							           $('#schedule3modal').modal('show');

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
				<div class="modal fade" id="schedule3modal" tabindex="-1" role="dialog" aria-labelledby="scheduleaddmodal" aria-hidden="true">
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
											<label for="scheduleid2" class="col-form-label formmodalfont">Schedule ID</label>
											<input id="scheduleid2" name="scheduleid2" type="text" class="form-control" placeholder="Schedule ID">
										</div>
										<div class="col-md">
											<label for="scheduleday" class="col-form-label formmodalfont">Day</label>
											<input id="scheduleday" name="scheduleday" type="text" class="form-control" placeholder="Day">
										</div>
										<div class="col-md">
											<label for="scheduletime" class="col-form-label formmodalfont">Time</label>
											<input id="scheduletime" name="scheduletime" type="text" class="form-control" placeholder="Time">
										</div>
										<div class="col-md">
											<label for="schedulesecid" class="col-form-label formmodalfont">Subject ID</label>
											<input id="schedulesecid" name="schedulesecid" type="text" class="form-control" placeholder="Subject ID">
										</div>
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
			<!--End of Schedule Add Modal-->

		</div>
		<div class="col-lg">
		</div>
	</div>
</div>
<br/>
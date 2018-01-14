<br/>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-lg">
		</div>
		<div class="col-lg-10">
				<div class="container">
					<h1 class="teacherfont">Teachers</h1>

<br>
	<div>
		<button id="addmodalbtn" class="btn addteacherbtn" data-toggle="modal" data-target="#teachermodal">Add Teacher</button>
	</div>
<br>	




<table id="Ttable" class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th scope="col">Teacher ID</th>
								<th scope="col">Full Name</th>
								<th scope="col">Advisory</th>
								<th scope="col">Faculty</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
					</table>



	<div class="container-fluid">
				<div class="modal fade" id="teachermodal" tabindex="-1" role="dialog" aria-labelledby="addteachermodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="addteachermodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>



							<div class="modal-body">
									<div class="row form-row">
										<div class="col-md">
											<label for="teacherid" class="col-form-label formmodalfont">Teacher ID</label>
											<input id="teacherid" name="teacherid" type="text" class="form-control" placeholder="Teacher ID">
										</div>
										<div class="col-md">
											<label for="teachername" class="col-form-label formmodalfont">Teacher Name</label>
											<input id="teachername" name="teachername" type="text" class="form-control" placeholder="Teacher Name">
										</div>
										<div class="col-md">
											<label for="bday" class="col-form-label formmodalfont">Birthday</label>
											<input id="bday" name="bday" type="text" class="form-control" placeholder="Birthday">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="age" class="col-form-label formmodalfont">Age</label>
											<input id="age" name="age" type="text" class="form-control" placeholder="Age">
										</div>
										<div class="col-md">
											<label for="gender" class="col-form-label formmodalfont">Gender</label>
											<select id="gender" name="gender" class="form-control">
											    <option value="Male">Male</option>
											    <option value="Female">Female</option>
										    </select>
										</div>
										<div class="col-md">
											<label for="email" class="col-form-label formmodalfont">Email</label>
											<input id="email" name="email" type="text" class="form-control" placeholder="Email">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="advisory" class="col-form-label formmodalfont">Advisory</label>
											<input id="advisory" name="advisory" type="text" class="form-control" placeholder="Advisory">
									
										
										</div>
										<div class="col-md">
											<label for="faculty" class="col-form-label formmodalfont">Faculty</label>
											<input id="faculty" name="faculty" type="text" class="form-control" placeholder="Faculty">
									
											
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="address" class="col-form-label formmodalfont">Address</label>
											<input id="address" name="address" class="form-control" placeholder="Address">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="contact" class="col-form-label formmodalfont">Contact</label>
											<input id="contact" name="contact" class="form-control" placeholder="Contact">
										</div>
										<div class="col-md">
											<label for="status" class="col-form-label formmodalfont">Status</label>
											<input id="status" name="status" class="form-control" placeholder="Status">
										</div>
										<input type="hidden" name="teacherhid" id="teacherhid" value="">
										<input type="hidden" name="hiddenid" id="hiddenid">
									</div>

									<br/>
					  		</div>

					  		<div class="modal-footer">
								<input type="submit" name="action" id="action" class="btn gobtn" value="Proceed">
							</div>










</div>
</form>
						</div>
					</div>

				</div>
			</div>

			<div class="container-fluid">
				<div class="modal fade" id="teacher2modal" tabindex="-1" role="dialog" aria-labelledby="viewteachermodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="viewteachermodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	
				      		<div class="pre-scrollable">
				      		<div class="modal-body">
									<h6 class="potgraph">Teacher ID:</h6>
									<p id="teacher2id"></p>

									<h6 class="potgraph">Teacher Name:</h6>
									<p id="teacher2name"></p>

									<h6 class="potgraph">Birthday:</h6>
									<p id="birthday2"></p>

									<h6 class="potgraph">Age:</h6>
									<p id="age2"></p>

									<h6 class="potgraph">Gender:</h6>
									<p id="gender2"></p>

									<h6 class="potgraph">Email:</h6>
									<p id="email2"></p>

									<h6 class="potgraph">Advisory:</h6>
									<p id="advisory2"></p>

									<h6 class="potgraph">Faculty:</h6>
									<p id="faculty2"></p>
									
									<h6 class="potgraph">Address:</h6>
									<p id="address2"></p>

									<h6 class="potgraph">Contact:</h6>
									<p id="contact2"></p>

									<h6 class="potgraph">Status:</h6>
									<p id="status2"></p>

					  		</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
		<div class="col-lg">
		</div>
	</div>
</div>
<br/>



<script type="text/javascript" language="javascript">

  	$(document).ready(function(){
								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();  
							           $('.modal-title').text("Add Teacher");  
							           $('#teacherhid').val("Add");   
							      
							      });
							      });    



 			var dataTable = $('#Ttable').dataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',
							           "order":[],  
							           "ajax":{  
							                 url:"<?php echo base_url() . 'teacher_controller/fetch_user_teacher'; ?>", 
							                type:"POST"  
							           },  

							            "columnDefs":[  
							                {  
							                     "targets":[4,5],  
							                     "orderable":false,  

							              
							                },
							           ],

							           
							      });





 				$(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var teacher_id = $('#teacherid').val();  
							           var teacher_name = $('#teachername').val();  
							           var teacherbirthday = $('#bday').val();
							           var teacherage = $('#age').val();
							           var teachergender = $('#gender').val();
							           var teacheremail = $('#email').val();
							           var teacheradvisory = $('#advisory').val();
							           var teacherfaculty = $('#faculty').val();
							           var teacheraddress = $('#address').val();
							           var teachercontact = $('#contact').val();
							           var teacherstatus = $('#status').val();
							           var teacherhid = $('#teacherhid').val();
							           var hiddenid = $('#hiddenid').val();  
							           
							           if(teacher_id != '' && teacher_name != '' && teacherbirthday != '' && teacherage != '' &&teachergender != '' && teacheremail != '' && teacheradvisory != '' && teacherfaculty != '' && teacheraddress != '' && teachercontact != '' && teacherstatus != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'teacher_controller/teacheraction'; ?>",  
							                     data:{
							                     	Tid:teacher_id,
							                     	Tname:teacher_name,
							                     	Tbday:teacherbirthday,
							                     	Tage:teacherage,
							                     	Tgender:teachergender,
							                        Temail:teacheremail,
							                     	Tadvisory:teacheradvisory,
							                     	Tfaculty:teacherfaculty,
							                     	Taddress:teacheraddress,
							                     	Tcontact:teachercontact,
							                     	Tstatus:teacherstatus,
							                     	hidden:teacherhid,
							                     	hidid:hiddenid
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#teachermodal').modal('hide');  
							                          $('#Ttable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                alert("All Fields are Required"); 
							           }  
							      });



  					 $(document).on('click','.edit', function(){  
							           var Tid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'teacher_controller/fetch_single_user_teacher'; ?>",  
							                method:"POST",  
							                data:{Tid:Tid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('#addform')[0].reset();
							                	 $('.modal-title').text("Edit Teacher"); 
							                     $('#teachermodal').modal('show');  
							                     $('#teacherid').val(data.teacher_id);
							                     $('#teachername').val(data.teacher_name);
							                     $('#bday').val(data.teacherbday);
											     $('#age').val(data.teacherage);
												 $('#gender').val(data.teachergender);
												 $('#email').val(data.teacheremail);
												 $('#advisory').val(data.teacheradvisory);
												 $('#faculty').val(data.teacherfaculty);
												 $('#address').val(data.teacheraddress);
												 $('#contact').val(data.teachercontact);
												 $('#status').val(data.teacherstatus);
												 $('#teacherhid').val("Edit");
							                     $('#hiddenid').val(Tid); 
							                }  
							           });  
							      });  



  					 $(document).on('click','.view', function(){  
							           var Tid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'teacher_controller/fetch_single_user_teacher'; ?>",  
							                method:"POST",  
							                data:{Tid:Tid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('.modal-title').text("View Teacher"); 
							                     $('#teacher2modal').modal('show');  
							                     $('#teacher2id').text(data.teacher_id);
							                     $('#teacher2name').text(data.teacher_name);
							                     $('#birthday2').text(data.teacherbday);
											     $('#age2').text(data.teacherage);
												 $('#gender2').text(data.teachergender);
												 $('#email2').text(data.teacheremail);
												 $('#advisory2').text(data.teacheradvisory);
												 $('#faculty2').text(data.teacherfaculty);
												 $('#address2').text(data.teacheraddress);
												 $('#contact2').text(data.teachercontact);
												 $('#status2').text(data.teacherstatus);
							                }  
							           });  
							      });

  					 $(document).on('click', '.delete', function(){  
							           var Tid = $(this).attr("id");  
							           if(confirm("Are you sure you want to delete this?"))  
							           {  
							                $.ajax({  
							                     url:"<?php echo base_url(); ?>teacher_controller/deleteteacher",  
							                     method:"POST", 
							                     data:{Tid:Tid},  
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#Ttable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                return false;       
							           }  
							      });        
							 
</script>














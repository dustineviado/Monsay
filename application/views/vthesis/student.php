<br/>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-lg-12">
				<div>
					<h1 class="studentfont">Students</h1>
					<script type="text/javascript">
							$(document).ready(function(){

								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();  
							           $('.modal-title').text("Add Student");  
							           $('#studenthid').val("Add");   
							      });    

							      var dataTable = $('#studenttable').dataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',  
							           "order":[],  
							           "ajax":{  
							                url:"<?php echo base_url() . 'student_controller/fetch_user'; ?>",  
							                type:"POST"  
							           },  
							           "columnDefs":[  
							                {  
							                     "targets":[14],  
							                     "orderable":false,  
							                },  
							           ],  
							      });

							      $(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var studid = $('#studentidname').val();  
							           var studname = $('#studentname').val();  
							           var studemail = $('#studentemail').val();
							           var studbirthday = $('#studentbirthday').val();
							           var studage = $('#studentage').val();
							           var studcontact = $('#studentcontact').val();
							           var studgender = $('#studentgender').val();
							           var studreligion = $('#studentreligion').val();
							           var studaddress = $('#studentaddress').val();
							           var studparentguard = $('#studentparentguard').val();
							           var studpgcontact = $('#studentpgcontact').val();
							           var studyear = $('#studentyear').val();
							           var studsection = $('#studentsection').val();
							           var studstatus = $('#studentstatus').val();
							           var studhid = $('#studenthid').val();
							           var hiddenid = $('#hiddenid').val();  
							           
							           if(studid != '' && studname != '' && studemail != '' && studbirthday != '' &&studentage != '' && studcontact != '' && studgender != '' && studreligion != '' && studaddress != '' && studparentguard != '' && studpgcontact != '' && studyear != '' && studsection != '' && studstatus != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'student_controller/studentaction'; ?>",  
							                     data:{
							                     	id:studid,
							                     	name:studname,
							                     	email:studemail,
							                     	bday:studbirthday,
							                     	age:studage,
							                        cont:studcontact,
							                     	gend:studgender,
							                     	rel:studreligion,
							                     	addr:studaddress,
							                     	pargua:studparentguard,
							                     	pgcont:studpgcontact,
							                     	yr:studyear,
							                     	sect:studsection,
							                     	stat:studstatus,
							                     	hidden:studhid,
							                     	hidid:hiddenid
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#studentmodal').modal('hide');  
							                          $('#studenttable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                alert("All Fields are Required"); 
							           }  
							      });

							      $(document).on('click','.edit', function(){  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'student_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('#addform')[0].reset();
							                	 $('.modal-title').text("Edit Student"); 
							                     $('#studentmodal').modal('show');  
							                     $('#studentidname').val(data.studentidname);
							                     $('#studentname').val(data.studentname);
							                     $('#studentemail').val(data.studentemail);
											     $('#studentbirthday').val(data.studentbirthday);
												 $('#studentage').val(data.studentage);
												 $('#studentcontact').val(data.studentcontact);
												 $('#studentgender').val(data.studentgender);
												 $('#studentreligion').val(data.studentreligion);
												 $('#studentaddress').val(data.studentaddress);
												 $('#studentparentguard').val(data.studentparentguard);
												 $('#studentpgcontact').val(data.studentpgcontact);
												 $('#studentyear').val(data.studentyear);
												 $('#studentsection').val(data.studentsection);
												 $('#studentstatus').val(data.studentstatus);
							                     $('#studenthid').val("Edit");
							                     $('#hiddenid').val(sid); 
							                }  
							           });  
							      });  

							      $(document).on('click', '.delete', function(){  
							           var sid = $(this).attr("id");  
							           if(confirm("Are you sure you want to delete this?"))  
							           {  
							                $.ajax({  
							                     url:"<?php echo base_url(); ?>student_controller/deletestudent",  
							                     method:"POST",  
							                     data:{sid:sid},  
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#studenttable').DataTable().ajax.reload();  
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
						<button id="addmodalbtn" class="btn addsubbtn" data-toggle="modal" data-target="#studentmodal">Add Student</button>
					</div>
					<br>

					<table id="studenttable" class="table table-responsive table-striped">
						<thead class="thead-inverse">
							<tr>
								<th scope="col">Student ID</th>
								<th scope="col">Student Name</th>
								<th scope="col">Email</th>
								<th scope="col">Birthday</th>
								<th scope="col">Age</th>
								<th scope="col">Contact</th>
								<th scope="col">Gender</th>
								<th scope="col">Religion</th>
								<th scope="col">Address</th>
								<th scope="col">Parent or Guardian</th>
								<th scope="col">PG Contact</th>
								<th scope="col">Year</th>
								<th scope="col">Section</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
					</table>
					<br>

				</div>

			<!--start of Student Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="studentmodal" tabindex="-1" role="dialog" aria-labelledby="addstudentmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="addstudentmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-row">
										<div class="col-md">
											<label for="studentidname" class="col-form-label formmodalfont">Student ID</label>
											<input id="studentidname" name="studentidname" type="text" class="form-control" placeholder="Student ID">
										</div>
										<div class="col-md">
											<label for="studentname" class="col-form-label formmodalfont">Student Name</label>
											<input id="studentname" name="studentname" type="text" class="form-control" placeholder="Student Name">
										</div>
										<div class="col-md">
											<label for="studentemail" class="col-form-label formmodalfont">Email</label>
											<input id="studentemail" name="studentemail" type="text" class="form-control" placeholder="Email">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentbirthday" class="col-form-label formmodalfont">Birthday</label>
											<input id="studentbirthday" name="studentbirthday" type="text" class="form-control" placeholder="Birthday">
										</div>
										<div class="col-md">
											<label for="studentage" class="col-form-label formmodalfont">Age</label>
											<input id="studentage" name="studentage" type="text" class="form-control" placeholder="Age">
										</div>
										<div class="col-md">
											<label for="studentcontact" class="col-form-label formmodalfont">Contact</label>
											<input id="studentcontact" name="studentcontact" type="text" class="form-control" placeholder="Contact">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentgender" class="col-form-label formmodalfont">Gender</label>
											<select id="studentgender" name="studentgender" class="form-control">
											    <option value="Male">Male</option>
											    <option value="Female">Female</option>
										    </select>
										</div>
										<div class="col-md">
											<label for="studentreligion" class="col-form-label formmodalfont">Religion</label>
											<select id="studentreligion" name="studentreligion" class="form-control">
											    <option value="Roman Catholic">Roman Catholic</option>
											    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
											    <option value="Christian">Christian</option>
											    <option value="Dating Daan">Dating Daan</option>
											    <option value="Born Again">Born Again</option>
											</select>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentaddress" class="col-form-label formmodalfont">Address</label>
											<input id="studentaddress" name="studentaddress" class="form-control" placeholder="Address">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentparentguard" class="col-form-label formmodalfont">Parent or Guardian</label>
											<input id="studentparentguard" name="studentparentguard" class="form-control" placeholder="Parent or Guardian">
										</div>
										<div class="col-md">
											<label for="studentpgcontact" class="col-form-label formmodalfont">P/G Contact</label>
											<input id="studentpgcontact" name="studentpgcontact" class="form-control" placeholder="P/G Contact">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentyear" class="col-form-label formmodalfont">Year</label>
											<select id="studentyear" name="studentyear" class="form-control">
											    <option value="Kinder">Kinder</option>
											    <option value="Preparatory">Preparatory</option>
											    <option value="Grade 1">Grade 1</option>
											    <option value="Grade 2">Grade 2</option>
											    <option value="Grade 3">Grade 3</option>
											    <option value="Grade 4">Grade 4</option>
											    <option value="Grade 5">Grade 5</option>
											    <option value="Grade 6">Grade 6</option>
											    <option value="Grade 7">Grade 7</option>
											    <option value="Grade 8">Grade 8</option>
											    <option value="Grade 9">Grade 9</option>
											    <option value="Grade 10">Grade 10</option>
											    <option value="Grade 11">Grade 11</option>
											    <option value="Grade 12">Grade 12</option>
										    </select>
										</div>
										<div class="col-md">
											<label for="studentsection" class="col-form-label formmodalfont">Section</label>
											<input id="studentsection" name="studentsection" class="form-control" placeholder="Section">
										</div>
										<div class="col-md">
											<label for="studentstatus" class="col-form-label formmodalfont">Status</label>
											<input id="studentstatus" name="studentstatus" class="form-control" placeholder="Status">
											<input type="text" name="studenthid" id="studenthid" value="">
											<input type="text" name="hiddenid" id="hiddenid">
										</div>
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
		</div>
	</div>
</div>
<br/>
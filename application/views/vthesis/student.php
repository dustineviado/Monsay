
<?php  $id_number=$this->session->userdata('login_session');
if(! $id_number ){
redirect('login_controller/login_view');
}?>
<br>
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
    color: #818181;
    display: block;
    transition: 0.5s;
}
.sidenav a:hover {
    color: #ff66ff;
    background-color: gray;
    transition: .7s;

}

#main {
    padding: 16px;
}
.shtycss{
	background-color: #ff66ff;
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
  <a href="admin_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
  <br>
    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  
</div>




		</div>
		<div class="col-lg-10">
				<div class="container">
					<h1 class="studentfont">Students</h1>
					<script type="text/javascript">
							$(document).ready(function(){
								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();  
							           $('.modal-title').text("Add Student");  
							           $('#studenthid').val("Add");   
							      });    
							      var dataTable = $('#studenttable').DataTable({  
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
							                     "targets":[5],  
							                     "orderable":false,  
							                },  
							           ],  
							      });
							      $('#addform').on('submit', function(e){  
							           event.preventDefault();
							           var data = $(this).serialize();
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'student_controller/studentaction'; ?>",  
							                     data:data,
							                     success:function(data)  
							                     {  
							                     	if(data == 'Student Added' || data == 'Student Updated'){
							                          alert(data);
							                          $('#studentmodal').modal('hide');  
							                          $('#studenttable').DataTable().ajax.reload();
							                        }
							                        else{
							                          alert(data);
							                        }    
							                     }  
							                });   
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
							                     $('#studentfname').val(data.studentfname);
							                     $('#studentmname').val(data.studentmname);
							                     $('#studentlname').val(data.studentlname);
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
												 var sidid = $('#studentyear').val();
													$.ajax({
														url:"<?php echo base_url(); ?>student_controller/getoption",
														method:"POST",
														data:{sid:sidid},
														dataType:"json",
														success: function(data){
															var option_data='';
									                	 	var i;
									                	 		for(i=0; i<data.length; i++){
									                	 			option_data += '<option value="'+ data[i].secid +'">'+ data[i].section_name +'</option>'
																} 
									                		$('#studentsection').html(option_data);
									               			}   
													});
												 $('#studentsection').val(data.studentsection);
												 $('#studentstatus').val(data.studentstatus);
							                     $('#studenthid').val("Edit");
							                     $('#hiddenid').val(sid); 
							                }  
							           });  
							      });  
								$(document).on('click','.view', function(){  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'student_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('.modal-title').text("View Student"); 
							                     $('#student2modal').modal('show');  
							                     $('#student2idname').text(data.studentidname);
							                     $('#student2fname').text(data.studentfname);
							                     $('#student2mname').text(data.studentmname);
							                     $('#student2lname').text(data.studentlname);
							                     $('#student2email').text(data.studentemail);
											     $('#student2birthday').text(data.studentbirthday);
												 $('#student2age').text(data.studentage);
												 $('#student2contact').text(data.studentcontact);
												 $('#student2gender').text(data.studentgender);
												 $('#student2religion').text(data.studentreligion);
												 $('#student2address').text(data.studentaddress);
												 $('#student2parentguard').text(data.studentparentguard);
												 $('#student2pgcontact').text(data.studentpgcontact);
												 $('#student2year').text(data.studentyear);
												 $('#student2section').text(data.studentsection);
												 $('#student2sectionname').text(data.studentsectionname);
												 $('#student2status').text(data.studentstatus); 
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

							      /* Start if Jquery combo box*/
							      	$("#studentyear").change(function(){
										var sid = $('#studentyear').val();
											$.ajax({
												url:"<?php echo base_url(); ?>student_controller/getoption",
												method:"POST",
												data:{sid:sid},
												dataType:"json",
												success: function(data){
													var option_data='';
							                	 	var i;
							                	 		for(i=0; i<data.length; i++){
							                	 			option_data += '<option value="'+ data[i].secid +'">'+ data[i].section_name +'</option>'
														} 
							                		$('#studentsection').html(option_data);
							               			}   
											});
									});
							      /* End of Jquery combo box*/ 
							 });
						</script>
					<br>
					<div>
						<button id="addmodalbtn" class="btn addsubbtn" data-toggle="modal" data-target="#studentmodal">Add Student</button>
					</div>
					<br>

					<table id="studenttable" class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>Student ID</th>
								<th>Given Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Year</th>
								<th>Section Name</th>	
								<th>Action</th>
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
											<input id="studentidname" name="studentidname" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studentfname" class="col-form-label formmodalfont">First Name</label>
											<input id="studentfname" name="studentfname" type="text" class="form-control" placeholder="Student Name">
										</div>
										<div class="col-md">
											<label for="studentmname" class="col-form-label formmodalfont">Middle Name</label>
											<input id="studentmname" name="studentmname" type="text" class="form-control" placeholder="Middle Name">
										</div>
										<div class="col-md">
											<label for="studentlname" class="col-form-label formmodalfont">Last Name</label>
											<input id="studentlname" name="studentlname" type="text" class="form-control" placeholder="Last Name">
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
											<input id="studentage" name="studentage" type="text" class="form-control" placeholder="Birthday">
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
												<option value="">---</option>
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
											<select id="studentsection" name="studentsection" class="form-control">
												<option value="">---</option>
											</select>	
										</div>
										<div class="col-md">
											<label for="studentstatus" class="col-form-label formmodalfont">Status</label>
											<input id="studentstatus" name="studentstatus" class="form-control" placeholder="Status">
											<input type="hidden" name="studenthid" id="studenthid" class="form-control" value="">
											<input type="hidden" name="hiddenid" class="form-control" id="hiddenid">
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

			<div class="container-fluid">
				<div class="modal fade" id="student2modal" tabindex="-1" role="dialog" aria-labelledby="viewstudentmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="viewstudentmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	
				      		<div class="pre-scrollable">
				      		<div class="modal-body">
									<h6 class="potgraph">Student ID:</h6>
									<p id="student2idname"></p>

									<h6 class="potgraph">First Name:</h6>
									<p id="student2fname"></p>

									<h6 class="potgraph">Middle Name:</h6>
									<p id="student2mname"></p>

									<h6 class="potgraph">Last Name:</h6>
									<p id="student2lname"></p>

									<h6 class="potgraph">Email:</h6>
									<p id="student2email"></p>

									<h6 class="potgraph">Birthday:</h6>
									<p id="student2birthday"></p>

									<h6 class="potgraph">Age:</h6>
									<p id="student2age"></p>

									<h6 class="potgraph">Contact:</h6>
									<p id="student2contact"></p>

									<h6 class="potgraph">Gender:</h6>
									<p id="student2gender"></p>

									<h6 class="potgraph">Religion:</h6>
									<p id="student2religion"></p>
									
									<h6 class="potgraph">Address:</h6>
									<p id="student2address"></p>

									<h6 class="potgraph">Parent or Guardian:</h6>
									<p id="student2parentguard"></p>

									<h6 class="potgraph">P/G Contact:</h6>
									<p id="student2pgcontact"></p>

									<h6 class="potgraph">Year:</h6>
									<p id="student2year"></p>

									<h6 class="potgraph">Section ID:</h6>
									<p id="student2section"></p>

									<h6 class="potgraph">Section Name:</h6>
									<p id="student2sectionname"></p>

									<h6 class="potgraph">Status:</h6>
									<p id="student2status"></p>
					  		</div>
							<div class="modal-footer">
							</div>


						</div>
					</div>

				</div>
			</div>
		</div>	
		</div>
	</div>
</div>
<br/>

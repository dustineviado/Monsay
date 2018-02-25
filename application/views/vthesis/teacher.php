
<?php  $id_number=$this->session->userdata('login_session');
if(! $id_number ){
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
</style>


<div id="sidebar" class="sidenav text-muted">
	
  <b><p class="text-center" style="font-family: 'helvetica';font-size: 30px; ">Welcome  </p></b>
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="admin_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
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
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Department</th>
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
											<label for="teacherfname" class="col-form-label formmodalfont">First Name</label>
											<input id="teacherfname" name="teacherfname" type="text" class="form-control" placeholder="First Name">
										</div>
										<div class="col-md">
											<label for="teachermname" class="col-form-label formmodalfont">Middle Name</label>
											<input id="teachermname" name="teachermname" type="text" class="form-control" placeholder="Middle Name">
										</div>
										<div class="col-md">
											<label for="teacherlname" class="col-form-label formmodalfont">Last Name</label>
											<input id="teacherlname" name="teacherlname" type="text" class="form-control" placeholder="Last Name">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="bday" class="col-form-label formmodalfont">Birthday</label>
											<input id="bday" name="bday" type="text" class="form-control" placeholder="Birthday">
										</div>
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
											<label for="department" class="col-form-label formmodalfont">Department</label>
											<input id="department" name="department" type="text" class="form-control" placeholder="Department">
									
											
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

									<h6 class="potgraph">Department:</h6>
									<p id="department2"></p>
									
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
							                     "targets":[5],  
							                     "orderable":false,  

							              
							                },
							           ],

							           
							      });





 				$(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var teacher_id = $('#teacherid').val();  
							           var teacher_fname = $('#teacherfname').val();
							           var teacher_mname = $('#teachermname').val();
							           var teacher_lname = $('#teacherlname').val();  
							           var teacherbirthday = $('#bday').val();
							           var teacherage = $('#age').val();
							           var teachergender = $('#gender').val();
							           var teacheremail = $('#email').val();
							           var teacherdepartment = $('#department').val();
							           var teacheraddress = $('#address').val();
							           var teachercontact = $('#contact').val();
							           var teacherstatus = $('#status').val();
							           var teacherhid = $('#teacherhid').val();
							           var hiddenid = $('#hiddenid').val();  
							           
							           if(teacher_id != '' && teacher_fname != '' && teacher_mname != '' && teacher_lname != '' && teacherbirthday != '' && teacherage != '' &&teachergender != '' && teacheremail != '' && teacherdepartment != '' && teacheraddress != '' && teachercontact != '' && teacherstatus != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'teacher_controller/teacheraction'; ?>",  
							                     data:{
							                     	Tid:teacher_id,
							                     	Tfname:teacher_fname,
							                     	Tmname:teacher_mname,
							                     	Tlname:teacher_lname,
							                     	Tbday:teacherbirthday,
							                     	Tage:teacherage,
							                     	Tgender:teachergender,
							                        Temail:teacheremail,
							                     	Tdepartment:teacherdepartment,
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
							                     $('#teacherfname').val(data.teacher_fname);
							                     $('#teachermname').val(data.teacher_mname);
							                     $('#teacherlname').val(data.teacher_lname);
							                     $('#bday').val(data.teacherbday);
											     $('#age').val(data.teacherage);
												 $('#gender').val(data.teachergender);
												 $('#email').val(data.teacheremail);
												 $('#department').val(data.teacherdepartment);
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
							                     $('#teacher2name').text(data.teacher_fname+" "+data.teacher_mname+" "+data.teacher_lname);
							                     $('#birthday2').text(data.teacherbday);
											     $('#age2').text(data.teacherage);
												 $('#gender2').text(data.teachergender);
												 $('#email2').text(data.teacheremail);
												 $('#department2').text(data.teacherdepartment);
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














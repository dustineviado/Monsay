
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
  <a href="teacher_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
     <a href="schoolyear_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>
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
						<thead class="tablethead">
							<tr>
								<th scope="col">Teacher ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Department</th>
								<th scope="col">Highest Degree</th>
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
										<div>
											<input type="hidden" id="teacherid" name="teacherid" type="text" class="form-control"">
										</div>
										<div class="col-md">
											<label for="teacherfname" class="col-form-label formmodalfont">First Name</label>
											<input id="teacherfname" name="teacherfname" type="text" class="form-control" placeholder="First Name">
											<span class="text-danger" id="teacherfname_error"></span>
										</div>
										<div class="col-md">
											<label for="teachermname" class="col-form-label formmodalfont">Middle Name</label>
											<input id="teachermname" name="teachermname" type="text" class="form-control" placeholder="Middle Name">
											<span class="text-danger" id="teachermname_error"></span>
										</div>
										<div class="col-md">
											<label for="teacherlname" class="col-form-label formmodalfont">Last Name</label>
											<input id="teacherlname" name="teacherlname" type="text" class="form-control" placeholder="Last Name">
											<span class="text-danger" id="teacherlname_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="bday" class="col-form-label formmodalfont">Birthday</label>
											<input id="bday" name="bday" type="date" class="form-control" placeholder="Birthday">
											<span class="text-danger" id="bday_error"></span>
										</div>
										<!-- <div class="col-md">
											<label for="age" class="col-form-label formmodalfont">Age</label>
											<input id="age" name="age" type="text" class="form-control" placeholder="Age">
										</div> -->
										<div class="col-md">
											<label for="gender" class="col-form-label formmodalfont">Gender</label>
											<select id="gender" name="gender" class="form-control">
											    <option value="Male">Male</option>
											    <option value="Female">Female</option>
										    </select>
										    <span class="text-danger" id="gender_error"></span>
										</div>
										<div class="col-md">
											<label for="email" class="col-form-label formmodalfont">Email</label>
											<input id="email" name="email" type="text" class="form-control" placeholder="Email">
											<span id="email_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="department" class="col-form-label formmodalfont">Department</label>
											<input id="department" name="department" type="text" class="form-control" placeholder="Department">
											<span class="text-danger" id="department_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="address" class="col-form-label formmodalfont">Address</label>
											<input id="address" name="address" class="form-control" placeholder="Address">
											<span class="text-danger" id="address_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="contact" class="col-form-label formmodalfont">Contact</label>
											<input id="contact" name="contact" class="form-control" placeholder="Contact">
											<span class="text-danger" id="contact_error"></span>
										</div>
										<div class="col-md">
											<label for="status" class="col-form-label formmodalfont">Highest Degree</label>
											<input id="status" name="status" class="form-control" placeholder="Highest Degree">
										    <span class="text-danger" id="status_error"></span>
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
					</div>
				</div>		

<!-- END ADD TEACHER MODAL -->
<div class="container-fluid">
				<div class="modal fade" id="teachermodal2" tabindex="-1" role="dialog" aria-labelledby="editteachermodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform2">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="editteachermodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>



							<div class="modal-body">
									<div class="row form-row">
										<div>
											<input type="hidden" id="teacherid2" name="teacherid2" type="text" class="form-control"">
										</div>
										<div class="col-md">
											<label for="teacherfname2" class="col-form-label formmodalfont">First Name</label>
											<input id="teacherfname2" name="teacherfname2" type="text" class="form-control" placeholder="First Name">
											<span class="text-danger" id="teacherfname2_error"></span>
										</div>
										<div class="col-md">
											<label for="teachermname2" class="col-form-label formmodalfont">Middle Name</label>
											<input id="teachermname2" name="teachermname2" type="text" class="form-control" placeholder="Middle Name">
											<span class="text-danger" id="teachermname2_error"></span>
										</div>
										<div class="col-md">
											<label for="teacherlname2" class="col-form-label formmodalfont">Last Name</label>
											<input id="teacherlname2" name="teacherlname2" type="text" class="form-control" placeholder="Last Name">
											<span class="text-danger" id="teacherlname2_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="bday2" class="col-form-label formmodalfont">Birthday</label>
											<input id="bday2" name="bday2" type="date" class="form-control" placeholder="Birthday">
											<span class="text-danger" id="bday2_error"></span>
										</div>
										<!-- <div class="col-md">
											<label for="age" class="col-form-label formmodalfont">Age</label>
											<input id="age" name="age" type="text" class="form-control" placeholder="Age">
										</div> -->
										<div class="col-md">
											<label for="gender2" class="col-form-label formmodalfont">Gender</label>
											<select id="gender2" name="gender2" class="form-control">
											    <option value="Male">Male</option>
											    <option value="Female">Female</option>
										    </select>
										    <span class="text-danger" id="gender2_error"></span>
										</div>
										<div class="col-md">
											<label for="email2" class="col-form-label formmodalfont">Email</label>
											<input id="email2" name="email2" type="text" class="form-control" placeholder="Email">
											<span id="email2_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="department2" class="col-form-label formmodalfont">Department</label>
											<input id="department2" name="department2" type="text" class="form-control" placeholder="Department">
											<span class="text-danger" id="department2_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="address2" class="col-form-label formmodalfont">Address</label>
											<input id="address2" name="address2" class="form-control" placeholder="Address">
											<span class="text-danger" id="address2_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="contact2" class="col-form-label formmodalfont">Contact</label>
											<input id="contact2" name="contact" class="form-control" placeholder="Contact">
											<span class="text-danger" id="contact2_error"></span>
										</div>
										<div class="col-md">
											<label for="status2" class="col-form-label formmodalfont">Highest Degree</label>
											<input id="status2" name="status2" class="form-control" placeholder="Highest Degree">
										    <span class="text-danger" id="status2_error"></span>
										</div>
										<input type="hidden" name="teacherhid2" id="teacherhid2" value="">
										<input type="hidden" name="hiddenid2" id="hiddenid2">
									</div>

									<br/>
					  		</div>

					  		<div class="modal-footer">
								<input type="submit" name="action2" id="action2" class="btn gobtn" value="Proceed">
							</div>
						</div>
</form>
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
									<p id="birthday2id"></p>


									<h6 class="potgraph">Gender:</h6>
									<p id="gender2id"></p>

									<h6 class="potgraph">Email:</h6>
									<p id="email2id"></p>

									<h6 class="potgraph">Department:</h6>
									<p id="department2id"></p>
									
									<h6 class="potgraph">Address:</h6>
									<p id="address2id"></p>

									<h6 class="potgraph">Contact:</h6>
									<p id="contact2id"></p>

									<h6 class="potgraph">Status:</h6>
									<p id="status2id"></p>

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
							      	   
							      	   var d = new Date();
							      	   var idformat = d.getFullYear();
							      	   var finalid = 0;

							      	   $.ajax({  
							                url:"<?php echo base_url() . 'teacher_controller/autoid'; ?>",  
							                method:"POST",  
							                data:{idformat:idformat},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	if(data == null){
							                		finalid = idformat + '01';
							                		$('#teacherid').val(finalid);
							                	}
							                	else{
								                	finalid = 1 + parseInt(data);
								                	$('#teacherid').val(finalid);  
							                	}
							                }  
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


 								$('#action').on('click', function(e){  
							           e.preventDefault();
											var data;     		
											var fname= $("#teacherfname").val();
											var mname= $("#teachermname").val();
											var lname= $("#teacherlname").val();
											var bday= $("#bday").val();
											var email =$("#email").val();
											var cont= $("#contact").val();
											var gend= $("#gender").val();
											var address= $("#address").val();
											var status= $("#status").val();
											var dept = $('#department').val();
							                var counter = 0;     

							                if(fname == ''){
							                	$('#teacherfname_error').html('First Name is Required.');
							                	$('#teacherfname').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#teacherfname_error').hide();
							                		$('#teacherfname').css('border-color', '#34F458');
							                	}
							                if(mname == ''){
							                	$('#teachermname_error').html('Middle Name is Required.');
							                	$('#teachermname').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#teachermname_error').hide();
							                		$('#teachermname').css('border-color', '#34F458');
							                	}
							                if(lname == ''){
							                	$('#teacherlname_error').html('Last Name is Required.');
							                	$('#teacherlname').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#teacherlname_error').hide();
							                		$('#teacherlname').css('border-color', '#34F458');
							                	}
							                if(bday == ''){
							                	$('#bday_error').html('Birthday is Required.');
							                	$('#bday').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#bday_error').hide();
							                		$('#bday').css('border-color', '#34F458');
							                	}
							                if(gend == ''){
							                	$('#gender_error').html('Gender is Required.');
							                	$('#gender').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#gender_error').hide();
							                		$('#gender').css('border-color', '#34F458');
							                	}
							                if(address == ''){
							                	$('#address_error').html('Address is Required.');
							                	$('#address').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#address_error').hide();
							                		$('#address').css('border-color', '#34F458');
							                	}
							                if(email == ''){
							                	$('#email_error').html('Email is Required.');
							                	$('#email').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#email_error').hide();
							                		$('#email').css('border-color', '#34F458');
							                	}
							                if(cont == ''){
							                	$('#contact_error').html('Contact is Required.');
							                	$('#contact').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#contact_error').hide();
							                		$('#contact').css('border-color', '#34F458');
							                	}
							                if(status == ''){	
							                	$('#status_error').html('Status is Required.');
							                	$('#status').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#status_error').hide();
							                		$('#status').css('border-color', '#34F458');
							                	}
							                if(dept == ''){
							                	$('#department_error').html('Department is required.');
							                	$('#department').css('border-color', '#F90A0A');
							                	counter++;
							                }		      
							                	else{
							                		$('#department_error').hide();
							                		$('#department').css('border-color', '#34F458');
							                	}
							                if(counter == 0){
							                	var data = $('#addform').serialize();
							           			var base_url = window.location;
							           				$.ajax({
							           					url: base_url + '/teacheraction',
							           					method: "POST",
							           					data:data,
							           					success:function(data){
							           						console.log(data);
							           						alert(data);
							           						$('#teachermodal').modal('hide');
							           						$('#Ttable').DataTable().ajax.reload();
							           					}
							           				});
							                }
							    	});	
										$('#email').keyup(function(){
							                	var email = $('#email').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_email',
							                		method:"POST",
							                		data:{email:email},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#email_error').html('Email is Valid' + '&nbsp;&nbsp;' +'<span class="fa fa-check"></span>')
							    					.css('color', '#34F458').show();
							    					$('#email').css('border-color', '#34F458');
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#email_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#email').css('border-color', '#F90A0A');
							    					}
							              	}
							             });   	

							      });
										$('#contact').keyup(function(){
							                	var cont = $('#contact').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_contact',
							                		method:"POST",
							                		data:{cont:cont},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#contact').css('border-color', '#34F458');
							    					$('#contact_error').hide();
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#contact_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#contact_error').show();
							    						$('#contact').css('border-color', '#F90A0A');
							    					}
							              	}
							             });
							      });




  					 $(document).on('click','.edit', function(e){
  					 e.preventDefault();  
							           var Tid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'teacher_controller/fetch_single_user_teacher'; ?>",  
							                method:"POST",  
							                data:{Tid:Tid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 // $('#addform2')[0].reset();
							                	 $('.modal-title').text("Edit Teacher"); 
							                     $('#teachermodal2').modal('show');  
							                     $('#teacherid2').val(data.teacher_id);
							                     $('#teacherfname2').val(data.teacher_fname);
							                     $('#teachermname2').val(data.teacher_mname);
							                     $('#teacherlname2').val(data.teacher_lname);
							                     $('#bday2').val(data.teacherbday);
												 $('#gender2').val(data.teachergender);
												 $('#email2').val(data.teacheremail);
												 $('#department2').val(data.teacherdepartment);
												 $('#address2').val(data.teacheraddress);
												 $('#contact2').val(data.teachercontact);
												 $('#status2').val(data.teacherstatus);
												 $('#teacherhid2').val("Edit");
							                     $('#hiddenid2').val(Tid); 
							                }  
							           });  
							      });

							      $('#action2').on('click', function(e){  
							           e.preventDefault();
											var data;     		
											var fname= $("#teacherfname2").val();
											var mname= $("#teachermname2").val();
											var lname= $("#teacherlname2").val();
											var bday= $("#bday2").val();
											var email =$("#email2").val();
											var cont= $("#contact2").val();
											var gend= $("#gender2").val();
											var address= $("#address2").val();
											var status= $("#status2").val();
											var dept = $('#department2').val();
							                var counter = 0;     

							                if(fname == ''){
							                	$('#teacherfname2_error').html('First Name is Required.');
							                	$('#teacherfname2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#teacherfname2_error').hide();
							                		$('#teacherfname2').css('border-color', '#34F458');
							                	}
							                if(mname == ''){
							                	$('#teachermname2_error').html('Middle Name is Required.');
							                	$('#teachermname2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#teachermname2_error').hide();
							                		$('#teachermname2').css('border-color', '#34F458');
							                	}
							                if(lname == ''){
							                	$('#teacherlname2_error').html('Last Name is Required.');
							                	$('#teacherlname2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#teacherlname2_error').hide();
							                		$('#teacherlname2').css('border-color', '#34F458');
							                	}
							                if(bday == ''){
							                	$('#bday2_error').html('Birthday is Required.');
							                	$('#bday2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#bday2_error').hide();
							                		$('#bday2').css('border-color', '#34F458');
							                	}
							                if(gend == ''){
							                	$('#gender2_error').html('Gender is Required.');
							                	$('#gender2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#gender2_error').hide();
							                		$('#gender2').css('border-color', '#34F458');
							                	}
							                if(address == ''){
							                	$('#address2_error').html('Address is Required.');
							                	$('#address2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#address2_error').hide();
							                		$('#address2').css('border-color', '#34F458');
							                	}
							                if(email == ''){
							                	$('#email2_error').html('Email is Required.');
							                	$('#email2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#email2_error').hide();
							                		$('#email2').css('border-color', '#34F458');
							                	}
							                if(cont == ''){
							                	$('#contact2_error').html('Contact is Required.');
							                	$('#contact2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#contact2_error').hide();
							                		$('#contact2').css('border-color', '#34F458');
							                	}
							                if(status == ''){
							                	$('#status2_error').html('Status is Required.');
							                	$('#status2').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#status2_error').hide();
							                		$('#status2').css('border-color', '#34F458');
							                	}
							                if(dept == ''){
							                	$('#department2_error').html('Department is required.');
							                	$('#department2').css('border-color', '#F90A0A');
							                	counter++;
							                }		      
							                	else{
							                		$('#department2_error').hide();
							                		$('#department2').css('border-color', '#34F458');
							                	}
							                if(counter == 0){
							                	var data = $('#addform2').serialize();
							           			var base_url = window.location;
							           				$.ajax({
							           					url: base_url + '/editteacher',
							           					method: "POST",
							           					data:data,
							           					success:function(data){
							           						console.log(data);
							           						alert(data);
							           						$('#teachermodal2').modal('hide');
							           						$('#Ttable').DataTable().ajax.reload();
							           					}
							           				});
							                }
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
							                     $('#birthday2id').text(data.teacherbday);
												 $('#gender2id').text(data.teachergender);
												 $('#email2id').text(data.teacheremail);
												 $('#department2id').text(data.teacherdepartment);
												 $('#address2id').text(data.teacheraddress);
												 $('#contact2id').text(data.teachercontact);
												 $('#status2id').text(data.teacherstatus);
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
	}); 

</script>

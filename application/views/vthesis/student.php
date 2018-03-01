<?php  
if(! $_SESSION){
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
  <a href="student_controller"  class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
     <a href="schoolyear_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>
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

							           var d = new Date();
							      	   var idformat = d.getFullYear();
							      	   var finalid = 0;

							      	   $.ajax({  
							                url:"<?php echo base_url() . 'student_controller/autoid'; ?>",  
							                method:"POST",  
							                data:{idformat:idformat},  
							                dataType:"json",  
							                success:function(data)  
							                {
							                	if(data == null){
							                		finalid = idformat + '0001';
							                		$('#teacherid').val(finalid);
							                	}
							                	else{
								                	finalid = 1 + parseInt(data);
								                	$('#studentidname').val(finalid);  
							                	}
							                }  
							           });	

							     	    
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
							      $('#action').on('click', function(e){  
							           e.preventDefault();
											var data;     		
											var fname= $("#studentfname").val();
											var mname= $("#studentmname").val();
											var lname= $("#studentlname").val();
											var bday= $("#studentbirthday").val();
											var email =$("#studentemail").val();
											var studcont= $("#studentcontact").val();
											var gender= $("#studentgender").val();
											var religion= $("#studentreligion").val();
											var address= $("#studentaddress").val();
											var parentguard= $("#studentparentguard").val();
											var pgcont= $("#studentpgcontact").val();
											var year= $("#studentyear").val();
											var sec= $("#studentsection").val();
											var status= $("#studentstatus").val();
							                var counter = 0;
							                var base_url = window.location;
							                // $.ajax({  
							                // 	type:"POST",
							                //      url: base_url + '/studentaction',  
							                //      data:{fname:fname,
							                //      	   	mname:mname,
							                //      		lname:lname,
							                //      		bday:bday,
							                //      		email:email,
							                //      		studcont:studcont,
							                //      		gender:gender,
							                //      		religion:religion,
							                //      		address:address,
							                //      		parentguard:parentguard,
							                //      		pgcont:pgcont,
							                //      		year:year,
							                //      		sec:sec,
							                //      		status:status,
							                //      		counter:counter},
							                //      success:function(data)
							                //      {
							                     console.log(data);
							                if(fname == ''){
							                	$('#studentfname_error').html('First Name is Required.');
							                	$('#studentfname').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#studentfname_error').hide();
							                		$('#studentfname').css('border-color', '#34F458');
							                	}
							                if(mname == ''){
							                	$('#studentmname_error').html('Middle Name is Required.');
							                	$('#studentmname').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentmname_error').hide();
							                		$('#studentmname').css('border-color', '#34F458');
							                	}
							                if(lname == ''){
							                	$('#studentlname_error').html('Last Name is Required.');
							                	$('#studentlname').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentlname_error').hide();
							                		$('#studentlname').css('border-color', '#34F458');
							                	}
							                if(bday == ''){
							                	$('#studentbirthday_error').html('Birthday is Required');
							                	$('#studentbirthday').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentbirthday_error').hide();
							                		$('#studentbirthday').css('border-color', '#34F458');
							                	}
							                if(email == ''){
							                	$('#studentemail_error').html('Email is Required')
							                	.css('color', '#F90A0A');
							                	$('#studentemail').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentemail_error').hide();
							                		$('#studentemail').css('border-color', '#34F458');
							                	}
							                if(studcont == ''){
							                	$('#studentcontact_error').html('Contact is Required');
							                	$('#studentcontact').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentcontact_error').hide();
							                		$('#studentcontact').css('border-color', '#34F458');
							                	}
							                if(gender == ''){
							                	$('#studentgender_error').html('Gender is Required');
							                	$('#studentgender').css('border-color', '#F90A0A');
							                }
							                else{
							                		$('#studentgender_error').hide();
							                		$('#studentgender').css('border-color', '#34F458');
							                	}
							                if(religion == ''){
							                	$('#studentreligion_error').html('Religion is Required');
							                	$('#studentreligion').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentreligion_error').hide();
							                		$('#studentreligion').css('border-color', '#34F458');
							                	}
							                if(address == ''){
							                	$('#studentaddress_error').html('Address is Required');
							                	$('#studentaddress').css('border-color', '#F90A0A');
							                }
							                else{
							                		$('#studentaddress_error').hide();
							                		$('#studentaddress').css('border-color', '#34F458');
							                	}
							                if(parentguard == ''){
							                	$('#studentparentguard_error').html('Parent/Guardian is Required');
							                	$('#studentparentguard').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentparentguard_error').hide();
							                		$('#studentparentguard').css('border-color', '#34F458');
							                	}
							                if(pgcont == ''){
							                	$('#studentpgcontact_error').html('P/G Contact is Required');
							                	$('#studentpgcontact').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentpgcontact_error').hide();
							                		$('#studentpgcontact').css('border-color', '#34F458');
							                	}
							                if(year == ''){
							                	$('#studentyear_error').html('Year Level is Required');
							                	$('#studentyear').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentyear_error').hide();
							                		$('#studentyear').css('border-color', '#34F458');
							                	}
							                if(sec == ''){
							                	$('#studentsection_error').html('Section is Required');
							                	$('#studentsection').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentsection_error').hide();
							                		$('#studentsection').css('border-color', '#34F458');
							                	}
							                if(status == ''){
							                	$('#studentstatus_error').html('Status is Required');
							                	$('#studentstatus').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentstatus_error').hide();
							                		$('#studentstatus').css('border-color', '#34F458');
							                	}

							                if(counter==0){
							                	$('#addform').submit();
							                	$('#studenttable').DataTable().ajax.reload();
							                }
							           //   }
							           // });     
							    });

							    $('#studentemail').keyup(function(){
							                	var email = $('#studentemail').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_email',
							                		method:"POST",
							                		data:{email:email},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#studentemail_error').html('Email is Valid')
							    					.css('color', '#34F458');
							    					$('#studentemail').css('border-color', '#34F458');
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#studentemail_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#studentemail').css('border-color', '#F90A0A');
							    					}
							              	}
							             });   	

							      });
							      $('#studentcontact').keyup(function(){
							                	var studcont = $('#studentcontact').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_studcontact',
							                		method:"POST",
							                		data:{studcont:studcont},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#studentcontact').css('border-color', '#34F458');
							    					$('#studentcontact_error').hide();
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#studentcontact_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#studentcontact_error').show();
							    						$('#studentcontact').css('border-color', '#F90A0A');
							    					}
							              	}
							             });
							      });
							      $('#studentpgcontact').keyup(function(){
							                	var pgcont = $('#studentpgcontact').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_pgcontact',
							                		method:"POST",
							                		data:{pgcont:pgcont},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#studentpgcontact').css('border-color', '#34F458');
							    					$('#studentpgcontact_error').hide();
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#studentpgcontact_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#studentpgcontact_error').show();
							    						$('#studentpgcontact').css('border-color', '#F90A0A');
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
							                	 $('#addform3')[0].reset();
							                	 $('.modal-title').text("Edit Student"); 
							                     $('#studentmodal3').modal('show');  
							                     $('#studentidname3').val(data.studentidname);
							                     $('#studentfname3').val(data.studentfname);
							                     $('#studentmname3').val(data.studentmname);
							                     $('#studentlname3').val(data.studentlname);
							                     $('#studentemail3').val(data.studentemail);
											     $('#studentbirthday3').val(data.studentbirthday);
												 $('#studentcontact3').val(data.studentcontact);
												 $('#studentgender3').val(data.studentgender);
												 $('#studentreligion3').val(data.studentreligion);
												 $('#studentaddress3').val(data.studentaddress);
												 $('#studentparentguard3').val(data.studentparentguard);
												 $('#studentpgcontact3').val(data.studentpgcontact);
												 $('#studentyear3').val(data.studentyear);
												 var sidid = $('#studentyear3').val();
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
									                		$('#studentsection3').html(option_data);
									               			}   
													});
												 $('#studentsection3').val(data.studentsection);
												 $('#studentstatus3').val(data.studentstatus);
												 $('#action3').val("Update");
							                     $('#edithid').val("Edit");
							                     $('#editID').val(sid); 
							                }  
							           });  
							      });
							      $(document).on('submit','#addform3', function(event){
							      		event.preventDefault();
							      		var data = $(this).serialize();
							      		$.ajax({ 
							      			method:"POST",
							      			url:"<?php echo base_url() . 'student_controller/editstudent'; ?>",
							      			data:data,
							      			success:function(response){
							      			console.log(response);
							      			if(response == 'Student Updated'){
							      			alert(response);
							      			$('#addform3')[0].reset();
							      			$('#studentmodal3').modal('hide');
							      			$('#studenttable').DataTable().ajax.reload();
							      				}
							      			}
							      		});  
							      			var fname= $("#studentfname3").val();
											var mname= $("#studentmname3").val();
											var lname= $("#studentlname3").val();
											var bday= $("#studentbirthday3").val();
											var email =$("#studentemail3").val();
											var studcont= $("#studentcontact3").val();
											var gender= $("#studentgender3").val();
											var religion= $("#studentreligion3").val();
											var address= $("#studentaddress3").val();
											var parentguard= $("#studentparentguard3").val();
											var pgcont= $("#studentpgcontact3").val();
											var year= $("#studentyear3").val();
											var sec= $("#studentsection3").val();
											var status= $("#studentstatus3").val();
							                var counter = 0;
							                if(fname == ''){
							                	$('#studentfname3_error').html('First Name is Required.');
							                	$('#studentfname3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                	else{
							                		$('#studentfname3_error').hide();
							                		$('#studentfname3').css('border-color', '#34F458');
							                	}
							                if(mname == ''){
							                	$('#studentmname3_error').html('Middle Name is Required.');
							                	$('#studentmname3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentmname3_error').hide();
							                		$('#studentmname3').css('border-color', '#34F458');
							                	}
							                if(lname == ''){
							                	$('#studentlname3_error').html('Last Name is Required.');
							                	$('#studentlname3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentlname3_error').hide();
							                		$('#studentlname3').css('border-color', '#34F458');
							                	}
							                if(bday == ''){
							                	$('#studentbirthday3_error').html('Birthday is Required');
							                	$('#studentbirthday3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentbirthday3_error').hide();
							                		$('#studentbirthday3').css('border-color', '#34F458');
							                	}
							                if(email == ''){
							                	$('#studentemail3_error').html('Email is Required')
							                	.css('color', '#F90A0A');
							                	$('#studentemail3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentemail3_error').hide();
							                		$('#studentemail3').css('border-color', '#34F458');
							                	}
							                if(studcont == ''){
							                	$('#studentcontact3_error').html('Contact is Required');
							                	$('#studentcontact3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentcontact3_error').hide();
							                		$('#studentcontact3').css('border-color', '#34F458');
							                	}
							                if(gender == ''){
							                	$('#studentgender3_error').html('Gender is Required');
							                	$('#studentgender3').css('border-color', '#F90A0A');
							                }
							                else{
							                		$('#studentgender3_error').hide();
							                		$('#studentgender3').css('border-color', '#34F458');
							                	}
							                if(religion == ''){
							                	$('#studentreligion3_error').html('Religion is Required');
							                	$('#studentreligion3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentreligion3_error').hide();
							                		$('#studentreligion3').css('border-color', '#34F458');
							                	}
							                if(address == ''){
							                	$('#studentaddress3_error').html('Address is Required');
							                	$('#studentaddress3').css('border-color', '#F90A0A');
							                }
							                else{
							                		$('#studentaddress3_error').hide();
							                		$('#studentaddress3').css('border-color', '#34F458');
							                	}
							                if(parentguard == ''){
							                	$('#studentparentguard3_error').html('Parent/Guardian is Required');
							                	$('#studentparentguard3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentparentguard3_error').hide();
							                		$('#studentparentguard3').css('border-color', '#34F458');
							                	}
							                if(pgcont == ''){
							                	$('#studentpgcontact3_error').html('P/G Contact is Required');
							                	$('#studentpgcontact3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentpgcontact3_error').hide();
							                		$('#studentpgcontact3').css('border-color', '#34F458');
							                	}
							                if(year == ''){
							                	$('#studentyear3_error').html('Year Level is Required');
							                	$('#studentyear3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentyear3_error').hide();
							                		$('#studentyear3').css('border-color', '#34F458');
							                	}
							                if(sec == ''){
							                	$('#studentsection3_error').html('Section is Required');
							                	$('#studentsection3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentsection3_error').hide();
							                		$('#studentsection3').css('border-color', '#34F458');
							                	}
							                if(status == ''){
							                	$('#studentstatus3_error').html('Status is Required');
							                	$('#studentstatus3').css('border-color', '#F90A0A');
							                	counter++;
							                }
							                else{
							                		$('#studentstatus3_error').hide();
							                		$('#studentstatus3').css('border-color', '#34F458');
							                	}

							                if(counter==0){
							                	$('#addform3').submit();
							                	$('#studenttable').DataTable().ajax.reload();
							                }
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
				   		
				  		<form method="post" id="addform" action="student_controller/studentaction">
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
											<input type="hidden" id="studentidname" name="studentidname" type="text" class="form-control" readonly="">
											<label for="studentfname" class="col-form-label formmodalfont">First Name</label>
											<input id="studentfname" name="studentfname" type="text" class="form-control" placeholder="First Name">
											<span class="text-danger" id="studentfname_error"></span>
										</div>
										<div class="col-md">
											<label for="studentmname" class="col-form-label formmodalfont">Middle Name</label>
											<input id="studentmname" name="studentmname" type="text" class="form-control" placeholder="Middle Name">
											<span class="text-danger" id="studentmname_error"></span>
										</div>
										<div class="col-md">
											<label for="studentlname" class="col-form-label formmodalfont">Last Name</label>
											<input id="studentlname" name="studentlname" type="text" class="form-control" placeholder="Last Name">
											<span class="text-danger" id="studentlname_error"></span>
										</div>
										<div class="col-md">
											<label for="studentemail" class="col-form-label formmodalfont">Email</label>
											<input id="studentemail" name="studentemail" type="text" class="form-control" placeholder="Email">
											<span id="studentemail_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentbirthday" class="col-form-label formmodalfont">Birthday (Month/Day/Year)</label>
											<input id="studentbirthday" name="studentbirthday" type="date" class="form-control" placeholder="Birthday">
											<span class="text-danger" id="studentbirthday_error"></span>
										</div>
										<div class="col-md">
											<label for="studentcontact" class="col-form-label formmodalfont">Contact</label>
											<input id="studentcontact" name="studentcontact" type="text" class="form-control" placeholder="Contact">
											<span class="text-danger" id="studentcontact_error"></span>
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
										    <span class="text-danger" id="studentgender_error"></span>
										</div>
										<div class="col-md">
											<label for="studentreligion" class="col-form-label formmodalfont">Religion</label>
											<select id ="studentreligion" name="studentreligion" class="form-control">
												<!-- <datalist id ="studentreligion"> -->
												<option value="Roman Catholic">Roman Catholic</option>
												<option value="Born Again">Born Again</option>
												<option value="Iglesia ni Cristo">Iglesia Ni Cristo</option>
												<option value="Muslim">Muslim</option>
											</select>	
											<span class="text-danger" id="studentreligion_error"></span>
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentaddress" class="col-form-label formmodalfont">Address</label>
											<input id="studentaddress" name="studentaddress" class="form-control" placeholder="Address">
											<span class="text-danger" id="studentaddress_error"></span>
										</div>
										
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentparentguard" class="col-form-label formmodalfont">Parent or Guardian</label>
											<input id="studentparentguard" name="studentparentguard" class="form-control" placeholder="Parent or Guardian">
											<span class="text-danger" id="studentparentguard_error"></span>
										</div>
										<div class="col-md">
											<label for="studentpgcontact" class="col-form-label formmodalfont">P/G Contact</label>
											<input id="studentpgcontact" name="studentpgcontact" class="form-control" placeholder="P/G Contact">
											<span class="text-danger" id="studentpgcontact_error"></span>
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
											<select id="studentstatus" name="studentstatus" class="form-control">
											    <option value="Enrolled">Enrolled</option>
											    <option value="Not Enrolled">Not Enrolled</option>
											    <option value="Inactive">Inactive</option>
											</select>
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
			<!-- End Add Modal -->
			<!-- Start Edit -->
			<div class="container-fluid">
				<div class="modal fade" id="studentmodal3" tabindex="-1" role="dialog" aria-labelledby="editstudentmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform3">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="editstudentmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-row">
										<div class="col-md">
											<label for="studentidname3" class="col-form-label formmodalfont">Student ID</label>
											<input id="studentidname3" name="studentidname3" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studentfname3" class="col-form-label formmodalfont">First Name</label>
											<input id="studentfname3" name="studentfname3" type="text" class="form-control" placeholder="Student Name">
											<span class="text-danger" id="studentfname3_error"></span>
										</div>
										<div class="col-md">
											<label for="studentmname3" class="col-form-label formmodalfont">Middle Name</label>
											<input id="studentmname3" name="studentmname3" type="text" class="form-control" placeholder="Middle Name">
										</div>
										<div class="col-md">
											<label for="studentlname3" class="col-form-label formmodalfont">Last Name</label>
											<input id="studentlname3" name="studentlname3" type="text" class="form-control" placeholder="Last Name">
										</div>
										<div class="col-md">
											<label for="studentemail3" class="col-form-label formmodalfont">Email</label>
											<input id="studentemail3" name="studentemail3" type="text" class="form-control" placeholder="Email">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentbirthday3" class="col-form-label formmodalfont">Birthday</label>
											<input id="studentbirthday3" name="studentbirthday3" type="text" class="form-control" placeholder="Birthday">
										</div>
										<div class="col-md">
											<label for="studentcontact3" class="col-form-label formmodalfont">Contact</label>
											<input id="studentcontact3" name="studentcontact3" type="text" class="form-control" placeholder="Contact">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentgender3" class="col-form-label formmodalfont">Gender</label>
											<select id="studentgender3" name="studentgender3" class="form-control">
											    <option value="Male">Male</option>
											    <option value="Female">Female</option>
										    </select>
										</div>
										<div class="col-md">
											<label for="studentreligion3" class="col-form-label formmodalfont">Religion</label>
											<select id ="studentreligion3" name="studentreligion3" class="form-control">
												<option value="Roman Catholic">Roman Catholic</option>
												<option value="Born Again">Born Again</option>
												<option value="Iglesia ni Cristo">Iglesia Ni Cristo</option>
												<option value="Muslim">Muslim</option>
											</select>	
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentaddress3" class="col-form-label formmodalfont">Address</label>
											<input id="studentaddress3" name="studentaddress3" class="form-control" placeholder="Address">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentparentguard3" class="col-form-label formmodalfont">Parent or Guardian</label>
											<input id="studentparentguard3" name="studentparentguard3" class="form-control" placeholder="Parent or Guardian">
										</div>
										<div class="col-md">
											<label for="studentpgcontact3" class="col-form-label formmodalfont">P/G Contact</label>
											<input id="studentpgcontact3" name="studentpgcontact3" class="form-control" 	placeholder="P/G Contact">
										</div>
									</div>

									<br/>

									<div class="row form-row">
										<div class="col-md">
											<label for="studentyear3" class="col-form-label formmodalfont">Year</label>
											<select id="studentyear3" name="studentyear3" class="form-control">
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
											<label for="studentsection3" class="col-form-label formmodalfont">Section</label>
											<select id="studentsection3" name="studentsection3" class="form-control">
												<option value="">---</option>
											</select>	
										</div>
										<div class="col-md">
											<label for="studentstatus3" class="col-form-label formmodalfont">Religion</label>
											<select id="studentstatus3" name="studentstatus3" class="form-control">
											    <option value="Enrolled">Enrolled</option>
											    <option value="Not Enrolled">Not Enrolled</option>
											    <option value="Inactive">Inactive</option>
											</select>
											<input type="hidden" name="edithid" id="edithid" class="form-control" value="">
											<input type="hidden" name="editID" class="form-control" id="editID">
										</div>
									</div>   
					  		</div>
							<div class="modal-footer">
								<input type="submit" name="action3" id="action3" class="btn addsubbtn2" value="Proceed">
							</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			<!-- End Edit Modal -->
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
		<!-- end modal view -->
		</div>
	</div>
</div>
<br/>

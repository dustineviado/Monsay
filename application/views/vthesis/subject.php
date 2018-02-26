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
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px; color: black;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="admin_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  
</div>
		</div>
		<div class="col-lg-10">
				<br>
				<div class="container">
					<h1 class="subjectfont">Subjects</h1>
					<script type="text/javascript">
							$(document).ready(function(){

								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();  
							           $('.modal-title').text("Add Subject");
							           $('#subjecthid').val("Add");   
							      });    

							      var dataTable = $('#lamesa234').DataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',  
							           "order":[],  
							           "ajax":{  
							                url:"<?php echo base_url() . 'subject_controller/fetch_user'; ?>",  
							                type:"POST"  
							           },  
							           "columnDefs":[  
							                {  
							                     "targets":[4],  
							                     "orderable":false,  
							                },  
							           ],  
							      });

							      $(document).on('submit', '#addform', function(event){  
							           event.preventDefault();
							           		var data = $(this).serialize();
							           			$.ajax({
							           			type: "POST",
							                    url:"<?php echo base_url() . 'subject_controller/check_subid'; ?>", 
							                    data:data,
							                    success:function(response){
							                    	console.log(response);
							                   	if(response == 'is required'){
							                   		$('#subjectid_error').html('Subject ID is required');
							                   		$('#subjectid_error').show();
							                    	$('#subjectidname').css("border-color", " #F90A0A");
							                    	 
							                   	}
							                   	else if(response == 'Subject ID already taken'){
							                   		$('#subjectid_error').html('Subject ID is already taken');
							                   		$('#subjectid_error').show();
							                   		$('#subjectidname').css("border-color", "#F90A0A");
							                   	}
							                   	else if(response == 'good ID'){

							                   		$('#subjectid_error').hide();
							                   		$('#subjectidname').css("border-color", "#34F458");
							                   	}
							      //              
							                }
							           			});
							           				$.ajax({
													type:"POST",
													url:"<?php echo base_url(). 'subject_controller/check_subjname';?>",
													data:data,
													success:function(response){
														console.log(response);

													if(response == 'Nonono'){
														$('#subjectname_error').html("Subject Name is required");
														$('#subjectname_error').show();
														$('#subjectname').css("border-color", " #F90A0A");
														
													}
													else if(response == 'good name'){
														$('#subjectname_error').hide();
														$('#subjectname').css("border-color", "#34F458");
													}
												}
										});
													$.ajax({
													type:"POST",
													url:"<?php echo base_url(). 'subject_controller/check_faculty';?>",
													data:data,
													success:function(response){
														console.log(response);

													if(response == 'Nonono'){
														$('#subjectfaculty_error').html("Subject Faculty is required");
														$('#subjectfaculty_error').show();
														$('#subjectfaculty').css("border-color", " #F90A0A");
														
													}
													else if(response == 'good faculty'){
														$('#subjectfaculty_error').hide();
														$('#subjectfaculty').css("border-color", "#34F458");
													}

												}
										});
												 $.ajax({  
							                     url:"<?php echo base_url(); ?>subject_controller/addsub",  
							                     method:"POST",  
							                     data:data,  
							                     success:function(response)  
							                     { 
							                     if(response == 'Oops!'){
							                     	
							                     }
							                     else{
							                          alert(response);
							                          $('#addform')[0].reset();
							                          $('#subjectidname').removeAttr('style'); 
							                          $('#subjectname').removeAttr('style');
							                          $('#subjectfaculty').removeAttr('style'); 
							                          $('#subjectmodal').modal('hide');
							                          $('#lamesa234').DataTable().ajax.reload();

							                     }
							                    }  
							                });  
							      });

							      $(document).on('click','.edit', function(event){
							      	   event.preventDefault();
							           var sid = $(this).attr('id');  
							           $.ajax({  
							                url:"<?php echo base_url() . 'subject_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data){ 
							                console.log(data);
							                  	 $('#addform2')[0].reset();
							                	 $('.modal-title').text("Edit Subject"); 
							                     $('#subjectmodal2').modal('show');  
							                     $('#subjectidname2').val(data.subjectidname);
							                     $('#subjectname2').val(data.subjectname);
							                     $('#subjectfaculty2').val(data.subjectfaculty);
							                     $('#subjectlevel2').val(data.subjectlevel);
							                     $('#action2').val("Update");
							      				 $('#hidid2').val("Edit");  
							               		 $('#subjectID2').val(sid);
							                     
							                }
							           });
							      $(document).on('submit','#addform2', function(event){
							      		event.preventDefault();
							      		var data = $(this).serialize();
							      		$.ajax({
							      			url:"<?php echo base_url() . 'subject_controller/editsubject'; ?>", 
							      			method:"POST",
							      			data:data,
							      			success:function(response){
							      			console.log(response);
							      			if(response == 'Oops!'){

							      			}
							      			else{
							      				alert(response);
							      				$('#addform2')[0].reset();
							      				$('#subjectname2').removeAttr('style');
							                    $('#subjectfaculty2').removeAttr('style');
							      				$('#subjectmodal2').modal('hide');
							      				$('#lamesa234').DataTable().ajax.reload();
							      				}
							      			}
							      		});
							      		$.ajax({
											type:"POST",
											url:"<?php echo base_url(). 'subject_controller/check_subjname2';?>",
											data:data,
											success:function(response){
											console.log(response);

											if(response == 'Nonono'){
											$('#subjectname_error2').html("Subject Name is required");
											$('#subjectname_error2').show();
											$('#subjectname2').css("border-color", " #F90A0A");
														
											}
											else if(response == 'good name'){
											$('#subjectname_error2').hide();
											$('#subjectname2').css("border-color", "#34F458");
											}
										}
									});
							      		$.ajax({
											type:"POST",
											url:"<?php echo base_url(). 'subject_controller/check_faculty2';?>",
											data:data,
											success:function(response){
											console.log(response);
											if(response == 'Nonono'){
											$('#subjectfaculty_error2').html("Subject Faculty is required");
											$('#subjectfaculty_error2').show();
											$('#subjectfaculty2').css("border-color", " #F90A0A");
												
											}
											else if(response == 'good faculty'){
											$('#subjectfaculty_error2').hide();
											$('#subjectfaculty2').css("border-color", "#34F458");
											}
											}
										});
							      });
							           
							    });  

							      $(document).on('click', '.delete', function(){  
							           var sid = $(this).attr("id");  
							           if(confirm("Are you sure you want to delete this?"))  
							           {  
							                $.ajax({  
							                     url:"<?php echo base_url(); ?>subject_controller/deletesubject",  
							                     method:"POST",  
							                     data:{sid:sid},  
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#lamesa234').DataTable().ajax.reload();  
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
						<button id="addmodalbtn" class="btn addsubbtn" data-toggle="modal" data-target="#subjectmodal">Add Subject</button>
					</div>
					<br>
					<div class=" table-responsive">
						<table id="lamesa234" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead class="thead-inverse">
								<tr>
									<th>Subject ID</th>
									<th>Subject Name</th>
									<th>Faculty</th>
									<th>Level</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>	
					<br>

				</div>

			<!--start of Subject Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="subjectmodal" tabindex="-1" role="dialog" aria-labelledby="addsubjectmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="addsubjectmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-group">
										<div class="col-md">
											<label for="subjectidname" class="col-form-label formmodalfont">Subject ID</label>
											<input id="subjectidname" name="subjectidname" type="text" class="form-control" placeholder="Subject ID">
											<span class="text-danger" id = "subjectid_error"></span>
										</div>
										<div class="col-md">
											<label for="subjectname" class="col-form-label formmodalfont">Subject Name</label>
											<input id="subjectname" name="subjectname" type="text" class="form-control" placeholder="Subject Name">
											<span class ="text-danger" id = "subjectname_error"></span>
										</div>
										<div class="col-md">
											<label for="subjectfaculty" class="col-form-label formmodalfont">Subject Faculty</label>
											<input id="subjectfaculty" name="subjectfaculty" type="text" class="form-control" placeholder="Subject Faculty">
											<span class ="text-danger" id = "subjectfaculty_error"></span>
										</div>
										<div class="col-md">
											<label for="subjectlevel" class="col-form-label formmodalfont">Level</label>
											<select id="subjectlevel" name="subjectlevel" class="form-control">
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
											<input type="hidden" name="subjecthid" id="subjecthid" value="">
											<input type="hidden" name="hiddenid" id="hiddenid">
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
				<!-- End of Subject Modal Add form -->
				<div class="container-fluid">
				<div class="modal fade" id="subjectmodal2" tabindex="-1" role="dialog" aria-labelledby="editsubjectmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform2">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="editsubjectmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-group">
										<div class="col-md">
											<label for="subjectidname2" class="col-form-label formmodalfont">Subject ID</label>
											<input id="subjectidname2" name="subjectidname2" type="text" class="form-control" readonly="">
											<span class="text-danger" id = "subjectid_error"></span>
										</div>
										<div class="col-md">
											<label for="subjectname2" class="col-form-label formmodalfont">Subject Name</label>
											<input id="subjectname2" name="subjectname2" type="text" class="form-control" placeholder="Subject Name">
											<span class ="text-danger" id = "subjectname_error2"></span>
										</div>
										<div class="col-md">
											<label for="subjectfaculty2" class="col-form-label formmodalfont">Subject Faculty</label>
											<input id="subjectfaculty2" name="subjectfaculty2" type="text" class="form-control" placeholder="Subject Faculty">
											<span class ="text-danger" id = "subjectfaculty_error2"></span>
										</div>
										<div class="col-md">
											<label for="subjectlevel2" class="col-form-label formmodalfont">Level</label>
											<select id="subjectlevel2" name="subjectlevel2" class="form-control">
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
 										    <input type="hidden" name="hidid2" id="hidid2" value="">
 										    <input type="hidden" name="subjectID2" id="subjectID2">
										</div>
									</div> 
					  		</div>

							<div class="modal-footer">
								<input type="submit" name="action2" id="action2" class="btn addsubbtn2" value="">
							</div>
							</form>
							</div>
						</div>
					</div>
				</div>
				<!--end of Subject Modal -->
				<script type="text/javascript">
					
				</script>		

		</div>
	</div>
</div>
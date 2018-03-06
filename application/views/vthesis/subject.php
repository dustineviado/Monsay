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
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
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
				<br>
				<div class="container">
					<h1 class="subjectfont">Subjects</h1>
					<script type="text/javascript">
							$(document).ready(function(){

								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();
							           $('#subjectidname').removeAttr('style');
							           $('#subjectid_error').hide();
							           $('#subjectname').removeAttr('style');
							           $('#subjectname_error').hide();
							           $('#subjectlevel').removeAttr('style');
							           $('#subjectlevel_error').hide();
							           $('#subjectfaculty').removeAttr('style');
							           $('#subjectfaculty_error').hide();  
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

							      $(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var subid = $('#subjectidname').val();
							           var subname = $('#subjectname').val();
							           var faculty = $('#subjectfaculty').val();
							           var level = $('#subjectlevel').val();
							           counter = 0;
							           if(subid == ''){
							           			$('#subjectid_error').html('Subject ID is required.')
							           			.css('color', '#F90A0A');
							           			$('#subjectid_error').show();
							           			$('#subjectidname').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#subjectid_error').hide();
							           			$('#subjectidname').css('border-color', '#34F458');
							           		}
							           		if(subname == ''){
							           			$('#subjectname_error').html('Subject Name is required.');
							           			$('#subjectname_error').show();
							           			$('#subjectname').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#subjectname_error').hide();
							           			$('#subjectname').css('border-color', '#34F458');
							           		}
							           		if(faculty == ''){
							           			$('#subjectfaculty_error').html('Subject Faculty is required.');
							           			$('#subjectfaculty_error').show();
							           			$('#subjectfaculty').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#subjectfaculty_error').hide();
							           			$('#subjectfaculty').css('border-color', '#34F458');
							           		}
							           		if(level == ''){
							           			$('#subjectlevel_error').html('Subject Level is required.')
							           			.css('color', '#F90A0A');
							           			$('#subjectlevel_error').show();
							           			$('#subjectlevel').css('border-color', '#F90A0A');
							           			counter++;
							           			}
							           			else{
							           			$('#subjectlevel_error').hide();
							           			$('#subjectlevel').css('border-color', '#34F458');
							           				}
							           		if(counter == 0){
							           			var data = $('#addform').serialize();
							           			var base_url = window.location;
							           				
							           				$.ajax({
							           					url: base_url + '/addsub',
							           					method: "POST",
							           					data:data,
							           					success:function(data){
							           						console.log(data);
							           						alert(data);
							           						$('#subjectmodal').modal('hide');
							           						$('#lamesa234').DataTable().ajax.reload();
							           					
							           				}
							           			});
							           		}
							      });
							      			$('#subjectidname').keyup(function(e){
							      				e.preventDefault();
							                	var subid = $('#subjectidname').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_subid',
							                		method:"POST",
							                		data:{subid:subid},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#subjectid_error').html('Subject ID is Valid' + '&nbsp;&nbsp;' +'<span class="fa fa-check"></span>')
							    					.css('color', '#34F458');
							    					$('#subjectid_error').show();
							    					$('#subjectidname').css('border-color', '#34F458');
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#subjectid_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#subjectidname').css('border-color', '#F90A0A');
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
							                  	 $('#subjectname2').removeAttr('style');
										         $('#subjectname2_error').hide();
										         $('#subjectlevel2').removeAttr('style');
										         $('#subjectlevel2_error').hide();
										         $('#subjectfaculty2').removeAttr('style');
										         $('#subjectfaculty2_error').hide();
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
							    });  
							      $(document).on('click', '#action2', function(event){  
							           event.preventDefault();
							           var subid = $('#subjectidname2').val();
							           var subname = $('#subjectname2').val();
							           var faculty = $('#subjectfaculty2').val();
							           var level = $('#subjectlevel2').val();
							           counter = 0;
							           
							           		if(subname == ''){
							           			$('#subjectname2_error').html('Subject Name is required.');
							           			$('#subjectname2_error').show();
							           			$('#subjectname2').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#subjectname2_error').hide();
							           			$('#subjectname2').css('border-color', '#34F458');
							           		}
							           		if(faculty == ''){
							           			$('#subjectfaculty2_error').html('Subject Faculty is required.');
							           			$('#subjectfaculty2_error').show();
							           			$('#subjectfaculty2').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#subjectfaculty2_error').hide();
							           			$('#subjectfaculty2').css('border-color', '#34F458');
							           		}
							           		if(level == ''){
							           			$('#subjectlevel2_error').html('Subject Level is required.')
							           			.css('color', '#F90A0A');
							           			$('#subjectlevel2_error').show();
							           			$('#subjectlevel2').css('border-color', '#F90A0A');
							           			counter++;
							           			}
							           			else{
							           			$('#subjectlevel2_error').hide();
							           			$('#subjectlevel2').css('border-color', '#34F458');
							           				}
							           		if(counter == 0){
							           			var data = $('#addform2').serialize();
							           			var base_url = window.location;
							           				
							           				$.ajax({
							           					url: base_url + '/editsubject',
							           					method: "POST",
							           					data:data,
							           					success:function(data){
							           						console.log(data);
							           						alert(data);
							           						$('#subjectmodal2').modal('hide');
							           						$('#lamesa234').DataTable().ajax.reload();
							           					
							           				}
							           			});
							           		}
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
							<thead class="tablethead">
								<tr>
									<th>Subject Code</th>
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
											<label for="subjectidname" class="col-form-label formmodalfont">Subject Code</label>
											<input id="subjectidname" name="subjectidname" type="text" class="form-control" placeholder="Subject ID">
											<span id = "subjectid_error"></span>
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
 										    <span class ="text-danger" id = "subjectlevel_error"></span>
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
											<label for="subjectidname2" class="col-form-label formmodalfont">Subject Code</label>
											<input id="subjectidname2" name="subjectidname2" type="text" class="form-control" readonly="">
											<span class="text-danger" id = "subjectid2_error"></span>
										</div>
										<div class="col-md">
											<label for="subjectname2" class="col-form-label formmodalfont">Subject Name</label>
											<input id="subjectname2" name="subjectname2" type="text" class="form-control" placeholder="Subject Name">
											<span class ="text-danger" id = "subjectname2_error"></span>
										</div>
										<div class="col-md">
											<label for="subjectfaculty2" class="col-form-label formmodalfont">Subject Faculty</label>
											<input id="subjectfaculty2" name="subjectfaculty2" type="text" class="form-control" placeholder="Subject Faculty">
											<span class ="text-danger" id = "subjectfaculty2_error"></span>
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
 										    <span class="text-danger" id="subjectlevel2_error"></span>
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
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
    width: 230px;
    background-color: #262626;
    padding-top: 30px;
    margin-top: 0px;
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
    color: yellow;
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
	
  <b><p style="font-family: 'helvetica';font-size: 20px; margin-left: 60px;">Welcome  </p></b>
  <b><p style="font-family: 'helvetica'; font-size: 20px; margin-left: 50px;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="admin_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller" style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
  <br>
  <br>
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
							                	type:"POST",
							                     url:"<?php echo base_url() . 'subject_controller/subjectaction'; ?>",  
							                     data:data, 
							                     success:function(data)  
							                     {  
							                        if(data == 'Subject Added' || data == 'Subject Updated'){  
							                          alert(data);  
							                          $('#subjectmodal').modal('hide');  
							                          $('#lamesa234').DataTable().ajax.reload();
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
							                url:"<?php echo base_url() . 'subject_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('#addform')[0].reset();
							                	 $('.modal-title').text("Edit Subject"); 
							                     $('#subjectmodal').modal('show');  
							                     $('#subjectidname').val(data.subjectidname);
							                     $('#subjectname').val(data.subjectname);
							                     $('#subjectfaculty').val(data.subjectfaculty);
							                     $('#subjectlevel').val(data.subjectlevel); 
							                     $('#subjecthid').val("Edit");
							                     $('#hiddenid').val(sid); 
							                }  
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
										</div>
										<div class="col-md">
											<label for="subjectname" class="col-form-label formmodalfont">Subject Name</label>
											<input id="subjectname" name="subjectname" type="text" class="form-control" placeholder="Subject Name">
										</div>
										<div class="col-md">
											<label for="subjectfaculty" class="col-form-label formmodalfont">Subject Faculty</label>
											<input id="subjectfaculty" name="subjectfaculty" type="text" class="form-control" placeholder="Subject Faculty">
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
				<!--end of Subject Modal -->
				<script type="text/javascript">
					
				</script>		

		</div>
	</div>
</div>
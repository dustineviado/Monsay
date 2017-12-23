<div class="container-fluid allfont">
	<div class="row">
		<div class="col-lg-1">
		</div>
		<div class="col-lg-10">
			<br>
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

							      var dataTable = $('#lamesa234').dataTable({  
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
							           var subjid = $('#subjectidname').val();  
							           var subjname = $('#subjectname').val();  
							           var subjfac = $('#subjectfaculty').val(); 
							           var subjlevel = $('#subjectlevel').val();
							           var subjhid = $('#subjecthid').val();
							           var hiddenid = $('#hiddenid').val();  
							           
							           if(subjid != '' && subjname != '' && subjfac != '' && subjlevel != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'subject_controller/subjectaction'; ?>",  
							                     data:{
							                     	id:subjid,
							                     	name:subjname,
							                     	fac:subjfac,
							                     	lvl:subjlevel,
							                     	hidden:subjhid,
							                     	hidid:hiddenid
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#subjectmodal').modal('hide');  
							                          $('#lamesa234').DataTable().ajax.reload();  
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

					<table id="lamesa234" class="table table-responsive table-striped">
						<thead class="thead-inverse">
							<tr>
								<th scope="col">Subject ID</th>
								<th scope="col">Subject Name</th>
								<th scope="col">Faculty</th>
								<th scope="col">Level</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
					</table>
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
											<input id="subjectlevel" name="subjectlevel" type="text" class="form-control" placeholder="Level">
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

		<div class="col-lg-1">
		</div>
	</div>
</div>
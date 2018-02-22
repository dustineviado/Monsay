<script type="text/javascript">
	$(document).ready(function(){
		/////////////////////////////////////////////////////////////////
		var dataTable = $('#alumnitable').DataTable({  
			"processing":true,  
			"serverSide":true,
			"scrollY": '500px',  
			"order":[],  
			 "ajax":{  
				 url:"<?php echo base_url() . 'alumni_controller/fetch_user'; ?>",  
				type:"POST"  
			},  
			"columnDefs":[  
					{  
						"targets":[2],  
						 "orderable":false,  
					},  
			],  
		});
		////////////////////////////////////////////////////////////////
		$(document).on('click','.viewgrades', function(event){
			event.preventDefault();
			$('#grades').modal('show');
			var id_num = $(this).attr("id");
			$('#viewtable table').remove();

			$.ajax({  
				url:"<?php echo base_url() . 'alumni_controller/allyear'; ?>",  
				method:"POST", 
				data:{id_num:id_num}, 
				dataType:"json",  
				success:function(data){
					var grade_data='';
					$.each(data, function(index, data){
						grade_data +='<h1 class="alumnifont">'+ data.year +' ('+ data.schoolyear +')'+'</h1>';
						grade_data += '<table id="viewtable" class="table table-striped">';
						grade_data +=	'<thead class="thead-inverse">';
						grade_data +=		'<tr>';
						grade_data +=			'<th>Subject</th>';
						grade_data +=			'<th>1st</th>';
						grade_data +=			'<th>2nd</th>';
						grade_data +=			'<th>3rd</th>';
						grade_data +=			'<th>4th</th>';
						grade_data +=		'</tr>';
						grade_data +=	'</thead>';
						grade_data +=	'<tbody>';

							$.ajax({  
								url:"<?php echo base_url() . 'alumni_controller/allsubjects'; ?>",  
								method:"POST",
								async:false,  
								data:{
									id_num:id_num,
									schoolyear:data.schoolyear
								},  
								dataType:"json",  
								success:function(data1){
									$.each(data1, function(index, data1){
										grade_data += '<tr>';
										grade_data += '<td>'+ data1.subject +'</td>';

											$.ajax({  
												url:"<?php echo base_url() . 'alumni_controller/allgrades'; ?>",  
												method:"POST",
												async:false,  
												data:{
													id_num:id_num,
													schoolyear:data.schoolyear,
													subjectid:data1.subid
												},  
												dataType:"json",  
												success:function(data2){
													$.each(data2, function(index, data2){
														grade_data += '<td>'+ data2.grade +'</td>';
													});	
												}
											});
										grade_data += '</tr>';	
									});
								}
							});
						grade_data += '</tbody>';
						grade_data += '</table>';	
					});

				$('#viewtable').html(grade_data);						
				}									
			});	
		});
		////////////////////////////////////////////////////////////////
	});	
</script>	
<br/>
<div class="container-fluid allfont">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
			</div>
			<div class="col-lg-10">
				<h1 class="studentfont">Alumni</h1>
				<br>
					<div class=" table-responsive">
						<table id="alumnitable" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead class="thead-inverse">
								<tr>
									<th>Student ID</th>
									<th>Student Name</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>	
				<br>
				<!-- //////////////////////////////////////////////////////////////////// -->
				<div class="container-fluid">
				<div class="modal fade" id="grades" tabindex="-1" role="dialog" aria-labelledby="viewgradesmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="viewgradesmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	
				      		<div class="modal-body">
				      			<div id="viewtable" class="table-responsive">

									<!-- <table id="viewtable" class="table table-striped">
										<thead class="thead-inverse">
											<tr>
												<th>Subject</th>
												<th>1st</th>
												<th>2nd</th>
												<th>3rd</th>
												<th>4th</th>
											</tr>
										</thead>
										<tbody id="gradebody">
										</tbody>
									</table> -->
								</div>		
					  		</div>
							<div class="modal-footer">
								<input type="submit" name="printgrade" id="action3" class="btn addsubbtn2" value="Print">
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
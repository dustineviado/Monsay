<script type="text/javascript">
	$(document).ready(function(){
		//////////////////////////////////////////////////////////////////////
		$.ajax({  
		url:"<?php echo base_url() . 'viewgrades_controller/gradedisplay'; ?>",  
		method:"POST",  
		dataType:"json",  
		success:function(data){
			var gra_data='';
			var i;
			for(i=0; i<data.length; i++){
			gra_data += '<tr>';
			gra_data += '<td>'+ data[i].year +'</td>';
			gra_data += '<td>'+ data[i].schoolyear +'</td>';
			gra_data += '<td><button id="'+ data[i].id_num +'" name="'+ data[i].schoolyear +'" class="btn addstubtn3 viewgrade">View</button></td>';
			gra_data += '</tr>';
			} 
			$('#bodytable').html(gra_data);
			}
		});
		//////////////////////////////////////////////////////////////////////
		$.ajax({  
		url:"<?php echo base_url() . 'viewgrades_controller/gradedisplay2'; ?>",  
		method:"POST",  
		dataType:"json",  
		success:function(data){
			var gra_data2='';
			var i;
			for(i=0; i<data.length; i++){
			gra_data2 += '<tr>';
			gra_data2 += '<td>'+ data[i].year +'</td>';
			gra_data2 += '<td><button id="'+ data[i].id_num +'" name="" class="btn addstubtn3 viewgrade2">View</button></td>';
			gra_data2 += '</tr>';
			} 
			$('#bodytable2').html(gra_data2);
			}
		});
		////////////////////////////////////////////////////////////////////////
		$(document).on('click','.viewgrade', function(event){
			event.preventDefault();
			$('#grades').modal('show');
			var id_num = $(this).attr("id");
			var schoolyear = $(this).attr("name");
			$('#viewtable tbody tr').remove();

			$.ajax({  
				url:"<?php echo base_url() . 'viewgrades_controller/modalgrades'; ?>",  
				method:"POST",
				async:false,  
				data:{
					id_num:id_num,
					schoolyear:schoolyear
				},  
				dataType:"json",  
				success:function(data){
					var grade_data='';
					$.each(data, function(index, data){
						grade_data += '<tr>';
						grade_data += '<td>'+ data.subject +'</td>';

							$.ajax({  
								url:"<?php echo base_url() . 'viewgrades_controller/checksubject'; ?>",  
								method:"POST",
								async:false,  
								data:{
									id_num:id_num,
									schoolyear:schoolyear,
									subjectid:data.subid
								},  
								dataType:"json",  
								success:function(response){
									$.each(response, function(index, response){
										grade_data += '<td>'+ response.grade +'</td>';
									});	
								}
							});
						
						grade_data += '</tr>';
					});
					$('#gradebody').html(grade_data);
					}
				});
			});

		////////////////////////////////////////////////////////////////////////
		$(document).on('click','.viewgrade2', function(event){
			event.preventDefault();
			$('#grades').modal('show');
			var id_num = $(this).attr("id");
			$('#viewtable tbody tr').remove();

			$.ajax({  
				url:"<?php echo base_url() . 'viewgrades_controller/modalgrades2'; ?>",  
				method:"POST",
				async:false,  
				data:{
					id_num:id_num
				},  
				dataType:"json",  
				success:function(data){
					var grade_data2='';
					$.each(data, function(index, data){
						grade_data2 += '<tr>';
						grade_data2 += '<td>'+ data.subject +'</td>';

							$.ajax({  
								url:"<?php echo base_url() . 'viewgrades_controller/checksubject2'; ?>",  
								method:"POST",
								async:false,  
								data:{
									id_num:id_num,
									subjectid:data.subid
								},  
								dataType:"json",  
								success:function(response){
									$.each(response, function(index, response){
										grade_data2 += '<td>'+ response.grade +'</td>';
									});	
								}
							});
						
						grade_data2 += '</tr>';
					});
					$('#gradebody').html(grade_data2);
					}
				});
			});	
		//////////////////////////////////////////////////////////////////////////	
	});
</script>
<!-- /////////////////////////////////////////////////////////////////// -->
<br/>
<div class="container-fluid allfont">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
			</div>
			<div class="col-lg-10">
				<h1 class="studentfont">Past Grades</h1>
				<br>	
				<div class="table-responsive lamesagrade">
					<table id="gradeviewtable" class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>Level</th>
								<th>School Year</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="bodytable">
						</tbody>
					</table>
				</div>
				<br>
				<h1 class="studentfont">Current Grades</h1>
				<br>	
				<div class="table-responsive lamesagrade">
					<table id="gradeviewtable" class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>Level</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="bodytable2">
						</tbody>
					</table>
				</div>
				<br>

			<!-- /////////////////////////////////////////////////////////////////// -->

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
				      			<div class="table-responsive">
									<table id="viewtable" class="table table-striped">
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
									</table>
								</div>		
					  		</div>
							<div class="modal-footer">
								<input type="submit" name="printgrade" id="action3" class="btn addsubbtn2" value="Print">
							</div>
						</div>
					</div>

				</div>
			</div>

			<!-- /////////////////////////////////////////////////////////////////// -->
			</div>
		</div>
	</div>	
</div>
<br/>			
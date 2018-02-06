<script type="text/javascript">
	$(document).ready(function(){

		var sids = '321';  
		$.ajax({  
		url:"<?php echo base_url() . 'grading_controller/displaysection'; ?>",  
		method:"POST",  
		data:{sid:sids},  
		dataType:"json",  
		success:function(data){
			var sec_data='';
			var i;
			for(i=0; i<data.length; i++){
			sec_data += '<tr>';
			sec_data += '<td>'+ data[i].secid +'</td>';
			sec_data += '<td>'+ data[i].section_name +'</td>';
			sec_data += '<td>'+ data[i].year_level +'</td>';
			sec_data += '<td>'+ data[i].subject +'</td>';
			sec_data += '<td><button id="'+ data[i].secid +'" name="'+ data[i].subid +'" class="btn addstubtn3 gradeit">Grade</button></td>';
			sec_data += '</tr>';
			} 
			$('#tablesec').html(sec_data);
			}  
		});

		$(document).on('click','.gradeit', function(event){
			event.preventDefault();  
			var sid = $(this).attr("id");
			var sid2 = $(this).attr("name");
			//$('#gradebody').remove();  
			$.ajax({  
				url:"<?php echo base_url() . 'grading_controller/gettingstudents'; ?>",  
				method:"POST",  
				data:{sid:sid},  
				dataType:"json",  
				success:function(data){  	
					$('.modal-title').text("Grade Students"); 
					$('#grademodal').modal('show');
					var stu_data= '';
					var i;
					for(i=0; i<data.length; i++){
						stu_data +="<div class='row form-row'>";	
						stu_data +="<div class='col-md'>";
						stu_data +="<label for='#idnum' class='col-form-label formmodalfont'>Student ID</label>"
						stu_data +="<input id='idnum' name='idnum' type='text' class='form-control idnum' value='"+ data[i].id_num +"' readonly=''>";
						stu_data +="</div>";
						stu_data +="<div class='col-md'>";
						stu_data +="<label for='#namestud' class='col-form-label formmodalfont'>Student Name</label>"
						stu_data +="<input id='namestud' name='namestud' type='text' class='form-control namestud' value='"+ data[i].fname + data[i].mname + data[i].lname +"' readonly=''>";
						stu_data +="</div>";
						stu_data +="<div class='col-md'>";
						stu_data +="<label for='#subidnum' class='col-form-label formmodalfont'>Student ID</label>"
						stu_data +="<input id='subidnum' name='subidnum' type='text' class='form-control subidnum' value='"+ sid2 +"' readonly=''>";
						stu_data +="</div>";
						stu_data +="<div class='col-md'>";
						stu_data +="<label for='#grade' class='col-form-label formmodalfont'>Grade</label>"
						stu_data +="<input id='grade' name='grade' type='text' class='form-control grade'>";
						stu_data +="</div>";
						stu_data +="</div>";
						} 
						$('#gradebody').html(stu_data);
				}  
			});  
		});

		$(document).on('click', '#action', function(event){  
			event.preventDefault();    
			var idnum = [];
			var subidnum = [];
			var grade = [];
			var selquarter = $('.selquarter').val();

			$('.idnum').each(function(){
				idnum.push($(this).val());
			});
			$('.subidnum').each(function(){
				subidnum.push($(this).val());
			});
			$('.grade').each(function(){
				grade.push($(this).val());
			});	

			if(idnum != '' && subidnum != '' && grade != '' && selquarter != ''){  
			$.ajax({  
				type:"POST",
				url:"<?php echo base_url() . 'grading_controller/gradeaction'; ?>",  
				 data:{
						id:idnum,
						subid:subidnum,
						grade:grade,
						quarter:selquarter,
						}, 
						success:function(data){  
							alert(data);  
							    $('#grademodal').modal('hide');  
						}  
				});  
			}  
						else  
						{  
							alert("All Fields are Required"); 
						}  
		});

	});							
</script>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-lg-1">
		</div>
		<div class="col-lg-10">
			<div class="container">
				<h1 class="studentfont">Grading</h1>
				</br>
				</br>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead class="thead-inverse">
								<tr>
									<th>Section ID</th>
									<th>Section Name</th>
									<th>Year</th>
									<th>Subject</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tablesec">
							</tbody>
						</table>
					</div>
			</div>
			</br>

			<!--start of add Schedule ID -->
			<div class="container-fluid">
				<div class="modal fade" id="grademodal" tabindex="-1" role="dialog" aria-labelledby="gradingmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
								<div>
				        			<h1 class="modal-title" id="gradingmodal"><b></b></h1>
				        			<br>
					        			<div class="form-row">
					        				<label for="selquarter" class="col-form-label formmodalfont">Quarter</label>
					        				<div class="col-5">
								        		<select id="selquarter" name="selquarter" class="form-control selquarter">
									        		<option value="1">1st</option>
									        		<option value="2">2nd</option>
									        		<option value="3">3rd</option>
									        		<option value="4">4th</option>
								        		</select>
								        	</div>	
							        	</div>		
				        		</div>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body" id="gradebody">
				      												<div class='col-md'>
											<label for="idnum" class="col-form-label formmodalfont">Student ID</label>
										</div>
										<div class='col-md'>
											<label for="namestud" class="col-form-label formmodalfont">Student Name</label>
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
			<!--start of add Schedule ID -->
		</div>
		<div class="col-lg-1">
		</div>
	</div>
</div>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-lg-1">
		</div>
		<div class="col-lg-10">
			<br>
				<br>
				<br>
				<div class="container">
					<h1 class="subjectfont">Subjects</h1>
					<form class="form-row">
					<select class="form-control col-auto selectmargin" name="selsub" id="pangalan">
							<option value="all">All Levels</option>
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
						<script type="text/javascript">
	   						document.getElementById('pangalan').value = "<?php echo $_GET['selsub'];?>";

	   						/* $(function(){
	   							showallsubjects();

	   							function showallsubjects(){
	   								$.ajax({
	   									type:'ajax',
	   									url: '<?php echo base_url()?> subject_controller/subjectsubject',
	   									async: false,
	   									dataType:'json',
	   									success:function(data){
	   										var html= '' ;
	   										var i;
	   										for(i=0; i<data.length; i++){
	   											html +='<tr>'+
													'<td>'+ data[i].subid +'</td>'+
													'<td>'+ data[i].subject +'</td>'+
													'<td>'+ data[i].faculty +'</td>'+
													'<td>'+ data[i].year_level +'</td>'+
													'<td>'+

													 '<a href="<?php echo base_url()."subject_controller/deletesubject?id=".$sub['subid'];?>"  onclick="return confirm('Are you sure to delete this subject?')"  class="btn addsubbtn3">Delete</a>'+

													'<a href="#editmodal<?php echo $sub2 = $sub['subid']; ?>" id="editmodalbtn" class="btn addsubbtn3" data-toggle="modal" data-target="#editmodal">Edit</a>'+

													'</td>'+
												'</tr>';
	   										}
	   										$('#subjected').html(html);
	   									},
	   									error: function(){
	   										alert('Error');
	   									}
	   								});
	   							}
	   						}); */	

						</script>
					&nbsp &nbsp
					<input type="text" class="form-control col-auto" placeholder="Search...">
					<button class="input-group-addon btn searchbtn"> <span class="fa fa-search searchfont"></span> </button>
				</form>	
				<br>
				<br>

					<div>
						<button id="addmodalbtn" class="btn addsubbtn" data-toggle="modal" data-target="#addmodal">Add Subject</button>
					</div>

					<table class="table table-responsive table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>Subject ID</th>
								<th>Subject Name</th>
								<th>Faculty</th>
								<th>Level</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if($subjects != null): ?>
							<?php foreach($subjects as $sub): ?>
								<tr>
									<td> <?php echo $sub['subid'] ?> </td>
									<td> <?php echo $sub['subject'] ?> </td>
									<td> <?php echo $sub['faculty'] ?> </td>
									<td> <?php echo $sub['year_level'] ?> </td>
									<td>
										<a href=" <?php echo base_url()."subject_controller/deletesubject>id=".$sub['subid']; ?>" onclick="return confirm('Are you sure to delete this subject?')" class="btn addsubbtn3"> Delete </a>

										<a href="#editmodal <?php echo $sub2 = $sub['subid'];?>" id="editmodalbtn" class="btn addsubbtn3" data-toggle="modal" data-target="#editmodal"> Edit </a>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php else: echo 'Error' ?>
							<?php print_r($subjects); ?>
							<?php endif; ?>
						</tbody>
					</table>
				
				</div>

				<!--start of Add Subject Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addsubjectmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		<div class="modal-content">


				     		<div class="modal-header">
				        		<h1 class="modal-title" id="addsubjectmodal"><b>Add Subject</b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>

				      		<div class="modal-body">
				      			<?=form_open('subject_controller/subjectadd')?>
									<div class="row form-group">
										<div class="col-md">
											<label for="subjid" class="col-form-label formmodalfont">Subject ID</label>
											<input id="subjid" name="subjectidname" type="text" class="form-control" placeholder="Subject ID">
										</div>
										<div class="col-md">
											<label for="subjname" class="col-form-label formmodalfont">Subject Name</label>
											<input id="subjname" name="subjectname" type="text" class="form-control" placeholder="Subject Name">
										</div>
										<div class="col-md">
											<label for="subjfac" class="col-form-label formmodalfont">Subject Faculty</label>
											<input id="subjfac" name="subjectfaculty" type="text" class="form-control" placeholder="Subject Faculty">
										</div>
										<div class="col-md">
											<label for="subjlevel" class="col-form-label formmodalfont">Level</label>
											<input id="subjlevel" name="subjectlevel" type="text" class="form-control" placeholder="Level">
										</div>
									</div> 
					  		</div>

							<div class="modal-footer">
							    <button type="submit" class="btn addsubbtn2">Add Subject</button>
							</div>
								</form>
						</div>
					</div>
				</div>
				<!--end of Add Subject Modal -->


				<!--start of Edit Subject Modal -->
				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editsubjectmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		<div class="modal-content">


				     		<div class="modal-header">
				        		<h1 class="modal-title" id="editsubjectmodal"><b>Edit Subject</b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>

				      		<div class="modal-body">
				      			<?=form_open('/')?>
									<div class="row form-group">
										<div class="col-md">
											<label for="subjidedit" class="col-form-label formmodalfont">Subject ID</label>
											<input id="subjidedit" name="subjectidnameedit" type="text" class="form-control" value="<?php echo $sub2; ?>">
										</div>
										<div class="col-md">
											<label for="subjnameedit" class="col-form-label formmodalfont">Subject Name</label>
											<input id="subjnameedit" name="subjectnameedit" type="text" class="form-control" placeholder="Subject Name">
										</div>
										<div class="col-md">
											<label for="subjfacedit" class="col-form-label formmodalfont">Subject Faculty</label>
											<input id="subjfacedit" name="subjectfacultyedit" type="text" class="form-control" placeholder="Subject Faculty">
										</div>
										<div class="col-md">
											<label for="subjleveledit" class="col-form-label formmodalfont">Level</label>
											<input id="subjleveledit" name="subjectleveledit" type="text" class="form-control" placeholder="Level">
										</div>
									</div> 
					  		</div>

							<div class="modal-footer">
							    <button type="submit" class="btn addsubbtn2">Edit Subject</button>
							</div>
								</form>
						</div>
					</div>
				</div>	
			</div>
				<!--end of Edit Subject Modal -->		

		</div>

		<div class="col-lg-1">
		</div>
	</div>
</div>
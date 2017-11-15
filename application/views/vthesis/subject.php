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
						<?php if ($subjects != null): ?>
						<?php foreach($subjects as $sub): ?>
							<tr>
								<td><?php echo $sub['subid']; ?></td>
								<td><?php echo $sub['subject']; ?></td>
								<td><?php echo $sub['faculty']; ?></td>
								<td><?php echo $sub['year_level']; ?></td>
								<td>Delete | Edit</td>
							</tr>
						</tbody>
						<?php endforeach; ?>
						<?php else: echo 'Denied' ?>
						<?php print_r($subjects) ?>
						<?php endif; ?>
					</table>
				
				</div>

				<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="subjectmodal" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title" id="subjectmodal"><b>Add Subject</b></h1>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form>
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
				       <button type="button" class="btn addsubbtn2">Add Subject</button>
				      </div>
				    </div>
				  </div>
				</div>

						<!-- <h1><b>Add Subject<b></h1>
							<br>
							 <form>
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

								<div>
									<button class="btn addsubbtn2">Add Subject</button>
								</div> -->

		</div>

		<div class="col-lg-1">
		</div>
	</div>
</div>
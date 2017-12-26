<br/>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-md">
		</div>

		<div class="col-md-11">
			<div class="container">
				<h1 class="schedulefont">Schedule</h1>	
				<br/>

				<!--start of schedule table-->
				<form>
					<div class="container">
						<div class="row form-row">
							<div class="col-md">
								<label for="scheduleid" class="col-form-label formmodalfont">Schedule ID</label>
									<input id="scheduleid" name="scheduleid" type="text" class="form-control" placeholder="Schedule ID">
							</div>
							<div class="col-md">
								<label for="schedulesection" class="col-form-label formmodalfont">Section</label>
									<select id="schedulesection" name="schedulesection" type="text" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
							<div class="col-md">
								<label for="scheduleyear" class="col-form-label formmodalfont">Year</label>
									<select id="scheduleyear" name="scheduleyear" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
						</div>

						<br/>
						<br/>
						<br/>

						<table class="table table-responsive table-striped">	
							<thead class="thead-inverse">	
								<tr>
									<th>Subject</th>
									<th>Teacher</th>
									<th>Day</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
									<td>4</td>
								</tr>
							</tbody>
						</table>
					</div>
				<form>
				<!--end of schedule table-->

				<br/>

				<!--start of insert form-->
				<form>
					<div class="container">
						<div class="row form-row">
							<div class="col-md">
								<label for="schedulesubject" class="col-form-label formmodalfont">Subject</label>
									<select id="schedulesubject" name="schedulesubject" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
							<div class="col-md">
								<label for="scheduleteacher" class="col-form-label formmodalfont">Teacher</label>
									<select id="scheduleteacher" name="scheduleteacher" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
							<div class="col-md">
								<label for="scheduleday" class="col-form-label formmodalfont">Day</label>
									<select id="scheduleday" name="scheduleday" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
							<div class="col-md">
								<label for="scheduletime" class="col-form-label formmodalfont">Time</label>
									<select id="scheduletime" name="scheduletime" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
						</div>
						<br/>
						<div class="row form-row">
								<input type="submit" name="" id="a" class="btn insertbutton" value="Insert">
						</div>
					</div>
				</form>
				<!--end of insert form-->
			</div>
		</div>

		<div class="col-md">
			
		</div>
	</div>
</div>
<br/>
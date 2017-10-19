<body>
	<br/>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
				<p class="regform">
				Registration Form
				</p>
				</div>
				<div class="col-md-1">
				</div>
			</div>
		

		<!--start of register body-->
			<div class="row">
			  <div class="col-md-1">
			  </div>
			  <div class="col-md-10 regbord">
				  <div class="container">
					
					<?=form_open('register_page_controller/reg')?>
						<div class="row form-group">
							<div class="col-md">
								<label for="lastname" class="col-form-label">Name</label>
								<input id="lastname" name="name1" type="text" class="form-control" placeholder="Last name">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="mail" class="col-form-label">Email</label>
								<input id="mail" name="email1" type="email" class="form-control" placeholder="Email">
							</div>
							<div class="col-md">
								<label for="contact" class="col-form-label">Contact</label>
								<input id="contact" name="contact1" type="text" class="form-control" placeholder="Contact">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-5">
								<label for="birthdate" class="col-form-label">Date of Birth</label>
								<input id="birthdate" name="date1" type="date" min="2017-10-15" class="form-control">
							</div>
							<div class="col-md">
								<label for="age" class="col-form-label">Age</label>
								<input id="age" name="age1" type="number" min="1" max="100" class="form-control" placeholder="Age">
							</div>
							<div class="col-md">
								<label for="sex" class="col-form-label">Sex</label>
								<select id="sex" name="sex1" class="form-control">
								<option>Male</option>
								<option>Female</option>
								</select>
							</div>
							<div class="col-md">
								<label for="religion" class="col-form-label">Religion</label>
								<select id="religion" name="religion1" class="form-control">
								<option>Roman Catholic</option>
								<option>INC</option>
								<option>Christian</option>
								<option>Born Again</option>
								<option>Dating Daan</option>
								<option>Others</option>
								</select>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="address" class="col-form-label">Address</label>
								<input id="address" name="address1" type="text" class="form-control" placeholder="Address">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="mlastname" class="col-form-label">Name of Mother</label>
								<small id="motherhelp" class="form-text text-muted">If you dont have a mother leave it blank.</small>
								<input id="mlastname" name="mname1"type="text" class="form-control" placeholder="Last name">
							</div>

						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="flastname" class="col-form-label">Name of Father</label>
								<small id="fatherhelp" class="form-text text-muted">If you dont have a father leave it blank.</small>
								<input id="flastname" name="fname1"type="text" class="form-control" placeholder="Last name">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="glastname" class="col-form-label">Name of Guardian</label>
								<small id="guardianhelp" name="gname1" class="form-text text-muted">If you dont have a mother nor a father.</small>
								<input id="glastname" type="text" class="form-control" placeholder="Last name">
							</div>

						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="pgcontact" class="col-form-label">Contact of Parent/Guardian</label>
								<input id="pgcontact" name="pcontact1" type="tel" class="form-control" placeholder="Contact">
							</div>
						</div>
						<div class="divsubbtncontainer">
						<button type="submit" class="btn subbtn">Proceed</button>
						</div>
					</form>
					<br/>
				  </div>
			  </div>
			  <div class="col-md-1">
			  </div>
			  </div>
			 <!--end of register body-->
			
		</div>
	<br/>
</body>
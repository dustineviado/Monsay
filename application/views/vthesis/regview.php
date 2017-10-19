<body>
	<br/>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-9">
				<p class="regform">
				Registration Form
				</p>
				</div>
				<div class="col-md-2">
					<a href="Upd_ctr">View Students</a>
				</div>
			</div>
		

		<!--start of register body-->
		
			<div class="row">
			  <div class="col-md-1">
			  </div>
			  <div class="col-md-10 regbord">
				  <div class="container">
					<?=form_open('controlreg/add')?>
					<form>
						<div class="row form-group">
							<div class="col-md">
								<label for="id_num" class="col-form-label">ID Number</label>
								<input id="id_num" name ="idnum" type="text" class="form-control" placeholder="ID number">
							</div>
							<div class="col-md">
								<label for="lastname" class="col-form-label">Name</label>
								<input id="lastname" name="lname" type="text" class="form-control" placeholder="Last name">
							</div>
							<div class="col-md">
								<label for="firstname" class="col-form-label">&nbsp;</label>
								<input id="firstname" name="fname" type="text" class="form-control" placeholder="First name">
							</div>
							<div class="col-md">
								<label for="middlename" class="col-form-label">&nbsp;</label>
								<input id="maiddlename" type="text" class="form-control" placeholder="Middle name">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="mail" class="col-form-label">Email</label>
								<input id="mail" name="email" type="email" class="form-control" placeholder="Email">
							</div>
							<div class="col-md">
								<label for="contact" class="col-form-label">Contact</label>
								<input id="contact" name="contact" type="text" class="form-control" placeholder="Contact">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-5">
								<label for="birthdate" class="col-form-label">Date of Birth</label>
								<input id="birthdate" name="birthday" type="date" class="form-control">
							</div>
							<div class="col-md">
								<label for="age" class="col-form-label">Age</label>
								<input id="age" name="age" type="number" min="1" max="100" class="form-control" placeholder="Age">
							</div>
							<div class="col-md">
								<label for="sex" class="col-form-label">Sex</label>
								<select id="sex" name="sex" class="form-control">
								<option>Male</option>
								<option>Female</option>
								</select>
							</div>
							
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="address" class="col-form-label">Address</label>
								<input id="address" name="address" type="text" class="form-control" placeholder="Address">
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
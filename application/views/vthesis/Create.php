
 <body>
	<br/>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-9">
				<p class="regform">
				Enroll Student
				</p>
				</div>

			</div>
		

		<!--start of register body-->
		
			<div class="row">
			  <div class="col-md-1">
			  </div>
			  <div class="col-md-10 regbord">
				  <div class="container">
					<?=form_open('Adminctrl/save')?>
								<form>
						<div class="row form-group">
							<div class="col-md">
								<label for="fname" class="col-form-label">Name</label>
								<?php echo form_input(['name'=>'fname','placeholder'=>'Your Name', 'class'=>'form-control']);?>
								<?php echo form_error('fname','<div class="text-danger">','</div>'); ?>
								
							</div>
						
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="mail" class="col-form-label">Email</label>
								<?php echo form_input(['name'=>'email','placeholder'=>'Email', 'class'=>'form-control']);?>
								<?php echo form_error('email','<div class="text-danger">','</div>'); ?>
							</div>
							<div class="col-md">
								<label for="contact" class="col-form-label">Contact</label>
								<?php echo form_input(['name'=>'contact','placeholder'=>'Contact', 'class'=>'form-control']);?>
								<?php echo form_error('contact','<div class="text-danger">','</div>'); ?>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-5">
								<label for="birthdate" class="col-form-label">Date of Birth</label>
								<?php echo form_input(['name'=>'birthday','placeholder'=>'Date of Birth', 'class'=>'form-control']);?>
								<?php echo form_error('birthday','<div class="text-danger">','</div>'); ?>
							</div>
							<div class="col-md">
								<label for="age" class="col-form-label">Age</label>
								<?php echo form_input(['name'=>'age','placeholder'=>'Age', 'class'=>'form-control']);?>
								<?php echo form_error('age','<div class="text-danger">','</div>'); ?>
							</div>
							<div class="col-md">
								<label for="gender" class="col-form-label">Sex</label>
								<?php echo form_input(['name'=>'gender','placeholder'=>'Sex', 'class'=>'form-control']);?>
								<?php echo form_error('gender','<div class="text-danger">','</div>'); ?>
							</div>
							
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="address" class="col-form-label">Address</label>
								<?php echo form_input(['name'=>'address','placeholder'=>'Adress', 'class'=>'form-control']);?>
								<?php echo form_error('address','<div class="text-danger">','</div>'); ?>
							</div>
						</div>
						<br />
						 <div class="form-group">
						      <div class="col-lg-10 col-lg-offset-2">
						        <button type="submit" class="btn subbtn">Submit</button>
						        <?php echo anchor('Adminctrl','Cancel',['class'=>'btn btn-danger']);?>

						      </div>
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

 <body>
	<br/>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-9">
				<p class="regform">
				Update Student
				</p>
				</div>

			</div>
		

		<!--start of register body-->
		
			<div class="row">
			  <div class="col-md-1">
			  </div>
			  <div class="col-md-10 regbord">
				  <div class="container">
					<?=form_open("Adminctrl/change/{$post->id_num}");?>
					<form>
						<div class="row form-group">
							<div class="col-md">
								<label for="fname" class="col-form-label">Name</label>
								<?php echo form_input(['name'=>'fname','placeholder'=>'Your Name', 'class'=>'form-control', 'value'=>set_value('fname',$post->fname)]);?>

								
							</div>
						
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="mail" class="col-form-label">Email</label>
								<?php echo form_input(['name'=>'email','placeholder'=>'Email', 'class'=>'form-control', 'value'=>set_value('email',$post->email)]);?>
							</div>
							<div class="col-md">
								<label for="contact" class="col-form-label">Contact</label>
								<?php echo form_input(['name'=>'contact','placeholder'=>'Contact', 'class'=>'form-control', 'value'=>set_value('contact',$post->contact)]);?>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-5">
								<label for="birthdate" class="col-form-label">Date of Birth</label>
								<?php echo form_input(['name'=>'birthday','placeholder'=>'Date of Birth', 'class'=>'form-control', 'value'=>set_value('birthday',$post->birthday)]);?>
							</div>
							<div class="col-md">
								<label for="age" class="col-form-label">Age</label>
								<?php echo form_input(['name'=>'age','placeholder'=>'Age', 'class'=>'form-control', 'value'=>set_value('age',$post->age)]);?>
							</div>
							<div class="col-md">
								<label for="gender" class="col-form-label">Sex</label>
								<?php echo form_input(['name'=>'gender','placeholder'=>'Sex', 'class'=>'form-control', 'value'=>set_value('gender',$post->gender)]);?>
							</div>
							
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="address" class="col-form-label">Address</label>
								<?php echo form_input(['name'=>'address','placeholder'=>'Adress', 'class'=>'form-control', 'value'=>set_value('address',$post->address)]);?>
							</div>
						</div>
						<br />
						 <div class="form-group">
						      <div class="col-lg-10 col-lg-offset-2">
						        <button type="submit" class="btn subbtn">Update</button>
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
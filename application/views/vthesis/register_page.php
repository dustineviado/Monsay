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
				  	<div id="the-message"></div>
					
					<?php echo form_open("register_page_controller/save", array("id" => "form-baby", "class" => "form-horizontal")) ?>
						<div class="row form-group">
							<div class="col-md">
								<label for="fullname" class="col-form-label">Name</label>
								<input id="fullname" name="fullname" value="<?php echo set_value('fullname');?>" type="text" class="form-control">
								<?php echo form_error('fullname','<div class="text-danger">','</div>');?>
								
							</div>
						
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="studemail" class="col-form-label">Email</label>
								<input id="studemail" name="studemail" value="<?php echo set_value('studemail');?>" type="text" class="form-control">
								<span id="email_result"></span>
								<?php echo form_error('studemail','<div class="text-danger">','</div>');?>
								
							</div>
							<div class="col-md">
								<label for="studcontact" class="col-form-label">Contact</label>
								<input id="studcontact" name="studcontact" value="<?php echo set_value('studcontact');?>" type="text" class="form-control">
								<?php echo form_error('studcontact','<div class="text-danger">','</div>');?>
							</div>
							<div class="col-md-5">
								<label for="studreligion" class="col-form-label formmodalfont">Religion</label>
								<input list ="studreligion" name="studreligion" value="<?php echo set_value('studreligion');?>" class="form-control">
								<datalist id ="studreligion">
									<option value="Roman Catholic">Roman Catholic</option>
									<option value="Born Again">Born Again</option>
									<option value="Iglesia ni Cristo">Iglesia Ni Cristo</option>
									<option value="Muslim">Muslim</option>
								</datalist>
								<?php echo form_error('studreligion','<div class="text-danger">','</div>');?>
							</div>
						</div>

						
						<div class="row form-group">
							<div class="col-md-5">
								<label for="studbirthday" class="col-form-label">Date of Birth</label>
								<input id="studbirthday" name="studbirthday" value="<?php echo set_value('studbirthday');?>" type="date" class="form-control">
								<?php echo form_error('studbirthday','<div class="text-danger">','</div>');?>
							</div>
							<div class="col-md">
								<label for="studgender" class="col-form-label formmodalfont">Sex</label>
								<select id="studgender" value="<?php echo set_value('studgender');?>" name="studgender" class="form-control" placeholder="Sex">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								<?php echo form_error('studgender','<div class="text-danger">','</div>');?>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="studaddress" class="col-form-label">Address</label>
								<input id="studaddress" name="studaddress" value="<?php echo set_value('studaddress');?>" type="text" class="form-control">
								<?php echo form_error('studaddress','<div class="text-danger">','</div>');?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md">
								<label for="studparent_guard" class="col-form-label">Parent/Guardian Name</label>
								<input id="studparent_guard" name="studparent_guard" value="<?php echo set_value('studparent_guard');?>" type="text" class="form-control">
								<?php echo form_error('studparent_guard','<div class="text-danger">','</div>');?>
							</div>
							<div class="col-md">
								<label for="studpgcontact" class="col-form-label">Parent/Guardian Contact</label>
								<input id="studpgcontact" name="studpgcontact" value="<?php echo set_value('studpgcontact');?>" type="text" class="form-control">
								<?php echo form_error('studpgcontact','<div class="text-danger">','</div>');?>
							</div>
						</div>
						<br />
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn subbtn">Proceed</button>
								<?php echo anchor('main_body_controller','Cancel',['class'=>'btn btn-danger']);?>
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


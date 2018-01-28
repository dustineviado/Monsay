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
				  <br />
				  	<div id="the-message" align="center"></div>
					
					<?php echo form_open("register_page_controller/save", array("id" => "form-baby", "class" => "form-horizontal")) ?>
						<div class="row form-group">
							<div class="col-md">
								<label for="fullname" class="col-form-label">Name</label>
								<input id="fullname" name="fullname" value="<?php echo set_value('fullname');?>" type="text" class="form-control">

							</div>
						
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="studemail" class="col-form-label">Email</label>
								<input id="studemail" name="studemail" value="<?php echo set_value('studemail');?>" type="text" class="form-control">
								<span id="email_result"></span>
								
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md">
								<label for="studcontact" class="col-form-label">Contact</label>
								<input id="studcontact" name="studcontact" value="<?php echo set_value('studcontact');?>" type="text" class="form-control">
								
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-5">
								<label for="studreligion" class="col-form-label formmodalfont">Religion</label>
								<input list ="studreligion" name="studreligion" value="<?php echo set_value('studreligion');?>" class="form-control">
								<datalist id ="studreligion">
									<option value="Roman Catholic">Roman Catholic</option>
									<option value="Born Again">Born Again</option>
									<option value="Iglesia ni Cristo">Iglesia Ni Cristo</option>
									<option value="Muslim">Muslim</option>
								</datalist>	
							</div>
						</div>
						<div class="row form-group">
						<div class="col-md">
								<label for="studgender" class="col-form-label formmodalfont">Sex</label>
								<select id="studgender" value="<?php echo set_value('studgender');?>" name="studgender" class="form-control" placeholder="Sex">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>			
							</div>
							<div class="col-md-5">
								<label for="studbirthday" class="col-form-label">Date of Birth</label>
								<input id="studbirthday" name="studbirthday" value="<?php echo set_value('studbirthday');?>" type="date" class="form-control">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md">
								<label for="studaddress" class="col-form-label">Address</label>
								<input id="studaddress" name="studaddress" value="<?php echo set_value('studaddress');?>" type="text" class="form-control">
								
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md">
								<label for="studparent_guard" class="col-form-label">Parent/Guardian Name</label>
								<input id="studparent_guard" name="studparent_guard" value="<?php echo set_value('studparent_guard');?>" type="text" class="form-control">
								
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md">
								<label for="studpgcontact" class="col-form-label">Parent/Guardian Contact</label>
								<input id="studpgcontact" name="studpgcontact" value="<?php echo set_value('studpgcontact');?>" type="text" class="form-control">
								
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
<script>
	$('#form-baby').submit(function(e){
		e.preventDefault();
		var me = $(this);
		// ajax
		$.ajax({
			url: me.attr('action'),
			type: "POST",
			data: me.serialize(),
			dataType: 'json',
			success: function(response){
				if(response.success == true){
					// alert('success');
					$('#the-message').append('<div class="alert alert-success">' + 
						'<span class="fa fa-check"></span>' 
						+ ' You have Successfully Registered!' + '</div>' );
					$('.form-group').removeClass('has-error')
									.removeClass('has-success');
					$('.text-danger').remove();
					me[0].reset();
					$('.alert-success').delay(500).show(10, function() {
						$(this).delay(3000).hide(10, function() {
							$(this).remove();
						});
					})
				}
				else{
					$.each(response.messages, function(key, value){
						var element = $('#' + key);
						
						element.closest('.form-group')
						.addClass(value.length > 0 ? 'has-error' : 'has-success')
						.find('.text-danger').remove();
						element.after(value);
					});
				}
			}

		});	
	});	
</script>

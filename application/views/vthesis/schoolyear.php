<script type="text/javascript">
	$(document).ready(function(){	
		$('#endnow').click(function(){  
			$('#endform')[0].reset();  
			$('#endmodal').modal('show');   
		});

		$(document).on('click', '#action', function(event){  
			event.preventDefault();
			var sid = $('#schoolyear').val();  
			if(sid != '')  
			{  
				$.ajax({  
					type:"POST",
					url:"<?php echo base_url() . 'schoolyear_controller/endschoolyear'; ?>",  
					data:{sid:sid}, 
						success:function(data)  
						{  
							alert(data);  
							$('#endmodal').modal('hide');
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
		<div class="col-lg-2">
		</div>
		<div class="col-lg-10">
			<br>
			<div class="container">
				<h1 class="subjectfont">School Year</h1>
				<button id="endnow" class="btn addsubbtnend">End School Year</button>

			<div class="container-fluid">
				<div class="modal fade" id="endmodal" tabindex="-1" role="dialog" aria-labelledby="endingmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				  		<form method="post" id="endform">
					   		<div class="modal-content">
									<div class="modal-header">
										<div>
							        		<h1 class="modal-title" id="endingmodal"><b>End School Year</b></h1>
							      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							         			<span aria-hidden="true">&times;</span>
							        		</button>
							      		</div>
							      	</div>	

						      		<div class="modal-body">
						      			<div class="col-md">
											<label for="schoolyear" class="col-form-label formmodalfont">Subject ID</label>
											<input id="schoolyear" name="" type="text" class="form-control" placeholder="School Year">
										</div>
							  		</div>

									<div class="modal-footer">
										<input type="submit" name="action" id="action" class="btn addsubbtn2" value="Proceed">
									</div>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>	
		</div>	
	</div>			
</div>
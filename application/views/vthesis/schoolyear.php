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
					<style>
body {
    font-family: "helvetica", sans-serif;
}
.sidenav {
    height: 100%;
    width: 100%;

    background-color: white;
    padding-top: 30px;
    margin: 0 auto;
} 
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    transition: 0.5s;
}
.sidenav a:hover {
    color: black;
    background-color: #00ffaa;
    transition: .7;

}

#main {
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.shtycss{
  background-color: #ff9999;
}
</style>


<div id="sidebar" class="sidenav text-muted">
  
  <b><p class="text-center" style="font-family: 'helvetica';font-size: 30px; color: black; ">Welcome  </p></b>
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px; color: black;"><?php echo $this->session->userdata('login_session');?></p></b>
  <br>
  <br>
  <a href="admin_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
  <a href="alumni_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
  <a href="schoolyear_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>

  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
		</div>
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
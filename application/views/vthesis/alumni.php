<?php  
if(! $_SESSION){
redirect('login_controller/login_view');
}?>


<script type="text/javascript">
	$(document).ready(function(){
		/////////////////////////////////////////////////////////////////
		var dataTable = $('#alumnitable').DataTable({  
			"processing":true,  
			"serverSide":true,
			"scrollY": '500px',  
			"order":[],  
			 "ajax":{  
				 url:"<?php echo base_url() . 'alumni_controller/fetch_user'; ?>",  
				type:"POST"  
			},  
			"columnDefs":[  
					{  
						"targets":[2],  
						 "orderable":false,  
					},  
			],  
		});
		////////////////////////////////////////////////////////////////
		$(document).on('click','.viewgrades', function(event){
			event.preventDefault();
			$('.modal-title').text("View Grades");
			$('#grades').modal('show');
			var id_num = $(this).attr("id");
			$('#viewtable table').remove();

			$.ajax({  
				url:"<?php echo base_url() . 'alumni_controller/allyear'; ?>",  
				method:"POST", 
				data:{id_num:id_num}, 
				dataType:"json",  
				success:function(data){
					var grade_data='';
					$.each(data, function(index, data){
						grade_data +='<h1 class="alumnifont">'+ data.year +' ('+ data.schoolyear +')'+'</h1>';
						grade_data += '<table id="viewtable" class="table table-striped">';
						grade_data +=	'<thead class="thead-inverse">';
						grade_data +=		'<tr>';
						grade_data +=			'<th>Subject</th>';
						grade_data +=			'<th>1st</th>';
						grade_data +=			'<th>2nd</th>';
						grade_data +=			'<th>3rd</th>';
						grade_data +=			'<th>4th</th>';
						grade_data +=		'</tr>';
						grade_data +=	'</thead>';
						grade_data +=	'<tbody>';

							$.ajax({  
								url:"<?php echo base_url() . 'alumni_controller/allsubjects'; ?>",  
								method:"POST",
								async:false,  
								data:{
									id_num:id_num,
									schoolyear:data.schoolyear
								},  
								dataType:"json",  
								success:function(data1){
									$.each(data1, function(index, data1){
										grade_data += '<tr>';
										grade_data += '<td>'+ data1.subject +'</td>';

											$.ajax({  
												url:"<?php echo base_url() . 'alumni_controller/allgrades'; ?>",  
												method:"POST",
												async:false,  
												data:{
													id_num:id_num,
													schoolyear:data.schoolyear,
													subjectid:data1.subid
												},  
												dataType:"json",  
												success:function(data2){
													$.each(data2, function(index, data2){
														grade_data += '<td>'+ data2.grade +'</td>';
													});	
												}
											});
										grade_data += '</tr>';	
									});
								}
							});
						grade_data += '</tbody>';
						grade_data += '</table>';	
					});

				$('#viewtable').html(grade_data);						
				}									
			});	
		});
		////////////////////////////////////////////////////////////////
		$(document).on('click','.printgrades', function(event){
			event.preventDefault();;
			var id_num = $(this).attr("id");

			$.ajax({  
				url:"<?php echo base_url() . 'alumni_controller/printpage1'; ?>",  
				method:"POST",
				async:false,  
				data:{
					id_num:id_num
				},  
				dataType:"json",  
				success:function(data){
					if (data != ''){
					window.open('alumniprint138_controller', 'Print Grades', "height=700,width=700");
					}
					else{
						alert('Error data is empty');
					}
				}
			});	
		});
		/////////////////////////////////////////////////////////////
	});	
</script>	
<br/>
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
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px; color: black;"><?php echo $this->session->userdata('id_number');?></p></b>
  <br>
  <br>
  <a href="admin_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;  "><i class="fa fa-home">&nbsp;&nbsp;Home</a></i>
  <a href="teacher_controller"  style="font-family:  'helvetica'; font-weight: bold; font-size: 20px;"><i class="fa fa-male"> / <i class="fa fa-female">&nbsp;&nbsp;Teacher</a></i></i>
  <a href="student_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-graduation-cap">&nbsp; &nbsp;Student</a></i>
  <a href="subject_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-book">&nbsp;&nbsp;Subject</i></a>
  <a href="section_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
     <a href="schoolyear_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>
  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
			</div>
		</div>

			<div class="col-lg-10">
				<div class="container">
				<h1 class="studentfont">Alumni</h1>
				<br>
					<div class=" table-responsive">
						<table id="alumnitable" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead class="thead-inverse">
								<tr>
									<th>Student ID</th>
									<th>Student Name</th>
									<th>Action</th>	
								</tr>
							</thead>
						</table>
					</div>	
				</div>
				<br>
				<!-- //////////////////////////////////////////////////////////////////// -->
				<div class="container-fluid">
				<div class="modal fade" id="grades" tabindex="-1" role="dialog" aria-labelledby="viewgradesmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="viewgradesmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	
				      		<div class="modal-body">
				      			<div id="viewtable" class="table-responsive">

									<!-- <table id="viewtable" class="table table-striped">
										<thead class="thead-inverse">
											<tr>
												<th>Subject</th>
												<th>1st</th>
												<th>2nd</th>
												<th>3rd</th>
												<th>4th</th>
											</tr>
										</thead>
										<tbody id="gradebody">
										</tbody>
									</table> -->
								</div>		
					  		</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>

				</div>
			</div>
			</div>
		</div>
	</div>	

<br/>
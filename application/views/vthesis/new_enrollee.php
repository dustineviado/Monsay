
<?php  
if(! $_SESSION){
redirect('login_controller/login_view');
}?>


<br>
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
  <a href="section_controller"    style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" class="<?=($menu=='active'?'shtycss':'')?>" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
     <a href="schoolyear_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>
  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
</div>
		</div>
		<div class="col-lg-10">
			<br>
				<br>
				<div class="container">
					<h1 class="subjectfont">New Enrollee</h1>
					<script type="text/javascript">
							$(document).ready(function(){

								

							      var dataTable = $('#newstudtable').DataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',  
							           "order":[],  
							           "ajax":{  
							                url:"<?php echo base_url() . 'New_enrol_controller/fetch_user'; ?>",  
							                type:"POST"  
							           },  
							           "columnDefs":[  
							                {  
							                     "targets":[4],  
							                     "orderable":false,  
							                },  
							           ],  
								      });

							      $(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var ctrlid = $('#ctrlid').val();
							           var fname = $('#studfname').val();
							           var mname = $('#studmname').val(); 
							           var lname = $('#studlname').val(); 
							           var email = $('#studemail').val(); 
							           var contact = $('#studcontact').val();
							           var religion = $('#studreligion').val();
							           var birthday = $('#studbirthday').val();
							           var age = $('#studage').val();
							           var gender = $('#studgender').val();
							           var address = $('#studaddress').val();
							           var parent_guard = $('#studparent_guard').val();
							           var pgcontact = $('#studpgcontact').val();
							           var status = $('#studstatus').val();
							           var newhid = $('#newstudhid').val();
							           var hiddenid = $('#hiddenid').val();  
							           
							           if(fname != '' && mname != '' && lname != '' && email != '' && contact != '' && religion != '' && birthday != ''  && gender != '' && address != '' && parent_guard != '' && pgcontact != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'New_enrol_controller/newStudAction'; ?>",  
							                     data:{
							                     	id:ctrlid,
							                     	fame:fname,
							                     	mame:mname,
							                     	lame:lname,
							                     	email:email,
							                     	cont:contact,
							                     	rel:religion,
							                     	bday:birthday,
							                     	age:age,
							                     	gend:gender,
							                     	addr:address,
							                     	pguard:parent_guard,
							                     	pgcont:pgcontact,
							                     	stat:status,
							                     	hidden:newhid,
							                     	hidid:hiddenid
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#newstudmodal').modal('hide');  
							                          $('#newstudtable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                alert("All Fields are Required"); 
							           }  
							      });

							      $(document).on('click','.edit', function(){  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'New_enrol_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('#addform')[0].reset();
							                	 $('.modal-title').text("Edit Enrollee"); 
							                     $('#newstudmodal').modal('show');  
							                     $('#studfname').val(data.studfname);
							                     $('#studmname').val(data.studmname);
							                     $('#studlname').val(data.studlname);
							                     $('#studemail').val(data.studemail);
							                     $('#studcontact').val(data.studcontact);
							                     $('#studreligion').val(data.studreligion);
							                     $('#studbirthday').val(data.studbirthday);
							                     $('#studage').val(data.studage);
							                     $('#studgender').val(data.studgender);
							                     $('#studaddress').val(data.studaddress);
							                     $('#studparent_guard').val(data.studparent_guard);
							                     $('#studpgcontact').val(data.studpgcontact); 
							                     $('#newstudhid').val("Edit");
							                     $('#hiddenid').val(sid); 
							                }  
							           });  
							      });  

							      $(document).on('click','.confirm', function(){
							      	   var d = new Date();
							      	   var idformat = d.getFullYear();
							      	   var finalid = 0;

							      	   $.ajax({  
							                url:"<?php echo base_url() . 'New_enrol_controller/autoid'; ?>",  
							                method:"POST",  
							                data:{idformat:idformat},  
							                dataType:"json",  
							                success:function(data)  
							                {
							                	if(data == null){
							                		finalid = idformat + '001';
							                		$('#userID').val(finalid);
							                	}
							                	else{
								                	finalid = 1 + parseInt(data);
								                	$('#userID').val(finalid);  
							                	}
							                }  
							          	 });	  
							           var sid = $(this).attr("id"); 
							           
							           $.ajax({  
							                url:"<?php echo base_url() . 'New_enrol_controller/fetch_single_user'; ?>",  
							                method:"POST",  
				               				data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('.modal-title').text("Enrollee Info"); 
							                     $('#newstudmodal2').modal('show');
							                     $('#ctrlid').val(data.ctrlid);							                      
							                     $('#studfname2').val(data.studfname);
							                     $('#studmname2').val(data.studmname);
							                     $('#studlname2').val(data.studlname);
							                     $('#studemail2').val(data.studemail);
							                     $('#studcontact2').val(data.studcontact);
											     $('#studreligion2').val(data.studreligion);
												 $('#studbirthday2').val(data.studbirthday);
												 $('#studage2').val(data.studage);
												 $('#studgender2').val(data.studgender);
												 $('#studaddress2').val(data.studaddress);
												 $('#studparent_guard2').val(data.studparent_guard);
												 $('#studpgcontact2').val(data.studpgcontact);
												 $('#studstatus').val(data.studstatus);
								            }  
							           });  

							        
							      });
							      $(document).on('click', '.delete', function(){  
							           var sid = $(this).attr("id");  
							           if(confirm("Are you sure you want to delete this?"))  
							           {  
							                $.ajax({  
							                     url:"<?php echo base_url(); ?>New_enrol_controller/removeEnrollee",  
							                     method:"POST",  
							                     data:{sid:sid},  
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#newstudtable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                return false;       
							           }  
							      });

							      $("#studyear2").change(function(){
										var sid = $('#studyear2').val();
											$.ajax({
												url:"<?php echo base_url(); ?>New_enrol_controller/getoption",
												method:"POST",
												data:{sid:sid},
												dataType:"json",
												success: function(data){
													var option_data='';
							                	 	var i;
							                	 		for(i=0; i<data.length; i++){
							                	 			option_data += '<option value="'+ data[i].secid +'">'+ data[i].section_name +'</option>'
														} 
							                		$('#studsection2').html(option_data);
							               			}   
											});
									});        
							 });
						</script>
					<br>
					
					<br>

					<table id="newstudtable" class="table table-responsive table-striped">
						<thead class="tablethead">
							<tr>
								<th scope="col" width="5%">Control No.</th>
								<th scope="col">Given Name</th>
								<th scope="col">Middle Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Date Registered</th>
								<th scope="col">Status</th>
								<th scope="col" width="25%	">Action</th>
							</tr>
						</thead>
					</table>
					<br>

				</div>

			<!--start of Subject Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="newstudmodal" tabindex="-1" role="dialog" aria-labelledby="addnewstudmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="addnewstudmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-group">
										<div class="col-md">
											<label for="studfname" class="col-form-label formmodalfont">First Name</label>
											<input id="studfname" name="studfname" type="text" class="form-control">
										</div>
										<div class="col-md">
											<label for="studmname" class="col-form-label formmodalfont">Middle Name</label>
											<input id="studmname" name="studmname" type="text" class="form-control">
										</div>
										<div class="col-md">
											<label for="studlname" class="col-form-label formmodalfont">Last Name</label>
											<input id="studlname" name="studlname" type="text" class="form-control">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md">
											<label for="studemail" class="col-form-label formmodalfont">Email</label>
											<input id="studemail" name="studemail" type="text" class="form-control">
										</div>
										<div class="col-md">
											<label for="studcontact" class="col-form-label formmodalfont">Contact</label>
											<input id="studcontact" name="studcontact" type="text" class="form-control">
										</div>
										<div class="col-md">
											<label for="studreligion" class="col-form-label formmodalfont">Religion</label>
											<input list="religionlist" id="studreligion" name="studreligion" class="form-control">
											<datalist id="religionlist">
											<option value="Roman Catholic">Roman Catholic</option>
											<option value="Born Again">Born Again</option>
											<option value="Iglesia ni Cristo">Iglesia Ni Cristo</option>
											<option value="Muslim">Muslim</option>
											</datalist>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-5">
										<label for="studbirthday" class="col-form-label">Date of Birth</label>
											<input id="studbirthday" name="studbirthday" type="date" class="form-control">
										</div>
										<div class="col-md">
											<label for="studgender" class="col-form-label formmodalfont">Sex</label>
											<select id="studgender" name="studgender" class="form-control">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											</select>
										</div>
									</div>
									<div class="row form-group">
									<div class="col-md">
											<label for="studaddress" class="col-form-label formmodalfont">Address</label>
											<input id="studaddress" name="studaddress" type="text" class="form-control">
										</div>
									</div>
									<div class="row form-group">
									<div class="col-md">
											<label for="studparent_guard" class="col-form-label formmodalfont">Parent/Guardian</label>
											<input id="studparent_guard" name="studparent_guard" type="text" class="form-control">
										</div>
										<div class="col-md">
											<label for="studpgcontact" class="col-form-label formmodalfont">Parent/Guardian Contact</label>
											<input id="studpgcontact" name="studpgcontact" type="text" class="form-control">
											<input type="hidden" name="newstudhid" id="newstudhid" value="">
											<input type="hidden" name="hiddenid" id="hiddenid">
										</div>
									</div>
									 
					  		</div>

							<div class="modal-footer">
								<input type="submit" name="action" id="action" class="btn addsubbtn2" value="Proceed">
							</div>
							</form>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
				<div class="modal fade" id="newstudmodal2" tabindex="-1" role="dialog" aria-labelledby="viewstudentmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="viewstudentmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	
				      		<div class="pre-scrollable">
				      		<div class="modal-body">
				      		<?=form_open('New_enrol_controller/confirmEnrollee')?>
				      			<div class="row form-group">
										<div class="col-md">
											<label for="studfname2" class="col-form-label formmodalfont">First Name</label>
											<input id="studfname2" name="studfname2" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studmname2" class="col-form-label formmodalfont">Middle Name</label>
											<input id="studmname2" name="studmname2" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studlname2" class="col-form-label formmodalfont">Last Name</label>
											<input id="studlname2" name="studlname2" type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md">
											<label for="studemail2" class="col-form-label formmodalfont">Email</label>
											<input id="studemail2" name="studemail2" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studcontact2" class="col-form-label formmodalfont">Contact</label>
											<input id="studcontact2" name="studcontact2" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studreligion2" class="col-form-label formmodalfont">Religion</label>
											<input id="studreligion2" name="studreligion2" class="form-control" readonly="">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md">
											<label for="studbirthday2" class="col-form-label formmodalfont">Date of Birth</label>
											<input id="studbirthday2" name="studbirthday2" type="date" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studage2" class="col-form-label formmodalfont">Age</label>
											<input id="studage2" name="studage2" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studgender2" class="col-form-label formmodalfont">Sex</label>
											<input id="studgender2" name="studgender2" class="form-control" readonly="">
										</div>
									</div>
									<div class="row form-group">
									<div class="col-md">
											<label for="studaddress2" class="col-form-label formmodalfont">Address</label>
											<input id="studaddress2" name="studaddress2" type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md">
											<label for="studparent_guard2" class="col-form-label formmodalfont">Parent/Guardian</label>
											<input id="studparent_guard2" name="studparent_guard2" type="text" class="form-control" readonly="">
										</div>
										<div class="col-md">
											<label for="studpgcontact2" class="col-form-label formmodalfont">Parent/Guardian Contact</label>
											<input id="studpgcontact2" name="studpgcontact2" type="text" class="form-control" readonly="">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md">
											<label for="studyear2" class="col-form-label formmodalfont">Year</label>
											<select id="studyear2" name="studyear2" type="text" class="form-control">
												<option value="Kinder">Kinder</option>
											    <option value="Preparatory">Preparatory</option>
											    <option value="Grade 1">Grade 1</option>
											    <option value="Grade 2">Grade 2</option>
											    <option value="Grade 3">Grade 3</option>
											    <option value="Grade 4">Grade 4</option>
											    <option value="Grade 5">Grade 5</option>
											    <option value="Grade 6">Grade 6</option>
											    <option value="Grade 7">Grade 7</option>
											    <option value="Grade 8">Grade 8</option>
											    <option value="Grade 9">Grade 9</option>
											    <option value="Grade 10">Grade 10</option>
											    <option value="Grade 11">Grade 11</option>
											    <option value="Grade 12">Grade 12</option>
											</select>	
										</div>
										<div class="col-md">
											<label for="studsection2" class="col-form-label formmodalfont">Section</label>
											<select id="studsection2" name="studsection2" type="text" class="form-control">
												<option value="">---</option>
											</select>
										</div>
									</div>


								<div class="row form-group">
									<!-- <input type="hidden" name="newstudhid" id="newstudhid" value=""> -->
									<input type="hidden" name="userID" id="userID">
									<input type="hidden" name="ctrlid" id="ctrlid">
					  				
					  			</div>
					  		</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-success">Confirm</button>
								<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
							</div> 
							
							</form>
						</div>
					</div>

				</div>
			</div>
</div>
				<!--end of Subject Modal -->
				<script type="text/javascript">
					
				</script>		

		</div>

	</div>
</div>
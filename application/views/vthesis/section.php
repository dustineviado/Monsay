
<?php  
if(! $_SESSION){
redirect('login_controller/login_view');
}?>


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
  <a href="section_controller"  class="<?=($menu=='active'?'shtycss':'')?>"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sort-numeric-asc">&nbsp;&nbsp;Section</i></a>
  <a href="new_enrol_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-child">&nbsp;&nbsp;Enrollees</i></a>
  <a href="schedules_controller" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar-check-o">&nbsp;&nbsp;Schedules</i></a>
    <a href="alumni_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-group">&nbsp;&nbsp;Alumni</i></a>
     <a href="schoolyear_controller"  style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-calendar">&nbsp;&nbsp;School Year</i></a>
  <br>

    <a href="<?php echo base_url(); ?>login_controller/logout" style="font-family:  'helvetica'; font-weight: bold;   font-size: 20px;"><i class="fa fa-sign-out">&nbsp;&nbsp;Sign Out</i></a>
  
</div>
		</div>
		<div class="col-lg-10">
				<div class="container">
					<h1 class="sectionfont">Sections</h1>
					<script type="text/javascript">
							$(document).ready(function(){

								$('#addmodalbtn').click(function(){  
							           $('#addform')[0].reset();
							           $('#sectionidname').removeAttr('style');
							           $('#sectionidname_error').hide();
							           $('#sectionname').removeAttr('style');
							           $('#sectionname_error').hide();
							           $('#sectionlevel').removeAttr('style');
							           $('#sectionlevel_error').hide();
							           $('#teacherid').removeAttr('style');
							           $('#teacherid_error').hide();        
							           $('.modal-title').text("Add Section");  
							           $('#sectionhid').val("Add");
							           

							      });    

							      var dataTable = $('#sectiontable').dataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',  
							           "order":[],  
							           "ajax":{  
							                url:"<?php echo base_url() . 'section_controller/fetch_user'; ?>",  
							                type:"POST"  
							           },  
							           "columnDefs":[  
							                {  
							                     "targets":[5],  
							                     "orderable":false,  
							                },  
							           ],  
							      });

							      $(document).on('click', '#action', function(event){  
							           event.preventDefault();
							           var sc = 'sc';
							           var sectid = $('#sectionidname').val();  
							           var sectname = $('#sectionname').val();  
							           var sectlevel = $('#sectionlevel').val();
							           var sectadviser = $('#teacherid').val();
							           var secthid = $('#sectionhid').val();
							           var hiddenid = $('#hiddenid').val();
							           var check = $('#titser').val();  
							           var counter = 0;

							           		if(sectid == ''){
							           			$('#sectionidname_error').html('Section ID is required.')
							           			.css('color', '#F90A0A');
							           			$('#sectionidname_error').show();
							           			$('#sectionidname').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#sectionidname_error').hide();
							           			$('#sectionidname').css('border-color', '#34F458');
							           		}
							           		if(sectname == ''){
							           			$('#sectionname_error').html('Section Name is required.');
							           			$('#sectionname_error').show();
							           			$('#sectionname').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#sectionname_error').hide();
							           			$('#sectionname').css('border-color', '#34F458');
							           		}
							           		if(sectlevel == ''){
							           			$('#sectionlevel_error').html('Section Level is required.');
							           			$('#sectionlevel_error').show();
							           			$('#sectionlevel').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#sectionlevel_error').hide();
							           			$('#sectionlevel').css('border-color', '#34F458');
							           		}
							           		if(sectadviser == ''){
							           			$('#teacherid_error').html('Teacher ID is required.')
							           			.css('color', '#F90A0A');
							           			$('#teacherid_error').show();
							           			$('#teacherid').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		
							           		if(counter == 0 && check == 'true' ){
							           				var data = $('#addform').serialize();
							           				var base_url = window.location;
							           				var check= $('#titser').val();
							           				
							           				$.ajax({
							           					url: base_url + '/sectionaction',
							           					method: "POST",
							           					data:data,
							           					success:function(data){
							           						console.log(data);
							           						alert(data);
							           						$('#sectionmodal').modal('hide');
							           						$('#sectiontable').DataTable().ajax.reload();
							           					
							           				}
							           			});
							           		}

							      });
							      			$('#sectionidname').keyup(function(e){
							      				e.preventDefault();
							                	var sectid = $('#sectionidname').val();
							                	var base_url = window.location;
							               
							                	$.ajax({
							                		url: base_url + '/check_sectid',
							                		method:"POST",
							                		data:{sectid:sectid},
							                		success:function(data){ 
							                		console.log(data);
							                		
							    					if(data == 'true'){
							    					$('#sectionidname_error').html('Section ID is Valid' + '&nbsp;&nbsp;' +'<span class="fa fa-check"></span>')
							    					.css('color', '#34F458');
							    					$('#sectionidname_error').show();
							    					$('#sectionidname').css('border-color', '#34F458');
							    					// alert('ni');
							    					}            		
							    					else{
							    						// alert('no');
							    						$('#sectionidname_error').html(data)
							    						.css('color', '#F90A0A');
							    						$('#sectionidname').css('border-color', '#F90A0A');
							    					}
							              	}
							             });   	

							      });
							      			$('#teacherid').keyup(function(e){
							      				e.preventDefault();
							      				var sectadviser = $('#teacherid').val();
							      				var base_url = window.location;

							      				$.ajax({
							      					url: base_url + '/check_teacher',
							      					method:"POST",
							      					data:{sectadviser:sectadviser},
							      					success:function(data){
							      					console.log(data);
							      					// alert('Hi');
							      					if(data == 'true'){
							      						$('#teacherid_error').html('Teacher ID is Valid' + '&nbsp;&nbsp;' +'<span class="fa fa-check"></span>')
							      							.css('color', '#34F458');
							      						$('#teacherid_error').show();
							      						$('#teacherid').css('border-color', '#34F458');
							      						$check = $('#titser').val("true");


							      						}
							      					else if(data == 'false'){
							      						$('#teacherid_error').html('Teacher ID does not exist')
							      						.css('color', '#F90A0A');
							      						$('#teacherid_error').show();	
							      						$('#teacherid').css('border-color', '#F90A0A');
							      						$check = $('#titser').val("false");
							      						}
							      					}
							      				});
							      			});

							      $(document).on('click','.edit', function(e){
							     		e.preventDefault();  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'section_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	console.log(data);
							                	 $('#addform2')[0].reset();
							                	 $('#sectionidname2').removeAttr('style');
										         $('#sectionidname2_error').hide();
										         $('#sectionname2').removeAttr('style');
										         $('#sectionname2_error').hide();
										         $('#sectionlevel2').removeAttr('style');
										         $('#sectionlevel2_error').hide();
										         $('#teacherid2').removeAttr('style');
										         $('#teacherid2_error').hide();   
							                	 $('.modal-title').text("Edit Section"); 
							                     $('#sectionmodal2').modal('show');  
							                     $('#sectionidname2').val(data.sectionidname);
							                     $('#sectionname2').val(data.sectionname);
							                     $('#sectionlevel2').val(data.sectionlevel);
							                     $('#teacherid2').val(data.sectionadviser);
							                     $('#scheduleid2').val(data.scheduleid); 
							                     $('#sectionhid2').val("Edit");
							                     $('#hiddenid2').val(sid); 
							                }  
							           });  
							      }); 
							      $(document).on('click', '#action2', function(event){  
							           event.preventDefault();
							           var sc = 'sc';
							           var sectid = $('#sectionidname2').val();  
							           var sectname = $('#sectionname2').val();  
							           var sectlevel = $('#sectionlevel2').val();
							           var sectadviser2 = $('#teacherid2').val();
							           var secthid = $('#sectionhid2').val();
							           var hiddenid = $('#hiddenid2').val(); 
							           var check2 = $('#titser2').val(); 
							           var counter = 0;

							           		if(sectname == ''){
							           			$('#sectionname2_error').html('Section Name is required.');
							           			$('#sectionname2_error').show();
							           			$('#sectionname2').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#sectionname2_error').hide();
							           			$('#sectionname2').css('border-color', '#34F458');
							           		}
							           		if(sectlevel == ''){
							           			$('#sectionlevel2_error').html('Section Level is required.');
							           			$('#sectionlevel2_error').show();
							           			$('#sectionlevel2').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		else{
							           			$('#sectionlevel2_error').hide();
							           			$('#sectionlevel2').css('border-color', '#34F458');
							           		}
							           		if(sectadviser2 == ''){
							           			$('#teacherid2_error').html('Teacher ID is required.')
							           			.css('color', '#F90A0A');
							           			$('#teacherid2_error').show();
							           			$('#teacherid2').css('border-color', '#F90A0A');
							           			counter++;
							           		}
							           		if(counter == 0 && check2 == 'true' ){
							           				var data = $('#addform2').serialize();
							           				var base_url = window.location;
							           				var check2 = $('#titser2').val();
							           				
							           				$.ajax({
							           					url: base_url + '/editsection',
							           					method: "POST",
							           					data:data,
							           					success:function(data){
							           						console.log(data);
							           						alert(data);
							           						$('#sectionmodal2').modal('hide');
							           						$('#sectiontable').DataTable().ajax.reload();
							           					
							           				}
							           			});
							           		}
							      });
							      			$('#teacherid2').keyup(function(e){
							      				e.preventDefault();
							      				var sectadviser2 = $('#teacherid2').val();
							      				var base_url = window.location;

							      				$.ajax({
							      					url: base_url +'/check_teacher2',
							      					method:"POST",
							      					data:{sectadviser2:sectadviser2},
							      					success:function(data){
							      						console.log(data);
							      						if(data=='true'){
							      							$('#teacherid2_error').html('Teacher ID is Valid' + '&nbsp;&nbsp;' +'<span class="fa fa-check"></span>')
							    								.css('color', '#34F458');
							    							$('#teacherid2_error').show();
							    							$('#teacherid2').css('border-color', '#34F458');
							    							$('#teacherid2_error').show();
							    							// alert(sectadviser);
							    							$check2 = $('#titser2').val('true');
							      						}
							      						else if(data == 'false'){
							      							$('#teacherid2_error').html('Teacher ID does not exist'+ '&nbsp;&nbsp;' +'<span class="fa fa-remove"></span>')
								    						.css('color', '#F90A0A');
								    						$('#teacherid2').css('border-color', '#F90A0A');
								    						$check2 = $('#titser2').val('false');
								    						// alert(sectadviser);
							      						}
							      					}
							      				});
							      			}); 


							      $(document).on('click', '.delete', function(){  
							           var sid = $(this).attr("id"); 
							           var sid2 = $(this).attr("name"); 
							           if(confirm("Are you sure you want to delete this?"))  
							           {  
							                $.ajax({  
							                     url:"<?php echo base_url(); ?>section_controller/deletesection",  
							                     method:"POST",  
							                     data:{sid:sid,
							                     	   sid2:sid2
							                     	  },  
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#sectiontable').DataTable().ajax.reload();  
							                     }  
							                });  
							           }  
							           else  
							           {  
							                return false;       
							           }  
							      });

							      $(document).on('click','.check', function(){  
							           var sid = $(this).attr("id");  
							           $.ajax({  
							                url:"<?php echo base_url() . 'section_controller/checkcount'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	alert('There are '+data+' students in this section');
							                }  
							           });  
							      });        
							 });
						</script>
					<br>
					<div>
						<button id="addmodalbtn" class="btn addsubbtn" data-toggle="modal" data-target="#sectionmodal">Add Section</button>
					</div>
					<br>

					<table id="sectiontable" class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>Section ID</th>
								<th>Section Name</th>
								<th>Level</th>
								<th>Adviser</th>
								<th>Schedule ID</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
					<br>

				</div>

			<!--start of Section Modal -->
			<div class="container-fluid">
				<div class="modal fade" id="sectionmodal" tabindex="-1" role="dialog" aria-labelledby="addsectionmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="addsectionmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-group">
										<div class="col-md">
											<label for="sectionidname" class="col-form-label formmodalfont">Section ID</label>
											<input id="sectionidname" name="sectionidname" type="text" class="form-control" placeholder="Section ID">
											<span id="sectionidname_error"></span>
										</div>
										<div class="col-md">
											<label for="sectionname" class="col-form-label formmodalfont">Section Name</label>
											<input id="sectionname" name="sectionname" type="text" class="form-control" placeholder="Section Name">
											<span class="text-danger" id="sectionname_error"></span>
										</div>
										<div class="col-md">
											<label for="sectionlevel" class="col-form-label formmodalfont">Level</label>
											<select id="sectionlevel" name="sectionlevel" class="form-control">
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
										    <span class="text-danger" id="sectionlevel_error"></span>
										</div>
										<div class="col-md">
											<label for="teacherid" class="col-form-label formmodalfont">Adviser</label>
											<input id="teacherid" name="teacherid" type="text" class="form-control" placeholder="Teacher ID">
											<span  id="teacherid_error"></span>
										</div>
											<input type="hidden" id="scheduleid" name="scheduleid" type="text" class="form-control" placeholder="Schedule ID">
											<input type="hidden" name="sectionhid" id="sectionhid" value="">
											<input type="hidden" name="hiddenid" id="hiddenid">
											<input type="hidden" name="titser" id="titser" value="">

									</div> 
					  		</div>

							<div class="modal-footer">
								<input type="submit" name="action" id="action" class="btn addsubbtn2" value="Proceed">
							</div>
							</form>
							</div>
						</div>
					</div>
					<!-- End of Modal Add -->
				<div class="container-fluid">
				<div class="modal fade" id="sectionmodal2" tabindex="-1" role="dialog" aria-labelledby="editsectionmodal" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				   		
				  		<form method="post" id="addform2">
				   		<div class="modal-content">
							<div class="modal-header">
				        		<h1 class="modal-title" id="editsectionmodal"><b></b></h1>
				      			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>	

				      		<div class="modal-body">
									<div class="row form-group">
										<div class="col-md">
											<label for="sectionidname2" class="col-form-label formmodalfont">Section ID</label>
											<input id="sectionidname2" name="sectionidname2" type="text" class="form-control" readonly="">
											<span id="sectionidname2_error"></span>
										</div>
										<div class="col-md">
											<label for="sectionname2" class="col-form-label formmodalfont">Section Name</label>
											<input id="sectionname2" name="sectionname2" type="text" class="form-control" placeholder="Section Name">
											<span class="text-danger" id="sectionname2_error"></span>
										</div>
										<div class="col-md">
											<label for="sectionlevel2" class="col-form-label formmodalfont">Level</label>
											<select id="sectionlevel2" name="sectionlevel2" class="form-control">
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
										    <span class="text-danger" id="sectionlevel2_error"></span>
										</div>
										<div class="col-md">
											<label for="teacherid2" class="col-form-label formmodalfont">Adviser</label>
											<input id="teacherid2" name="teacherid2" type="text" class="form-control" placeholder="Teacher ID">
											<span  id="teacherid2_error"></span>
										</div>
											<input type="hidden" id="scheduleid2" name="scheduleid2" type="text" class="form-control" placeholder="Schedule ID">
											<input type="hidden" name="sectionhid2" id="sectionhid2" value="">
											<input type="hidden" name="hiddenid2" id="hiddenid2">
											<input type="hidden" name="titser2" id="titser2" value="">

									</div> 
					  		</div>

							<div class="modal-footer">
								<input type="submit" name="action2" id="action2" class="btn addsubbtn2" value="Proceed">
							</div>
							</form>
							</div>
						</div>
					</div>
					<!-- End Edit -->
				</div>
		</div>
	</div>
</div>
<br/>
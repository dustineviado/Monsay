
<?php  $id_number=$this->session->userdata('login_session');
if(! $id_number ){
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
  <b><p  class="text-center" style="font-family: 'helvetica'; font-size: 20px; color: black;"><?php echo $this->session->userdata('login_session');?></p></b>
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
							           var schedid = sc+$('#sectionidname').val();
							           var secthid = $('#sectionhid').val();
							           var hiddenid = $('#hiddenid').val();  
							           
							           if(sectid != '' && sectname != '' && sectlevel != '' && schedid != '')  
							           {  
							                $.ajax({  
							                	type:"POST",
							                     url:"<?php echo base_url() . 'section_controller/sectionaction'; ?>",  
							                     data:{
							                     	id:sectid,
							                     	name:sectname,
							                     	lvl:sectlevel,
							                     	sectadv:sectadviser,
							                     	sceid:schedid,
							                     	hidden:secthid,
							                     	hidid:hiddenid
							                     }, 
							                     success:function(data)  
							                     {  
							                          alert(data);  
							                          $('#sectionmodal').modal('hide');  
							                          $('#sectiontable').DataTable().ajax.reload();  
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
							                url:"<?php echo base_url() . 'section_controller/fetch_single_user'; ?>",  
							                method:"POST",  
							                data:{sid:sid},  
							                dataType:"json",  
							                success:function(data)  
							                {  	
							                	 $('#addform')[0].reset();
							                	 $('.modal-title').text("Edit Section"); 
							                     $('#sectionmodal').modal('show');  
							                     $('#sectionidname').val(data.sectionidname);
							                     $('#sectionname').val(data.sectionname);
							                     $('#sectionlevel').val(data.sectionlevel);
							                     $('#teacherid').val(data.sectionadviser);
							                     $('#scheduleid').val(data.scheduleid); 
							                     $('#sectionhid').val("Edit");
							                     $('#hiddenid').val(sid); 
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
										</div>
										<div class="col-md">
											<label for="sectionname" class="col-form-label formmodalfont">Section Name</label>
											<input id="sectionname" name="sectionname" type="text" class="form-control" placeholder="Section Name">
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
										</div>
										<div class="col-md">
											<label for="teacherid" class="col-form-label formmodalfont">Adviser</label>
											<input id="teacherid" name="teacherid" type="text" class="form-control" placeholder="Teacher ID">
										</div>
											<input type="hidden" id="scheduleid" name="scheduleid" type="text" class="form-control" placeholder="Schedule ID">
											<input type="hidden" name="sectionhid" id="sectionhid" value="">
											<input type="hidden" name="hiddenid" id="hiddenid">

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
		</div>
	</div>
</div>
<br/>
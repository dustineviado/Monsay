<script type="text/javascript">
							$(document).ready(function(){
								var counter = 1;

								var dataTable = $('#schedulestable').DataTable({  
							           "processing":true,  
							           "scrollY": '500px',
							           "autoWidth": true,
							           "columnDefs": [
										    { className: "schedS", "targets": [ 0 ] },
										    { className: "schedT", "targets": [ 1 ] },
										    { className: "schedD", "targets": [ 2 ] },
										    { className: "schedTi", "targets": [ 3 ] }
										  ]   
							      });

							     $('#insert').on( 'click', function () {
							     	var schedsub = $('#schedulesubject').val();
								  	var schedteach = $('#scheduleteacher').val();
	 							    var schedday = $('#scheduleday').val();
								    var schedtime = $('#scheduletime').val();
								    var nike = "<input type='button' id='removerow' class='btn removeschedbtn' value='Remove'>	";
							       
							        dataTable.row.add( [
							           schedsub,
							           schedteach,
							           schedday,
							           schedtime,
							           nike
							        ] ).draw( false );
							 		
							 		$('#schedulingtable')[0].reset();
							        counter++;
							    } );
 
								$('#schedulestable tbody').on( 'click', '#removerow', function () {
								    dataTable
								        .row( $(this).parents('tr') )
								        .remove()
								        .draw();
								} ); 

								$('#wew').click(function(){
									});

							    /*$("#insert").click(function(){
						            var schedsub = $('#schedulesubject').val();
							  		var schedteach = $('#scheduleteacher').val();
 							        var schedday = $('#scheduleday').val();
							        var schedtime = $('#scheduletime').val();
						
							       	var print = "<tr><td class='schedS'>"+schedsub+counter+"</td><td>"+schedteach+"</td><td>"+schedday+"</td><td>"+schedtime+"</td><td><input type='checkbox' name='check' class='form-check-input'></tr>";

						            $('#schedulestable tbody').append(print);
						            $('#schedulingtable')[0].reset();s
						            counter++;
						        });
						        
						        // Find and remove selected table rows
						        $("#deleterow").click(function(){
						            $('#schedulestable tbody').find('input[name="check"]').each(function(){
						                if($(this).is(":checked")){
						                    $(this).parents("tr").remove();
						                }
						            });
						        });

						        $('#wew').click(function(){
										var wewewe = $('.schedS').val();

										alert(wewewe);
									});*/
							        
							});
</script>							      
<br/>
<div class="container-fluid allfont">
	<div class="row">
		<div class="col-md">
		</div>

		<div class="col-md-11">
			<div class="container">
				<h1 class="schedulefont">Schedule</h1>	
				<br/>

				<!--start of insert form-->
				<form id="schedulingtable">
					<div class="container">
						<div class="row form-row">
							<div class="col-md">
								<label for="schedulesubject" class="col-form-label formmodalfont">Subject</label>
									<input list="subjectlist" id="schedulesubject" name="schedulesubject" class="form-control">
									<datalist id="subjectlist">	
										<option value="1">1</option>
									</datalist>
							</div>
							<div class="col-md">
								<label for="scheduleteacher" class="col-form-label formmodalfont">Teacher</label>
									<input list="teacherlist" id="scheduleteacher" name="scheduleteacher" class="form-control">
									<datalist id="teacherlist">	
										<option value="1">1</option>
									</datalist>
							</div>
							<div class="col-md">
								<label for="scheduleday" class="col-form-label formmodalfont">Day</label>
									<select id="scheduleday" name="scheduleday" class="form-control">	
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
									</select>
							</div>
							<div class="col-md">
								<label for="scheduletime" class="col-form-label formmodalfont">Time</label>
									<input id="scheduletime" name="scheduletime" class="form-control">	
							</div>
						</div>
						<br/>
						<div class="row form-row">
								<input type="button" name="insert" id="insert" class="btn insertbutton" value="Insert">
						</div>
					</div>
				</form>
				<!--end of insert form-->

				<!--start of schedule table-->
				<form>
					<div class="container">
						<!--<div class="row form-row">
							<div class="col-md">
								<label for="scheduleid" class="col-form-label formmodalfont">Schedule ID</label>
									<input id="scheduleid" name="scheduleid" type="text" class="form-control" placeholder="Schedule ID">
							</div>
							<div class="col-md">
								<label for="schedulesection" class="col-form-label formmodalfont">Section</label>
									<select id="schedulesection" name="schedulesection" type="text" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
							<div class="col-md">
								<label for="scheduleyear" class="col-form-label formmodalfont">Year</label>
									<select id="scheduleyear" name="scheduleyear" class="form-control">
										<option value="sampol">sampol</option>
									</select>
							</div>
						</div>-->

						<br/>
						<br/>
						<br/>
							<table id="schedulestable" class="table table-responsive table-striped">	
								<thead class="thead-inverse">	
									<tr>
										<th>Subject</th>
										<th>Teacher</th>
										<th>Day</th>
										<th>Time</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						<br/>
					</div>
				<form>
				<!--end of schedule table-->
				<input type="button" name="deleterow" id="deleterow" class="btn insertbutton" value="Delete">
				<input type="button" name="wew" id="wew" class="btn insertbutton" value="wew">
				<br/>
			</div>
		</div>

		<div class="col-md">
			
		</div>
	</div>
</div>
<br/>
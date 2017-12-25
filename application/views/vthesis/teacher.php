
<table id="Ttable" class="table table-responsive table-striped">
						<thead class="thead-inverse">
							<tr>
								<th scope="col">Teacher ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Middle Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Birthday</th>
								<th scope="col">Age</th>
								<th scope="col">Gender</th>
								<th scope="col">Email</th>
								<th scope="col">Advisory</th>
								<th scope="col">Subject</th>
								<th scope="col">Address</th>
								<th scope="col">Contact</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
					</table>



<script type="text/javascript" language="javascript">

 var dataTable = $('#Ttable').dataTable({  
							           "processing":true,  
							           "serverSide":true,
							           "scrollY": '500px',
							           "scrollX": '1000px',  
							           "order":[],  
							           "ajax":{  
							                 url:"<?php echo base_url() . 'teacher_controller/fetch_user_teacher'; ?>", 
							                type:"POST"  
							           }  
							           
							      });
</script>

<!DOCTYPE html>
<html>
<head>
	<!-- required tag for responsiveness -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="no-cache">
		
	<!-- jquery and popper JS CDN bootstrap -->
	<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.12.1/jquery-ui.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.12.1/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap4.min.js');?>"></script>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
	<!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>-->

	<!-- css bootstrap -->
		<link href=" //maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-grid.css.map');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-reboot.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styledustine.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylejohn.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleralph.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ralphforms.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styleralphadmin.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/edit-delete.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/w3.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/video-js.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap4.min.css');?>">
	
	<!-- js bootstrap -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo base_url('assets/js/video-js.js');?>"></script>
<title><?php echo $title?></title>
	<!--end of header-->
</head>
	<body>
		<div class="container-fluid allfont">
			<div class="row">
				<div class="col-12">
					<table class="printtabletop">
						<tbody>
							<tr>
								<td class="printschoolname">
									<p><img class="printlogo" src="images/hvea.jpg"></p>
								</td>
								<td class="printschoolname">
									<h5 class="schoolnamefont">Haven of Virtue and Excellence Academy Inc.</h5>
									<h6 class="schoolnamefont">Form-138</h6>
								</td>
								<td class="printdate">Date Printed: <span id="datetoday"></span></td>
							</tr>	
						</tbody>
					</table>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
					<table class="printtabletop">
						<tbody>
							<tr>
								<td class="printid">Student ID:</td>
								<td class="printidvalue" id="idvalue"></td>
								<td style=" width:100px;">&nbsp</td>
								<td class="printid2">Level:</td>
								<td class="printidvalue2" id="levelvalue"></td>
							</tr>
							<tr>
								<td class="printid">Name:</td>
								<td class="printidvalue" id="namevalue"></td>
								<td style=" width:100px;">&nbsp</td>
								<td class="printid2">School Year:</td>
								<td class="printidvalue2" id="syvalue"></td>
							</tr>	
						</tbody>
					</table>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->	
					<table id="gradeviewtable" class="table table-sm table-bordered" style="text-align:center;">
						<thead>
							<tr class="d-flex">
								<th class="col-4" style="text-align:center;">Subject</th>
								<th class="col" style="text-align:center;">1st</th>
								<th class="col" style="text-align:center;">2nd</th>
								<th class="col" style="text-align:center;">3rd</th>
								<th class="col" style="text-align:center;">4th</th>
								<th class="col" style="text-align:center;">Avg</th>
							</tr>
						</thead>
						<tbody id="gradebody">

						</tbody>
					</table>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
						<p class="printid">Printed by:  <span class="printidvalue" id="printbyvalue"></span></p>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->					
				</div>
			</div>
		</div>
		<br>
		<br>
		<button onclick="printbtn()" id="printbtn" class="btn printbuttonstyle">Print</button>	
</body>		
<script type="text/javascript">
$(document).ready(function(){
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();

			if(dd<10) {
			    dd = '0'+dd
			} 

			if(mm<10) {
			    mm = '0'+mm
			} 

			today = mm + '/' + dd + '/' + yyyy;
			$('#datetoday').text(today);


			$.ajax({  
				url:"<?php echo base_url() . 'printpage_controller/getinfo'; ?>",  
				method:"POST",   
				dataType:"json",  
				success:function(data){
					$('#idvalue').text(data.id_num);
					$('#levelvalue').text(data.year);
					$('#namevalue').text(data.lname+','+data.fname+' '+data.mname);
					$('#syvalue').text(data.schoolyear);
					$('#printbyvalue').text(data.id_num);
				}
			});	
			////////////////////////////////////////////////////////////////////////////////////////////////////////
	
			$.ajax({  
				url:"<?php echo base_url() . 'printpage_controller/modalgrades'; ?>",  
				method:"POST",   
				dataType:"json",  
				success:function(data){
					var grade_data='';
					$.each(data, function(index, data){
						grade_data += '<tr class="d-flex">';
						grade_data += '<td class="col-4" >'+ data.subject +'</td>';

							$.ajax({  
								url:"<?php echo base_url() . 'printpage_controller/checksubject'; ?>",  
								method:"POST",
								async:false,  
								data:{
									subjectid:data.subid
								},  
								dataType:"json",  
								success:function(response){
									var subavg = 0;
									$.each(response, function(index, response){
										grade_data += '<td class="col" >'+ response.grade +'</td>';
										subavg = subavg + parseInt(response.grade);
									});	
									subavg = Math.round(subavg/4);
									grade_data += '<td style="font-weight:bold;" class="allavg col">'+ subavg +'</td>';
								}
							});
						
						grade_data += '</tr>';
					});
					grade_data += '<tr class="d-flex">';
					grade_data += 	'<td class="col-10" style="text-align:right;">Total Average:</td>';
					grade_data += 	'<td class="printidvalue2 col-2" id="avgvalue">---</td>';
					grade_data += '</tr>';

					$('#gradebody').html(grade_data);
					
					var totalavg = 0;
					var c = 0;
					$(".allavg").each(function() {
						c++;
						var value = parseInt($(this).text());
					    totalavg = totalavg + value;
					});
					totalavg = Math.round(totalavg/c);
					$('#avgvalue').text(totalavg);

					$.ajax({  
						url:"<?php echo base_url() . 'printpage_controller/unset'; ?>",  
						method:"POST",
						async:false, 
						success:function(data){
						}
					});	
				}
			});

	////////////////////////////////////////////////////////////////////////////////////////////////////////
});
	function printbtn(){
    window.print();
	}
</script>
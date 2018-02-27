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
									<h6 class="schoolnamefont">Form-137</h6>
								</td>
								<td class="printdate">Date Printed:  <span id="datetoday"></span></td>
							</tr>	
						</tbody>
					</table>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
					<p class="printid">Student ID:  <span class="printidvalue" id="idvalue"></span></p>
					<p class="printid">Name:  <span class="printidvalue" id="namevalue"></span></p>
					<br>
		<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
					<div id="viewtable">
					</div>	
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
				url:"<?php echo base_url() . 'alumniprint138_controller/getinfo'; ?>",  
				method:"POST",   
				dataType:"json",  
				success:function(data){
					$('#idvalue').text(data.id_num);
					$('#namevalue').text(data.lname+', '+data.fname+' '+data.mname);
					$('#printbyvalue').text(data.id_num);
				}
			});	
			////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$.ajax({  
				url:"<?php echo base_url() . 'alumniprint138_controller/allyear'; ?>",  
				method:"POST",
				dataType:"json",  
				success:function(data){
					var i = 0;
					var grade_data='';
					$.each(data, function(index, data){
						grade_data +='<p class="alumniprintfont">'+ data.year +' ('+ data.schoolyear +')'+'</p>';
						grade_data += '<table id="gradeviewtable" class="table table-sm table-bordered" style="text-align:center;">';
						grade_data +=	'<thead>';
						grade_data +=		'<tr class="d-flex">';
						grade_data +=			'<th class="col-4" style="text-align:center;">Subject</th>';
						grade_data +=			'<th class="col" style="text-align:center;">1st</th>';
						grade_data +=			'<th class="col" style="text-align:center;">2nd</th>';
						grade_data +=			'<th class="col" style="text-align:center;">3rd</th>';
						grade_data +=			'<th class="col" style="text-align:center;">4th</th>';
						grade_data +=			'<th class="col" style="text-align:center;">Avg</th>';
						grade_data +=		'</tr>';
						grade_data +=	'</thead>';
						grade_data +=	'<tbody>';

							$.ajax({  
								url:"<?php echo base_url() . 'alumniprint138_controller/allsubjects'; ?>",  
								method:"POST",
								async:false,  
								data:{
									schoolyear:data.schoolyear
								},  
								dataType:"json",  
								success:function(data1){
									$.each(data1, function(index, data1){
										grade_data += '<tr class="d-flex">';
										grade_data += '<td class="col-4">'+ data1.subject +'</td>';

											$.ajax({  
												url:"<?php echo base_url() . 'alumniprint138_controller/allgrades'; ?>",  
												method:"POST",
												async:false,  
												data:{
													schoolyear:data.schoolyear,
													subjectid:data1.subid
												},  
												dataType:"json",  
												success:function(data2){
													var subavg = 0;
													var wew = [];
													$.each(data2, function(index, data2){
														wew = data2.grade;
														grade_data += '<td class="col">'+ data2.grade +'</td>';
														subavg = subavg + parseInt(data2.grade);
													});
													subavg = Math.round(subavg/4);
													grade_data += '<td style="font-weight:bold;" class="allavg col">'+ subavg +'</td>';
													// alert(wew);
												}
											});
										grade_data += '</tr>';	
									});

									// grade_data += '<tr>';
									// grade_data += 	'<td colspan="5" style="text-align:right;">Total Average:</td>';
									// grade_data += 	'<td class="printidvalue2" id="avgvalue">---</td>';
									// grade_data += '</tr>';
								}
							});

						grade_data += '</tbody>';
						grade_data += '</table>';	
					});

				$('#viewtable').html(grade_data);

				// var totalavg = 0;
				// var c = 0;
				// $(".allavg").each(function(){
				// 	c++;
				// 	var value = parseInt($(this).text());
				// 	totalavg = totalavg + value;
				// });
				// totalavg = totalavg/c;
				// $('#avgvalue').text(totalavg);
				$.ajax({  
						url:"<?php echo base_url() . 'alumniprint138_controller/unset'; ?>",  
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
    var printButton = document.getElementById("printbtn");
    printButton.style.visibility = 'hidden';
    window.print()
    printButton.style.visibility = 'visible';
	}
</script>
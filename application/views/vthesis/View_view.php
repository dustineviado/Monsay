<table border="1">
	<tbody>
		<tr>
			<td>ID Number</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Birthday</td>
			<td>Age</td>
			<td>Gender</td>
			<td>Address</td>
			<td>Contact</td>
			<td>Email</td>
			<td>Actions</td>
		</tr>
<?php foreach ($s->result() as $row):?>
		<tr>
			<td><?php echo $row->id_num;?></td>
			<td><?php echo $row->fname;?></td>
			<td><?php echo $row->lname;?></td>
			<td><?php echo $row->birthday;?></td>
			<td><?php echo $row->age?></td>
			<td><?php echo $row->gender;?></td>
			<td><?php echo $row->address;?></td>
			<td><?php echo $row->contact;?></td>
			<td><?php echo $row->email;?></td>
			<td><a href="#"><?php echo $row->id_num;?>Edit</a>
			<a href="#" class="deletedata"><?php echo $row->id_num;?>Delete</a></td>
			
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
 <script>  
      $(document).ready(function(){  
           $('.deletedata').click(function(){  
                var id = $(this).attr("id_num");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                     window.location="<?php echo base_url(); ?>view_ctr/deletedata/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
</script>  

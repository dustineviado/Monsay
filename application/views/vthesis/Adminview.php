<script>
  function confirmDelete(){
    return confirm("Do you want to delete this record?");

  }
</script>
  <h3>View Students </h3>
  <?php echo anchor('Adminctrl/add', 'Add Student', ['class'=>'btn btn-primary']);?>
  <div class="container-fluid table-responsive">
 <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>ID Number</th>
          <th>Name</th>
          <th>Age</th>
          <th>Contact</th>
          <th>Year</th>
          <th>Section</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php if(count($students)):?>
      <?php foreach($students as $stud):?>
        <tr>
          <td><?php echo $stud->id_num;?></td>
          <td><?php echo $stud->fname;?>
          <?php echo $stud->mname;?>
          <?php echo $stud->lname;?></td>
          <td><?php echo $stud->age;?></td>
          <td><?php echo $stud->contact;?></td>
          <td><?php echo $stud->year;?></td>
          <td><?php echo $stud->section;?></td>
          <td>
          <?php echo anchor("Adminctrl/update/{$stud->id_num}", 'Update', ['class'=>'label label-primary']);?>
          |
          <?php echo anchor("Adminctrl/delete/{$stud->id_num}", 'Delete', ['class'=>'label label-primary','onclick'=>'return confirmDelete()']);?>
            
          </td>
        </tr>
      <?php endforeach;?>
        <?php else:?>
          <tr>
            <td>No Records Found</td>
          </tr>
        <?php endif;?>
      </tbody>
    </table> 
  </div>
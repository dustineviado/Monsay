<script>
  function confirmDelete(){
    return confirm("Do you want to delete this record?");

  }
</script>
  <h3>Pre-Enrollee </h3>
  
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Control Number</th>
          <th>Name</th>
          <th>Age</th>
          <th>Contact</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php if(count($prestud)):?>
      <?php foreach($prestud as $newstud):?>
        <tr>
          <td><?php echo $newstud->ctrl_num;?></td>
          <td><?php echo $newstud->fname;?>
          <?php echo $newstud->mname;?>
          <?php echo $newstud->lname;?></td>
          <td><?php echo $newstud->age;?></td>
          <td><?php echo $newstud->contact;?></td>
          <td><?php echo $newstud->status;?></td>
          <td>
          <?php echo anchor("Adminprof/confirm/{$newstud->ctrl_num}", 'Confirm', ['class'=>'label label-primary']);?>
          |
          <?php echo anchor("Adminprof/delete/{$newstud->ctrl_num}", 'Delete', ['class'=>'label label-primary','onclick'=>'return confirmDelete()']);?>
            
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
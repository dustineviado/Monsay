
  <h3>View Students </h3>
  <?php if($msg = $this->session->flashdata('msg')):?>
      <script type="text/javascript"> alert('data saved') </script>
  <?php endif;?>
  <?php echo anchor('Adminctrl/add', 'Add Student', ['class'=>'btn btn-primary']);?>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>ID Number</th>
          <th>Name</th>
          <th>Birthday</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Year</th>
          <th>Section</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php if(count($posts)):?>
      <?php foreach($posts as $post):?>
        <tr>
          <td><?php echo $post->id_num;?></td>
          <td><?php echo $post->fname;?></td>
          <td><?php echo $post->birthday;?></td>
          <td><?php echo $post->age;?></td>
          <td><?php echo $post->gender;?></td>
          <td><?php echo $post->year;?></td>
          <td><?php echo $post->section;?></td>
          <td>
          <?php echo anchor("Adminctrl/update/{$post->id_num}", 'Update', ['class'=>'label label-primary']);?>
          |
          <?php echo anchor("Adminctrl/delete/{$post->id_num}", 'Delete', ['class'=>'label label-primary']);?>
        
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
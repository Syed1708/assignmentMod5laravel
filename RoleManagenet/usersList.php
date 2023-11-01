<table class="table">
  <thead>
    <tr>
      
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $users = json_decode(file_get_contents("users.json"));
    foreach ($users as $email => $userData) :

    ?>
    <tr>
      <th scope="row"><?php echo $userData->username; ?></th>
      <td><?php echo $email; ?></td>
      <td><?php echo $userData->role; ?></td>
      
      <td><a href='edit.php?email=<?php echo $email; ?>'>Edit</a> | 
      <?php if ($userData->role != "admin") : ?>
      <a href='delete.php?email=<?php echo $email; ?>' onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
      <?php endif; ?>
    </tr>
 <?php endforeach; ?>

  </tbody>
</table>




 


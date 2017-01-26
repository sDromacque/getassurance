<p>List of users :</p>

<ul class="list-group">
  <?php foreach($users as $user) { ?>
    <li class="list-group-item">

      <a  class="badge" href='?controller=user&action=show&id=<?php echo $user->id; ?>'>See user</a>
    <?php echo '<p>User : '.$user->firstname.'</p>'?>
    <?php } ?>
  </li>

</ul>

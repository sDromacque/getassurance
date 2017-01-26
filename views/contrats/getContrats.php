<p>List of contrats :</p>


<ul class="list-group">
  <?php foreach($contrats as $contrat) { ?>
    <li class="list-group-item">

      <a  class="badge" href='?controller=contrat&action=show&id=<?php echo $contrat->id; ?>'>See contrat</a>
    <?php echo '<p>User : '.$contrat->firstname.'</p>'?>
    <?php } ?>
  </li>

</ul>

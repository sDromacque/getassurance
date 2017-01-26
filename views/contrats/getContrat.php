<div class="panel panel-default">
  <div class="panel-heading"><?php echo '<p>Le contrat : '.$contrat->title.' de :'.$contrat->author.'</p>' ?></div>
  <div class="panel-body">
    <?php echo $contrat->lastname; ?>
  </div>

  <a  class="glyphicon glyphicon-remove" href='?controller=contrat&action=deleteContrat&id=<?php echo $contrat->id; ?>'>Remove</a>
</div>

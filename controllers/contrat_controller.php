<?php
  class contratController {
    public function getContrats() {
      $contrats = Contrat::all();

      require_once('views/contrats/getContrats.php');
    }

    public function postContrat(){
      if(isset($_POST['type_contrat']))
        $contrat = Contrat::create($_POST['type_contrat'], $_POST['user_id']);
      require_once('views/contrats/postContrat.php');
    }

    public function getContrat() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $contrat = Contrat::find($_GET['id']);
      require_once('views/contrats/getContrat.php');
    }

    public function deleteContrat(){
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $contrat = Contrat::delete($_GET['id']);
      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }
  }
?>

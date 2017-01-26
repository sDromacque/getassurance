<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;

      case 'assureur':
        require_once('models/Assureur.php');
        $controller = new AssureurController();
      break;
      case 'contrat':
        require_once('models/Contrat.php');
        $controller = new ContratController();
      break;
      case 'client':
        require_once('models/USser.php');
        $controller = new UserController();
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages'    => ['home', 'error'],
                       'assureur' => ['getAssureurs', 'getAssureur', 'postAssureur', 'login', 'getLogin'],
                       'user'   => ['getUsers', 'getUser', 'postUser', 'deleteUser'],
                       'contrat'  => ['getContrats', 'getContrat', 'postContrat']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>

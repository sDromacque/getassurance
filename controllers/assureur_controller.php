<?php
  class AssureurController {
    public function getAssureurs() {
      $posts = Post::all();
      require_once('views/assureur/index.php');
    }

    public function postAssureur(){
      if(isset($_POST['name']))
        $post = Post::create($_POST['title'], $_POST['author'], $_POST['lastname']);
      require_once('views/assureur/create.php');
    }

    public function getAssureur() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }

    public function login()
    {
      require_once('views/clients/login.php');
    }

    public function getLogin($email,$mdp)
    {
      if(isset($_POST['email']))
        $assureur = Assureur::login($_POST['email'], $_POST['mdp']);


    }

    public function is_loggedin()
    {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
    }

    public function redirect($url)
    {
       header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
  }
?>

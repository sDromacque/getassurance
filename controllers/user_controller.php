<?php
  class UserController {
    public function getUser() {
      $posts = User::all();
      require_once('views/User/getUsers.php');
    }

    public function postUser(){
      if(isset($_POST['author']))
        $post = User::create($_POST['firstname'], $_POST['lastname'], $_POST['contrat'], $_POST['role']);
      require_once('views/User/getUser.php');
    }

    public function getUser() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = User::find($_GET['id']);
      require_once('views/User/show.php');
    }

    public function deleteUser(){
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = User::delete($_GET['id']);
      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }
  }
?>

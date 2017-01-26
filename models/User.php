<?php
  class User {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $mdp;
    public $role;

    public function __construct($id, $firstname, $lastname, $email, $mdp, $role) {
      $this->id      = $id;
      $this->firstname  = $firstname;
      $this->lastname = $lastname;
      $this->email   = $email;
      $this->mdp = $mdp;
      $this->role = $role
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM client');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Client($post['id'], $post['firstname'], $post['lastname'], $post['email'], $post['role']);
      }

      return $list;
    }

    public static function delete($id){
      $db = Db::getInstance();
      $req = $db->prepare("DELETE FROM client WHERE id = :id");
      $req->execute(array('id' => $id));

      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }

    public static function create($author,  $title, $lastname){
      $db = Db::getInstance();
      $req = $db->prepare("INSERT INTO client (firstname, lastname, email, role) VALUES (:firstname, :lastname, :email, :mdp, :role)");
      $req->execute(array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "mdp" => $mdp,
            "role" => $role
            ));

    }


  }
?>

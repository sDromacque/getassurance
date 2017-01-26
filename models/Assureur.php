<?php
  class Client {
    // we define 3 attributes
    // they are public so that we can access them using $client->author directly
    public $id;
    public $firstname;
    public $lastname;
    public $email;

    public function __construct($id, $firstname, $lastname, $email) {
      $this->id      = $id;
      $this->author  = $firstname;
      $this->lastname = $lastname;
      $this->email   = $email;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM Client');

      // we create a list of Client objects from the database results
      foreach($req->fetchAll() as $client) {
        $list[] = new Client($client['id'], $client['author'], $client['lastname'], $client['email']);
      }

      return $list;
    }

    public static function delete($id){
      $db = Db::getInstance();
      $req = $db->prepare("DELETE FROM Client WHERE id = :id");
      $req->execute(array('id' => $id));

      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }

    public static function create($firstname,  $email, $lastname){
      $db = Db::getInstance();
      $req = $db->prepare("INSERT INTO Client (author, lastname, email) VALUES (:author, :lastname, :email)");
      $req->execute(array(
            "author" => $firstname,
            "lastname" => $lastname,
            "email" => $email
            ));

    }

    public static function login($email, $mdp)
    {
      $db = Db::getInstance();
      $req = $db->prepare("SELECT * FROM user WHERE email=:email LIMIT 1");
      $stmt->execute(array('email'=>$email));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() > 0)
      {
         if($userRow['mdp'] !== $mdp)
         {
            $_SESSION['user_session'] = $userRow['user_id'];
            return true;
         }
         else
         {
            return false;
         }

     }
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM Client WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $client = $req->fetch();

      return new Client($client['id'], $client['author'], $client['lastname'], $client['email']);
    }
  }
?>

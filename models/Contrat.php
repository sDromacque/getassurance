<?php
  class Contrat {

    public $id;
    public $type_contrat;
    public $user_id;

    public function __construct($id, $type_contrat, $user_id) {
      $this->id      = $id;
      $this->type_contrat  = $type_contrat;
      $this->user_id = $user_id;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM contrat');

      foreach($req->fetchAll() as $contrat) {
        $contrats[] = new Contrat($contrat['id'], $contrat['type_contrat'], $contrat['user_id'], $contrat['email']);
      }
      return $contrats;
    }

    public static function delete($id){
      $db = Db::getInstance();
      $req = $db->prepare("DELETE FROM contrat WHERE id = :id");
      $req->execute(array('id' => $id));

      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }

    public static function create($author,  $title, $user_id){
      $db = Db::getInstance();
      $req = $db->prepare("INSERT INTO contrat (type_contrat, user_id) VALUES (:type_contrat, :user_id)");
      $req->execute(array(
            "type_contrat" => $type_contrat,
            "user_id" => $user_id
            ));
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM contrat WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $Contrat = $req->fetch();

      return new Post($Contrat['id'], $Contrat['type_contrat'], $Contrat['user_id']);
    }
  }
?>

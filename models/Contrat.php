<?php
  class Contrat {

    public $id;
    public $type_contrat;
    public $user_id;
    public $price;

    public function __construct($id, $type_contrat, $user_id, $price) {
      $this->id      = $id;
      $this->type_contrat  = $type_contrat;
      $this->user_id = $user_id;
      $this->price = $price;
    }

    public static function getContrats() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM contrat');

      foreach($req->fetchAll() as $contrat) {
        $contrats[] = new Contrat($contrat['id'], $contrat['type_contrat'], $contrat['user_id'], $contrat['email'], $contrat['price']);
      }
      return $contrats;
    }

    public static function deleteContrat($id){
      $db = Db::getInstance();
      $req = $db->prepare("DELETE FROM contrat WHERE id = :id");
      $req->execute(array('id' => $id));

      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }

    public static function postContrat($author,  $title, $user_id){
      $db = Db::getInstance();
      $req = $db->prepare("INSERT INTO contrat (type_contrat, user_id) VALUES (:type_contrat, :user_id, :price)");
      $req->execute(array(
            "type_contrat" => $type_contrat,
            "user_id" => $user_id,
            "price" => $price
            ));
    }

    public static function getContrat($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM contrat WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $Contrat = $req->fetch();

      return new Contrat($Contrat['id'], $Contrat['type_contrat'], $Contrat['user_id'], $price['price']);
    }
  }
?>

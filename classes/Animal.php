<?php
require_once 'database.php';


class animal
{ public $id_animal;
    public $nom;
    public $espece;
    public $alimentation;
    public $image;
    public $paysOrigine;
    public $descriptionCourte;
    public $id_habitat;




public function __construct($nom = "", $espece = "", $alimentation = "", $image = "", $paysOrigine = "", $descriptionCourte = "", $id_habitat = ""){
    $this->nom = $nom;
    $this->espece = $espece;
    $this->alimentation = $alimentation;
    $this->image = $image;
    $this->paysOrigine = $paysOrigine;
    $this->descriptionCourte = $descriptionCourte;
    $this->id_habitat = $id_habitat;


   public function getId()
  {
    return $this->id_animal;
  }

  public function getNom()
  {
    return $this->nom;
  }
  public function getEspece()
  {
    return $this->espece;
  }

  public function getAlimentation()
  {
    return $this->alimentation;
  }
  public function getImage()
  {
    return $this->Image;
  }
  public function getPaysOrigine()
  {
    return $this->paysOrigine;
  }

  public function getDescriptionCourte()
  {
    return $this->descriptionCourte;
  }
  public function getIdHabitat()
  {
    return $this->id_habitat;
  }


    //Setters qui permettent de mettre à jour les attributs  espèce, image ....

   public function setId($id_animal)
  {
    $this->id_animal = $id_animal;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }
  public function setEspece($espece)
  {
    $this-> espece= $espece;
  }

  public function setAlimentation($alimentation)
  {
    $this->alimentation = $alimentation;
  }

  public function setImage($image)
  {
    $this->image = $image;
  }

  public function setPaysOrigine($paysOrigine)
  {
    $this->paysOrigine = $paysOrigine;
  }

  public function setDescriptionCourte($descriptionCourte)
  {
    $this->descriptionCourte = $descriptionCourte;
  }

  public function setIdHabitat($id_habitat)
  {
    $this->id_habitat = $id_habitat;
  }

  public static function listerTous() 
  {
    $db = new Database();
    $pdo = $db->getPdo();

    $sql = "SELECT * FROM animaux";
    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public function listerParHabitat()
  {
    $db = new Database();
    $pdo = $db->getPdo();
    $sql = "SELECT animaux.* ,habitats.nom as habitat
    FROM animaux
    INNER JOIN  habitats ON animaux.id_habitat = habitats.id_habitat";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }






}











}





?>
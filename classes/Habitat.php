<?php
require_once 'database.php';


class habitat
{   public  $id_habitat;
    public $nom;
    public $typeclimat;
    public $description;
    public $zonezoo;
    // public $image
   
 




  public function __construct($nom = "", $typeclimat = "", $description = "", $zonezoo = ""){
    $this->nom = $nom;
    $this->typeclimat = $typeclimat;
    $this->description = $description;
    $this->zonezoo = $zonezoo;
    // $this->image = $image;

  }

   public function getId()
  {
    return $this->id_habitat;
  }

  public function getNom()
  {
    return $this->nom;
  }
  public function getTypeclimat()
  {
    return $this->typeclimat;
  }

  public function getDescription()
  {
    return $this->description;
  }
  public function getZonezoo()
  {
    return $this->zonezoo;
  }
//   public function getImage()
//   {
//     return $this->image;
//   }
  
  


    //Setters qui permettent de mettre à jour les attributs  espèce, image ....

   public function setId($id_habitat)
  {
    $this->id_habitat = $id_habitat;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }
  public function setTypeclimat($typeclimat)
  {
    $this-> typeclimat= $typeclimat;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function setZonezoo($zonezoo)
  {
    $this->zonezoo = $zonezoo;
  }
//    public function setImage($image)
//   {
//     $this->image = $image;
//   }

  
  public static function listerTous() 
  {
    $db = new Database();
    $pdo = $db->getPdo();

    $sql = "SELECT * FROM habitats";
    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }


 public function creer(){
  $db = new Database();
  $pdo = $db->getPdo();

      $sql= "INSERT INTO habitats(nom, typeclimat, description, zonezoo) VALUES (?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);

          $stmt->execute([
            $this->nom , 
            $this->typeclimat,
            $this-> description,
            $this-> zonezoo,
          
           
          ]);

          

      }



}



















?>
<?php
require_once 'database.php';


class animal
{ 
    public $id_animal;
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
}


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
    return $this->image;
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


  public  static function listerParHabitat()
  {
    $db = new Database();
    $pdo = $db->getPdo();
    $sql = "SELECT animaux.* ,habitats.nom as habitat
    FROM animaux
    INNER JOIN  habitats ON animaux.id_habitat = habitats.id_habitat";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public function creer(){
  $db = new Database();
  $pdo = $db->getPdo();

      $sql= "INSERT INTO animaux(nom, espece, alimentation, image, paysOrigine, descriptionCourte, id_habitat) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);

          $stmt->execute([
          $this->getNom(),
          $this->getEspece(),
          $this->getAlimentation(),
          $this->getImage(),
          $this->getPaysOrigine(),
          $this->getDescriptionCourte(),
          $this->getIdHabitat() 
          ]);
      }

     public function supprimer()
        {   $db = new Database();
            $pdo = $db->getPdo();

            $sql = "DELETE FROM animaux WHERE id_animal = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $this->getId()]);
        }



        public function mettreAJour()
        { $db = new Database();
          $pdo = $db->getPdo();
          
          $sql = "UPDATE animaux 
          SET nom = :nom, espece = :espece,  alimentation = :alimentation,  image = :image, paysOrigine =:paysOrigine, descriptionCourte = :descriptionCourte,  id_habitat = :id_habitat WHERE id_animal = :id_animal";
          $stmt = $pdo->prepare($sql);
           return $stmt->execute([
                ':id_animal'         => $this->getId(),
                ':nom'               => $this->getNom(), 
                ':espece'            => $this->getEspece(),
                ':alimentation'      => $this->getAlimentation(),
                ':image'             => $this->getImage(),
                ':paysOrigine'       => $this->getPaysOrigine(),
                ':descriptionCourte' => $this->getDescriptionCourte(),
                ':id_habitat'        => $this->getIdHabitat() 
                  ]);
        }


 public function editanimal($id_animal)
 { $db = new Database();
   $pdo = $db->getPdo();
  $sql = "SELECT * FROM animaux WHERE id_animal = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([(int)$id_animal]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
     if ($result) {
        $this->setId($result['id_animal']);
        $this->setNom($result['nom']);
        $this->setEspece($result['espece']);
        $this->setAlimentation($result['alimentation']);
        $this->setImage($result['image']);
        $this->setPaysOrigine($result['paysOrigine']);
        $this->setDescriptionCourte($result['descriptionCourte']);
        $this->setIdHabitat($result['id_habitat']);

        return $this;
    }
 }

}
?>
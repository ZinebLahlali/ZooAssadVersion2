<?php
require_once 'database.php';

// id, titre, dateHeure, langue, capaciteMax, statut, duree, prix
class VisiteGuide {
    private $id_visite;
    private $titre;
    private $dateHeure;
    private $langue;
    private $capaciteMax;
    private $statut;
    private $duree;
    private $prix;

public function __construct($titre = "", $dateHeure = "", $langue = "", $capaciteMax = "", $statut = "", $duree = "", $prix = ""){
    $this->titre = $titre;
    $this->dateHeure = $dateHeure;
    $this->langue = $langue;
    $this->capaciteMax = $capaciteMax;
    $this->statut = $statut;
    $this->duree = $duree;
    $this->prix = $prix;
}


//geterres 

                  public function getId()
                    {
                      return $this->id_visite;
                    }

                    public function getTitre()
                    {
                      return $this->titre;
                    }
                    public function getDateheure()
                    {
                      return $this->dateHeure;
                    }

                    public function getLangue()
                    {
                      return $this->langue;
                    }
                    public function getCapacitemax()
                    {
                      return $this->capaciteMax;
                    }
                    public function getStatute()
                    {
                      return $this->statut;
                    }

                    public function getDuree()
                    {
                      return $this->duree;
                    }
                    public function getPrix()
                    {
                      return $this->prix;
                    }



   //Setters qui permettent de mettre à jour les attributs  titre , prix, statut  ....

                public function setId($id_visite)
                {
                  $this->id_visite = $id_visite;
                }

                public function setTitre($titre)
                {
                  $this->titre = $titre;
                }
                public function setDateheure($dateHeure)
                {
                  $this->dateHeure= $dateHeure;
                }

                public function setLangue($langue)
                {
                  $this->langue= $langue;
                }

                public function setCapacitemax($capaciteMax)
                {
                  $this-> capaciteMax = $capaciteMax;
                }

                public function setStatut($statut)
                {
                  $this->statut = $statut;
                }

                public function setduree($duree)
                {
                  $this->duree = $duree;
                }

                public function setPrix($prix)
                {
                  $this->prix = $prix;
                }

  public function creer(){
  $db = new Database();
  $pdo = $db->getPdo();

      $sql= "INSERT INTO visitesguidees(titre, dateHeure, langue, capaciteMax, statut, duree, prix) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);

          $stmt->execute([
            $this->titre, 
            $this->dateHeure,
            $this->langue,
            $this->capaciteMax,
            $this->statut,
            $this->duree,
            $this->prix,
           
          ]);

          

      }
      public static function listerParGuide($id_user)
        { $db = new Database();
          $pdo = $db->getPdo();

                $sql = "SELECT * FROM visitesguidees
                 LEFT JOIN etapesvisite ON visitesguidees.id_visite = etapesvisite.id_visite
                 WHERE visitesguidees.id_user = :id";
                    
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['id' => $id_user]);

                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function annuler()
        { $db = new Database();
          $pdo = $db->getPdo();
          $sql = "UPDATE visitesguidees
          SET statut = 'annulé'
          WHERE id_visite = :id";

          $stmt = $pdo->prepare($sql);
          $stmt->execute(['id' => $id_visite]);

         
        }

        public function mettreAJour()
        {  $db = new Database();
          $pdo = $db->getPdo();

          $sql = "UPDATE visitesguidees
                 SET titre = :titre, dateHeure = :dateHeure,  langue = :langue,  capaciteMax = :capaciteMax, statut =:statut, duree = :duree,  prix = : prix WHERE id_visite = :id_visite";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([
                $this->titre, 
                $this->dateHeure,
                $this->langue,
                $this->capaciteMax,
                $this->statut,
                $this->duree,
                $this->prix,
          ]);


        } 



}




?>


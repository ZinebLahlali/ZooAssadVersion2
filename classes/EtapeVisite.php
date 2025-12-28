<?php
    require_once 'database.php';

 //titreetape, descriptionetape, ordreetape, id_visite
    class Etapvisite
 {          private $id_etape,
            private $titreetape,
            private $descriptionetape,
            private $ordreetape,
            private $id_visite,

        public function __construct($titreetape = "", $descriptionetape = "", $ordreetape = "", $id_visite = "")
        {
            $this->titreetape = $titreetape;
            $this->descriptionetape = $descriptionetape;
            $this->ordreetape = $ordreetape;
            $this->id_visite = $id_visite;
        }

        //getters
        public function getId()
            {
                return $this->id_etape;
            }

         public function getTitreetape()
            {
                return $this->titreetape;
            }
        public function getDescriptionetape()
            {
                return $this->descriptionetape;
            }

         public function getOrdreetape()
            {
                return $this->ordreetape;
            }
        public function getIdVisite()
            {
                return $this->id_visite;
            }


    //Setters qui permettent de mettre à jour les attributs  titre , prix, statut  ....
          public function setId($id_etape)
            {
                $this->id_etape = $id_etape;
            }

         public function setTitreetapee($titreetape)
             {
                $this->titreetape = $titreetape;
             }
        public function setDescriptionetape($descriptionetape)
            {
                 $this->descriptionetape= $descriptionetape;
            }

        public function setOrdreetape($ordreetape)
            {
                $this->ordreetape= $ordreetape;
            }

        public function setIdVisite($id_visite)
            {
                 $this-> id_visite = $id_visite;
            }







}




?>
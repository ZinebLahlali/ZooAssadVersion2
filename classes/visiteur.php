<?php
require_once 'database.php';


class visiteur extends Utilisateur 
{
  protected $etat;


  public function __construct($nom, $email, $role,$password,$etat){
    $this->etat = $etat;
      parent::__construct($nom, $email, $role,$password)
  }


}





?>
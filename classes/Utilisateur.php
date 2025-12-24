<?php

class Utilisateur{
    protected $id_user;
    protected  $nom;
    protected  $email;
    protected $role;
    protected $password;
 

public function __construct(string $nom  , string $email  , string $role , string $password){
 $this->nom = $nom;
 $this->email = $email;
 $this->role = $role;
 $this->password = md5($password);

 

}
//Getters pour recuperer les valeurs des attributs id, nom, email,role,password,etat et approuve
public function getId()
{
  return $this->id_user;
}

public function getNom()
{
  return $this->nom;
}
public function getEmail()
{
  return $this->email;
}

public function getRole()
{
  return $this->role;
}
public function getPassword()
{
  return $this->password;
}

//Setters qui permettent de mettre à jour les attributs id, nom, email, role, password,etat et approuve

public function setId($id_user)
{
  $this->id_user = $id_user;
}

public function setNom($nom)
{
  $this->nom = $nom;
}
public function setEmail($email)
{
  $this->email = $email;
}

public function setRole($role)
{
  $this->role = $role;
}

public function setPassword($password)
{
  $this->password = $password;
}




public function creer(){
$db = new Database();
$pdo = $db->getPdo();

    $sql= "INSERT INTO utilisateurs(nom, email, `role`, `password`) VALUES (:nom, :email, :`role`, :`password`)";
    $stmt = $pdo->perpare($sql);

    if($stmt){
        $stmt->bindParam(':nom',$this->nom);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':role',$this->role);
        $stmt->bindParam(':password',$this->password);


        $stmt->execute();

        

    }
    
}
public function trouverParEmail($email){
 $db = new Database();
$pdo = $db->getPdo();

$sql= "SELECT * FROM utilisateurs WHERE email = :email";

 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':email',$this->email);
  $result = $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $user = new
  }


}
 

public function verifierMotDePasse($passwordInput,$password){
    return password_verify($passwordInput,$password);
}

}








?>


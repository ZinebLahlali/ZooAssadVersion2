<?php
require_once 'database.php';

class Utilisateur{
    protected $id_user;
    protected  $nom;
    protected  $email;
    protected $role;
    protected $password;
 

  public function __construct($nom = ""  ,$email =""  , $role = "" , $password = ""){
  $this->nom = $nom;
  $this->email = $email;
  $this->role = $role;
  $this->password = password_hash($password,PASSWORD_DEFAULT);

  

  
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
    $this->password = password_hash($password,PASSWORD_DEFAULT);
  }


  public function __tostring() : string
  {
    return  $this->id_user . " " . $this->nom . " " . $this->email . " " . $this->role . " " . $this->password;
  }


  public function creer(){
  $db = new Database();
  $pdo = $db->getPdo();

      $sql= "INSERT INTO utilisateurs(nom, email, `role`, `password_hash`) VALUES (?, ?, ?, ?)";
      $stmt = $pdo->prepare($sql);

          $stmt->execute([
            $this->nom , 
            $this->email,
            $this->role,
            $this->password
          ]);

          

      }

  public static function trouverParEmail($email){
      $db = new Database();
      $pdo = $db->getPdo();

  $sql= "SELECT * FROM utilisateurs WHERE email = :email";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':email',$email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); 
    
      
    } 
  public function verifierMotDePasse($passwordInput,$password){
      return password_verify($passwordInput,$password);
  }
}
}

$userModel = new Utilisateur();
  $useData = $userModel->trouverParEmail("aliadnan@gmail.com");
  if($useData){
echo $useData['nom'] . " " . $useData['email'] . " " . $useData['role'];  
  } 

  $user1 = new Utilisateur();










?>


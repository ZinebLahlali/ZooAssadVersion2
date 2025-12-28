// if($stmt){
        
      //     $stmt->bindParam(':nom',$this->nom);
      //     $stmt->bindParam(':email',$this->email);
      //     $stmt->bindParam(':role',$this->role);
      //     $stmt->bindParam(':password',$this->password);




      $approved = ($u->setRole($_POST['role']) == 'Guide') ? false:true; // test condition ? cas vrai:cas faux;
//    $u->setApprouve($approved); 
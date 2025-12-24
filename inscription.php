<?php
//instanciation
$u = new utilisateur("","","","","activé", "non approuvé"); //$u est une instance de la classe Utilisateur
    $db = new Database();
   $pdo = $db->getPdo();

if(isset($_POST['singup_submit'])){
   $u->setNom($_POST['nom']);
   $u->setEmail($_POST['email']);
   $u->setPassword($_POST['password']);
   $passwordconfi=$_POST['passwordconfi'];
   $u->setRole($_POST['role']);
//    $approved = ($u->setRole($_POST['role']) == 'Guide') ? false:true; // test condition ? cas vrai:cas faux;
//    $u->setApprouve($approved);

    function valideEmail($email){
   $mailRegex = '/^[a-zA-Z_]{4,15}@[a-zA-Z]{4,10}\.[a-zA-Z]{2,3}$/';
           return preg_match($mailRegex,$email);
    }
    function validPassword($password){
        $passRegex = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[-_@&!#\.*]){8,}$/';
        return preg_match($passRegex, $password);
    }

   if(!empty($u->getNom())&&!empty($u->getEmail())&&!empty($u->getPassword())&&!empty($u->getRole())){
        if(valideEmail($email))
            echo "email valide";
         else
             echo "email invalide";
        
        if(validPassword($password))
            echo " Mot de passe valide";
        else
           echo "Mot de passe invalide";
                
 
}   else
            echo "veuillez remplire tous les champs.";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Virtual Zoo – Login / Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white text-white">

  <!-- SIGNUP PAGE -->
  <section id="signup" class="min-h-screen flex items-center justify-center bg-[url('https://i.pinimg.com/736x/36/04/62/360462e73928a7f312f53f6888b59c11.jpg')] bg-cover bg-center">
    <div class="w-full max-w-md bg-black/60 backdrop-blur-md rounded-3xl p-8 shadow-2xl">
      <h1 class="text-3xl font-bold">Commencez votre<span class="text-yellow-400">Safari</span></h1>
      <p class="text-gray-300 mt-2">Inscrivez-vous pour explorer le zoo virtuel CAN 2025.</p>

      <form class="mt-6 space-y-4" method="POST">
        <input type="name" name="nom"  placeholder="Nom" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <input type="email" name="email" placeholder="Email" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <input type="password"  name="password" placeholder="Mot de passe" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <input type="password"  name="passwordconfi" placeholder="Confirmation mot de passe" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <select  name="role" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none">
            <option class="text-black" value="guide">Guide</option>
            <option  class="text-black" value="visiteur">Visiteur</option>
        </select>

        <button type="submit" name="singup_submit" value="submit"  class="w-full py-3 rounded-xl bg-yellow-500 text-black font-bold">Créer un compte</button>
      </form>

      <p class="text-center text-sm text-gray-300 mt-6">
        Déjà membre ?
        <button class="text-yellow-400 font-semibold">Se connecter</button>
      </p>
    </div>
  </section>

  <script src="script.js"></script>
   
</body>
</html>

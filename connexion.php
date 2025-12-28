<?php
session_start();
require_once 'classes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['passwordInput'];

    //POST should to be in condition
    $user = Utilisateur::trouverParEmail($email);

    if ($user && $user->verifierMotDePasse($password)) {
        $_SESSION['user_id'] = $user->getId();
        $role = $user->getRole();
        $_SESSION['user_role'] = $role;

        switch ($role) {
            case 'admin':
                header('location: dashboard_admin.php');
                exit;
            case 'guide':
                header('location: dashboard_guide.php');
                exit;
            case 'visiteur':
                header('location: dashboard_visiteur.php');
                exit;
            default:
                header('location: index.php');
                exit;
        } //switch end 
        
    } else { 
        echo "mot de passe ou email incorrect";
        exit;
    }
} // POST end


  // if($user->getEtat() !== "active")


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

  <!-- LOGIN PAGE -->
  <section id="login" class="min-h-screen flex items-center justify-center bg-[url('https://i.pinimg.com/1200x/f8/69/83/f8698331128b8f5c6052af7c309765fa.jpg')] bg-cover bg-center">
    <div class="w-full max-w-md bg-black/60 backdrop-blur-md rounded-3xl p-8 shadow-2xl">
      <h1 class="text-3xl font-bold text-center">Enter the Wild</h1>
      <p class="text-center text-gray-300 mt-2">Experience the roar of the savanna.</p>

      <form class="mt-6 space-y-4" method="POST">
        <input name="email" type="email" placeholder="Enter your email" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
      <span class="text-red-500 text-sm">
      </span>
        <input name="passwordInput" type="password" placeholder="Enter your password" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />

        <button type="submit"   name="loginsubmit"  class="w-full py-3 rounded-xl bg-yellow-500 text-black font-bold"></button>
      </form>

      <a class="text-center text-sm text-gray-300 mt-6">
        Don’t have an account?
        <button class="text-yellow-400 font-semibold">Join the Pride</button>
  </a>
    </div>
  </section>
  </body>
  </html>
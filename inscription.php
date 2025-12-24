
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

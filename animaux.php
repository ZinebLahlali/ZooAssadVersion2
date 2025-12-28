<?php
require_once 'classes/Animal.php';

$animals = animal::listerParHabitat();

  

 

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zoo de la Ville – Notre Famille Sauvage</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50 text-gray-900 font-sans">

<!-- Header -->
<header class="bg-white shadow-md sticky top-0">
  <div class="max-w-6xl mx-auto flex justify-between items-center p-4">
    <h1 class="text-2xl font-bold text-green-600">Zoo d’Afrique</h1>
    <nav class="hidden md:flex gap-6 font-medium">
      <a href="#" class="hover:text-green-600">Visite</a>
      <a href="#" class="text-green-600 font-bold">Animaux</a>
      <a href="#" class="hover:text-green-600">Adhésion</a>
      <a href="#" class="hover:text-green-600">Événements</a>
    </nav>
    <button class="bg-green-500 text-white px-4 py-2 rounded-lg font-bold">
      Billets
    </button>
  </div>
</header>

<!-- Hero Section -->
<section class="bg-green-700 text-white text-center py-20 px-4">
  <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
    Rencontrez notre famille sauvage
  </h2>
  <p class="max-w-2xl mx-auto text-lg opacity-90">
    Découvrez des animaux incroyables venant du monde entier et explorez leurs habitats naturels.
  </p>

  <!-- <div class="mt-6 flex justify-center gap-2">
    <input
      type="text"
      placeholder="Rechercher un animal..."
      class="p-3 rounded-lg text-black w-64"
    />
    <button class="bg-green-400 px-5 py-3 rounded-lg font-bold text-black">
      Rechercher
    </button>
  </div> -->
</section>

<!-- Filters -->
<section class="max-w-6xl mx-auto px-4 py-6 flex gap-3 overflow-x-auto">
    <select name="">Trouver les animaux
      <option></option>
    </select>
</section>

<!-- Animals Grid -->
<section class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pb-12">
     <div class="animals-container ">
    <?php foreach ($animals as $animal): ?>
        <div class="animal-card">
            <img  class="border border-2" src="<?php echo htmlspecialchars($animal["image"]); ?>">
            <h3><?php echo htmlspecialchars($animal["nom"]); ?></h3>
            <p><?php echo htmlspecialchars($animal["espece"]); ?></p>
            <p><?php echo htmlspecialchars($animal["alimentation"]); ?></p>
            <p><?php echo htmlspecialchars($animal["paysOrigine"]); ?></p>
            <p><?php echo htmlspecialchars($animal["descriptionCourte"]); ?></p>

            <div class="habitat-info">
                <span></span>
                <strong><?php echo htmlspecialchars($animal['habitat']); ?></strong>
            </div>
        </div>
    <?php endforeach; ?>
</div>



 

</section>

<!-- Fun Facts -->
<section class="bg-green-100 py-12 px-4">
  <div class="max-w-4xl mx-auto text-center">
    <h2 class="text-3xl font-extrabold mb-4">Le saviez-vous ?</h2>
    <p class="text-gray-700 mb-6">
      Apprenez des faits amusants sur nos animaux préférés.
    </p>

    <ul class="text-left max-w-xl mx-auto space-y-3">
      <li>🐘 Les éléphants ont une mémoire exceptionnelle.</li>
      <li>🦒 Les girafes ont la langue foncée pour éviter les coups de soleil.</li>
      <li>🐧 Les manchots offrent des cailloux pour séduire.</li>
    </ul>
  </div>
</section>

<!-- Footer -->
<footer class="bg-white border-t py-6 text-center text-sm text-gray-600">
  <p>© 2025 Zoo de la Ville. Tous droits réservés.</p>
  <div class="mt-2 space-x-4">
    <a href="#" class="hover:text-green-600">Confidentialité</a>
    <a href="#" class="hover:text-green-600">Conditions</a>
    <a href="#" class="hover:text-green-600">Contact</a>
  </div>
</footer>

</body>
</html>

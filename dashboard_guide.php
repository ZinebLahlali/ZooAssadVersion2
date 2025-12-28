<?php
session_start();
require_once  'classes/VisiteGuidee.php';

$db = new Database();
$pdo = $db->getPdo();

if(isset($_SESSION['id_user'])){
  $id_guide = $_SESSION['id_user'];
  $visites = VisiteGuide::listerParGuide($id_guide);
} else {
   header("location: dashboard_guide.php");
   exit;
}


$v = new VisiteGuide("","","","","","","");

if(isset($_POST['visiteSubmit'])){
  $v->setTitre($_POST['titre']);
  $v->setDateheure($_POST['date']);
  $v->setLangue($_POST['langue']);
  $v->setCapacitemax($_POST['capacite']);
  $v->setStatut($_POST['statut']);
  $v->setduree($_POST['duree']);
  $v->setPrix($_POST['prix']);

  $v->creer();
  header('location: dashboard_guide.php');
  exit;
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Guide</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-blue-700 text-white hidden md:block">
    <div class="p-6 text-2xl font-bold">Guide Panel</div>
    <nav class="mt-6">
      <a href="#" class="block px-6 py-3 bg-blue-600">Dashboard</a>
      <a href="#" class="block px-6 py-3 hover:bg-blue-600">Mes visites</a>
      <a href="#" class="block px-6 py-3 hover:bg-blue-600">Réservations</a>
      <a href="#" class="block px-6 py-3 hover:bg-blue-600">Profil</a>
    </nav>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-semibold">Dashboard du Guide</h1>
      <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
        Déconnexion
      </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
      <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500">Visites totales</p>
        <h2 class="text-2xl font-bold">12</h2>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500">Visites actives</p>
        <h2 class="text-2xl font-bold">5</h2>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500">Réservations</p>
        <h2 class="text-2xl font-bold">34</h2>
      </div>
      <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500">Revenus</p>
        <h2 class="text-2xl font-bold">1 200 €</h2>
      </div>
    </div>

    <!-- Formulaire -->
    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-3xl border border-gray-100">
  
                    <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
                      🧭 Créer une visite
                    </h2>

                    <form class="grid grid-cols-1 md:grid-cols-2 gap-5">

                      <!-- Titre -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Titre</label>
                        <input 
                          type="text" name="titre"
                          placeholder="Ex : Visite de la médina"
                        class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"

                          required>
                      </div>

                      <!-- Langue -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Langue</label>
                        <select  name="langue"
                          class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"

                          required>
                          <option value="">🌍 Choisir une langue</option>
                          <option value="fr">🇫🇷 Français</option>
                          <option value="en">🇬🇧 Anglais</option>
                          <option value="es">🇪🇸 Espagnol</option>
                          <option value="ar">🇲🇦 Arabe</option>
                          <option value="de">🇩🇪 Allemand</option>
                          <option value="it">🇮🇹 Italien</option>
                        </select>
                      </div>

                      <!-- Date -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Date</label>
                        <input name="date" type="date" class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"
                  required>
                      </div>

                      <!-- Heure -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Heure</label>
                        <input name="heure" type="time" class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"
                  required>
                      </div>

                      <!-- Durée -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Durée (heures)</label>
                        <input  name="duree" type="number" min="1" class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"
                  required>
                      </div>

                      <!-- Capacité -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Capacité</label>
                        <input name="capacite" type="number" min="1" class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"
                  required>
                      </div>

                      <!-- Prix -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Prix (€)</label>
                        <input name="prix" type="number" min="0" step="0.01" class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition"
                  required>
                      </div>

                      <!-- Statut -->
                      <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Statut</label>
                        <select name="statut" class="w-full rounded-lg border border-blue-400 px-4 py-2
                        focus:border-blue-600 focus:ring-2 focus:ring-blue-200
                        transition">
                          <option value="active">🟢 Active</option>
                          <option value="inactive">⚪ Inactive</option>
                          <option value="annulee">🔴 Annulée</option>
                        </select>
                      </div>

                      <!-- Buttons -->
                      <div class="md:col-span-2 mt-6 flex gap-4">
                        
                        <!-- Annuler -->
                        <button 
                          type="reset"
                          class="w-1/2 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold
                                hover:bg-gray-200 transition border">
                          Annuler
                        </button>

                        <!-- Enregistrer -->
                        <button 
                          type="submit" name="visiteSubmit"
                          class="w-1/2 bg-gradient-to-r from-blue-600 to-blue-500 
                                text-white py-3 rounded-xl font-semibold 
                                hover:from-blue-700 hover:to-blue-600 
                                shadow-md hover:shadow-lg transition">
                          💾 Enregistrer
                        </button>

                      </div>

                    </form>
</div>

    <div>
      <table class="min-w-full bg-white border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Nom</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Espèce</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach ($ as $animal): ?>
                            <tr>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($animal["nom"]); ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($animal["espece"]); ?></td>  
                                <td>
                                   <a href="admin_animaux.php?id<?= $animal['id_animal']?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier</a>
                                   <a href="dashboard_admin.php?id_a=<?= $animal['id_animal'] ?>"
                                          onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')" 
                                          class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                          Supprimer
                                        </a>
                                </td> 
                            </tr>
                             <?php endforeach; ?>
                             
                        </tbody>
                    </table>
    </div>
  </main>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin – Zoo ASSAD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-green-700 text-white px-6 py-4 flex justify-between">
    <span class="font-bold text-xl">Zoo ASSAD 🦁</span>
    <ul class="flex gap-6">
      <li>Accueil</li>
      <li>Admin</li>
      <li>Déconnexion</li>
    </ul>
  </nav>

  <!-- Content -->
  <main class="p-8">
    <h1 class="text-3xl font-bold text-green-700 mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-xl shadow">Gestion des animaux</div>
      <div class="bg-white p-6 rounded-xl shadow">Gestion des guides</div>
      <div class="bg-white p-6 rounded-xl shadow">Statistiques générales</div>
    </div>
  </main>

</body>
</html>

<?php
require_once 'classes/Database.php';
$db = new Database();
$pdo = $db->getPdo();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Zoo ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">

    <div class="bg-white max-w-2xl p-10 rounded-2xl shadow-lg text-center">

        <h1 class="text-4xl font-bold text-green-700 mb-6">
            Bienvenue au Zoo ASSAD 🦁
        </h1>

        <p class="text-gray-700 text-lg leading-relaxed">
            À l’occasion de la Coupe d’Afrique des Nations 2025 organisée au Maroc,
            un zoo virtuel nommé <span class="font-semibold text-green-700">« ASSAD »</span>
            souhaite promouvoir les lions de l’Atlas et les animaux auprès des
            supporters et visiteurs du continent africain.
        </p>

        <div class="mt-8">
            <a href=""
               class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition">
                Découvrir les animaux
            </a>
        </div>

    </div>

</body>
</html>


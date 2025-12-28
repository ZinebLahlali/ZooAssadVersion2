
<?php
require_once 'classes/Animal.php';
require_once 'classes/Database.php'; 


  $db = new Database();
  $pdo = $db->getPdo();

$a = new animal();

$id_animal = $_GET['id'] ?? null;
if ($id_animal) {
    $a->editanimal($id_animal);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['submitEdit'])){

        $a->setId($_POST['id_animal']);
        $a->setNom($_POST['nom']);
        $a->setEspece($_POST['espece']);
        $a->setImage($_POST['image']);
        $a->setAlimentation($_POST['alimentaire']);
        $a->setPaysOrigine($_POST['country']);
        $a->setDescriptionCourte($_POST['description']);
        $a->setIdHabitat($_POST['id_habitat']);

        if($a->mettreAJour()){
            header('location: dashboard_admin.php?success=update');
        } else
        {
            echo "Data error !";
        }
    }
}




// if (isset($_GET['id'])) {
//     $id = $_GET['id'];

//     $a->listerTous($id); 
// }

//update
// if(isset($POST['submitEdit'])){
//     $a->setId($_POST['id_animal']);
//     $a->setNom($_POST['nom']);
//     $a->setEspece($_POST['espece']);
//     $a->setImage($_POST['image']);
//     $a->setAlimentation($_POST['alimentaire']);
//     $a->setPaysOrigine($_POST['country']);
//     $a->setDescriptionCourte($_POST['description']);
//     $a->setIdHabitat($_POST['Id_habitat']);
    
//     if($a->mettreAJour()){
//         header('location: dashboard_admin.php?success=update');

//     } else
//         {
//             echo "Data error !";
//         }
// }
?>








 <!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin - Zoo Virtual</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transition-all">

    <!-- Header -->
    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4 text-white flex justify-between items-center">
        <h3 class="text-xl font-semibold tracking-wide">Nouvel Animal</h3>
        <button id="closeIcon" class="text-2xl hover:opacity-75">&times;</button>
    </div>

    <!-- Form -->
    <form method="POST" class="p-6 space-y-5">

        <input type="hidden" name="id_animal" value="<?= $a->getId() ?? '' ?>">

        <!-- Section: Base Info -->
        <div>
            <p class="text-sm font-semibold text-gray-600 mb-2">Informations de base</p>
            <div class="grid grid-cols-2 gap-3">
                <input type="text" name="nom" placeholder="Nom" required
                       value="<?= $a->getNom() ?? ''?>"
                       class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none">

                <input type="text" name="espece" placeholder="Espèce" required
                       value="<?= $a->getEspece() ??'' ?>"
                       class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none">
            </div>
        </div>

        <!-- Image -->
        <input type="url" name="image" placeholder="Image URL"
               value="<?= $a->getImage() ?? ''; ?>"
               class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 w-full focus:ring-2 focus:ring-green-500 outline-none">

        <!-- Diet -->
        <select name="alimentaire" required
                class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 w-full focus:ring-2 focus:ring-green-500 outline-none">
            <option value="Carnivore" <?= ($a->getAlimentation() == 'Carnivore') ? 'selected' : ''; ?>>Carnivore</option>
            <option value="Herbivore" <?= ($a->getAlimentation()  == 'Herbivore') ? 'selected' : ''; ?>>Herbivore</option>
            <option value="Omnivore" <?= ($a->getAlimentation () == 'Omnivore') ? 'selected' : ''; ?>>Omnivore</option>
        </select>

        <!-- Country -->
        <input type="text" name="country" placeholder="Pays d'origine"
               value="<?= $a->getPaysOrigine()?? ''  ?>"
               class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 w-full focus:ring-2 focus:ring-green-500 outline-none">

        <!-- Habitat -->
        <select name="id_habitat" required
            class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 w-full focus:ring-2 focus:ring-green-500 outline-none">

            <!-- Always keep a static placeholder -->
            <option value="" disabled <?= $a->getIdHabitat() ? '' : 'selected' ?>>Sélectionner l'habitat</option>

            <?php
            $stmt = $pdo->query("SELECT id_habitat, nom FROM habitats");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // If the current row matches the animal's habitat, mark it as selected
                $selected = ($row['id_habitat'] == $a->getIdHabitat()) ? 'selected' : '';
                echo "<option value=\"{$row['id_habitat']}\" $selected>{$row['nom']}</option>";
            }
            ?>
        </select>


        <!-- Description -->
        <textarea name="description" rows="3" placeholder="Description courte..." 
                  class="bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 w-full focus:ring-2 focus:ring-green-500 outline-none"><?= $a->getDescriptionCourte() ?? ''?></textarea>

        <!-- Buttons -->
        <div class="flex gap-3 pt-2">
            <button type="button" id="cancelBtn"
                    class="flex-1 bg-gray-100 text-gray-700 py-2 rounded-xl hover:bg-gray-200 transition font-semibold">
                Annuler
            </button>
            <button type="submit" name="submitEdit" value="submit"
                    class="flex-1 bg-gradient-to-r from-green-600 to-emerald-500 text-white py-2 rounded-xl hover:opacity-90 transition shadow-lg font-semibold">
                Enregistrer
            </button>
        </div>

    </form>
</div>

     </body>        
</html>     
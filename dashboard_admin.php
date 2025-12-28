<?php
require_once 'classes/Animal.php';
require_once 'classes/Habitat.php';

  $db = new Database();
  $pdo = $db->getPdo();

$animals = animal::listerTous();

   if(isset($_POST['AddAnimal'])){

     $a = new animal(); //$u est une instance de la classe Animal


    $a->setNom($_POST['nom']);
    $a->setEspece($_POST['espece']);
    $a->setImage($_POST['image']);
    $a->setAlimentation($_POST['alimentaire']);
    $a->setPaysOrigine($_POST['country']);
    $a->setDescriptionCourte($_POST['description']);
    $a->setIdHabitat($_POST['Id_habitat']);
    
    $a->creer();
    header('location: dashboard_admin.php');
    exit;
   }
//Habitat create

  $habitats = habitat::listerTous();

   if(isset($_POST['AddHabitat'])){
      $h = new habitat(); //$u est une instance de la classe 

    $h->setNom($_POST['nom']);
    $h->setTypeclimat($_POST['typeClimat']);
    $h->setZonezoo($_POST['zone']);
    $h->setDescription($_POST['description']);
    
    $h->creer();
    header('location: dashboard_admin.php');
    exit;
   }


    if(isset($_GET['id_a'])){
    $a = new animal();
    $a->setId($_GET['id_a']);
    $a->supprimer();
    if($a->supprimer()){
    header('location: dashboard_admin.php');
    }else {
        echo "La suppression a échoué en base de données.";
    }
}
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

        <!-- Main content -->
 <div class="flex-1 p-6">
            <!-- Topbar -->
            <div class="flex justify-between items-center mb-6">
                <div class="text-xl font-semibold text-gray-700">Bienvenue, Administrateur</div>
                <div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Déconnexion</button>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Users Card -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.406 1.406a1 1 0 01-1.42 0L16 18l-4 4v-2l4-4h-5a5 5 0 00-5 5v2a5 5 0 005 5h5a5 5 0 005-5v-2a5 5 0 00-5-5z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl font-semibold text-gray-700">Utilisateurs Totaux</div>
                            <div class="text-3xl font-bold text-gray-800">1247</div>
                        </div>
                    </div>
                </div>

                <!-- Total Animals Card -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="bg-green-100 text-green-600 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v12m0 0l-6-6m6 6l6-6" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl font-semibold text-gray-700">Animaux Totaux</div>
                            <div class="text-3xl font-bold text-gray-800">98</div>
                        </div>
                    </div>
                </div>

                <!-- Total Tours Card -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="bg-orange-100 text-orange-600 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v3m14-3v3m-7 5h7m-7 4h7m-7 4h7" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl font-semibold text-gray-700">Visites Totales</div>
                            <div class="text-3xl font-bold text-gray-800">120</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CRUD for Animals and Habitats -->
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Gestion des Animaux et Habitats</h2>
                
                <div class="bg-white p-6 shadow-lg rounded-lg mb-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Gestion des Animaux</h3>
                    <button id="btnAnimal" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Ajouter un Animal</button>
                     <div id="formAnimal" class="fixed hidden inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50  flex items-center justify-center p-4">
    
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
                
                <div class="bg-green-600 p-4 text-white flex justify-between items-center">
                    <h3 class="text-xl font-semibold">Nouvel Animal</h3>
                    <button id="closeIcon" class="text-white hover:text-gray-200 text-2xl">&times;</button>
                </div>

                <form method="POST" class="p-6 grid gap-4 ">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Information de base</label>
                        <div class="grid grid-cols-2 gap-2 mt-1">
                            <input type="text" name="nom" placeholder="Nom" required
                                  class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">
                            <input type="text" name="espece" placeholder="Espèce" required
                                  class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">
                        </div>
                    </div>

                    <input type="url" name="image" placeholder="Image URL (http://...)"
                          class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">

                    <div class="grid grid-cols-2 gap-2">
                        <select name="alimentaire" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none bg-white" required>
                            <option value="" selected disabled>Régime</option>
                            <option value="Carnivore">Carnivore</option>
                            <option value="Herbivore">Herbivore</option>
                            <option value="Omnivore">Omnivore</option>
                        </select>
                        
                        <input type="text" name="country" placeholder="Pays"
                              class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full">
                    </div>

                        <select name="Id_habitat" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none bg-white" required>
                            <option value="" selected disabled>Sélectionner l'habitat</option>
                            <?php
                            $stmt = $pdo->query("SELECT id_habitat, nom FROM habitats");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $row['id_habitat'] . '">' . $row['nom'] . '</option>';
                            }
                            ?>
                        </select>

                    <textarea name="description" rows="3" placeholder="Description courte..."
                              class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full"></textarea>

                    <div class="flex gap-3 mt-2">
                        <button type="button" id="cancelBtn"
                                class="flex-1 bg-gray-100 text-gray-700 py-2 rounded-lg hover:bg-gray-200 transition font-medium">
                            Annuler
                        </button>
                        <button type="submit" name="AddAnimal" value="submit"
                                class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition shadow-md font-medium">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
    </div>
                  
                    <!-- Table for Animals -->
                    <table class="min-w-full bg-white border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Nom</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Espèce</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach ($animals as $animal): ?>
                            <tr>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($animal["nom"]); ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($animal["espece"]); ?></td>  
                                <td>
                                <a href="admin_animaux.php?id=<?= $animal['id_animal'] ?>" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Modifier
                                </a>
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

                <!-- CRUD for Habitats -->
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Gestion des Habitats</h3>
                    <a id="btnHabitat" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block cursor-pointer">Ajouter un Habitat</a>
                    

                    <!-- Table for Habitats -->
                    <table class="min-w-full bg-white border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Nom</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Climat</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Zone</th>
                                <th class="py-2 px-4 text-left border-b text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Habitat Example Row -->
                           <?php foreach ($habitats as $habitat): ?>
                            <tr>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($habitat["nom"]); ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($habitat["typeclimat"]); ?></td> 
                                <td class="py-2 px-4"><?php echo htmlspecialchars($habitat["zonezoo"]); ?></td> 

                                <td>
                                    <a href="admin_habitats.php?action=edit&id=1" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier</a>
                                    <a href="admin_habitats.php?action=delete&id=1" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</a>
                                </td>
                            </tr>
                             <?php endforeach; ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

   
                 
             <div id="formHabitat" class="fixed hidden inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50  flex items-center justify-center p-4">
                 <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
                      
                      <div class="bg-green-600 p-4 text-white flex justify-between items-center">
                          <h3 class="text-xl font-semibold">Nouvel Habitat</h3>
                          <button id="habitatIcon" class="text-white hover:text-gray-200 text-2xl">&times;</button>
                      </div>
                          <form method="POST" class="p-6 grid gap-4">

                        <!-- Nom -->
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" placeholder="Nom"
                                  required
                                  class="border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-green-500 outline-none w-full">
                        </div>

                        <!-- Type de climat -->
                        <select name="typeClimat"
                                required
                                class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none bg-white w-full">
                            <option value="" selected disabled>Type de climat</option>
                            <option value="Tropical">Tropical</option>
                            <option value="Désertique">Désertique</option>
                            <option value="Tempéré">Tempéré</option>
                            <option value="Polaire">Polaire</option>
                        </select>

                      <!-- Zone du zoo -->
                        <select name="zone"
                                required
                                class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none bg-white w-full">
                            <option value="" selected disabled>Zone du zoo</option>
                            <option value="Zone A">Zone A</option>
                            <option value="Zone B">Zone B</option>
                            <option value="Zone D">Zone D</option>
                            <option value="Zone E">Zone E</option>
                        </select>


                    <!-- Description -->
                    <textarea name="description"
                              rows="3"
                              placeholder="Description courte..."
                              class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none w-full"></textarea>

                                  <!-- Buttons -->
                                  <div class="flex gap-3 mt-2">
                                      <button type="button" id="cancelHabitat"
                                              class="flex-1 bg-gray-100 text-gray-700 py-2 rounded-lg hover:bg-gray-200 transition font-medium">
                                          Annuler
                                      </button>
                                      <button type="submit" name="AddHabitat" value="submit"
                                              class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition shadow-md font-medium">
                                          Enregistrer
                                      </button>
                                  </div>
                              </form>

              </div>

                                

            </div>
</div>

    <script>
              const modal = document.getElementById('formAnimal');
             const btnAnimal = document.getElementById('btnAnimal');
            const cancelBtn = document.getElementById('cancelBtn');
           const closeIcon = document.getElementById('closeIcon');
           const btnHabitat = document.getElementById('btnHabitat');
            const formHabitat = document.getElementById('formHabitat');
           const habitatIcon = document.getElementById('habitatIcon');
            const cancelHabitat = document.getElementById('cancelHabitat');

           
           btnAnimal.addEventListener('click', () => {
              console.log('test')
              modal.classList.remove('hidden');
            })
                    cancelBtn.addEventListener('click', () => {
                     modal.classList.add('hidden');
          });

              closeIcon.addEventListener('click', () => {
              modal.classList.add('hidden');
          });

          //habitat
          btnHabitat.addEventListener('click', () => {
              formHabitat.classList.remove('hidden');
            })
                cancelHabitat.addEventListener('click', () => {
                formHabitat.classList.add('hidden');
          });

              habitatIcon.addEventListener('click', () => {
              formHabitat.classList.add('hidden');
          });
       
    </script>

</body>
</html>

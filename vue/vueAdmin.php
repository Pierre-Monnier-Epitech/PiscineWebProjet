<?php
$user = user();
$ad = ad();
?>

<style>
     @import url("css/color.css");
</style>

<!-- titre de la page admin -->
<p><b>Page Admin</b></p>
<div class="lg:p-4">
<div class="overflow-auto h-96">
    <table class="w-full border-solid border-2 border-black md:min-w-full md:border md:border-black md:border-2">
        <thead>
            <tr>
                <!-- Titres pour des données affichées -->
                <th class="md:border md:border-black md:border-2 md:px-4 md:py-2">ID</th>
                <th class="md:border md:border-black md:border-2 md:px-4 md:py-2">Mail</th>
                <th class="md:border md:border-black md:border-2 md:px-4 md:py-2">Rôle</th>
                <th class="md:border md:border-black md:border-2 md:px-4 md:py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($user as $box) {
                echo "<tr>";
                
                # Afficher l'ID de l'utilisateur
                echo "<td class='border border-black border-2 md:px-4 md:py-2'>{$box['ult_ID']}</td>";
                
                # Afficher le mail
                echo "<td class='border border-black border-2 md:px-4 md:py-2'>{$box['mail']}</td>";

                # Afficher le rôle
                echo "<td class='border border-black border-2 md:px-4 md:py-2'>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='userID' value='{$box['ult_ID']}'>";
                echo "<select name='role' onchange='this.form.submit()' class='md:w-full md:px-2 md:py-1 md:border md:border-black md:border-2 md:rounded'>";
                echo "<option value='client' " . ($box['role'] == 'client' ? 'selected' : '') . ">Client</option>";
                echo "<option value='admin' " . ($box['role'] == 'admin' ? 'selected' : '') . ">Admin</option>";
                echo "<option value='employe' " . ($box['role'] == 'employer' ? 'selected' : '') . ">Employé</option>";
                echo "</select>";
                echo "</form>";
                echo "</td>";

                # Bouton pour supprimer un utilisateur
                echo "<td class='border border-black border-2 md:px-4 md:py-2'>";
                echo "<form method='post' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='userID' value='{$box['ult_ID']}'>";
                echo "<button type='submit' name='deleteUser' class='md:bg-red-500 md:hover:bg-red-700 md:text-white md:font-medium md:py-1 md:px-2 md:rounded'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>







<!-- confirmer la supression -->
<script>
function confirmDelete() {
    return confirm("Êtes-vous sûr de vouloir supprimer?");
}
</script>

<!-- form pour créer un utilisateur -->
<h2 class="text-2xl font-bold mb-4">Créer Utilisateur</h2>
<form class="border border-black border-2 p-4" action="?action=admin" method="POST">
    <!-- adresse mail -->
    <div class="mb-4">
        <label for="createUser" class="block font-medium">Adresse-mail:</label>
        <input type="text" id="createUser" name="createUser" placeholder="Email" required
            class="w-full px-3 py-2 border border-black border-2 rounded focus:outline-none focus:border-blue-400">
    </div>
    <!-- mot de passe -->
    <div class="mb-4">
        <label for="mdp" class="block font-medium">Mot de passe:</label>
        <input type="text" id="mdp" name="mdp" placeholder="Mot de passe" required
            class="w-full px-3 py-2 border border-black border-2 rounded focus:outline-none focus:border-blue-400">
    </div>

    <input class="bgPurple hover:bg-purple-700 text-white font-medium py-2 px-4 rounded" type="submit" value="Confirmer" />
    <input class="bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-4 rounded" type="reset" value="Effacer" />
</form>



<div class="p-4">
  <!-- tableau pour afficher les annonces -->
  <table class="w-full border-solid border-2 border-black">
    <tr class="text-left">
      <!-- titres pour des données affichées -->
      <th>ID</th>
      <th>titre</th>
      <th>date</th>
    </tr>
    <tbody>
      <?php
      foreach ($ad as $boxy) {
        echo "<tr>";
        # afficher l'ID de l'annonce
        echo "<td class='border-solid border-2 border-black'>{$boxy['ann_ID']}</td>";
        
        # afficher le titre
        echo "<td class='border-solid border-2 border-black'>{$boxy['titre']}</td>";

        # afficher la date
        echo "<td class='border-solid border-2 border-black'>{$boxy['heure']}</td>";

        # bouton pour supprimer une annonce
        echo "<td class='border-solid border-2 border-black'>";
        echo "<form method='post' onsubmit='return confirmDelete()'>";
        echo "<input type='hidden' name='adID' value='{$boxy['ann_ID']}'>";
        echo "<button type='submit' name='deleteAd'>Supprimer</button>";
        echo "</form>";
        echo "</td>";

        # bouton pour modifier une annonce
        echo "<td class='border-solid border-2 border-black'>";
        echo "<form action='?action=updateAd' method='POST'>";
        echo "<input type='hidden' name='ad_id' value='{$boxy['ann_ID']}'>";
        echo "<button type='submit' name='editAd'>Modifier</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<!-- form pour créer une annonce -->
<h2 class="text-2xl font-bold mb-4">Créer Annonce</h2>
<form class="border-solid border-2 border-black p-4" action="?action=admin" method="POST">
    <!-- titre -->
    <div class="mb-4">
        <label for="createAd" class="block font-bold">Titre:</label>
        <input type="text" id="createAd" name="createAd" placeholder="Titre" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
    </div>
    <!-- description -->
    <div class="mb-4">
        <label for="description" class="block font-bold">Description:</label>
        <input type="text" id="description" name="description" placeholder="Description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
    </div>
    <!-- vehiculisé -->
    <div class="mb-4">
        <label for="vehicule" class="block font-bold">Véhiculisé:</label>
        <select id="vehicule" name="vehicule" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
            <option value="oui">OUI</option>
            <option value="non">NON</option>
        </select>
    </div>
    <!-- prix -->
    <div class="mb-4">
        <label for="prix" class="block font-bold">Prix:</label>
        <input type="text" id="prix" name="prix" placeholder="Prix" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
    </div>
    <!-- statue -->
    <div class="mb-4">
        <label for="statue" class="block font-bold">Statut:</label>
        <input type="text" id="statue" name="statue" placeholder="Statut" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
    </div>

    <input class="bgPurple text-white font-bold py-2 px-4 rounded hover:bg-blue-700 cursor-pointer" id="button" type="submit" value="Confirmer" />
    <input class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-400 cursor-pointer" type="reset" value="Effacer" />
</form>
    </div>
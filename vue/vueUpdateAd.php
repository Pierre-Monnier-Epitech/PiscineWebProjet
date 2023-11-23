<?php
include "$racine/controleur/updateAd.php";

$inf = adv($adID);
$test = $inf[0];
?>
<!-- titre pour la page de modification de l'annonce -->
<div class="font-bold text-center text-lg">
  <h1>Modification Annonce</h1>
</div>

    <!-- form pour modifier une annonce -->
    <div id="testContainer" class="border-solid border-2 border-black p-4 m-4">
      <form  action="<?php $racine.'./?action=updateAd'?>" method="POST">


        <!-- titre -->
        <div class="p-2">
          <label for="titre">Titre :</label>
          <input type="text" id="titre" name="titre" class="border-2 border-solid p-1 " value="<?= $test['titre'] ?>">
        </div>
    
        <!-- description -->
        <div class="p-2">
          <label for="description">Description :</label>
          <div class="">
            <?php
            ?>
             <textarea id="description" class="w-full h-48 border-2 border-solid p-1 " name="description"><?= $test["description"] ?></textarea>
          </div>
        </div>
    
        <!-- date -->
        <div class="p-2">
          <label for="date">Date :</label>
          <input type="date" id="date" name="date" class="border-2 border-solid p-1 text-gray-400 italic" value="<?= $test["heure"] ?>" disabled>
          <input type="hidden" name="date" value="<?= $test["heure"] ?>">
        </div>
    
        <!-- vehiculisé -->
        <div class="p-2">
          <label for="vehicule">Véhiculisé :</label>
          <div>
            <label for="oui">Oui</label>
            <input type="radio" id="oui" name="drone" value="oui" checked />

            <label for="non">Non</label>
            <input type="radio" id="non" name="drone" value="non" />
          </div>
        </div>

        <!-- prix -->
        <div class="p-2">
          <label for="prix">Prix :</label>
          <input type="text" id="prix" name="prix" class="border-2 border-solid p-1 " value="<?= $test["prix"] ?>">
        </div>

        <!-- statue -->
        <div class="p-2">
          <label for="statue">Statue :</label>
          <input type="text" id="statue" name="statue" class="border-2 border-solid p-1 " value="<?= $test["statue"] ?>">
        </div>


        <!-- bouton confirmer -->
        <div class="p-8">
          <button type="submit" id="button" class="bgPurple text-white  p-4 rounded">Confirmer</button>
        </div>
      </form>
    </div>

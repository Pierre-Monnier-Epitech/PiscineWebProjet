<div class="text-center py-6">
  <h1 class="text-3xl font-bold text-gray-800">Modification</h1>
</div>

<div id="infoContainer" class="bg-white border border-gray-300 p-6 m-6 shadow-lg rounded-lg">
  <form action="<?php $racine.'./?action=inscription'?>" method="POST">
    <div class="mb-4">
      <label for="nom" class="text-gray-700 font-bold">Nom :</label>
      <input type="text" id="nom" name="nom" class="border border-gray-300 p-2 w-full" value="<?= $info["nom"] ?>">
    </div>
    <div class="mb-4">
      <label for="prenom" class="text-gray-700 font-bold">Prénom :</label>
      <input type="text" id="prenom" name ="prenom" class="border border-gray-300 p-2 w-full" value="<?= $info["prenom"] ?>">
    </div>
    <div class="mb-4">
      <label for="email" class="text-gray-700 font-bold">Email :</label>
      <input type="email" id="ok" name="ok" class="border border-gray-300 p-2 w-full text-gray-400 italic" value="<?= $util["mail"] ?>" disabled>
      <input type="hidden" name="email" value="<?= $util["mail"] ?>">
    </div>
    <div class="mb-4">
      <label for="age" class="text-gray-700 font-bold">Âge :</label>
      <input type="text" id="age" name="age" class="border border-gray-300 p-2 w-full" value="<?= $info["age"] ?>">
    </div>
    <div class="mb-4">
      <label for="tel" class="text-gray-700 font-bold">Téléphone :</label>
      <input type="tel" id="tel" name="tel" class="border border-gray-300 p-2 w-full" value="<?= $info["tel"] ?>">
    </div>
    <div class="mb-4">
      <label for="description" class="text-gray-700 font-bold">Description :</label>
      <div class="border border-gray-300 p-2 w-full">
        <textarea id="description" class="w-full h-48" name="description"><?= $info["description"] ?></textarea>
      </div>
    </div>
    <div class="mb-4">
      <label for="vehicule" class="text-gray-700 font-bold">Véhiculisé :</label>
      <div>
        <label for="oui" class="inline-block font-bold text-gray-700 mr-2">Oui</label>
        <input type="radio" id="oui" name="drone" value="oui" checked />

        <label for="non" class="inline-block font-bold text-gray-700 ml-4 mr-2">Non</label>
        <input type="radio" id="non" name="drone" value="non" />
      </div>
    </div>
    <div class="mb-4">
      <label for="cv" class="text-gray-700 font-bold">Votre CV :</label>
      <input type="file" id="avatar" name="avatar" accept=".pdf" />
    </div>

    <div class="text-center">
      <button type="submit" class="bgPurple hover:bg-purple-600 text-white py-2 px-4 rounded-full transition duration-300 transform hover:scale-105">Confirmer</button>
    </div>
  </form>
</div>
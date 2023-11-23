<div class="font-bold text-center text-lg">
  <h1>Information</h1>
</div>

<div id="infoContainer" class="border-solid border-2 border-black p-4 m-4">
  <form  action="<?php $racine.'./?action=inscription'?>" method="POST">
    <div class="p-2">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" class="border-2 border-solid p-1 " placeholder="Nom" required>
    </div>
    <div class="p-2">
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" class="border-2 border-solid p-1 " placeholder="Prénom" required>
    </div>
    <div class="p-2">
      <label for="email">Email :</label>
      <input type="email" id="ok" name="ok" class="border-2 border-solid p-1 text-gray-400 italic" placeholder="<?= $util['mail'] ?>" disabled>
      <input type="hidden" name="email" placeholder="<?= $util['mail'] ?>">
    </div>
    <div class="p-2">
      <label for="age">Âge :</label>
      <input type="text" id="age" name="age" class="border-2 border-solid p-1 " placeholder="age" required>
    </div>
    <div class="p-2">
      <label for="tel">Téléphone :</label>
      <input type="tel" id="tel" name="tel" class="border-2 border-solid p-1 " placeholder="télephone" required>
    </div>
    <div class="p-2">
      <label for="description">Description :</label>
      <div class="">
         <textarea id="description" class="w-full h-48 border-2 border-solid p-1 " name="description" required></textarea>
      </div>
    </div>
    <div class="p-2">
      <label for="vehicule">Véhiculisé :</label>
      <div>
        <label for="oui">Oui</label>
        <input type="radio" id="oui" name="drone" value="oui" checked />

        <label for="non">Non</label>
        <input type="radio" id="non" name="drone" value="non" />
      </div>
    </div>
    <div class="p-2">
      <label for="cv">Votre CV : </label>
      <input type="file" id="avatar" name="avatar" accept="./pdf" />
    </div>

    <div class="p-8">
      <button type="submit" class="bgPurple text-white  p-4 rounded">Confirmer</button>
    </div>
  </form>
</div>
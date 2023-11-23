<?php $getRole = getRoleUlt($util['ult_ID']);?>
<div class="font-bold text-center text-lg">
  <h1>Mes informations</h1>
</div>
<div id="infoContainer" class="bg-white border border-solid border-2 border-black p-4 m-4 rounded-lg shadow-lg">
    <div class="mb-4">
        <p class="text-2xl font-bold">Profil de <?= $info["prenom"] ?> <?= $info["nom"] ?></p>
        <p class="text-gray-600">Email : <?= $util["mail"] ?></p>
        <p class="text-gray-600">role : <?= $util["role"] ?></p>
        <?php if ($getRole['role']=="employer"){ ?>
        <p class="text-gray-600">entreprise : <?= $getEntreprisebyID[0]['nom'] ?></p>
        <?php }?>
    </div>
    <div class="border-t border-gray-300 pt-4 pb-2">
        <p class="text-lg font-semibold">Informations personnelles</p>
        <ul>
            <li><span class="font-bold">Âge:</span> <?= $info["age"] ?></li>
            <li><span class="font-bold">Téléphone:</span> <?= $info["tel"] ?></li>
            <li><span class="font-bold">Véhiculisé:</span> <?= $info["vehicule"] ?></li>
        </ul>
    </div>
    <div class="border-t border-gray-300 pt-4 pb-2">
        <p class="text-lg font-semibold">Description</p>
        <p><?= $info["description"] ?></p>
    </div>
    <div class="border-t border-gray-300 pt-4 pb-2">
        <p class="text-lg font-semibold">CV</p>
        <p><?= $info["CV"] ?></p>
    </div>
    <div class="text-right mt-4">
        <a class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded" href="./?action=updateProfil">Modifier</a>
    </div>
</div>

<hr>
<div class="font-bold text-center text-lg p-8">
    <h1>Mes Postulations</h1>
</div>

<?php foreach ($annoncesPostulees as $postulation) { ?>
    <div class="bg-white shadow-lg p-4 my-4 mx-auto lg:w-1/2">
        <p class="font-bold">Titre de l'annonce : <?= $postulation['titre_annonce'] ?></p>
        <p class="italic">Date de postulation : <?= $postulation['datePostule'] ?></p>
        <form action="./?action=profil" method="POST">
            <input type="hidden" id="annonce_id" name="annonce_id" value="<?= $postulation['ann_ID'] ?>">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">Supprimer la postulation</button>
        </form>
    </div>
<?php } ?>

<hr>

<?php 
if ($getRole['role'] == "client") {

?>
    <div class=" bg-gray-200 p-8 text-center rounded-lg shadow-md">
    <p class="text-xl font-bold text-gray-700 mb-4">Voulez-vous postuler à nos offres ? </p>
    <button onclick="openModalAdd()" class="bgPurple hover:bg-purple-600 hover:scale-105 transition-transform transform text-white font-semibold py-2 px-4 rounded-full transition duration-300">c'est ici</button>
    <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-content bg-white lg:w-1/3 p-4 rounded-lg shadow-md">
        <span class="close flex justify-end top-2 right-2 text-gray-600 cursor-pointer" onclick="closeModalAdd()">&#x2716;</span>

            <h2 class="text-2xl font-bold mb-4">Ajouter votre entreprise</h2>
            <form action="?action=profil" method="POST" onsubmit="return validateForm()">
                <div class="mb-4">
                    <label for="nameEnt" class="block font-medium">Nom de l'Entreprise :</label>
                    <input type="text" id="nameEnt" name="nameEnt" placeholder="Titre"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="typeEnt" class="block font-medium">Type:</label>
                    <input type="text" id="typeEnt" name="typeEnt" placeholder="Type Job"
                        class="w-full border rounded px-3 py-2" >
                </div>
                <div class="mb-4">
                    <label for="vehicule" class="block font-medium">ville:</label>
                    <input type="text" id="villeEnt" name="villeEnt" placeholder="Ville"
                        class="w-full border rounded px-3 py-2" >
                </div>
                <div class="mb-4">
                    <label for="prix" class="block font-medium">Adresse:</label>
                    <input type="text" id="adresseEnt" name="adresseEnt" placeholder="Adresse"
                        class="w-full border rounded px-3 py-2" >
                </div>
                <div class="mb-4">
                    <label for="statue" class="block font-medium">Description:</label>
                    <textarea type="text" id="descriptionEnt" name="descriptionEnt" placeholder="Description"
                        class="w-full border rounded px-3 py-2 h-40" required></textarea>
                </div>
                <input class="buttonSignIn SignInSubmit p-4 bgPurple text-white" type="submit" value="Confirmer" />
            </form>
            </div>
            </div>


    <p class="text-xl font-bold text-gray-700 mb-4">Votre entreprise est déja enregistré ? </p>
    <button onclick="openModalAdd2()" class="bgPurple hover:bg-purple-600 hover:scale-105 transition-transform transform text-white font-semibold py-2 px-4 rounded-full transition duration-300">retrouver le ici</button>
    <div id="myModal2" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-content bg-white lg:w-1/3 p-4 rounded-lg shadow-md">
        <span class="close flex justify-end top-2 right-2 text-gray-600 cursor-pointer" onclick="closeModalAdd2()">&#x2716;</span>

            <h2 class="text-2xl font-bold mb-4">Trouver votre entreprise : </h2>
            <form action="?action=profil" method="POST" onsubmit="return validateForm()">
            <select name="entrepriseID" class="block mr-auto ml-auto w-1/2 mb-8">
            <?php
            print_r($entreprises);
            foreach ($entreprises as $entreprise) {
                echo '<option value="' . $entreprise['ent_ID'] . '">' . $entreprise['nom'] . '</option>';
            }
            ?>
            </select>
            <input class="buttonSignIn SignInSubmit p-4 bgPurple text-white" type="submit" value="Confirmer" />
            </form>
            </div>
            </div>
<?php
}elseif ($getRole['role']=="employer") { ?>
<div class="font-bold text-center text-lg p-8">
    <h1>Mes Offres</h1>
</div>

<?php if (empty($offrePostule)) { ?>
    <p class="text-center italic">Vous n'avez rien postulé pour le moment.</p>
<?php } else {
    foreach ($offrePostule as $offre) { ?>
        <div class="bg-white shadow-lg p-4 my-4 mx-auto lg:w-1/2">
            <p class="font-bold">Titre de l'annonce : <?= $offre['titre_annonce'] ?></p>
            <p class="italic">Date de postulation : <?= $offre['datePostule'] ?></p>
            <form action="./?action=profil" method="POST">
                <input type="hidden" id="offre_id" name="offre_id" value="<?= $offre['ann_ID'] ?>">
                <button type="submit" class="bg-red-500 hover-bg-red-600 text-white font-bold py-2 px-4 rounded mt-2">Supprimer l'offre</button>
            </form>
        </div>
<?php } } } elseif ($getRole['role'] == "admin") {
    header("Location: ?action=admin");  
} else { echo "votre role est inexistant";}
?>
<div class="text-center md:text-right">
<a href="./?action=deconnexion" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded inline-block m-16 ">Se déconnecter</a>
</div>
</div>
<script>

function openModalAdd() {
    document.getElementById("myModal").classList.remove("hidden");
}

function closeModalAdd() {
    document.getElementById("myModal").classList.add("hidden");
}

function openModalAdd2() {
    document.getElementById("myModal2").classList.remove("hidden");
}

function closeModalAdd2() {
    document.getElementById("myModal2").classList.add("hidden");
}
</script>
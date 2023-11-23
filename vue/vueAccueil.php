<style type="text/css">
   @import url("css/color.css");
</style>


<div class="text-center">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
    <article class="grid h-full grid-cols-1 lg:grid-cols-2 m-auto md:px-24 md:pb-16 pt-4 self-center  ">
        <dotlottie-player src="https://lottie.host/fbf68b7b-71aa-4d3b-83af-7340b1c5b668/46pBtcHlKl.json" background="transparent" speed="1" style="width: 100%; height: 500px;" loop autoplay></dotlottie-player>
        <div class="flex self-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc blandit, quam non aliquam convallis, sem odio vehicula risus, quis laoreet mi ligula at justo. Vestibulum fermentum sapien ut nisl volutpat,<span class="font-bold">at dignissim nunc auctor</span>. Vivamus non aliquam justo. Nullam fringilla metus ut euismod tristique.<br><br>
            Sed consequat justo at euismod imperdiet. Aenean at pharetra tellus. Maecenas vehicula suscipit ligula, ac volutpat quam feugiat ut. Sed nec justo sed turpis dictum fermentum eu ut lectus. <span class="font-bold">Vivamus feugiat urna et neque vehicula</span>, nec dapibus metus cursus. Proin luctus augue ac urna eleifend, vel tempor quam fringilla. Mauris vitae eros nec arcu finibus cursus. Nullam convallis leo vitae nulla luctus, ut volutpat ligula auctor. Donec facilisis augue vitae hendrerit semper. Integer at velit ut arcu fringilla semper ac ac purus.
            </p>
        </div>
    </article>
</div>
    
<?php if (isLoggedOn() && $util['role']=="employer") {?>
    <div class=" bg-gray-200 p-8 text-center rounded-lg shadow-md">
    <p class="text-xl font-bold text-gray-700 mb-4">Ajouter une annonce</p>
    <button onclick="openModalAdd()" class="bgPurple hover:bg-purple-600 hover:scale-105 transition-transform transform text-white font-semibold py-2 px-4 rounded-full transition duration-300">Cliquez ici</button>
</div>
        <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-content bg-white lg:w-1/3 p-4 rounded-lg shadow-md">
        <span class="close flex justify-end top-2 right-2 text-gray-600 cursor-pointer" onclick="closeModalAdd()">&#x2716;</span>

            <h2 class="text-2xl font-bold mb-4">Créer Annonce</h2>
            <form action="?action=menu" method="POST" onsubmit="return validateForm()">
                <div class="mb-4">
                    <label for="createAd" class="block font-medium">Titre:</label>
                    <input type="text" id="createAd" name="createAd" placeholder="Titre"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block font-medium">Description:</label>
                    <textarea type="text" id="description" name="description" placeholder="Description"
                        class="w-full border rounded px-3 py-2 h-40" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="vehicule" class="block font-medium">Véhicule:</label>
                    <select id="vehicule" name="vehicule" class="w-full border rounded px-3 py-2" required>
                        <option value="oui">OUI</option>
                        <option value="non">NON</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="prix" class="block font-medium">Prix:</label>
                    <input type="text" id="prix" name="prix" placeholder="Prix"
                        class="w-full border rounded px-3 py-2" >
                </div>
                <div class="mb-4">
                    <label for="statue" class="block font-medium">Statut:</label>
                    <input type="text" id="statue" name="statue" placeholder="Statut"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <input class="buttonSignIn SignInSubmit p-4 bgPurple text-white" type="submit" value="Confirmer" />
            </form>
            </div>
            </div>
    <?php }?>

<article class="grid grid-cols-1 lg:grid-cols-4 m-auto md:pb-24 pt-4 self-center bg-gray-200">
    <div class="col-span-1 shadow-2xl mx-8 bg-[white]">
        <h1 class="text-center m-4"><span class="font-bold text-lg"><?php echo $nbEmploi ?></span>jobs disponibles</h1> 
    </div>
    <div class="col-span-3 md:mr-16">
    <?php
    foreach ($annonce as $box) {
    ?>
    <div class="shadow-xl p-4 mb-4 bg-white">
    <h1 class="font-bold text-lg"><?php echo $box['titre']; ?></h1>
    <p><?php echo $box['description']; ?></p>
    <?php if (isset($box['heure'])) { ?>
    <?php } ?>

    <div id="info_<?php echo $box['ann_ID']; ?>" class="hidden">
        <?php if (isset($box['vehicule'])) { ?>
            <p>Véhicule : <?php echo $box['vehicule']; ?></p>
        <?php } else { ?>
            <p>Véhicule : Non spécifié</p>
        <?php } ?>

        <!-- Vérifiez si 'prix' est défini et non null -->
        <?php if (isset($box['prix']) && $box['prix'] !== null) { ?>
            <p>Salaire mensuel brut : <?php echo $box['prix']; ?></p>
        <?php } else { ?>
            <p>Salaire mensuel brut : Non spécifié</p>
        <?php } ?>

        <!-- Vérifiez si 'statue' est défini -->
        <?php if (isset($box['statue'])) { ?>
            <p>Statut : <?php echo $box['statue']; ?></p>
        <?php } else { ?>
            <p>Statut : Non spécifié</p>
        <?php } ?>

        <?php if (isset($box['ville'])) { ?>
            <p>Ville : <?php echo $box['ville']; ?></p>
        <?php } else { ?>
            <p>ville : Non spécifié</p>
        <?php } ?>




        </div>
        <p>Date de parution : <?php echo $box['heure']; ?></p>
        <div class="justify-end flex">
        <button class="bgPurple text-white mr-4 p-4 rounded" onclick="toggleInfo(<?php echo ($box['ann_ID']); ?>)">Plus d'info</button>
        <?php if (isLoggedOn()){ if (empecheDoublonPostule($box['ann_ID'], $util['ult_ID'])) {?>
            <button class="bg-red-300 text-white p-4 rounded cursor-default" disabled>Déja postuler</button>
        <?php } else {?>
            <button class="bgPurple text-white p-4 rounded" onclick="toggleModal(<?php echo $box['ann_ID']-1; ?>, '<?php echo $box['titre']; ?>')">Postuler</button>
        <?php }} else {?>
            <button class="bgPurple text-white p-4 rounded" onclick="toggleModal(<?php echo $box['ann_ID']-1; ?>, '<?php echo $box['titre']; ?>')">Postuler</button> <?php }?>
        <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden"> 
        <div class="modal-content bg-white p-8 rounded shadow-lg relative lg:w-1/2">
        <span class="close absolute top-2 right-2 text-gray-600 cursor-pointer" onclick="closeModal()">&#x2716;</span>

            <h1 class="font-bold">ID de l'annonce : <span id="annonce_id_display"></span></h1>
            <?php if (isLoggedOn()){ ?>
            <form action="<?php $racine.'./?action=menu'?>" method="POST">
            <?php } else { ?>
            <form action="./?action=menu" method="POST"><?php } ?>
            <div class="p-2">
            <label for="prenom">Nom :</label>
            <?php if (isLoggedOn()){ ?>
            <input type="text" class="border-2 border-solid p-1 text-gray-400 italic" value="<?= $info["nom"] ?>" disabled>
            <?php } else { ?>
            <input type="text" name="nom" id="nom" class="border-2 border-solid p-1 " placeholder="Nom" required >
            <?php
            } ?>
            </div>
            <div class="p-2">
            <label for="prenom">Prénom :</label>
            <?php if (isLoggedOn()){ ?>
            <input type="text"  class="border-2 border-solid p-1 text-gray-400 italic" value="<?= $info["prenom"] ?>" disabled>
            <?php } else { ?>
            <input type="text" name="prenom" id="prenom" class="border-2 border-solid p-1 " placeholder="Prenom" required>
            <?php
            } ?>
            </div>
            <div class="p-2">
            <label for="email">Email :</label>
            <?php if (isLoggedOn()){ ?>
            <input type="text" class="border-2 border-solid p-1 text-gray-400 italic" value="<?= $util["mail"] ?>" disabled>
            <?php } else { ?>
            <input type="text" name="mail" id="mail" class="border-2 border-solid p-1" placeholder="Email" required >
            <?php
            } ?>
            </div>
            <div class="p-2">
            <label for="age">Âge :</label>
            <?php if (isLoggedOn()){ ?>
            <input type="text"  class="border-2 border-solid p-1 text-gray-400 italic" value="<?= $info["age"] ?>" disabled>
            <?php } else { ?>
            <input type="text" name="age" id="age" class="border-2 border-solid p-1 " placeholder="age" required >
            <?php
            } ?>
            </div>
            <div class="p-2">
            <label for="tel">Téléphone :</label>
            <?php if (isLoggedOn()){ ?>
            <input type="text" class="border-2 border-solid p-1 text-gray-400 italic" value="<?= $info["tel"] ?>" disabled>
            <?php } else { ?>
            <input type="text" name="tel" id="tel" class="border-2 border-solid p-1  " placeholder="telephone" required >
            <?php
            } ?>
            </div>
            <div class="p-2">
            <label for="motivation">Motivation :<i class="text-sm"> (Non obligatoire)</i></label>
            <textarea id="motivation" class="w-full h-48 border-2 border-solid p-1 text-sm" name="motivation"></textarea>
            <div class="p-2">
            <label for="cv">Votre CV : </label><br>
            <input type="file" id="cv" name="cv" class="r" accept="application/pdf" disabled />
            </div>
            <div class="text-center">
            <input type="hidden" id="annonce_id" name="annonce_id" value="">
            <?php if (isLoggedOn()){ ?>
                <input type="hidden" id="utilisateur_id" name="utilisateur_id" value="<?php echo $util['ult_ID'] ?>">
            <?php 
            } ?>
            
                <button type="submit" class="bgPurple text-white p-4 rounded mt-4">Postuler</button>

            </div>
            </form>
            </div>
        </div></div>
        </div>
            </div>
    <?php
    }
    ?>
</div>
<script>

function toggleInfo(id) {
        var infoBox = document.getElementById("info_" + id);
        if (infoBox.style.display === "none" || infoBox.style.display === "") {
            infoBox.style.display = "block";
        } else {
            infoBox.style.display = "none";
        }
    }

    function validateForm() {
        var title = document.getElementById("createAd").value;
        var description = document.getElementById("description").value;
        var prix = document.getElementById("prix").value;
        var statue = document.getElementById("statue").value;

        if (title === "" || description === "" || prix === "" || statue === "") {
            alert("Veuillez remplir tous les champs.");
            return false; // Empêche la soumission du formulaire
        }

        // Si tout est correct, le formulaire est soumis
        return true;
    }

function closeModal(){
    var modal = document.getElementById('modal');
      modal.classList.toggle('hidden');
}

function toggleModal(annonceID, titre) {
    var modal = document.getElementById('modal');
    modal.classList.toggle('hidden');

      // Mettez à jour le champ caché de l'ID de l'annonce dans le formulaire
      var annonceIDInput = document.getElementById('annonce_id');
      annonceIDInput.value = (annonceID+1);
      console.log('la' + annonceIDInput);

      // Mettez à jour le titre du modal
      document.querySelector('#modal h1').innerText = "Postuler pour : " + titre;
    }

function openModalAdd() {
    document.getElementById("myModal").classList.remove("hidden");
}

function closeModalAdd() {
    document.getElementById("myModal").classList.add("hidden");
}
    
</script>




<?php
?>

</article>
<!-- Inclusion des feuilles de style -->
<style type="text/css">
   @import url("css/page.css");
   @import url("css/color.css");
</style>

<!-- Conteneur principal avec arrière-plan gris -->
<div class="bg-gray-200 min-h-screen flex justify-center items-center ">
    <!-- Conteneur pour le formulaire de connexion, centré verticalement et horizontalement -->
    <div class="boxConnexion justify-center items-center flex w-96">
        <!-- Conteneur interne avec arrière-plan blanc et bordure -->
        <div class="bg-white border border-solid border-2 border-black p-4 max-w-md w-full rounded-md">
            <!-- Titre de la page d'inscription -->
            <h1 class="text-2xl font-bold text-center mb-4">Inscription :</h1>
            
            <!-- Formulaire d'inscription -->
            <form action="?action=inscription" method="POST">
                <!-- Champ pour l'adresse e-mail -->
                <div class="mb-4">
                    <label for="mailInscription" class="block">Adresse-mail:</label>
                    <input type="text" id="mailInscription" name="mailInscription" placeholder="Email" required class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <!-- Champ pour le mot de passe -->
                <div class="mb-4">
                    <label for="mdpInscription" class="block">Mot de passe:</label>
                    <input type="password" id="mdpInscription" name= "mdpInscription" placeholder="Mot de passe" required class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <!-- Champ pour la validation du mot de passe -->
                <div class="mb-4">
                    <label for="mdpVerif" class="block">Validation mdp:</label>
                    <input type="password" id="mdpVerif" name="mdpVerif" placeholder="Validation" required class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <!-- Bouton de soumission du formulaire -->
                <input type="submit" value="Confirmer" class="bgPurple hover:bg-purple-700 cursor-pointer text-white font-bold py-2 px-4 rounded-full">
                
                <!-- Bouton pour effacer le formulaire -->
                <input type="reset" value="Effacer" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full ml-2">
            </form>
            
            <?php
            // Vérifie si le formulaire a été soumis en POST et s'il y a des erreurs d'inscription
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $registrationErrors = handleInscription();
                if (!empty($registrationErrors)) {
                    // Affiche les erreurs d'inscription en rouge
                    echo '<div style="color: red;">';
                    foreach ($registrationErrors as $error) {
                        echo $error . "<br>";
                    }
                    echo '</div>';
                }
            }
            ?>
            
            <!-- Lien pour revenir à la page d'accueil -->
            <a href="./?action=defaut" class="bgPurple hover-bg-purple-700 text-white font-bold py-2 px-4 rounded-full inline-block mt-4">Retour à l'accueil</a>
        </div>
    </div>
</div>
<!-- JavaScript pour afficher une alerte en cas d'inscription réussie -->
<script type="text/javascript">
    <?php
    // Vérifie si l'inscription a réussi et affiche une alerte pop-up
    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
        echo 'alert("Votre compte a été enregistré avec succès!");';
        unset($_SESSION['registration_success']); // Efface la variable de session
    ?>
    window.location.href = "?action=newInformation";<?php
}
?>
</script>
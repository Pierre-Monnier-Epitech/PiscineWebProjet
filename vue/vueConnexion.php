<!-- Inclusion des feuilles de style -->
<style type="text/css">
   @import url("css/page.css");
   @import url("css/color.css");
</style>

<!-- Conteneur principal avec arrière-plan gris -->
<div class="bg-gray-200 min-h-screen flex justify-center items-center">
    <!-- Conteneur interne avec arrière-plan blanc et bordure -->
    <div class="bg-white border border-solid border-black p-4 w-full max-w-sm rounded-md">
        <!-- Titre de la page de connexion -->
        <h1 class="text-2xl font-bold text-center mb-4">Connexion :</h1>
        
        <!-- Formulaire de connexion -->
        <form action='?action=connexion' method="POST">
            <!-- Champ pour l'adresse e-mail -->
            <div class="mb-4">
                <label for="mailUtilisateur" class="block">Adresse-mail:</label>
                <input type="text" id="mailUtilisateur" name="mailUtilisateur" placeholder="Email" class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <!-- Champ pour le mot de passe -->
            <div class="mb-4">
                <label for="mdpUtilisateur" class="block">Mot de passe:</label>
                <input type="password" id="mdpUtilisateur" name="mdpUtilisateur" placeholder="Password" class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <!-- Bouton de soumission du formulaire -->
            <button type="submit" class="bgPurple hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full block w-full">Submit</button>
        </form>
        
        <!-- Lien vers la page d'inscription -->
        <a href="?action=inscription" class="block mt-4 text-center">Inscription</a>
    </div>
</div>
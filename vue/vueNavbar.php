<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>EpiJob</title>
</head>

<!-- Inclusion des feuilles de style -->
<style type="text/css">
   @import url("css/color.css");
   @import url("css/navbar.css");
</style>

<body>
<!-- En-tête de la page (barre de navigation) -->
<header class="flex blur h-24 shadow background1 fixed top-0 w-full z-50">
        <!-- Logo et titre -->
        <p class="md:w-1/4 w-1/2 justify-end self-center text-center text-lg">
            <span class="bgPurple font-bold text-white py-2 px-4 rounded-full">E</span><span class="font-bold p-1">EpiJob</span>
        </p>
        <!-- Bouton pour ouvrir le menu de navigation (visible sur les petits écrans) -->
        <nav class=" text-right flex justify-end self-center w-full absolute md:hidden">
            <button id="toggleNav" class="p-4">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </nav>
        <!-- Liens de navigation (visible sur les écrans moyens et grands) -->
        <nav class="my-auto hidden ml-auto md:block flex-col text-right" id="navLinks">
            <ul class="md:flex text-lg justify-end blur shadow sm:shadow-none mt-24 md:mt-0">
                <li class="md:p-7 mr-4 p-4"><a href="./?action=menu" class="nav-link">Accueil</a></li>
                <li class="md:p-7 mr-4 p-4"><a href="#" class="nav-link">Postuler</a></li>
                <li class="lg:p-4 p-4 self-center rounded-md bgPurple md:text-white md:mr-16 ">
                    <a href="./?action=connexion" class="nav-link">Mon compte</a>
                </li>
            </ul>
        </nav>
</header>

<!-- Script JavaScript pour le menu de navigation et la mise en évidence des liens -->
<script>
        // Sélection des éléments du menu de navigation
        const toggleNav = document.getElementById('toggleNav');
        const navLinks = document.getElementById('navLinks');

        // Écouteur d'événement pour ouvrir/fermer le menu de navigation
        toggleNav.addEventListener('click', () => {
            navLinks.classList.toggle('hidden');
        });

        // Sélection des liens de navigation
        const x = document.querySelectorAll('.nav-link');

        // Écouteur d'événement pour suivre le défilement de la page et mettre en évidence les liens actifs
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section');
            const scrollPosition = window.scrollY;

            sections.forEach((section, index) => {
                if (scrollPosition >= section.offsetTop - 100 && scrollPosition < section.offsetTop + section.offsetHeight - 100) {
                    x.forEach((navLink) => {
                        navLink.classList.remove('active');
                    });
                    x[index].classList.add('active');
                }
            });
        });
</script>

<!-- Espace de dégagement pour éviter de masquer le contenu sous l'en-tête -->
<div class="mt-24"></div>
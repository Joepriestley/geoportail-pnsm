<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Geoportail, SIG-WEB, Développement de SIG Web, Webmapping">
    <title>Geoportail-PNSM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Your custom CSS file for further customization -->
    <link rel="stylesheet" href="../lightbox/lightbox.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/apropos.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4287f5;">
            <a class="navbar-brand" href="/geoportail-pnsm/forms/index.php" style="color: white;">
                <img src="../img/logo.png" alt="Geoportail-PNSM Logo" width="35" height="35">
                Geoportail-PNSM
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: white;">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="/geoportail-pnsm/forms/apropos.php" class="nav-link" style="color: white;">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/geoportail-pnsm/forms/galerie.php" class="nav-link" style="color: white;">Galerie</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="gestionDropdown" data-toggle="dropdown" style="color: white;">
                            Gestion
                        </a>
                        <div class="dropdown-menu" aria-labelledby="gestionDropdown">
                            <a class="dropdown-item" href="amenagement.php">Amenagement</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/refection_pistes.php">Pistes</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/ref_point_eau.php">Point Eau</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/ref_amenagementtouristique.php">Amenagement Touristiques</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/refection_cloture.php">Cloture</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ecodeveloppementDropdown" data-toggle="dropdown" style="color: white;">
                            Ecodeveloppement
                        </a>
                        <div class="dropdown-menu" aria-labelledby="ecodeveloppementDropdown">
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/touriste.php">Touristes</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/circuittourist.php">Circuit</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/passage.php">Circuit Passage</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/visitesite.php">Site Visite</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/apiculture.php">Alpiculture</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/percheartisanal.php">Perche Artisanal</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/agriculture.php">Agriculture</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/elevage.php">Elevage</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/autreactivite.php">Autres Activites</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/infrastruturetouristiq.php">Infrastructure Touristiques</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/utilise.php">Utilisation</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/association.php">Associations</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ressourcesDropdown" data-toggle="dropdown" style="color: white;">
                            Ressources Naturelles
                        </a>
                        <div class="dropdown-menu" aria-labelledby="ressourcesDropdown">
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/esp_vegetal.php">Flore</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/sol.php">Sol</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/esp_animal.php">Faune</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/recensement.php">Recensement</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/suivi_faune.php">Suivi Faune</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="projetsDropdown" data-toggle="dropdown" style="color: white;">
                            Projets
                        </a>
                        <div class="dropdown-menu" aria-labelledby="projetsDropdown">
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/projet.php">Projet</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/partenaire.php">Partenaire</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/association.php">Associations</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/executeur.PHP">Executeur</a>
                            <a class="dropdown-item" href="/geoportail-pnsm/forms/action.php">Actions</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/geoportail-pnsm/webmap/map.php" class="nav-link" style="color: white;">Cartographie</a>
                    </li>
                    <li class="nav-item">
                        <a href="sign-up.php" class="nav-link" style="color: white;">Inscrivez-vous</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Your content here -->
    <footer>
        <!-- Your footer content here -->
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Geoportail,SIG-WEB, Develppement de SIG Web, Webmapping">
    <title>Geoportail-PNSM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/footer.css"> -->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/action.css">
    <link rel="stylesheet" href="../css/apropos.css">
<!-- font awesome css -->
    <link rel="stylesheet" href="../fontawesome-free-6.4.0-web/css/all.css">
    <!-- lightbox css -->
    <link rel="stylesheet" href="../lightbox/lightbox.css">

    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

</head>
<body>
    <div>
    <nav class="navbar navbar-expand-sm navbar-light navbar-dark bg-dark">
        <a href="/geoportail-pnsm/forms/index.php" class="navbar-brand"> <img src="../img/logo.png" alt="" width="35" height="35">Geoportail-PNSM</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
         
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item mr-3">
                    <a href="#" class="nav-link mr-3">Accueil</a>
                </li>
                <li class="nav-item mr-3"> 
                    <a href="/geoportail-pnsm/forms/apropos.php" class="nav-link mr-3">A propos </a>
                </li>
                <li class="nav-item mr-3">
                    <a href="/geoportail-pnsm/forms/galerie.php" class="nav-link mr-3">Galerie</a>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle mr-3" data-toggle="dropdown">Gestion</a>
                    <ul class="dropdown-menu">
                        <li><a   href="#" class="dropdown-item dropdown">Amenagement &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="amenagement.php" class="dropdown-item">Amenagement</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="gestion.php" class="dropdown-item">Gestion d'Amenagement</a>
                                </li> 
                            </ul>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="" class="dropdown-item mr-3 ">Element Amenagement&raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <!-- <li>
                                    <a href="pistes.php" class="dropdown-item">Pistes</a>
                                </li> -->
                                <li>
                                    <a href="/geoportail-pnsm/forms/refection_pistes.php" class="dropdown-item">Refection Pistes</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <!-- <li>
                                    <a href="/geoportail-pnsm/forms/point_eau.php" class="dropdown-item">Point Eau</a>
                                </li> -->
                                <li>
                                    <a href="/geoportail-pnsm/forms/ref_point_eau.php" class="dropdown-item"> Refection Point Eau</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <!-- <li>
                                    <a href="/geoportail-pnsm/forms/amenagementtouristique.php" class="dropdown-item">Amenagement Touristiques</a>
                                </li> -->
                                <li>
                                    <a href="/geoportail-pnsm/forms/ref_amenagementtouristique.php" class="dropdown-item"> Ref Amenagement Touristiques</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/refection_cloture.php" class="dropdown-item">Refection Cloture</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle mr-3" data-toggle="dropdown">Ecodeveloppement</a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="#" class="dropdown-item dropdown">Decoupage Administratif &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="#" class="dropdown-item">Douars</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">Communes</a>
                                </li>
                            </ul>
                        
                        </li> 
                        <div class="dropdown-divider"></div>-->
                        <li>
                            <a href="#" class="dropdown-item">Touristes et Activites &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/touriste.php" class="dropdown-item">Touristes</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/circuittourist.php" class="dropdown-item">Circuit</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/passage.php" class="dropdown-item">Circuit Passage</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/visitesite.php" class="dropdown-item">Site Visite</a>
                                </li>
                            </ul>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="#" class="dropdown-item">Activites Socioeconomiques&raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/apiculture.php" class="dropdown-item">Alpiculture</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/percheartisanal.php" class="dropdown-item">Perche Artisanal</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/agriculture.php" class="dropdown-item">Agriculture</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/elevage.php" class="dropdown-item">Elevage</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/autreactivite.php" class="dropdown-item">Autres Activites</a>
                                </li>
                            </ul>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="#" class="dropdown-item">Infrastructure &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/infrastruturetouristiq.php" class="dropdown-item">Infrastructure Touristiques</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/utilise.php" class="dropdown-item">Utilisation</a>
                                </li>
                            </ul>
                        </li>
                        <div class="dropdown-divider"></div>

                        <li>
                            <a href="/geoportail-pnsm/forms/association.php" class="dropdown-item">Associations &raquo;</a>
                        </li>
                    </ul>
                </li>
                <div class="dropdown-divider"></div>

                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle mr-3" data-toggle="dropdown">Ressources Naturelles</a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="#" class="dropdown-item dropdown">Caractéristiques Ecologiques &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 11</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 12</a>
                                </li>
                            </ul>
                        
                        </li> -->
                        
                            <li>
                            <a href="#" class="dropdown-item"> Flore &nbsp; &nbsp; &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/esp_vegetal.php" class="dropdown-item">Espece Vegetal </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <!-- <li>
                                    <a href="#" class="dropdown-item">Zonage du Parc</a>
                                </li> -->
                                <li>
                                    <a href="/geoportail-pnsm/forms/sol.php" class="dropdown-item">Sol</a>
                                </li>
                                <li>
                                    <a href="/geoportail-pnsm/forms/utilise.php" class="dropdown-item">Utilise</a>
                                </li>
                            </ul>
                        </li>
                        <div class="dropdown-divider"></div>
                            
                            <!-- <li>
                            <a href="#" class="dropdown-item"> Zonage du Parc  &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 21</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 22</a>
                                </li>
                            </ul>                                                                                                                                                                       
                        </li> -->

                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="" class="dropdown-item"> Faune </a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/esp_animal.php" class="dropdown-item">Espece Animale</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/recensement.php" class="dropdown-item">Recensement</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/suivi_faune.php" class="dropdown-item">Suivi Faune</a>
                                </li>
                            </ul>
                        </li>
                        
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle mr-3" data-toggle="dropdown">Projets</a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="#" class="dropdown-item">Organisme d'aide  &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/projet.php" class="dropdown-item">Projet</a>
                                </li>
                                <li>
                                    <a href="/geoportail-pnsm/forms/partenaire.php" class="dropdown-item">Partenaire</a>
                                </li>
                                <li>
                                    <a href="/geoportail-pnsm/forms/association.php" class="dropdown-item">Associations</a>
                                </li>
                            </ul>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="#" class="dropdown-item">Execution des Actions &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="/geoportail-pnsm/forms/executeur.PHP" class="dropdown-item">Executeur</a>
                                </li>
                                <!-- <div class="dropdown-divider"></div>
                                <li>
                                    <a href="/geoportail-pnsm/forms/execution.php" class="dropdown-item">Execution</a>
                                </li> -->
                                <div class="dropdown-divider"></div>
                                <li><a href="/geoportail-pnsm/forms/action.php" class="dropdown-item dropdown">Actions &nbsp;</a>
                           
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </li>
               
                <!-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle mr-3" data-toggle="dropdown">Impression</a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item dropdown">item1 &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 11</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 12</a>
                                </li>
                            </ul>
                        
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a href="#" class="dropdown-item">item2 &raquo;</a>
                            <ul class="dropdown-menu submenu">
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 21</a>
                                </li>
                                
                                <li>
                                    <a href="#" class="dropdown-item">Submenu 22</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-item mr-3">
                    <a href="/geoportail-pnsm/webmap/map.php" class="nav-link mr-3">Cartographie</a>
                </li>
                <li class="nav-item mr-3"> 
                    <a href="sign-up.php" class="nav-link  mr-3">Inscrivez-vous</a>
                </li>
            </ul>
            
        </div>
    </nav>
    </div>

    <!-- &nbsp; &nbsp; &raquo; -->
    
 

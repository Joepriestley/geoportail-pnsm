<?php
include_once 'header.php';
?>

<style>
/* Center the text inside the carousel item */
    .carousel-caption {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -30%);
      color: black;
    }
    element {
      height:100% !important;
    }
    .carousel-caption h1 {
      color: #fff;
      font-weight: 800;
    }
    .carousel-caption h5 {
      color: #fff;
      font-weight: 800;
    }
  </style>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="height:1000px !important;">
        <div class="carousel-item active" style="height:1000px !important;" >
          <img class="d-block w-100 height-img" height="400" src="../img/josvan.jpg" alt="photo_addax" style="height:100% !important;">
          <div class="carousel-caption d-none d-md-block">
            <h1>this is addaxe of the saharienne speces at PNSM</h1>
            <h5>sdjhsdusdh</h5>
          </div>
        </div>
        <div class="carousel-item w-80">
          <img class="d-block w-100" height="800" src="../img/ORYX10.jpg" alt="photo_oryx">
          <div class="carousel-caption d-none d-md-block">
            <h1>this is addaxe of speces at PNSM</h1>
            <h5>gjyi joupip</h5>
          </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100"  src="../img/ostrich10.jpg" alt="autriche">
        <div class="carousel-caption d-none d-md-block">
          <h1>The Red Neck Ostrich</h1>
          <h5>This is the red neck ostrich among the four saharian species in the Souss Massa National Park</h5>
        </div>
      </div>
      </div>
    </div>
    <div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

<div style="width: 80%; margin-left:10%; margin-top:100px; margin-bottom:100px; text-align: center;">
<h2>Nos Services</h2>
  <div class="card-deck">
  <div class="card">
      <img class="card-img-top" height="230" src="../img/car.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Circuit Touristiques</h5>
        <p class="card-text"></p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" height="230" src="../img/Children.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Espace Enfants</h5>
        <p class="card-text">Totalement sécurisé et pensé afin d'accueillir vos petits chou pour passer des moments agréables au sein du parc</p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" height="230" src="../img/food.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Restaurant</h5>
        <p class="card-text">Une restauration local et international pour tous les gouts</p>
      </div>
    </div>
    <div class="card">
      <img class="card-img-top" height="230" src="../img/car.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Station Service</h5>
        <p class="card-text">Plusieurs services sont proposés pour vos véchicules</p>
      </div>
    </div>
  
  </div>
</div>


<?php
include_once 'footer.php';
?>
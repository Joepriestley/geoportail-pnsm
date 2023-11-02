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
  height:100%!important;
}
  </style>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner" style="height:1000px !important;">
    <div class="carousel-item active" style="height:1000px !important;" >
      <img class="d-block w-100 height-img" height="400" src="../img/addax.png" alt="photo_addax" style="height:100% !important;">
      <div class="carousel-caption d-none d-md-block">
        <h5>this is addaxe of the saharienne speces at PNSM</h5>
        <p>sdjhsdusdh</p>
      </div>
    </div>
    <div class="carousel-item w-80">
      <img class="d-block w-100" height="800" src="../img/oryx.JPG" alt="photo_oryx">
      <div class="carousel-caption d-none d-md-block">
        <h5>this is addaxe of speces at PNSM</h5>
        <p>gjyi joupip</p>
      </div>
    </div>
    <div class="carousel-item">
    <img class="d-block w-100"  src="../img/ostrich.png" alt="autriche">
    <div class="carousel-caption d-none d-md-block">
      <h5>The Red Neck Ostrich</h5>
      <p>This is the red neck ostrich among the four saharian species in the Souss Massa National Park</p>
      <h6>This is the red neck ostrich among the four saharian species in the Souss Massa National Park</h6>
    </div>
  </div>

  <div class="carousel-item">
    <img class="d-block w-100" src="../img/pnsm_tourists.png" alt="autriche" style="object-fit: cover;">
    <div class="carousel-caption p-3 d-none d-md-block">
        <h4 style="font-size: 24px; font-weight: bold; text-align: center; color: #333;">Une Visite Sur le Parc National de Souss Massa</h4>
        <p style="font-size: 30px; text-align: center; color: #1f4729; margin-top: 10px;">Une visite aux réserves de Rokein et Arrouais vous permettra de découvrir les quatre espèces d'antilopes ainsi que l'autruche d'Afrique du Nord.</p>
    </div>
</div>


    <!-- <div class="carousel-item">
    <img class="d-block w-100" src="../img/pnsm_tourists.png" alt="autriche" style="object-fit: cover;">
    <div class="carousel-caption d-none d-md-block">
      <h4>Une Visite Sur le Parc National de Souss Massa</h4>
      <p>Une visite aux réserves de Rokein et Arrouais vous permettra de découvrir les quatre espèces d'antilopes ainsi que l'autruche d'Afrique du Nord.
         </p>
    </div>
  </div> -->
  <div class="carousel-item">
    <img class="d-block w-100"  src="../img/bird_banks.jpg" alt="Fourth slide">
  </div>
  
  <div class="carousel-item">
    <img class="d-block w-100"  src="../img/figth_gazelle.jpg" alt="Fifth slide">
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

<?php
include_once 'footer.php';
?>
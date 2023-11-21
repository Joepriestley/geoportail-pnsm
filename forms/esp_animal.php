<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';

?>
<style>
    .card-body .toggle-content.collapsed {
        max-height: 100px; /* Set the collapsed height as needed */
        overflow: hidden;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-btn').on('click', function() {
            // Find the closest .card-body
            var cardBody = $(this).closest('.card-body');

            // Toggle the .collapsed class on .toggle-content
            cardBody.find('.toggle-content').toggleClass('collapsed');

            // Change the text of the button based on the current state
            var buttonText = cardBody.find('.toggle-content').hasClass('collapsed') ? 'Expand' : 'Collapse';
            $(this).text(buttonText);
        });
    });
</script>

<div class="container-fluid mt-4 pt-5">
  <div class="row">
    <div class="col-5 ">
      <div class="card">
        <div class="card-header bg-info text-white">
          <b>Ajouter une espece animale</b>
        </div>
        <div class="card-body bg-dark">
          <form action="./includes/esp_animal.inc.php" enctype="multipart/form-data" id="animalForm" style="background-color: rgb(201, 216, 214);"method="post">
            <div class="form-row">
              <span class="form-control text-center bg-dark text-white"><b>Identification d'Espece</b></span>
              <div class="form-group col-md-6">
                <label for="nomscientifique">Nom Scientifique</label>
                <input type="text" class="form-control" name="nomscientifique" placeholder="nom scientifique">
              </div>
              <div class="form-group col-md-6">
                <label for="nomfrancais">Nom Francais</label>
                <input type="text" name="nomfrancais" class="form-control" id="nomfrancais" placeholder="Nom Francais">
              </div>
            </div>
            <div class="form-group">
              <label for="famille">Famille</label>
              <input type="text" name="famille" class="form-control" id="famille" placeholder="Nom de la famille ">
            </div>
            <span class="form-control text-center bg-dark text-white"><b>Comportement</b></span>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="statutsocial">Statut Social</label>
                <input type="text" name="statutsocial" class="form-control" id="statutsocial" placeholder="statutsocial">
              </div>

              <div class="form-group col-md-6">
                <label for="sedentaire">Sedentaire</label>
                <select id="sedentaire" name="sedentaire" class="form-control">
                  <option selected>--Choissisez...</option>
                  <option value="oui">oui</option>
                  <option value="non">non</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="regimealimentaire">Regime Alimentaire </label>
                <input type="text" name="regimealimentaire" class="form-control" id="regimealimentaire" placeholder="Regime Alimentaire">
              </div>

            </div>
            <span class="form-control text-center bg-dark text-white"><b>Reproduction</b></span>

            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="tailleportee">Taille Portee </label>
                <input type="number" name="tailleportee" class="form-control" id="tailleportee" placeholder="Taille Portee ">
              </div>

              <div class="form-group col-md-5">
                <label for="nombreportee_an">Nombre Portee_An </label>
                <input type="number" name="nombreportee_an" class="form-control" id="nombreportee_an"" placeholder=" Nombre portee/an">
              </div><br>
              <div class="form-group col-md-7">
                <label for="periodereproduction">Periode Reproduction</label>
                <input type="text" name="periodereproduction" class="form-control" id="periodereproduction" placeholder="Periode Reproduction">
              </div>

              <div class="form-group col-md-4">
                <label for="photo">Photo</label>
                <input type="file" accept="image/*" id="photo" name="photo" class="form-control-file">
                <img src="../img/aaddaax.jpg" id="photo-preview" class="img-fluid img-thumbnail rounded mt-2" height="200" width="200" alt="Photo d'animal">
              </div>
              <div class="input-group col-md-8">
                <div class="input-group-prepend">
                  <span class="input-group-text">Commentaire</span>
                </div>
                <textarea name="commentaire" rows="3" cols="10" class="form-control" id="commentaire" aria-label="commentaire" placeholder="Entrer un commentaire /description de l'especes"></textarea>
              </div>

            </div>
            <button type="submit" class="btn btn-primary">Inserer</button>
          </form>
          <a href="#" class="btn btn-primary">Nouveau</a>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#photo').on('change', function() {
          var input = this;
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#photo-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
          }
        });
      });
    </script>

    <!-- <tbody class="table text-dark table-dark table-striped"> -->
    <?php
    try {
      $query = "SELECT * FROM espece_animale";
      $stmt = $pdo->query($query);

      if ($stmt) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        echo "Error retrieving data from the database.";
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?>

    <div class="col-7 bg-gray px-2">
      <h3 class="mb-3">Liste des especes animales</h3>

      <div class="row ">

        <?php foreach ($results as $row) : ?>
          <div class="col-md-3 mb-4">
            <div class="card  mb-3">
              <img   src="<?= $row['photo'] ?>" class="card-img-top" alt="Image">
              <div class="card-body">
                <h5 class="card-title"><?= $row['nomscientifique'] ?></h5>
                <p class="card-text card-text toggle-content collapsed">
                  <strong>Nom Francais:</strong> <?= $row['nomfrancais'] ?><br>
                  <strong>Famille:</strong> <?= $row['famille'] ?><br>
                  <strong>Statut Social:</strong> <?= $row['statutsocial'] ?><br>
                  <strong>Sedentaire:</strong> <?= $row['sedentaire'] ?><br>
                  <strong>Regime Alimentaire:</strong> <?= $row['regimealimentaire'] ?><br>
                  <strong>Peride Reproduction:</strong> <?= $row['periodereproduction'] ?><br>
                  <strong>Taille Portee:</strong> <?= $row['tailleportee'] ?><br>
                  <strong>Nombre Portee/an:</strong> <?= $row['nombreportee_an'] ?><br>
                  <strong>Commentaire :</strong> <?= $row['commentaire'] ?>
                  </p>
                <a href="esp_animal-edit.php?id=<?= $row['nomscientifique'] ?>" class="btn btn-info">Editer</a><br><br>
                <form style="border:0px; padding:0px;" action="./deletion/esp_animal-delete.php" method="POST">
                  <!-- Hidden input field to include id_action -->
                  <input type="hidden" name="nomscientifique" value="<?= $row['nomscientifique'] ?>">
                  <!-- Delete button -->
                  <button name="delete_animal" class="delete-btn btn btn-danger" data-id="<?= $row['nomscientifique'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
                 
                </form>
              </div>
              <button class="toggle-btn btn btn-secondary">Hide/show</button>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>

  </div>
</div>

<?php
include_once 'footer.php';

?>
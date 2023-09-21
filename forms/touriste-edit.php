<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';
?>

<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header bg-info text-white">
          <b>Ajouter Un Touriste</b>
        </div>
        <div class="card-body bg-dark">
        <?php
                        if (isset($_GET['id'])) {
                            $touriste_id = $_GET['id'];
                            echo "ID from URL: $touriste_id"; // Debugging output
                            $query = "SELECT * FROM touristes WHERE numerocin_passport= :touriste_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':touriste_id', $touriste_id, PDO::PARAM_STR);
                            $stmt->execute();
                        
                            $result = $stmt->fetch(PDO::FETCH_OBJ);

                            // You might want to print specific properties of $result, not the entire object
                            if ($result) {
                                echo "record found.";
                            } else {
                                echo "No record found.";
                            }
                        } 

                    ?>
          <form action="./includes/tourist-edit.inc.php" id="touristeForm" style="background-color: rgb(201, 216, 214);" method="post">
            <?php if (isset($_GET['message'])) { ?>
              <p class="message"><?php echo $_GET['message']; ?></p> <?php } ?>
            <div class="form-row">
              <span class="form-control text-center bg-dark text-white"><b>Informations d'un Touriste</b></span>
              <div class="form-group col-md-6">
                <label for="nomtouriste">Nom Touriste</label>
                <input name="nomtouriste" type="text" value="<?=$result->nomtouriste; ?>"  class="form-control" id="nomtouriste" placeholder="Nom Touriste">

              </div>
              <div class="form-group col-md-6">
                <label for="age">Age Touriste</label>
                <input name="age" type="number" value="<?=$result->age; ?>"  class="form-control" id="age" placeholder="Age du Touriste">
              </div>
              <div class="form-group col-md-6">
                <label for="sexe">Sexe</label>
                <input name="sexe" type="text" value="<?=$result->sexe; ?>"  class="form-control" id="sexe" placeholder="sexe">
              </div>
              <div class="form-group col-md-6">
                <label for="numerocin_passport">Numero CIN/Passport</label>
                <input name="numerocin_passport" type="text" value="<?=$result->numerocin_passport; ?>"  class="form-control" id="numerocin_passport" placeholder="numerocin_passport" disabled="disabled">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nationalite">Nationalite</label>
                <input name="nationalite" type="text" value="<?=$result->nationalite; ?>"  class="form-control" id="nationalite" placeholder="Nationalite">
              </div>
              <div class="form-group col-md-6">
                <label for="motivation">Motivation</label>
                <input name="motivation" type="text" value="<?=$result->motivation; ?>"  class="form-control" id="motivation" placeholder="motivation">
              </div>
              <div class="form-group col-md-6">
                <label for="fonction">Fonction</label>
                <input name="fonction" type="text" value="<?=$result->fonction; ?>"  class="form-control" id="fonction" placeholder="fonction/occupation">
              </div>
              <div class="form-group col-md-6">
                <label for="telephone">telephone</label>
                <input name="telephone" type="tel" value="<?=$result->telephone; ?>"  class="form-control" id="telephone" value="451-189-0809" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
              </div>
              <div class="form-group col-md-6">
                <label for="adresse">Adresse</label>
                <input name="adresse" type="text" value="<?=$result->adresse; ?>"  class="form-control" id="adresse" placeholder="fonction/occupation">
              </div>
              <div class="form-group col-md-6">
                <label for="prenom">Prenom</label>
                <input name="prenom" type="text" value="<?=$result->prenom; ?>"  class="form-control" id="prenom" placeholder="Prenom">
              </div>
              <input type="hidden" value="<?=$result->numerocin_passport; ?>"  name="numerocin_passport" >
            </div>

            <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
          </form><br>
          <a href="#" class="btn btn-primary">Nouveau</a>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <table class="table table-striped col-md-6">
        <thead class="thead-dark">
          <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Nom Touriste</th>
            <th scope="col">Age</th>
            <th scope="col">Sexe</th>
            <th scope="col">Numero Passport</th>
            <th scope="col">Nationalite</th>
            <th scope="col">Motivation</th>
            <th scope="col">Fonction</th>
            <th scope="col">Telephone</th>
            <th scope="col">Adresse</th>
            <th scope="col">Prenom</th>
            <th scope="col">select</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody id="touriste" class="table table-dark text-dark table-striped">

          <!-- Table will be added here dynamically -->

          

        </tbody>
      </table>
    </div>
  </div>
</div>


<?php
include_once 'footer.php';

?>
<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';

?>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                      <b> Elements Amenagement</b>
                    </div>
                    <div class="card-body bg-dark">
                    <?php
                        if (isset($_GET['id'])) {
                            $point_eau_id = $_GET['id'];
                            $query = "SELECT * FROM point_eau WHERE nompointeau = :point_eau_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':point_eau_id', $point_eau_id , PDO::PARAM_STR);
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
                        <form action="./includes/point_eau-edit.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Point  Eau</b></span>
                                <div class="form-group col-md-6">
                                    <label for="id_amenagement">Id_Amenagement</label>
                                    <input name="id_amenagement" type="number" value="<?=$result->id_amenagement; ?>"  class="form-control" id="id_amenagement" name="id_amenagement" placeholder="Id_Amenagement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="etatelement">Etat_Element</label>
                                    <input name="etatelement" type="text"  value="<?=$result->etatelement; ?>"  class="form-control" id="etatelement" placeholder="etatelement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="detailamenagement">Identifiant_Amenagement</label>
                                    <input name="detailamenagement" type="text" class="form-control"  value="<?=$result->detailamenagement; ?>"  id="detailamenagement" placeholder="detailamenagement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nompointeau">Nom_Point_Eau </label>
                                    <input name="nompointeau"  value="<?=$result->nompointeau; ?>"  type="text" class="form-control" id="nompointeau" placeholder="nompointeau" disabled="disabled">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="nature">nature</label>
                                    <input name="nature"  value="<?=$result->nature; ?>"  type="text" class="form-control" id="nature" placeholder="nature">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="localisation">Localisation</label>
                                    <input name="localisation"  value="<?=$result->localisation; ?>"  type="text" class="form-control" id="localisation" placeholder="localisation">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="profondeur">Profondeur</label>
                                    <input name="profondeur" type="number"  value="<?=$result->profondeur; ?>"  class="form-control" id="profondeur" placeholder="profondeur">
                                </div>
                                <input type="hidden" value="<?=$result->nompointeau; ?>"  name="nompointeau" >
                            </div>
                            <div class="form-group col-md-12">
                                <label for="importance">importance</label>
                                <input name="importance" type="date"  value="<?=$result->importance; ?>"  class="form-control" id="importance" placeholder="importance">
                            </div>
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Commentaire</span>
                                </div>
                                <textarea name="commentaire"  value="<?=$result->commentaire; ?>"  class="form-control" id="commentaire" aria-label="commentaire" placeholder="Entrer un commentaire /description de l'especes"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Inserer</button>
                        </form>
                        <br>
                        <a href="#" class="btn btn-primary">Nouveau</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
            
                    
                      
                        
                    
            </div>
            </div>
        </div>
    </div>


<?php
   include_once 'footer.php';
   
   ?>















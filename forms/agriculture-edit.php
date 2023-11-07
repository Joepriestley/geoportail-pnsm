<?php
$pdo = require_once './includes/dbConnect.php';
   include_once 'header.php';
   
   ?>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                      <b>Les Activites</b>
                    </div>
                    <div class="card-body bg-dark">

                    <?php
                        if (isset($_GET['id'])) {
                            $id_agriculture = $_GET['id'];
                            $query = "SELECT * FROM agriculture WHERE codeactivite= :id_agriculture";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':id_agriculture', $id_agriculture, PDO::PARAM_STR);
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
                        <form action="./includes/agriculture-edit.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>agriculture</b></span>
                                <div class="form-group col-md-6">
                                    <label for="codeactivite">code Activite</label>
                                    <input name="codeactivite" type="text" value="<?=$result->codeactivite; ?>" class="form-control" id="codeactivite" placeholder="code Activite" disabled="disabled">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="annee">Annee Activite </label>
                                    <input type="month"  value="<?=$result->annee; ?>" class="form-control" id="annee"  name="annee" min="2019-07" value="2018-07" placeholder="annee d'activite">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nombrepratiquant">Nombre pratiquant</label>
                                    <input name="nombrepratiquant" type="number"  value="<?=$result->nombrepratiquant; ?>" class="form-control" id="nombrepratiquant" placeholder="nombrepratiquant">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rendement">Rendement </label>
                                    <input name="rendement" type="number"  value="<?=$result->rendement; ?>" class="form-control" id="rendement" placeholder="Rendement">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="nom_culture">Nom_Culture</label>
                                    <input name="nom_culture" type="text" value="<?=$result->nom_culture; ?>" class="form-control" id="nom_culture" placeholder="nom_culture">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="type_culture">Type_Culture</label>
                                    <input name="type_culture" type="text" value="<?=$result->type_culture; ?>" class="form-control" id="type_culture" placeholder="type_culture">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="superficie">Superficie</label>
                                    <input name="superficie" type="text" value="<?=$result->superficie; ?>" class="form-control" id="superficie" placeholder="superficie">
                                </div>
                                </div>
                                <input type="hidden" value="<?=$result->codeactivite; ?>" name="codeactivite">
                            
                            <div class="form-row">
                        
                                <div class="form-group col-md-6">
                                    <label for="douar">douar</label>
                                    <select name="douar" id="douar" class="form-control">
                                        <option value="">--Choissisez l'identifiant de douar--</option>
                                        <option value="Larjam">Larjam(1)</option>
                                        <option value="Sidi Boulafdail">Sidi Boulafdail(2)</option>
                                        <option value="Aghrimaz">Aghrimaz(3)</option>
                                        <option value="Sidi Binzaren">Sidi Binzaren(4)</option>
                                        <option value="Sidi Oussay">Sidi Oussay(5)</option>
                                        <option value="Sidi R'bat">Sidi Rbat(6)</option>
                                        <option value="Ifaryane">Ifaryane(7)</option>
                                        <option value="Douira">Douira(8)</option>
                                        <option value="Tifnit">Tifnit(9)</option>
                                        <option value="Sidi Toualnon">Sidi Toualnon(10)</option>
                                    </select>
                                </div>
                               
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Commentaire</span>
                                    </div>
                                    <textarea name="commentaire"  value="<?=$result->commentaire; ?>" class="form-control" id="commentaire" aria-label="commentaire" placeholder="Entrer un commentaire /description de l'especes"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
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

    
<?php
include_once 'footer.php';

?>
















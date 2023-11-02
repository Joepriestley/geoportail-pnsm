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
                        <form action="./includes/agriculture.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Agriculture</b></span>
                                <div class="form-group col-md-6">
                                    <label for="codeactivite">code Activite</label>
                                    <input name="codeactivite" type="text" class="form-control" id="codeactivite" placeholder="code Activite">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="annee">Annee Activite </label>
                                    <input type="month" class="form-control" id="annee"  name="annee" min="2018-07" value="2018-07" placeholder="annee d'activite">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nombrepratiquant">Nombre pratiquant</label>
                                    <input name="nombrepratiquant" type="number" class="form-control" id="nombrepratiquant" placeholder="nombrepratiquant">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rendement">Rendement </label>
                                    <input name="rendement" type="number" class="form-control" id="rendement" placeholder="Rendement">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="nom_culture">Nom_Culture</label>
                                    <input name="nom_culture" type="text" class="form-control" id="nom_culture" placeholder="nom_culture">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="type_culture">Type_Culture</label>
                                    <input name="type_culture" type="text" class="form-control" id="type_culture" placeholder="type_culture">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="superficie">Superficie</label>
                                    <input name="superficie" type="text" class="form-control" id="superficie" placeholder="superficie">
                                </div>
                            </div>
                            <div class="form-row">
                        
                                <div class="form-group col-md-12">
                                    <label for="douar">douar</label>
                                    <select name="douar" id="douar" class="form-control">
                                        <option value="">--Choissisez l'identifiant de douar--</option>
                                        <option value="Larjam">Larjam(1)</option>
                                        <option value="Sidi Boulafdail">Sidi Boulafdail(2)</option>
                                        <option value="Aghrimaz">Aghrimaz(3)</option>
                                        <option value="Sidi Binzaren">Sidi Binzaren(4)</option>
                                        <option value="Sidi Oussay">Sidi Oussay(5)</option>
                                        <option value="Sidi Rba">Sidi Rbat(6)</option>
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
                                    <textarea name="commentaire" class="form-control" id="commentaire" aria-label="commentaire" placeholder="Entrer un commentaire /description de l'especes"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Inserer</button>
                        </form>
                        <br>
                        <a href="#" class="btn btn-primary">Nouveau</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <table class="table table-striped bg-info">
                    <thead class="table-success">
                        <tr >
                            <!-- <th>code Activite</th> -->
                            <th>Annee Activite</th>
                            <th>Nombre pratiquant</th>
                            <th>Rendement</th>
                            <th>Nom Culture</th>
                            <th>Culture</th>
                            <th>Superficie</th>
                            <th>Id Douar</th>
                            <th>Comment.</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable" class="text-dark border">
                        <!-- Table rows will be dynamically added here -->
                        <?php
                            // Assuming you already have the database connection established ($pdo)
                            $query = "SELECT * FROM agriculture";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                            ?>

                            <!-- Add this inside the table body -->
                            <?php foreach ($results as $row) : ?>
                                <tr>
                                    <!-- <td><?= $row['codeactivite'] ?></td> -->
                                    <td><?= $row['annee'] ?></td>
                                    <td><?= $row['nombrepratiquant'] ?></td>
                                    <td><?= $row['rendement'] ?></td>
                                    <td><?= $row['nom_culture'] ?></td>
                                    <td><?= $row['type_culture'] ?></td>
                                    <td><?= $row['superficie'] ?></td>
                                    <td><?= $row['douar'] ?></td>
                                    <td><?= $row['commentaire'] ?></td> 
                                    <td>
                                        <a href="agriculture-edit.php?id=<?= $row['codeactivite'] ?>"><button name="edit_agriculture" class="edit-btn btn btn-warning" data-id="<?= $row['codeactivite'] ?>">Editer</button></a>
                                    </td>
                                    <td>
                                        <button name="delete_agriculture" class="delete-btn btn btn-danger" data-id="<?= $row['codeactivite'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
<?php
include_once 'footer.php';

?>
















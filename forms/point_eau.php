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
                        <form action="./includes/point_eau.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Point  Eau</b></span>
                                <div class="form-group col-md-6">
                                    <label for="id_amenagement">Id_Amenagement</label>
                                    <input name="id_amenagement" type="number" class="form-control" id="id_amenagement" name="id_amenagement" placeholder="Id_Amenagement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="etatelement">Etat_Element</label>
                                    <input name="etatelement" type="text" class="form-control" id="etatelement" placeholder="etatelement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="detailamenagement">Identifiant_Amenagement</label>
                                    <input name="detailamenagement" type="text" class="form-control" id="detailamenagement" placeholder="detailamenagement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nompointeau">Nom_Point_Eau </label>
                                    <input name="nompointeau" type="text" class="form-control" id="nompointeau" placeholder="nompointeau">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="nature">nature</label>
                                    <input name="nature" type="text" class="form-control" id="nature" placeholder="nature">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="localisation">Localisation</label>
                                    <input name="localisation" type="text" class="form-control" id="localisation" placeholder="localisation">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="profondeur">Profondeur</label>
                                    <input name="profondeur" type="number" class="form-control" id="profondeur" placeholder="profondeur">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="importance">importance</label>
                                <input name="importance" type="date" class="form-control" id="importance" placeholder="importance">
                            </div>
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Commentaire</span>
                                </div>
                                <textarea name="commentaire" class="form-control" id="commentaire" aria-label="commentaire" placeholder="Entrer un commentaire /description de l'especes"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Inserer</button>
                        </form>
                        <br>
                        <a href="#" class="btn btn-primary">Nouveau</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
            
                    <table class="table table-striped">
                        <thead class="table-success">
                            <tr >
                                <th>Nom Point_Eau</th>
                                <th>Det.Amengt</th>
                                <th>Etat Element</th>
                                <th>Id Amengt</th>
                                <th>Profondeur</th>
                                <th>nature</th>
                                <th>local.</th>
                                <th>import.</th>
                                <th>com</th>
                                <th>Editer</th>
                                <th>Effacer</th>
                            </tr>
                        </thead>
                        <tbody id="circuitTable" class="table table-dark text-dark table-striped" >
                            <!-- Table rows will be dynamically added here -->
                            <?php
                            // Assuming you already have the database connection established ($pdo)
                            $query = "SELECT * FROM point_eau";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                            ?>
                            <!-- Add this inside the table body -->
                            <?php foreach ($results as $row) : ?>
                                <tr>
                                    <td><?= $row['nompointeau'] ?></td>
                                    <td><?= $row['detailamenagement'] ?></td>
                                    <td><?= $row['etatelement'] ?></td>
                                    <td><?= $row['id_amenagement'] ?></td>
                                    <td><?= $row['profondeur'] ?></td>
                                    <td><?= $row['nature'] ?></td>
                                    <td><?= $row['localisation'] ?></td>
                                    <td><?= $row['importance'] ?></td>
                                    <td><?= $row['commentaire'] ?></td>
                                    <td>
                                        <a href="point_eau-edit.php?id=<?= $row['nompointeau'] ?>"><button name="edit_point_eau" class="edit-btn btn btn-warning" data-id="<?= $row['nompointeau'] ?>">Editer</button></a>
                                    </td>
                                    <td>
                                        <!-- Delete form -->
                                        <form style="border:0px; padding:0px;" action="./deletion/point_eau-delete.php" method="POST">
                                            <!-- Hidden input field to include nompointeau  -->
                                            <input type="hidden" name="nompointeau" value="<?= $row['nompointeau'] ?>">
                                            <!-- Delete button -->
                                            <button name="delete_point_eau" class="delete-btn btn btn-danger" data-id="<?= $row['nompointeau'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>


<?php
   include_once 'footer.php';
   
   ?>















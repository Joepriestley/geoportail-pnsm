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
                    <div class="card-body">
                        <form action="./includes/amenagementtouristique.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Amenagement Touristique</b></span>
                                <div class="form-group col-md-6">
                                    <label for="id_amenagement">Id_Amenagement</label>
                                    <input name="id_amenagement" type="number" class="form-control" id="id_amenagement" name="id_amenagement" placeholder="Id_Amenagement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="etatelement">Etat_Element</label>
                                    <input name="etatelement" type="text" class="form-control" id="etatelement" placeholder="etatelement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="detailamenagement">Details_Amenagement</label>
                                    <input name="detailamenagement" type="text" class="form-control" id="detailamenagement" placeholder="detailamenagement">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_amenagementtour">Id_Amenagement_Touristique </label>
                                    <input name="id_amenagementtour" type="text" class="form-control" id="id_amenagementtour" placeholder="id_amenagementtour">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="responsable">Responsable</label>
                                    <input name="responsable" type="text" class="form-control" id="responsable" placeholder="responsable">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="periode">Periode</label>
                                    <input name="periode" type="text" class="form-control" id="periode" placeholder="periode">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Commentaire</span>
                                    </div>
                                    <textarea name="commentaire" class="form-control" id="commentaire" aria-label="detailamenagement" placeholder="Entrer un commentaire/description de l'especes"></textarea>
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
                <table class="table table-striped">
                    <thead class="table-success">
                        <tr >
                            <th>Id_Amenagement</th>
                            <th>Etat_Element</th>
                            <th>Identifiant_Amenagement</th>
                            <th>Id_Amenagement_Touristique </th>
                            <th>Responsable</th>
                            <th>Periode</th>
                            <th>Commentaire</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable" >
                        <!-- Table rows will be dynamically added here -->

                        <?php
                            // Assuming you already have the database connection established ($pdo)
                            $query = "SELECT * FROM amenagement_touristique";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                            ?>

                            <!-- Add this inside the table body -->
                            <?php foreach ($results as $row) : ?>
                                <tr>
                                    <td><?= $row['detailamenagement'] ?></td>
                                    <td><?= $row['etatelement'] ?></td>
                                    <td><?= $row['id_amenagement'] ?></td>
                                    <td><?= $row['id_amenagementtour'] ?></td>
                                    <td><?= $row['responsable'] ?></td>
                                    <td><?= $row['periode'] ?></td>
                                    <td><?= $row['commentaire'] ?></td>
                                    <td>
                                        <a href="amenagementtouristique-edit.php?id=<?= $row['id_amenagementtour'] ?>"><button name="edit_amenagementtour" class="edit-btn btn btn-warning" data-id="<?= $row['id_amenagementtour'] ?>">Editer</button></a>
                                    </td>
                                    <td>
                                        <button name="delete_amenagementtour" class="delete-btn btn btn-danger" data-id="<?= $row['id_amenagementtour'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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














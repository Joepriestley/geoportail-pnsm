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
                        <form action="./includes/pistes.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message'])) 
                        { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Piste</b></span>
                                <div class="form-group col-md-6">
                                    <label for="id_amenagement">Id_Amenagement</label>
                                    <input  type="number" class="form-control" id="id_amenagement" name="id_amenagement" placeholder="Id_Amenagement">
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
                                    <label for="id_piste">Id_Pistes </label>
                                    <input name="id_piste" type="text" class="form-control" id="id_piste" placeholder="id_piste">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="longueur">longueur</label>
                                    <input name="longueur" type="number" class="form-control" id="longueur" placeholder="longueur">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="accessibilite">accessibilite</label>
                                    <input name="accessibilite" type="text" class="form-control" id="accessibilite" placeholder="accessibilite">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="dateouverture">dateouverture</label>
                                <input name="dateouverture" type="date" class="form-control" id="dateouverture" placeholder="dateouverture">
                            </div>
                            <button type="submit"name="submit" class="btn btn-primary">Inserer</button>
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
                            <th>Detaile Amenagement</th>
                            <th>Etat Element</th>
                            <th>Id Amenagement</th>
                            <th>Id Amgt.Touristique </th>
                            <th>longueur</th>
                            <th>accessibilite</th>
                            <th>Date ouverture</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable" class="table table-dark text-dark table-striped" >
                        <!-- Table rows will be dynamically added here -->
                         <?php
                        // Assuming you already have the database connection established ($pdo)
                        $query = "SELECT * FROM pistes";
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
                                <td><?= $row['id_piste'] ?></td>
                                <td><?= $row['longueur'] ?></td>
                                <td><?= $row['accessibilite'] ?></td>
                                <td><?= $row['dateouverture'] ?></td>
                                <td>
                                    <a href="pistes-edit.php?id=<?= $row['id_piste'] ?>"><button name="edit_pistes" class="edit-btn btn btn-warning" data-id="<?= $row['id_piste'] ?>">Editer</button></a>
                                </td>
                                <td>

                                    <!-- Delete form -->
                                    <form style="border:0px; padding:0px;" action="./deletion/sol-delete.php" method="POST">
                                        <!-- Hidden input field to include id_piste -->
                                        <input type="hidden" name="id_piste" value="<?= $row['id_piste'] ?>">
                                        <!-- Delete button -->
                                        <button name="delete_piste" class="delete-btn btn btn-danger" data-id="<?= $row['id_piste'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
                                    </form>

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
















<?php
$pdo = require_once './includes/dbConnect.php';

include_once 'header.php';

?>
<div class="container-fluid mt-4 pt-5">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <b>Les Actions du projet</b>
                </div>
                <div class="card-body bg-dark">
                    <form action="./includes/action.inc.php" id="actionForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message'])) { ?>
                            <p class="message"><?php echo $_GET['message']; ?></p> <?php } ?>
                        <div class="form-row">
                            <span class="form-control text-center bg-dark text-white"><b>Les Actions du Projet</b></span>
                            <div class="form-group col-md-6">
                                <label for="id_action">Id_Action</label>
                                <input name="id_action" type="text" class="form-control" id="id_action" placeholder="Id action">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_projet">Id_Projet </label>
                                <input name="id_projet" type="text" class="form-control" id="id_projet" placeholder="Id_Projet">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="duree">Duree</label>
                                <input name="duree" type="text" class="form-control" id="duree" placeholder="Duree">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lieu">Lieu </label>
                                <input name="lieu" type="text" class="form-control" id="lieu" placeholder="Lieu ou l'action se passe">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Commentaire</span>
                                </div>
                                <textarea name="commentaire" class="form-control" id="commentaire" aria-label="commentaire" placeholder="Entrer un commentaire /description de l'espece"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Inserer</button>
                    </form>
                    <br>
                    <a href="#" class="btn btn-primary">Nouveau</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Id_Action</th>
                        <th>Id_Projet</th>
                        <th>Duree (hrs)</th>
                        <th>Lieu</th>
                        <th>Commentaire</th>
                        <th>Editer</th>
                        <th>Effacer</th>
                    </tr>
                </thead>
                <tbody id="actionTable">
                    <!-- Table rows will be dynamically added here -->
                    <?php
                    // Assuming you already have the database connection established ($pdo)
                    $query = "SELECT * FROM actions";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Add this inside the table body -->
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?= $row['id_action'] ?></td>
                            <td><?= $row['id_projet'] ?></td>
                            <td><?= $row['duree'] ?></td>
                            <td><?= $row['lieu'] ?></td>
                            <td><?= $row['commentaire'] ?></td>
                            <td>
                                <a href="action-edit.php?id=<?= $row['id_action'] ?>"><button name="edit_action" class="edit-btn btn btn-warning" data-id="<?= $row['id_action'] ?>">Editer</button></a>

                            </td>
                            <td>
                                <!-- Delete form -->
                                <form style="border:0px; padding:0px;" action="./deletion/action-delete.php" method="POST">
                                    <!-- Hidden input field to include id_action -->
                                    <input type="hidden" name="id_action" value="<?= $row['id_action'] ?>">
                                    <!-- Delete button -->
                                    <button name="delete_action" class="delete-btn btn btn-danger" data-id="<?= $row['id_action'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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
<?php

$pdo = require_once './includes/dbConnect.php';


include_once 'header.php';
?>
<div class="container-fluid mt-auto">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <b>Amenagement</b>
                </div>
                <div class="card-body bg-dark">
                    <form action="./includes/amenagement.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message'])) { ?>
                            <p class="message"><?php echo $_GET['message']; ?></p>
                        <?php } ?>
                        <div class="form-row">
                            <span class="form-control text-center bg-dark text-white"><b>Amenagement</b></span>
                            <div class="form-group col-md-6">
                                <label for="codeamenagement">Code_Amenagement</label>
                                <input type="text" name="codeamenagement" class="form-control" id="codeamenagement" placeholder="codeamenagement">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="coutamenagement">Cout_Amenagement</label>
                                <input type="number" class="form-control" id="coutamenagement" name="coutamenagement" placeholder="coutamenagement">
                            </div>
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Commentaire</span>
                                </div>
                                <textarea name="commentaire" class="form-control" id="commentaire" aria-label="commentaire" rows="7" cols="" placeholder="Entrer un commentaire /description de l'especes"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                        </div>
                        <div class="form-row">
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
                <thead class="table-primary">
                    <tr>
                        <th>Code_Amenagement</th>
                        <th>Cout_Amenagement</th>
                        <th>Commentaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="circuitTable">
                    <!-- Table rows will be dynamically added here -->
                    <?php
                    // Assuming you already have the database connection established ($pdo)
                    $query = "SELECT * FROM amenagement";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Add this inside the table body -->
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?= $row['codeamenagement'] ?></td>
                            <td><?= $row['coutamenagement'] ?></td>
                            <td><?= $row['commentaire'] ?></td>
                            <td>
                                <a href="amenagement-edit.php?id=<?= $row['codeamenagement'] ?>"><button name="edit_amenagement" class="edit-btn btn btn-warning">Editer</button></a>

                            </td>
                            <td>

                                <!-- Delete form -->
                                <form style="border:0px; padding:0px;"  action="./deletion/amenagement-delete.php" method="POST">
                                    <!-- Hidden input field to include codeamenagement -->
                                    <input type="hidden" name="codeamenagement" value="<?= $row['codeamenagement'] ?>">
                                    <!-- Delete button -->
                                    <button name="delete_amenagement" class="delete-btn btn btn-danger" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
                                </form>
                            
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
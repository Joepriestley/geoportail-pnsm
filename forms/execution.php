<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';

?>

<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                      <b>Execution du Projet</b>
                    </div>
                    <div class="card-body bg-dark">
                        <form action="./includes/execution.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Execution</b></span>
                                
                                <div class="form-group col-md-6">
                                    <label for="activite">activite </label>
                                    <input name="activite" type="text" class="form-control" id="activite" name="activite" placeholder="activite">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_executeur"></label>
                                    <input name="id_executeur" type="text" class="form-control" name="id_executeur" id="id_executeur" placeholder="id_executeur">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="id_action">id_action </label>
                                    <input name="id_action" type="number" class="form-control" name="id_action" id="id_action" placeholder="id_action">
                                </div>
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
                            <th>Date Utilisee</th>
                            <th>activite </th>
                            <th>id_action</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable" class="table table-dark text-dark table-striped">
                        <!-- Table rows will be dynamically added here -->
                        <?php
                            // Assuming you already have the database connection established ($pdo)
                            $query = "SELECT * FROM execut";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                            ?>

                            <!-- Add this inside the table body -->
                            <?php foreach ($results as $row) : ?>
                                <tr>
                                    <td><?= $row['activite'] ?></td>
                                    <td><?= $row['id_executeur'] ?></td>
                                    <td><?= $row['id_action'] ?></td>
                                    <td>
                                        <a href="execut-edit.php?id=<?= $row['activite'] ?>"><button name="edit_execut" class="edit-btn btn btn-warning" data-id="<?= $row['activite'] ?>">Editer</button></a>
                                    </td>
                                    <td>
                                        <button name="delete_execut" class="delete-btn btn btn-danger" data-id="<?= $row['activite'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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















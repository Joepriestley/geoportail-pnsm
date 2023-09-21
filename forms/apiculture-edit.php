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
                            $id_apiculture = $_GET['id'];
                            $query = "SELECT * FROM apiculture WHERE codeactivite= :id_apiculture";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(':id_apiculture', $id_apiculture, PDO::PARAM_STR);
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
                        <form action="./includes/apiculture-edit.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Apiculture</b></span>
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
                                    <label for="nombreruches">nombreruches</label>
                                    <input name="nombreruches" type="text" value="<?=$result->nombreruches; ?>" class="form-control" id="nombreruches" placeholder="nombreruches">
                                </div>
                                </div>
                                <input type="hidden" value="<?=$result->codeactivite; ?>"  name="codeactivite">
                            </div>
                            </div>
                            <div class="form-row">
                        
                                <div class="form-group col-md-6">
                                    <label for="id_douar">Id_Douar</label>
                                    <select name="id_douar" id="id_douar"  value="<?=$result->id_douar ?>" class="form-control">
                                        <option value="">--Choissisez l'identifiant de douar--</option>
                                        <option value="1">Larjam(1)</option>
                                        <option value="2">Sdi Boulafdail(2)</option>
                                        <option value="3">Aghrimaz(3)</option>
                                        <option value="4">Sidi Binzaren(4)</option>
                                        <option value="5">Sidi Oussay(5)</option>
                                        <option value="6">Sidi Rbat(6)</option>
                                        <option value="7">Ifaryane(7)</option>
                                        <option value="8">Douira(8)</option>
                                        <option value="9">Tifnit(9)</option>
                                        <option value="10">Sidi Toualnon(10)</option>
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
                <table class="table table-striped">
                    <thead class="table-success">
                        <tr >
                            <th>code Activite</th>
                            <th>Annee Activite</th>
                            <th>Nombre pratiquant</th>
                            <th>Rendement</th>
                            <th>nombreruches</th>
                            <th>Id Douar</th>
                            <th>Commentaire</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable" class="text-dark border">
                        <!-- Table rows will be dynamically added here -->
                        <?php
                            // Assuming you already have the database connection established ($pdo)
                            $query = "SELECT * FROM apiculture";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                            ?>

                            <!-- Add this inside the table body -->
                            <?php foreach ($results as $row) : ?>
                                <tr>
                                    <td><?= $row['codeactivite'] ?></td>
                                    <td><?= $row['annee'] ?></td>
                                    <td><?= $row['nombrepratiquant'] ?></td>
                                    <td><?= $row['commentaire'] ?></td>
                                    <td><?= $row['id_douar'] ?></td>
                                    <td><?= $row['rendement'] ?></td>
                                    <td><?= $row['nombreruches'] ?></td>
                                    <td>
                                        <a href="apiculture-edit.php?id=<?= $row['codeactivite'] ?>"><button name="edit_apiculture" class="edit-btn btn btn-warning" data-id="<?= $row['codeactivite'] ?>">Editer</button></a>
                                    </td>
                                    <td>
                                        <button name="delete_apiculture" class="delete-btn btn btn-danger" data-id="<?= $row['codeactivite'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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
















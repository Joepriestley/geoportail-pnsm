<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';

?>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-5">
                <div class="card bg-dark">
                    <div class="card-header bg-info text-white">
                      <b>Les Activites</b>
                    </div>
                    <div class="card-body">
                        <form action="./includes/autre_activite.inc.php" id="autreactiviteForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message']))  { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b>Autres Activites</b></span>
                                <div class="form-group col-md-6">
                                    <label for="codeactivite">code Activite</label>
                                    <input name="codeactivite" type="text" class="form-control" id="codeactivite" placeholder="code Activite">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="annee">Annee Activite </label>
                                    <input  type="month" class="form-control" id="annee"  name="annee" min="2019-07" value="2018-07" placeholder="annee d'activite">
                                </div>
    
                                <div class="form-group col-md-6">
                                    <label for="nombrepratiquant">Nombre pratiquant</label>
                                    <input name="nombrepratiquant" type="number" class="form-control" id="nombrepratiquant" placeholder="nombrepratiquant">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nomactivite">Nom Activite </label>
                                    <input name="nomactivite" type="text" class="form-control" id="nomactivite" placeholder="nomactivite">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="caracteristiques">Caracteristiques</label>
                                    <input name="caracteristiques" type="text" class="form-control" id="caracteristiques" placeholder="caracteristiques">
                                </div>
                            </div>
                            <div class="form-row">
                        
                                <div class="form-group col-md-6">
                                    <label for="id_douar">Id_Douar</label>
                                    <select name="id_douar" id="id_douar" class="form-control">
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
                <table class="table table-striped">
                    <thead class="table-success">
                        <tr >
                            <th>code Activite</th>
                            <th>Annee Activite</th>
                            <th>Nombre pratiquant</th>
                            <th>Commentaire</th>
                            <th>Id_Douar</th>
                            <th>Nom_Activite</th>
                            <th>Caracteristiques</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable"  class="table table-dark text-dark table-striped">
                        <!-- Table rows will be dynamically added here -->
                        <?php
                            // Assuming you already have the database connection established ($pdo)
                            $query = "SELECT * FROM autre_activites";
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
                                    <td><?= $row['nomactivite'] ?></td>
                                    <td><?= $row['caracteristiques'] ?></td>
                                    <td>
                                        <a href="autreactivite-edit.php?id=<?= $row['codeactivite'] ?>"><button name="edit_sol" class="edit-btn btn btn-warning" data-id="<?= $row['codeactivite'] ?>">Editer</button></a>
                                    </td>
                                    <td>
                                        <button name="delete_autreactivite" class="delete-btn btn btn-danger" data-id="<?= $row['codeactivite'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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















<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';

$query = "SELECT id_piste,_nom_piste FROm pistes";
$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 json_encode($data);

?>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <b> Elements Amenagement</b>
                </div>
                <div class="card-body bg-dark">
                    <form action="./includes/ref_piste.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message'])) { ?>
                            <p class="message"><?php echo $_GET['message']; ?></p> <?php } ?>
                        <div class="form-row">
                            <span class="form-control text-center bg-dark text-white"><b>Refection Piste</b></span>

                            <div class="form-group col-md-12">
                                <label for="nom_piste">Nom_Piste</label>
                                <select name="nom_piste" type="text" class="form-control" id="nom_piste_select">
                                <?php
                                    foreach($data as $data){
                                    echo "<option value=\"{$data['id_piste']}\">{$data['_nom_piste']}</option>";
                                    }
                              ?>
                              </select>
                            </div>
                            <div  id="id_input" class="form-group col-md-12">
                               
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date_refection">Date_Refection</label>
                                <input name="date_refection" type="date" class="form-control" id="date_refection" placeholder="date_refection">
                               
                            </div>
                                    <div class="form-group col-md-6">
                                        <label for="cout_amengt">Cout_Amenagement (dhs)</label>
                                        <input name="cout_amengt" type="number" class="form-control" id="cout_amengt" placeholder="cout_amengt">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="etat">etat</label>
                                        <input name="etat" type="text" class="form-control" id="etat" placeholder="etat">
                                    </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="executeur">Executeur</label>
                                <input name="executeur" type="text" class="form-control" id="executeur" placeholder="executeur">
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
                    <tr>
                        <th>Id_Piste</th>
                        <th>INom</th>
                        <th>date Refection</th>
                        <th>Cout Amen.(dhs)</th>
                        <th>etat</th>
                        <th>Executeur</th>
                        <th>Editer</th>
                        <th>Effacer</th>
                    </tr>
                </thead>
                <tbody id="circuitTable" class="table table-dark text-dark table-striped">
                    <!-- Table rows will be dynamically added here -->
                    <?php
                    // Assuming you already have the database connection established ($pdo)
                    $query = "SELECT * FROM refection_pistes";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Add this inside the table body -->
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?= $row['id_refection_piste'] ?></td>
                            <td><?= $row['nom_piste'] ?></td>
                            <td><?= $row['date_refection'] ?></td>
                            <td><?= $row['cout_amengt'] ?></td>
                            <td><?= $row['etat'] ?></td>
                            <td><?= $row['executeur'] ?></td>
                            <td>
                                <a href="refection_pistes-edit.php?id=<?= $row['id_refection_piste'] ?>"><button name="edit_pistes" class="edit-btn btn btn-warning" data-id="<?= $row['id_refection_piste'] ?>">Editer</button></a>
                            </td>
                            <td>

                                <!-- Delete form -->
                                <form style="border:0px; padding:0px;" action="./deletion/pistes-delete.php" method="POST">
                                    <!-- Hidden input field to include id_refection_piste -->
                                    <input type="hidden" name="id_refection_piste" value="<?= $row['id_refection_piste'] ?>">
                                    <!-- Delete button -->
                                    <button name="delete_piste" class="delete-btn btn btn-danger" data-id="<?= $row['id_refection_piste'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const selectElement=document.getElementById('nom_piste_select');
    const idInputDiv= document.getElementById('id_input');

    //adding an event listener t the selected element
    selectElement.addEventListener('change', function(){
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const selectValue = selectedOption.value;
        const selectedText =selectedOption.text;

        const id_elt =`
        <label for="id_refection_piste">Id_Piste</label>
        <input name="id_refection_piste" type="text" value="`+selectValue+`|`+selectedText+`" class="form-control" id="id_refection_piste" placeholder="id_refection_piste" disabled>
           `
           idInputDiv.innerHTML = id_elt;

    })
</script>


<?php
include_once 'footer.php';

?>
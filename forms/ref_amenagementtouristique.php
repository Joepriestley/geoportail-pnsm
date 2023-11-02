<?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';

$query = "SELECT id_amengttour,nom_amenagttour FROM amenagement_touristiques";
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
                    <form action="./includes/ref_amenagementtour.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message'])) { ?>
                            <p class="message"><?php echo $_GET['message']; ?></p> <?php } ?>
                        <div class="form-row">
                            <span class="form-control text-center bg-dark text-white"><b> Refection Amenagement Touristique</b></span>

                            <div class="form-group col-md-12">
                                <label for="nom_amenagementtour">Nom Amenage. Touristique</label>
                                <select name="nom_amenagementtour" type="text" class="form-control" id="nom_amenagementtour_select">
                                    <?php

                                    foreach ($data as $data) {
                                        echo "<option value=\"{$data['id_amengttour']}\">{$data['nom_amenagttour']}</option>";
                                    }
                                    ?>
                                </select>
                                <?php ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="responsable">Responsable Amenagement Touristique</label>
                                <input name="responsable" type="text" class="form-control" id="responsable" placeholder="responsable de l'amenagement touristique">
                            </div>
                            <div id="id_input" class="form-group col-md-12">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nature">Nature</label>
                                <input name="nature" type="text" class="form-control" id="nature" placeholder="nature de gestion">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="date_refection">Date Refection</label>
                                <input name="date_refection" type="date" class="form-control" id="date_refection" placeholder="date_refection de gestion">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="cout_amengt">Cout Amenagement</label>
                                <input name="cout_amengt" type="text" class="form-control" id="cout_amengt" placeholder="Saissir le cout de gestion">
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
                    <tr>
                        <th>identifiant</th>
                        <th>Nature</th>
                        <th>Responsable </th>
                        <th>Periode</th>
                        <th>Cout Creation</th>
                        <th>Nom Am.Tour.</th>
                        <th>Editer</th>
                        <th>Effacer</th>
                    </tr>
                </thead>
                <tbody id="circuitTable">
                    <!-- Table rows will be dynamically added here -->

                    <?php
                    // Assuming you already have the database connection established ($pdo)
                    $query = "SELECT * FROM ref_amenagement_touristique";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                    ?>

                    <!-- Add this inside the table body -->
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><?= $row['id_ref_amengt_tour'] ?></td>
                            <td><?= $row['nature'] ?></td>
                            <td><?= $row['responsable'] ?></td>
                            <td><?= $row['date_refection'] ?></td>
                            <td><?= $row['cout_amengt'] ?></td>
                            <td><?= $row['nom_amenagementtour'] ?></td>
                            <td>
                                <a href="ref_amenagementtouristique-edit.php?id=<?= $row['id_ref_amengt_tour'] ?>"><button name="edit_amenagementtour" class="edit-btn btn btn-warning" data-id="<?= $row['id_ref_amengt_tour'] ?>">Editer</button></a>
                            </td>
                            <td>
                                <!-- Delete form -->
                                <form style="border:0px; padding:0px;" action="./deletion/ref_amenagementtour-delete.php" method="POST">
                                    <!-- Hidden input field to include id_piste -->
                                    <input type="hidden" name="id_ref_amengt_tour" value="<?=$row['id_ref_amengt_tour'] ?>">
                                    <!-- Delete button -->
                                    <button name="delete_amenagementtour" class="delete-btn btn btn-danger" data-id="<?= $row['id_ref_amengt_tour'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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
    const selectElement = document.getElementById('nom_amenagementtour_select');
    const idInputDiv = document.getElementById('id_input');

    // Adding an event listener to the selected element 
    selectElement.addEventListener('change', function() {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const selectValue = selectedOption.value; // Corrected from selectedOption.setFormHTML
        const selectedText = selectedOption.text;

        const id_elt = `

            <label for="id_ref_amengt_tour">ID Amenagement Touristique </label>
            <input name="id_ref_amengt_tour" type="text"  value="` + selectValue + `|` + selectedText + `" class="form-control" id="id_ref_amengt_tour" placeholder="Donnerr un numero d'identifiant" readonly>
        `
        idInputDiv.innerHTML = id_elt;
    })
</script>


<?php
include_once 'footer.php';

?>
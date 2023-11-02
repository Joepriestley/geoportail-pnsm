    <?php
$pdo = require_once './includes/dbConnect.php';
include_once 'header.php';



$query = "SELECT id_cloture, nom_cloture FROM clotures";
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
                        <form action="./includes/ref_cloture.inc.php" id="circuittouristForm" style="background-color: rgb(201, 216, 214);" method="post">
                        <?php if (isset($_GET['message'])) 
                        { ?>
                                 <p class="message"><?php echo $_GET['message']; ?></p> <?php }?>
                            <div class="form-row">
                                <span class="form-control text-center bg-dark text-white"><b> Refection Cloture</b></span>

                                <div class="form-group col-md-12">
                                <label for="nom_cloture">Nom Cloture</label>
                                <select name="nom_cloture" class="form-control" id="nom_cloture_select">
                                    
                                    <?php 
                                    
                                    foreach ($data as $data) {
                                        echo "<option value=\"{$data['id_cloture']}\">{$data['nom_cloture']}</option>";  
                                  }
                                    ?>
                                </select>
                                <?php ?>
                            </div>
                               
                                <div id="id_input" class="form-group col-md-12">
                                    
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="date_refection">date_refection</label>
                                    <input name="date_refection" type="date" class="form-control" id="date_refection" placeholder="date_refection">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="coutamengt">Cout Amenagement</label>
                                    <input name="coutamengt" type="number" class="form-control" id="coutamengt" placeholder="coutamengt">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nature">Nature</label>
                                    <input name="nature" type="text" class="form-control" id="nature" placeholder="nature">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="etat">Etat</label>
                                <input name="etat" type="text" class="form-control" id="etat" placeholder="etat">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="executeur">Executeur</label>
                                <input name="executeur" type="text" class="form-control" id="executeur" placeholder="executeur">
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
                            <th>ID Refection</th>
                            <th>Nom Cloture</th>
                            <th>Date Refection</th>
                            <th>Cout amenagement</th>
                            <th>Nature</th>
                            <th>Etat</th>
                            <th>Executeur</th>
                            <th>Editer</th>
                            <th>Effacer</th>
                        </tr>
                    </thead>
                    <tbody id="circuitTable" class="table table-dark text-dark table-striped" >
                        <!-- Table rows will be dynamically added here -->
                         <?php
                        // Assuming you already have the database connection established ($pdo)
                        $query = "SELECT * FROM refection_cloture";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
                        $results = $stmt->fetchall(PDO::FETCH_ASSOC);
                        ?>

                        <!-- Add this inside the table body -->
                        <?php foreach ($results as $row) : ?>
                            <tr>
                                <td><?= $row['id_refection'] ?></td>
                                <td><?= $row['nom_cloture'] ?></td>
                                <td><?= $row['date_refection'] ?></td>
                                <td><?= $row['coutamengt'] ?></td>
                                <td><?= $row['nature'] ?></td>  
                                <td><?= $row['etat'] ?></td>
                                <td><?= $row['executeur'] ?></td>
                                <td>
                                    <a href="cloture-edit.php?id=<?= $row['id_refection'] ?>"><button name="edit_cloture" class="edit-btn btn btn-warning" data-id="<?= $row['id_refection'] ?>">Editer</button></a>
                                </td>
                                <td>

                                    <!-- Delete form -->
                                    <form style="border:0px; padding:0px;" action="./deletion/ref_cloture-delete.php" method="POST">
                                        <!-- Hidden input field to include id_piste -->
                                        <input type="hidden" name="id_refection" value="<?= $row['id_refection'] ?>">
                                        <!-- Delete button -->
                                        <button name="delete_ref_cloture" class="delete-btn btn btn-danger" data-id="<?= $row['id_refection'] ?>" onclick="return confirm('Etes vous d\'effacer cette ligne?');">Effacer</button>
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
    const selectElement = document.getElementById('nom_cloture_select');
    const idInputDiv= document.getElementById('id_input');

    // Adding an event listener to the selected element 
    selectElement.addEventListener('change', function() {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const selectValue = selectedOption.value; // Corrected from selectedOption.setFormHTML
        const selectedText = selectedOption.text;

        const id_elt =`

        <label for="id_refection">id_refection</label>
        <input name="id_refection" type="text"  value="`+selectValue+`|`+selectedText+`" class="form-control" id="id_refection" placeholder="id_refection" readonly>
           
        `
        // idInputDiv.innerHTML = id_elt;
    })
</script>

    

<?php
   include_once 'footer.php';
   
   ?>















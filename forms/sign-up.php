<?php
include_once 'header.php';
?>

<div class="mt-5 mb-3">
    <div class="row "></div>
        <div class="col-md-3  ml-5 ">
            <div class="card bg-info">
                <div class="card-header bg-danger text-white">
                    <h2 class="text-center">Authentification</h2>
                </div>
                <div class="card-body bg-dark">
                <?php
                    // Check if an error or success message is set in the session
                    if (isset($_GET['error_message'])) {
                        echo '<div class="error-message">' . $_GET['error_message'] . '</div>';
                    }

                    if (isset($_GET['success_message'])) {
                        echo '<div class="success-message">' . $_GET['success_message'] . '</div>';
                        // Clear the success message after displaying it
                    }
                    ?>

                    <form action="./includes/signup.inc.php" style="background-color: rgb(201, 216, 214);" method="POST">
                        <div class="form-group">
                            <label class="pl-2" for="nom"> Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label class="pl-2 font-weight-700" for="prenom">Prenom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="form-group">
                            <label class="pl-2" for="mot_de_passe">Mot de Passe:</label>
                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                        </div>
                        <div class="form-group">
                            <label class="pl-2" for="email"> Adresse Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label class="pl-2" for="role">Role:</label>
                            <select class="form-control" id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>


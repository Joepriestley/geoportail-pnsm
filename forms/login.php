<!DOCTYPE html>
<html lang="en">
<?php
include_once 'header.php';
// style for the galerie\
require_once './includes/dbConnect.php';
// session_start();
// if(isset($_POST['']))

?>
<div class=" mt-3">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Login</h2>
                </div>

               
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
                <div class="card-body">
                    <form  action="includes/login.inc.php" method="POST">
                        <div class="form-group  ">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="mot_de_passe" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>

                        <br><div class="form-group">

                            <img src="../img/login_page.jpg" class="rounded mx-auto d-block" width="
                            350px" height="250px" alt="image for login">
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once 'footer.php';

?>
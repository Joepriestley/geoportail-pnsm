<?php
session_start();
$pdo = require_once 'dbConnect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Server-side data validation
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nom = validate($_POST['nom']);
    $mot_de_passe = validate($_POST['mot_de_passe']);
    if(empty($nom)){
        header('Location : ../login.php?error_message=Nom d\'utilisateur est nécessaire');
    }else if(empty($mot_de_passe)){
    header('Location : ../login.php?error_message=Mot de passe d\'utilisateur est nécessaire');
}else{
    $query = "SELECT * FROM users WHERE nom=:nom";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result['nom'] && password_verify($mot_de_passe, $result['mot_de_passe'])){
            header('Location: ../index.php');
        }else {
            header('Location : ../login.php?error_message=Les informations d\'identification invalides');
        }
    }

}

?>
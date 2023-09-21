<?php
$pdo = require_once 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Server-side data validation
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $codeactivite = validate($_POST['codeactivite']);
    $annee = validate($_POST['annee']);
    $nombrepratiquant = validate($_POST['nombrepratiquant']);
    $commentaire = validate($_POST['commentaire']);
    $id_douar = validate($_POST['id_douar']);
    $nomactivite = validate($_POST['nomactivite']);
    $caracteristiques = validate($_POST['caracteristiques']);
    
    
    

    // Perform server-side validation
    if (empty($codeactivite) || empty($annee) || empty($nombrepratiquant) || empty($commentaire) || empty($id_douar) || empty($nomactivite) || empty($caracteristiques)) {
            header("Location: ../autreactivite.php?message=Veuillez saisir des donnees dans tous les champs!");
            exit();
        // echo "Please fill in all fields.";
    } else {
        try {
            // Prepare the SQL query using named placeholders
            $query = "INSERT INTO autre_activites (codeactivite, annee, nombrepratiquant, commentaire,id_douar, nomactivite,caracteristiques)
                     VALUES (:codeactivite, :annee, :nombrepratiquant, :commentaire,:id_douar, :nomactivite,:caracteristiques)";
            
            $stmt = $pdo->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the statement using an associative array
                $params = [
                    ':codeactivite' => $codeactivite,
                    ':annee' => $annee,
                    ':nombrepratiquant' => $nombrepratiquant,
                    ':commentaire' => $commentaire,
                    ':id_douar' => $id_douar,
                    ':nomactivite' =>$nomactivite,
                    ':caracteristiques' => $caracteristiques
                    
                    
                ];

                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../autreactivite.php?message=Data inserted successfully!");
                    exit();

                } else {
                    echo "Error: " . $stmt->errorInfo()[2];
                }
            } else {
                echo "Error preparing statement.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Close the database connection (optional if your script ends here)
    // $pdo = null;
}
?>



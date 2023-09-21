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

    $nompointeau = validate($_POST['nompointeau']);
    $detailamenagement = validate($_POST['detailamenagement']);
    $etatelement = validate($_POST['etatelement']);
    $id_amenagement = validate($_POST['id_amenagement']);
    $profondeur = validate($_POST['profondeur']);
    $nature = validate($_POST['nature']);
    $localisation = validate($_POST['localisation']);
    $importance = validate($_POST['importance']);
    $commentaire = validate($_POST['commentaire']);

    // Perform server-side validation
    if (empty($nompointeau) || empty($detailamenagement) || empty($etatelement) || empty($id_amenagement) || empty($profondeur) || empty($nature) || empty($localisation) || empty($importance) || empty($commentaire)) {
        echo "Please fill in all fields.";
    } else {
        try {
            $query = "UPDATE point_eau 
            SET detailamenagement = :detailamenagement,
                etatelement = :etatelement,
                id_amenagement = :id_amenagement,
                profondeur = :profondeur,
                nature = :nature,
                localisation = :localisation,
                importance = :importance,
                commentaire = :commentaire
            WHERE nompointeau = :nompointeau"; // Change 'nompointeau' to the actual primary key field name of your table
            
            $stmt = $pdo->prepare($query);
            
            if ($stmt) {
                // Bind parameters including the primary key 'nompointeau' for the record to update
                $params = [
                    ':detailamenagement' => $detailamenagement,
                    ':etatelement' => $etatelement,
                    ':id_amenagement' => $id_amenagement,
                    ':profondeur' => $profondeur,
                    ':nature' => $nature,
                    ':localisation' => $localisation,
                    ':importance' => $importance,
                    ':commentaire' => $commentaire,
                    ':nompointeau' => $nompointeau // Replace with the actual 'nompointeau' value you want to update
                ];
                
                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../point_eau.php?message=Data updated successfully!");
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
}
?>

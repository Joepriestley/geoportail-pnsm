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

    $detailamenagement = validate($_POST['detailamenagement']);
    $etatelement = validate($_POST['etatelement']);
    $id_amenagement = validate($_POST['id_amenagement']);
    $id_piste = validate($_POST['id_piste']);
    $longueur = validate($_POST['longueur']);
    $accessibilite = validate($_POST['accessibilite']);
    $dateouverture = validate($_POST['dateouverture']);
    
    // Perform server-side validation
    if (empty($detailamenagement) || empty($etatelement) || empty($id_amenagement) || empty($id_piste) || empty($longueur) || empty($accessibilite) || empty($dateouverture)) {
        echo "Please fill in all fields.";
    } else {
        try {
            $query = "UPDATE pistes 
            SET detailamenagement = :detailamenagement,
                etatelement = :etatelement,
                id_amenagement = :id_amenagement,
                longueur = :longueur,
                accessibilite = :accessibilite,
                dateouverture = :dateouverture
            WHERE id_piste = :idToUpdate"; // Change 'id_piste' to the actual primary key field name of your table
            
            $stmt = $pdo->prepare($query);
            
            if ($stmt) {
                // Bind parameters including the ID of the record to update
                $params = [
                    ':detailamenagement' => $detailamenagement,
                    ':etatelement' => $etatelement,
                    ':id_amenagement' => $id_amenagement,
                    ':longueur' => $longueur,
                    ':accessibilite' => $accessibilite,
                    ':dateouverture' => $dateouverture,
                    ':idToUpdate' => $id_piste // Replace with the actual ID you want to update
                ];
                
                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../pistes.php?message=Data updated successfully!");
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

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
    $id_amenagementtour = validate($_POST['id_amenagementtour']);
    $responsable = validate($_POST['responsable']);
    $periode  = validate($_POST['periode']);
    $commentaire  = validate($_POST['commentaire']);
    
    // Perform server-side validation
    if (empty($detailamenagement) || empty($etatelement) || empty($id_amenagement) || empty($id_amenagementtour) || empty($responsable) || empty($periode) || empty($commentaire)) {
        echo "Please fill in all fields.";
    } else {
        try {
            $query = "UPDATE amenagement_touristique 
            SET detailamenagement =:detailamenagement,
                etatelement = :etatelement,
                id_amenagement = :id_amenagement,
                responsable = :responsable,
                periode = :periode,
                commentaire = :commentaire 
            WHERE id_amenagementtour = :idToUpdate"; // Use the correct primary key field
            
            $stmt = $pdo->prepare($query);
            
            if ($stmt) {
                // Bind parameters including the ID of the record to update
                $params = [
                    'detailamenagement' => $detailamenagement,
                    ':etatelement' => $etatelement,
                    ':id_amenagement' => $id_amenagement,
                    ':responsable' => $responsable,
                    ':periode' => $periode,
                    ':commentaire' => $commentaire,
                    ':idToUpdate' => $id_amenagementtour // Replace with the actual ID you want to update
                ];
                
                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../amenagementtouristique.php?message=Les mises a jour faites avec success!!");
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

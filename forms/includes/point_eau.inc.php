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
    $nompointeau = validate($_POST['nompointeau']);
    $profondeur = validate($_POST['profondeur']);
    $nature = validate($_POST['nature']);
    $localisation = validate($_POST['localisation']);
    $importance = validate($_POST['importance']);
    $commentaire = validate($_POST['commentaire']);
    
    

    // Perform server-side validation
    if (empty($detailamenagement) || empty($etatelement) || empty($id_amenagement) || empty($nompointeau) || empty($nature) || empty($localisation)|| empty($importance)|| empty($commentaire)) {
            header("Location: ../point_eau.php?message=Veuillez saisir des donnees dans tous les champs!");
            exit();
        // echo "Please fill in all fields.";
    } else {
        try {
            // Prepare the SQL query using named placeholders
            $query = "INSERT INTO point_eau (detailamenagement, etatelement, id_amenagement, nompointeau,profondeur, nature,localisation,importance,commentaire)
                     VALUES (:detailamenagement, :etatelement, :id_amenagement, :nompointeau,:profondeur, :nature,:localisation,:importance,:commentaire)";
            
            $stmt = $pdo->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the statement using an associative array
                $params = [
                    ':detailamenagement' => $detailamenagement,
                    ':etatelement' => $etatelement,
                    ':id_amenagement' => $id_amenagement,
                    ':nompointeau' => $nompointeau,
                    ':profondeur' => $profondeur,
                    ':nature' =>$nature,
                    ':localisation' => $localisation,
                    ':importance' => $importance,
                    ':commentaire' => $commentaire
                    
                ];

                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../point_eau.php?message=Data inserted successfully!");
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



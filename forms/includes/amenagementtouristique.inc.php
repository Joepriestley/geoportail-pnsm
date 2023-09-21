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
    $periode = validate($_POST['periode']);
    $commentaire = validate($_POST['commentaire']);
    
    

    // Perform server-side validation
    if (empty($detailamenagement) || empty($etatelement) || empty($id_amenagement) || empty($id_amenagementtour) || empty($responsable) || empty($periode) || empty($commentaire)) {
            header("Location: ../amenagementtouristique.php?message=Veuillez saisir des donnees dans tous les champs!");
            exit();
        // echo "Please fill in all fields.";
    } else {
        try {
            // Prepare the SQL query using named placeholders
            $query = "INSERT INTO amenagement_touristique (detailamenagement, etatelement, id_amenagement, id_amenagementtour,responsable,periode,commentaire)
                     VALUES (:detailamenagement, :etatelement, :id_amenagement, :id_amenagementtour,:responsable,:periode,:commentaire)";
            
            $stmt = $pdo->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the statement using an associative array
                $params = [
                    ':detailamenagement' => $detailamenagement,
                    ':etatelement' => $etatelement,
                    ':id_amenagement' => $id_amenagement,
                    ':id_amenagementtour' => $id_amenagementtour,
                    ':responsable' => $responsable,
                    ':periode' => $periode,
                    ':commentaire' => $commentaire
                    
                ];

                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../amenagementtouristique.php?message=Les mises a jour faites avec success!");
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



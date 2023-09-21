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
    if (empty($detailamenagement) || empty($etatelement) || empty($id_amenagement) || empty($id_piste) || empty($longueur) || empty($accessibilite)|| empty($dateouverture)) {
            header("Location: ../pistes.php?message=Veuillez saisir des donnees dans tous les champs!");
            exit();
        // echo "Please fill in all fields.";
    } else {
        try {
            // Prepare the SQL query using named placeholders
            $query = "INSERT INTO pistes (detailamenagement, etatelement, id_amenagement, id_piste, longueur,accessibilite,dateouverture)
                     VALUES (:detailamenagement, :etatelement, :id_amenagement, :id_piste, :longueur,:accessibilite,:dateouverture)";
            
            $stmt = $pdo->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the statement using an associative array
                $params = [
                    ':detailamenagement' => $detailamenagement,
                    ':etatelement' => $etatelement,
                    ':id_amenagement' => $id_amenagement,
                    ':id_piste' => $id_piste,
                    ':longueur' =>$longueur,
                    ':accessibilite' => $accessibilite,
                    ':dateouverture' => $dateouverture
                    
                ];

                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../pistes.php?message=Data inserted successfully!");
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



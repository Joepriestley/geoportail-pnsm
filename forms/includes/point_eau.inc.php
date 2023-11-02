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

    $id_point_eau = validate($_POST['id_point_eau']);
    $profondeur = validate($_POST['profondeur']);
    $nature = validate($_POST['nature']);
    $cout_creation = validate($_POST['cout_creation']);
    $localisation = validate($_POST['localisation']);
    $importance = validate($_POST['importance']);
    $date_creation = validate($_POST['date_creation']);
    
    

    // Perform server-side validation
    if (empty($id_point_eau) || empty($profondeur) || empty($nature) || empty($cout_creation) ||  empty($localisation)|| empty($importance)) {
            header("Location: ../point_eau.php?message=Veuillez saisir des donnees dans tous les champs!");
            exit();
        // echo "Please fill in all fields.";
    } else {
        try {
            // Prepare the SQL query using named placeholders
            $query = "INSERT INTO point_eau (id_point_eau, profondeur, nature, cout_creation,localisation,importance,date_creation)
                     VALUES (:id_point_eau, :profondeur, :nature, :cout_creation,:localisation,:importance,:date_creation)";
            
            $stmt = $pdo->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the statement using an associative array
                $params = [
                    ':id_point_eau' => $id_point_eau,
                    ':profondeur' => $profondeur,
                    ':nature' => $nature,
                    ':cout_creation' => $cout_creation,
                    ':localisation' => $localisation,
                    ':importance' => $importance,
                    ':date_creation' => $date_creation
                    
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



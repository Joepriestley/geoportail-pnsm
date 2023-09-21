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

    $codeamenagement = validate($_POST['codeamenagement']);
    $coutamenagement = validate($_POST['coutamenagement']);
    $commentaire = validate($_POST['commentaire']);
    

    // Perform server-side validation
    if (empty($codeamenagement) || empty($coutamenagement) || empty($commentaire)) {
        echo "Please fill in all fields.";
    } else {
        try {
            // Prepare the SQL query using named placeholders
            $query = "INSERT INTO amenagement (codeamenagement, coutamenagement, commentaire)
                     VALUES (:codeamenagement, :coutamenagement, :commentaire)";
            
            $stmt = $pdo->prepare($query);

            if ($stmt) {
                // Bind parameters and execute the statement using an associative array
                $params = [
                    ':codeamenagement' => $codeamenagement,
                    ':coutamenagement' => $coutamenagement,
                    ':commentaire' => $commentaire
                ];

                $result = $stmt->execute($params);

                if ($result) {
                    header("Location: ../amenagement.php?message=Data inserted successfully!");
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



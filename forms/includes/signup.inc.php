<?php
// Include your database connection code here if needed

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Server-side data validation
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Retrieve form data and validate it
    $nom = validate($_POST['nom']);
    $prenom = validate($_POST['prenom']);
    $mot_de_passe = validate($_POST['mot_de_passe']);
    $mot_de_passe_repete = validate($_POST['mot_de_passe_repete']);
    $email = validate($_POST['email']);
    $role = validate($_POST['role']);

    // Perform additional validation if needed (e.g., check if email is unique)





    

    // Insert the data into the database (adapt this part to your database structure)
    try {
        $query = "INSERT INTO users (nom, prenom, mot_de_passe, email, role) VALUES (:nom, :prenom, :mot_de_passe, :email, :role)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
        $stmt->bindParam(':mot_de_passe_repete', $mot_de_passe_repete, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        $result = $stmt->execute();

        if ($result) {
            // Redirect to a success page or perform other actions
            header("Location: success.php");
            exit();
        } else {
            // Handle the case where the insertion failed
            echo "Error: Failed to insert data into the database.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php
$pdo = require_once '../includes/dbConnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_point_eau'])){
    $nompointeau = $_POST['nompointeau'];
    
    try {
        $query = "DELETE FROM point_eau WHERE nompointeau =:nompointeau;";
        $stmt = $pdo->prepare($query);

        if ($stmt){
            //binding parameters including id of the record to delete 
            $params = [':nompointeau'=>$nompointeau];
            $result = $stmt->execute($params);

            if ($result){
                header("Location: ../point_eau.php?message=Record deleted successfully!");
                exit();
            }else{
                echo "Error: " .$stmt->errorInfo()[2];
               
            }
        }else{
            echo "Error preparing statement.";
        }
       
    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
        //throw $th;
    }
}
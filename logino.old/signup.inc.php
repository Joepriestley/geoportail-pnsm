<?php
// if user signs up legitametly
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $username= $_POST["username"];
    $pwd= $_POST["pwd"];
    $email= $_POST["email"];

    try {

        require_once 'db.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

         //error handlers :to make sure things are running correctly 
         $errors= [];

         if (is_input_empty($username,$pwd,$email)){
            $errors["empty_input"] = "Fill in all fields!";
            
         }
         if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";

         }
         if (is_username_taken( $pdo, $username)){
            $errors["username_taken"] = "Username already taken ,you might want to have choose a different one !";

         }
         if (is_email_registered($pdo,$email)){
            $errors["email_used"] = "Email is already used!";

         }

         //starting a session
         require_once 'config_session.inc.php';

         if ( $errors){
            $_SESSION["errors_signup"]= $errors;

            // $signupData =[

            //     "username"=>$username,
            //     "email"=>$email
            // ];
            // $_SESSION["signup_data"] = $signupData;

            header("Location:../index-signup.php");
            die();

         }

         create_user( $pdo, $pwd, $username, $email);
         header("Location:../index-signup.php?signup=success");

         $pdo = null;
         $stmt = null;
         die();




    } catch (PDOException) {
        die("Query failed :" . $e->getMessage());
    }

}else{
    header("Location:../index-signup.php");
    die();
}



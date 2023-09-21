<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">  
<h3>Login</h3>

    <form class="" action="inludes/login.inc.php" method="post">
        <div class="form"><input type="text" name="username" placeholder="Username"></div>
        <div class="form"><input type="password" name="pwd" placeholder="Password"></div>
        <button>Login</button>
    </form>
</div>
<div class="container">
<h3>Signup</h3>

    
    <form class="" action="inludes/signup.inc.php" method="post">
        <div class="form-group"><input type="text" name="username" placeholder="Username"></div>
        <div class="form-group"><input type="password" name="pwd" placeholder="Password"></div>
        <div class="form-group"><input type="text" name="email" placeholder="E-Mail"></div>
        <button>Signup</button>
    </form>
</div>
<?php 
check_signup_errors();

?>
<script src="../fontawesome-free-6.4.0-web/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>
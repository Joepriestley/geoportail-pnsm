<?php
declare(strict_types=1);


//checking if each of the ff is entered: username,password, email
function is_input_empty(string $username,string $pwd,string $email){
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }

}
//checking if email entered is valid
function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }

}

//checkingg if username entered is already taken 
function is_username_taken(object $pdo,string $username)
{
    if( get_username($pdo,  $username )){
        return true;
    }
    else{
        return false;
    }

}
//checkingg if username entered is already taken 
function is_email_registered(object $pdo,string $email)
{
    if(get_email($pdo, $email )){
        return true;
    }
    else{
        return false;
    }

}
//checkingg if username entered is already taken 
function create_user(object $pdo, string $pwd, string $username ,string $email)
{
   set_user($pdo, $pwd, $username,  $email);

}
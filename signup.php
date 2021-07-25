<?php
require 'partials/_dbconnect.php';
$name = $_POST["name"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$current_page = $_POST['current_page'];

$query = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`)
VALUES ('".$name."', '".$email."', '".$password."');";
$isInserted = mysqli_query($connection,$query);

if (strpos($current_page, '?') !== false) {
    $current_page = $current_page.'&registered=';
}else{
    $current_page = $current_page.'?registered='; 
}


if($isInserted){    
    header('location:'.$current_page.'true');
    exit;   
}else{
    header('location:'.$current_page.'false&error='.mysqli_error($connection));
    exit;   
}
?>
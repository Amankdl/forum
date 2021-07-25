<?php
require 'partials/_dbconnect.php';
$email = $_POST["email"];
$password = $_POST["password"];
$current_page = $_POST['current_page'];

$query = "SELECT user_email, user_pass FROM users WHERE user_email = '".$email."'";
$record = mysqli_query($connection,$query);

if (strpos($current_page, '?') !== false) {
    $current_page = $current_page.'&login=';
}else{
    $current_page = $current_page.'?login='; 
}

echo mysqli_num_rows($record);
if(mysqli_num_rows($record) == 1 ){   
    $row = mysqli_fetch_assoc($record);
    if(password_verify($password, $row['user_pass'])){
        header('location:'.$current_page.'true');
        exit();   
    }else{
        var_dump($row);        
    }
}else{
    header('location:'.$current_page.'false&error='.mysqli_error($connection));
    exit;   
}
?>

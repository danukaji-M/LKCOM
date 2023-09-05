<?php 

session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];



if(empty($email)){
    echo("Enter your Email");
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo("Enter Valid Email");
}else if(strlen($email) > 100){
    echo ("Email is too long.");
} else if (empty($password)){
    echo ("Enter Your Password");
} else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])[A-Za-z\d@#$%^&+=!]+$/", $password)){
    echo ("Enter Valid Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Incorrect password.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'");
    $nmrow = $rs->num_rows;

    if($nmrow == 1){
        echo("success");
        $data = $rs->fetch_assoc();
        $_SESSION["ud"] = $data;

        if($rememberme == 'true'){
            setcookie("email",$email,time()+(60*60*34*180));
            setcookie("password",$password,time()+(60*60*34*180));
        }else{
            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }
    }else{
        echo("Invalid Email Or password");
    }


}

?>
<?php 

require "connection.php";

$np = $_POST["np"];
$rnp = $_POST["rnp"];
$vc = $_POST["vc"];
$e = $_POST["e"];

if(empty($e)){
    echo("Enter Your Email");
}else if(strlen($e)>100){
    echo ("Enter valid email");
}else if(!filter_var($e,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid E-mail Address!");
}elseif(empty($np)){
    echo("Please Enter New Password.");
}elseif(empty($rnp)){
    echo ("Please Retype Your Password");
}elseif($np != $rnp){
    echo ("Password Must Be matched");
}elseif(empty($vc)){
    echo"Verification Code is required.";
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$e."'
    AND `recover_code`='".$vc."'");
    $nr = $rs->num_rows;
    if($nr>0){
        Database::iud("UPDATE `user` SET `password`='".$np."' WHERE 
        `email`='".$e."' AND `recover_code`='".$vc."'");
        echo("success");
    }else{
        echo("Invalid credentials");
    }
}

?>
<?php 
session_start();
require "connection.php";

if(isset($_SESSION["ud"])){
    $email = $_SESSION["ud"]["email"]; 

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

    if(isset($_FILES["img"])){
        $img = $_FILES["img"];
        $file_type= $img["type"];
        
        if(in_array($file_type ,$allowed_image_extentions)){

            $new_file_type;
            if($file_type=="image/jpg"){
                $new_file_type=".jpg";
            }else if($file_type=="image/jpeg"){
                $new_file_type=".jpg";
            }else if($file_type == "image/png"){
                $new_file_type=".png";
            }else if($file_type=="image/svg+xml"){
                $new_file_type=".svg";
            }
            $file_name = "resources//userprofile//".$email."_".uniqid()."_".$new_file_type ;
            move_uploaded_file($img["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='".$email."'");
            $image_row = $image_rs->num_rows;
            
            if($image_row == 0){
                Database::iud("INSERT INTO `profile_img`(`user_email` , `img_path`) VALUES ('".$email."' , '".$file_name."')");
                echo("success");
            }else{
                Database::iud("UPDATE `profile_img` SET `img_path`='".$file_name."' WHERE 
                            `user_email` = '" . $email . "'");
            }
        }else{
            echo ("File type does not allowed to upload");
        }
    }else{
        echo("not_support");
    }
}

?>
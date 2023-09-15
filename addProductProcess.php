<?php 
session_start();
require "connection.php";
$email = $_SESSION["ud"]["email"];

$title = $_POST["t"];
$desc = $_POST["d"];
$price = $_POST["price"];
$dc = $_POST["dc"];
$doc = $_POST["doc"];
$subcategory = $_POST["scat"];
$brand = $_POST["b"];
$qty = $_POST["qty"];
$color = $_POST["c"];
$feature = $_POST["f"];
$payment = $_POST["p"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$status = 1;

Database::iud("INSERT INTO `product`(`title`, `discription`, `price`, `delevery_colombo`, `delevery_other`, `sub_category_sub_cat_id`, `brand_id`, `product_status_id`, `product_added_date`, `product_specs`, `user_email`) 
VALUES ('".$title."', '".$desc."', '".$price."', '".$dc."', '".$doc."', '".$subcategory."'
, '".$brand."', '".$status."', '".$date."', '".$feature."', '".$email."')");


$product_id = Database::$connection->insert_id;
$length = sizeof($_FILES);
Database::iud("INSERT INTO `click_products`(`click_count` , `product_id`) VALUES ('1' , '".$product_id."')");
if($length <= 3 && $length > 0){
    $allowed_image_extentions = array("image/jpg," , "image/jpeg", "image/png", "image/svg++xml");
    for ($x=0;$x<$length;$x++){
        if(isset($_FILES["img".$x])){
            $img_file = $_FILES["img".$x];
            $file_extention = $img_file["type"];
            if(in_array($file_extention, $allowed_image_extentions)){
                $new_img_extention;

                if ($file_extention == "image/jpg") {
                    $new_img_extention = ".jpg";
                } else if ($file_extention == "image/jpeg") {
                    $new_img_extention = ".jpeg";
                } else if ($file_extention == "image/png") {
                    $new_img_extention = ".png";
                } else if ($file_extention == "image/svg+xml") {
                    $new_img_extention = ".svg";
                }

                $file_name = "resources//product//" .$title."_".$x."_".uniqid().$new_img_extention;
                move_uploaded_file($img_file['tmp_name'], $file_name );
                
                Database::search("INSERT INTO `product_img`(`img_path` , `product_id`) VALUES ('".$file_name."' , '".$product_id."')");
                echo("success");
            }else{
                echo ("Not an allowed image type");
            }

        }
    }
}else{
    echo("Invalid Image Count");
}
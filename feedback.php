<?php
session_start();
require "connection.php";

$star = $_POST["star"];
$text = $_POST["text"];
$id = $_POST["buy_id"];
if (isset($_FILES["img"])) {
    $img_file = $_FILES["img"];
    $file_extention = $img_file["type"];
    if (in_array($file_extention, $allowed_image_extentions)) {
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

        $file_name = "resources//feedback//" . $_SESSION["ud"]["email"] . $_SESSION["ud"]["fname"] . "_" . uniqid() . $new_img_extention;
        move_uploaded_file($img_file['tmp_name'], $file_name);
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
        $product_rs = Database::search("SELECT * FROM `porduct` 
                                        INNER JOIN `buyitems` ON buyitems.product_id = product.id WHERE `buyitem_id`='" . $id . "'");
        $product_data = $product_data->fetch_assoc();
        Database::iud("INSERT INTO `review`(`review_comment`,`star_count`,`product_id`,`user_email`,`review_date`,`img`) 
        VALUES ('" . $text . "','" . $star . "','" . $product_data["id"] . "','" . $_SESSION["ud"]["email"] . "','".$date."','".$file_name."')");
        echo("success");
    }
}

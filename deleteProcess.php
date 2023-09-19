<?php 
require "connection.php";

$id = $_GET["id"];

$del_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$id."'");

if($del_rs->num_rows == 1){
    $pro_rs=Database::search("SELECT  * FROM `product_img` WHERE `product_id`='".$id."'");
    $product_num = $pro_rs->num_rows;
    for ($i=0; $i < $product_num; $i++) { 
        $product_data = $pro_rs->fetch_assoc();
        $prod_img_path = $product_data['img_path'];
        if(file_exists($prod_img_path)){
            if(unlink($prod_img_path)){
                Database::iud("DELETE FROM `product_img` WHERE `product_id` = '".$id."'");
            }
        }
    }
    Database::iud("DELETE FROM `discount` WHERE `product_id` = '".$id."'");
    Database::iud("DELETE FROM `click_products` WHERE `product_id` = '".$id."'");
    Database::iud("DELETE FROM `product` WHERE `id` = '".$id."'");
    echo("success");
    
}
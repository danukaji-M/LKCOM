<?php 
require "connection.php";

$id = $_GET['id'];

$status_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$id."'");
    if($status_rs->num_rows >0){
        $status_data = $status_rs->fetch_assoc();
        if($status_data['product_status_id'] == "1"){
            Database::iud("UPDATE `product` SET `product_status_id` = '2' WHERE `id` = '".$id."'");
        }else if($status_data['product_status_id'] == "2"){
            Database::iud("UPDATE `product` SET `product_status_id` = '1' WHERE `id` = '".$id."'");
        }
        echo("success");
    }
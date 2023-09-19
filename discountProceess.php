<?php 
require "connection.php";

$id = $_GET['id'];
$discount = $_GET['dis'];

$discount_rs = Database::search("SELECT * FROM `discount` WHERE `product_id`='".$id."'");
if($discount_rs->num_rows ==1){
    Database::iud("UPDATE `discount` SET `dis_presentage`='".$dis."'");
    echo ("success");
}else{
    Database::iud("INSERT INTO discount(product_id, dis_presentage) VALUES('".$id."','".$discount."')");
    echo("success");
}
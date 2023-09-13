<?php 
session_start();
require "connection.php";

$pro_id = $_GET["pid"];

$pro_rs= Database::search("SELECT * FROM `click_products` WHERE `product_id`='".$pro_id."' ");
$pro_data = $pro_rs->fetch_assoc();

$newcount = $pro_data["click_count"] + 1;

Database::iud("UPDATE `click_products` SET `click_count`='".$newcount."' WHERE `product_id`='".$pro_id."'");

setcookie("product".$pro_id ,$pro_id,time()+(60*60*24*7));
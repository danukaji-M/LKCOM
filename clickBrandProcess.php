<?php 
session_start();
require "connection.php";

$bran_id = $_GET["bid"];

$bran_rs= Database::search("SELECT * FROM `brand_click` WHERE `brand_brand_id`='".$bran_id."' ");
$bran_data = $bran_rs->fetch_assoc();

$newcount = $bran_data["brand_click_count"] + 1;

Database::iud("UPDATE `brand_click` SET `brand_click_count`='".$newcount."' WHERE `brand_brand_id`='".$bran_id."'");

setcookie("brand".$bran_id ,$bran_id,time()+(60*60*24*90));
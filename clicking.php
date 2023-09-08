<?php 

session_start();
require "connection.php";

$click_data = $_GET["click"];

$db_rs = Database::search("SELECT * FROM `click_products` WHERE `product_id`='".$click_data."'");
$data = $db_rs->fetch_assoc();
$newclco = $data["click_count"] + 1;

Database::iud("UPDATE `click_products` SET `click_count` = '".$newclco."' WHERE `product_id` = '".$click_data."'");

?>
<?php
session_start();
require "connection.php";

$cat_id = $_GET["cid"];


$cat_rs = Database::search("SELECT * FROM `cat_clicks` WHERE `product_category_cat_id` ='".$cat_id."' ");

$cat_data = $cat_rs->fetch_assoc();
$cat_count = $cat_data["cat_click_count"];

Database::iud("UPDATE `cat_clicks` SET `cat_click_count`='".($cat_count+1)."' WHERE `product_category_cat_id` ='".$cat_id."'");

setcookie("category".$cat_id,$cat_id,time()+(60*60*24*30));
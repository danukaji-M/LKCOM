<?php
session_start();
require "connection.php";
$email = $_SESSION["ud"]["email"];
Database::iud("DELETE FROM `cart` WHERE `product_id` = '" . $_GET['pid'] . "' AND `user_email` = '" . $email . "'");
echo "success";

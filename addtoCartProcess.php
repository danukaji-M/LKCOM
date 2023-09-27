<?php
session_start();
require "connection.php";
$pid = $_GET['pid'];
$qty = $_GET["qty"];
$email = $_SESSION["ud"]["email"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");
$cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $email . "'");
$cart_num = $cart_rs->num_rows;
if ($cart_num > 0) {
    echo "Already Added Product";
} else {
    Database::iud("INSERT INTO `cart`(`cart_date`,`product_id`,`user_email`,`count`) VALUES ('" . $date . "' , '" . $pid . "' , '" . $email . "' , '" . $qty . "')");
    echo "success";
}

<?php
session_start();
require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$new_email = $_POST["email"];
$mobile = $_POST["mobile"];
$new_pw = $_POST["pw"];
$pline1 = $_POST["pl1"];
$pline2 = $_POST["pl2"];
$pcity = $_POST["pc"];
$ppostal = $_POST["ppc"];





$insertData = "INSERT INTO `address`(`line_1`, `line_2`, `postal_code`, `city_city_id`, `user_email`)";
$typeAdd = "INSERT INTO `address_has_adress_type`(`address_adress_id` , `adress_type_type_id`) ";
if (isset($_SESSION["ud"])) {
    $email = $_SESSION["ud"]["email"];
    $address_rs = Database::search("SELECT * FROM `address` WHERE `user_email`='" . $email . "' ");
    if ($address_rs->num_rows == 0) {

        $dataadd = " VALUES ('" . $pline1 . "', '" . $pline2 . "', '" . $ppostal . "', '" . $pcity . "', '" . $email . "' )";
        Database::iud($insertData . $dataadd);
        $catch_rs = Database::search("SELECT `adress_id` FROM `address` WHERE `user_email` = '" . $email . "' AND `line_1` = '" . $pline1 . "' AND 
            `line_2` = '" . $pline2 . "'");
        $catch_data = $catch_rs->fetch_assoc();
        Database::iud($typeAdd . " VALUES ('" . $catch_data["adress_id"] . "' , '1')");
        echo ("success");
    } else if ($address_rs->num_rows > 0) {

        $aid = Database::search("SELECT `adress_id` FROM `address` INNER JOIN
            `address_has_adress_type` ON `address`.`adress_id` = `address_has_adress_type`.`address_adress_id` 
            WHERE `user_email`='" . $email . "' AND `adress_type_type_id`='1' ");
        $aid_data = $aid->fetch_assoc();
        Database::iud("UPDATE `address` SET `line_1`='" . $pline1 . "' , `line_2`='" . $pline2 . "' , `city_city_id`='" . $pcity . "' ,
            `postal_code`='" . $ppostal . "' WHERE `adress_id` = '" . $aid_data["adress_id"] . "'");

        echo ("success");
    }
}

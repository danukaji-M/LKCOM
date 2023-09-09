<?php



session_start();
require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$e = $_POST["e"];
$pw1 = $_POST["pw1"];
$pw2 = $_POST["pw2"];
$mob = $_POST["mob"];
$gen = $_POST["gen"];

$nrs = Database::search("SELECT * FROM `user` WHERE `mobile` = '".$mob."'");
$numrs = $nrs->num_rows;
if (empty($fname)) {
    echo ("Enter First Name");
} else if (strlen($fname) > 45) {
    echo ("Enter Valid First Name, Must name must be undre 45 character");
} else if (empty($lname)) {
    echo ("Enter Last Name");
} else if (strlen($lname) > 45) {
    echo ("Enter Valid last Name, Name must be undre 45 character");
} else if (empty($e)) {
    echo ("Enter Email Address");
} else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo ("Enter valid Email Address");
} else if (strlen($e) > 100) {
    echo ("Email Must Be Under 100 Character");
} else if ($pw1 != $pw2) {
    echo ("Enter Same password");
} else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])[A-Za-z\d@#$%^&+=!]+$/", $pw1)) {
    echo ("Password Mus have capital letter , simple letter , number and special Symbol");
} else if (strlen($pw1) < 8 || strlen($pw1) > 20) {
    echo ("Password must longer than 8 character and Lower Than 20 character");
} else if (empty($mob)) {
    echo ("enter Your Mobile Number");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8,][0-9]/", $mob)) {
    echo ("enter Valid Mobile number");
}else if($numrs == 1){
    echo ("Already Create account with this number use another one.");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "'");
    $nr = $rs->num_rows;

    if ($nr > 0) {

        echo ("Already Registerd email");
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
        
Database::iud("INSERT INTO `user`(`email` , `mobile` , `fname` , `lname` , `password` , `gender_gen_id` ,  `status` , `joined_date`) VALUES 
('" . $e . "' , '" . $mob . "' , '" . $fname . "' , '" . $lname . "' , '" . $pw1 . "' , '" . ($gen+1) . "' ,'1' , '" . $date . "' )");
Database::iud("INSERT INTO `user_has_user_type`(`user_email` ,  `user_type_type_id`) VALUES ('1' , '".$e."')");
        echo("Success");
    }
}

<?php
session_start();
require "connection.php";

if (isset($_SESSION["ud"])) {
    $user_email = $_SESSION['ud']['email'];
    $pid = $_POST["id"];
    $singleqty = $_POST['qty'];
    $cart_rs = Database::search("SELECT * FROM `cart` WHERE product_id = '".$pid."' AND user_email='".$user_email."'");
    $cart_data = $cart_rs->fetch_assoc();
    $cartstatus = 0;
    $status = 0;
    if($singleqty == 1){
        $status = 1;
    }else if($singleqty >1){
        $status = 2;
    }

    $validate_rs = Database::search("SELECT * FROM `user` INNER JOIN `product` ON
    product.user_email = user.email WHERE `id` = '" . $pid . "'");
    $validate_data = $validate_rs->fetch_assoc();
    //if ($user_email != $validate_data["email"]) {
        $array;
        $order_id = uniqid();
        $price =0;

        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");
        $product_data = $product_rs->fetch_assoc();

        $adress_valid_rs = Database::search("SELECT * FROM `address` INNER JOIN city ON 
        city.city_id=`address`.`city_city_id` WHERE `user_email` = '" . $user_email . "'");
        $shipping_cost = 0;
        $adress_valid_num = $adress_valid_rs->num_rows;
        if ($adress_valid_num > 0) {
            $adress_valid_data = $adress_valid_rs->fetch_assoc();
            $address = $adress_valid_data["line_1"] . "," . $adress_valid_data["line_2"];
            $delevery = 0;
            if ($adress_valid_data["district_district_id"] == 15) {
                $delevery = $product_data["delevery_colombo"];
            } else {
                $delevery = $product_data["delevery_other"];
            }
            $discount_rs = Database::search("SELECT * FROM `discount` WHERE `product_id` ='".$pid."'");
            if(!empty($discount_rs) && $status ==1){
                $discount_data = $discount_rs->fetch_assoc();
                $newprice = 0;
                $price = ($product_data["price"]-($product_data["price"]*($discount_data["dis_presentage"]/100)))*$qty;

            }elseif(empty($discount_rs) && $status == 1){
                $price = $product_data["price"]*$qty;
            }elseif (!empty($discount_rs) && $status ==2) {
                $discount_data = $discount_rs->fetch_assoc();
                $newprice = 0;
                $price = ($product_data["price"]-($product_data["price"]*($discount_data["dis_presentage"]/100)))*$singleqty;
            }elseif (empty($discount_rs) && $status == 2 ) {
                $price = $product_data["price"]*$singleqty;
            }
            $item = $product_data["title"];
            $amount =$price +  $delevery ;
            $fname = $_SESSION["ud"]["fname"];
            $lname = $_SESSION["ud"]["lname"];
            $mobile = $_SESSION["ud"]["mobile"];
            $uaddress = $address;
            $city = $adress_valid_data["city_name"];

            $merchant_id = "1223947";
            $merchant_secret = "MTcyMTQ4MTg4ODg2MTQ1MjEwMzYwNTA2ODAzMDEwMDAyMzQxNTc=";
            $currency = "LKR";
            $hash = strtoupper(
                md5(
                    $merchant_id .
                        $order_id .
                        number_format($amount, 2, '.', '') .
                        $currency .
                        strtoupper(md5($merchant_secret))
                )
            );

            $array["id"] = $order_id;
            $array["item"] = $item;
            $array["amount"] = $amount;
            $array["fname"] = $fname;
            $array["lname"] = $lname;
            $array["mobile"] = $mobile;
            $array["address"] = $uaddress;
            $array["umail"] = $user_email;
            $array["city"] = $city;
            $array["hash"] = $hash;

            echo json_encode($array);
        }else{
            echo "Address Error";
        }
    } else {
        echo "You cant buy your product";
    }
//}

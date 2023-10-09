<?php
session_start();
require "connection.php";
$encryptionKey = "Aventura-Best-Encryption-with-danu-189073#$@!#342541234your-secret-key"; 
$encryptedEmailForWebpage2 = $_GET['seledetails'];
$decryptedEmail = decryptData($encryptedEmailForWebpage2, $encryptionKey);
function decryptData($data, $key)
{
    $data = base64_decode($data);
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $ivlen);
    $data = substr($data, $ivlen);
    $decryptedData = openssl_decrypt($data, $cipher, $key, 0, $iv);
    return $decryptedData;
}
$seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$decryptedEmail."'");
$seller_data = $seller_rs->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELLER || <?php echo $seller_data['fname'] ." ". $seller_data['lname'] ?></title>
</head>
<body>
    <div class="container-flud">
        <div class="row">
            <div class="col-12">
                <?php require "header.php"; ?>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-9">
                                <!-- User profile -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">User profile</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="profile__avatar">
                                            <?php
                                            $img_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='".$decryptedEmail."'");
                                            $image_data = $img_rs->fetch_assoc();
                                            ?>
                                            <img src="
                                            <?php 
                                            echo $image_data['img_path'];
                                            ?>
                                            ">
                                        </div>
                                        <div class="profile__header">
                                            <h4><?php echo $seller_data['fname']." ". $seller_data['lname'] ?></small></h4>
                                            <p class="text-muted">
                                                <br>
                                            </p>
                                            <p>
                                                <a href="#">cartlanka.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- User info -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">User info</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table profile__table">
                                            <tbody>
                                                <tr>
                                                    <th><strong>Location</strong></th>
                                                    <td><?php 
                                                    $add_rs = Database::search("SELECT * FROM `address` INNER JOIN `city` ON 
                                                    city.city_id = address.city_city_id  WHERE `user_email`='".$decryptedEmail."'");
                                                    $address_data = $add_rs->fetch_assoc();
                                                    echo $address_data['city_name'];
                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Company name</strong></th>
                                                    <td>Cartlanka.com</td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Position</strong></th>
                                                    <td>Cartlanka Seller</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Community -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Community</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table profile__table">
                                            <tbody>
                                                <tr>
                                                    <th><strong>Reviews</strong></th>
                                                    <td><?php 
                                                    echo Database::search("SELECT * FROM `review` WHERE `user_email`='".$decryptedEmail."'")->num_rows;
                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Member since</strong></th>
                                                    <td><?php echo $seller_data['joined_date'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Contact user -->
                                <p>
                                    <a href="#" class="profile__contact-btn btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#profile__contact-form">
                                        Contact user
                                    </a>
                                </p>
                                <hr class="profile__contact-hr">
                                <!-- Contact info -->
                                <div class="profile__contact-info">
                                    <div class="profile__contact-info-item">
                                        <div class="profile__contact-info-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="profile__contact-info-body">
                                            <h5 class="profile__contact-info-heading">Work address</h5>
                                            <?php echo $address_data['line_1']."<br/>".$address_data['line_2']."<br/>".$address_data['city_name']."<br/>"  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
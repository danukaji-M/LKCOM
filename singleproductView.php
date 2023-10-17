<?php
session_start();
require "connection.php";
$usermail = Database::search("SELECT * FROM `product` INNER JOIN `user`ON product.user_email = user.email 
WHERE `id` = '" . $_GET["pid"] . "'");
$usermail_data = $usermail->fetch_assoc();
$pid = $_GET["pid"];
$product_rs = Database::search("SELECT * FROM `product` 
                                INNER JOIN `product_img` ON `product`.`id`=`product_img`.`product_id` 
                                INNER JOIN `sub_category` ON `sub_category`.`sub_cat_id` = `product`.`sub_category_sub_cat_id` 
                                INNER JOIN `product_category` ON `product_category`.`cat_id` = `sub_category`.`product_category_id` 
                                INNER JOIN `user` ON `product`.`user_email` = `user`.`email` 
                                INNER JOIN `brand` ON brand.brand_id = product.brand_brand_id
                                WHERE `product`.`id` = '" . $pid . "'");
$product_data = $product_rs->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product || Brand</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?Php
            require "header.php";
            require "search.php";
            ?>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 d-none d-lg-block ">
                        <button class="btn btn-outline-info mt-3 mb-3 border-4 text-dark fw-bolder ">&lt;&lt;</button>
                        <span class="fw-bolder"><a class=" link-primary  text-decoration-none " href="home.php">back to home page </a>||</span>
                        <span class="">Listed In category:</span>
                        <span class="fw-bold"><a class="text-decoration-none" href="#"><?php echo $product_data['cat_name']; ?></a> &gt;</span>
                        <span class="fw-bold"><a class="text-decoration-none" href="#"><?php echo $product_data['sub_cat_name']; ?></a> &gt;</span>
                        <span class="fw-bold"><a class="text-decoration-none" href="#"><?php echo $product_data['brand_name']; ?></a></span>
                        <span class=" fw-bolder mx-5 ">
                            <a class="text-decoration-none text-warning m-2" href="#">Share</a>|
                            <a class="text-decoration-none text-warning m-2" href="#">ADD to Watch List</a>
                        </span>
                    </div>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-3 col-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $pid . "'");
                                $image_num = $image_rs->num_rows;
                                for ($i = 0; $i < $image_num; $i++) {
                                    $image_data = $image_rs->fetch_assoc();
                                ?>
                                    <div class="row">
                                        <diiv class="col-12  border-start border-end border-top border-bottom ">
                                            <img src="<?php echo $image_data['img_path']; ?>" alt="" class="img-fluid m-2" onclick="<?php echo $i ?>">
                                        </diiv>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-lg-3 border-3 border-info border-start border-end border-top border-bottom ">
                        <img src="<?php echo $image_data['img_path']; ?>" alt="" class="img-fluid mt-2 " srcset="">
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class=" text-capitalize fw-bold"><?php echo $product_data["title"] ?></h2>
                                <span class="text-muted fw-medium "><?php
                                                                    $rcountdata = Database::search("SELECT * FROM `review_count` WHERE `product_id` = '" . $pid . "'")->fetch_assoc();
                                                                    if (!empty($rcountdata['review_count'])) {
                                                                        echo $rcountdata['review_count'];
                                                                    } else {
                                                                        echo "0";
                                                                    }
                                                                    ?> Reviews &nbsp;&nbsp;&nbsp; <?php
                                                                                                    $scountdata = Database::search("SELECT * FROM `buyitems` WHERE `product_id` = '" . $pid . "'")->fetch_assoc();
                                                                                                    if (!empty($scountdata['count'])) {
                                                                                                        echo $scountdata['count'];
                                                                                                    } else {
                                                                                                        echo "0";
                                                                                                    }
                                                                                                    ?> SOLD</span>
                                &nbsp;&nbsp;&nbsp;
                                <span class="text-muted fw-medium ">Quantity<span id="qtysingle"></span><?php echo $product_data["qty"] ?></span> </span>
                                <hr>
                                <?php
                                $discount = Database::search("SELECT * FROM `product` INNER JOIN 
                                `discount` ON `discount`.`product_id` = `product`.`id` WHERE `id`='" . $pid . "'");
                                $discount_num = $discount->num_rows;
                                if ($discount_num == 0) {
                                ?>
                                    <span class="fw-bold fs-3">LKR. <?php echo $product_data["price"] ?></span>
                                <?php
                                } else {
                                    $discount_data = $discount->fetch_assoc();
                                    $op = $product_data["price"];
                                    $precentage = $discount_data['dis_presentage'];
                                    $np = ($op - $op * ($precentage / 100));
                                ?>
                                    <span class="fw-bold fs-3">LKR. <?php echo $np ?></span>
                                    <span class="fw-bold fs-6 text-decoration-line-through ">LKR.<?php echo $product_data["price"] ?></span>
                                    <span class="text-mute text-secondary"><?php echo $precentage ?>% off</span>
                                <?php
                                }
                                ?>
                                <br>
                                <label class=" text-danger" for="qty">Quantity</label>
                                <input type="number" name="" class="myinput form-control" value="1" id="qtysingle1">
                                <hr>
                                <span class="fw-bold fs-3">Shipping</span>
                                <p class="h5">
                                    <?php
                                    if (isset($_SESSION["ud"])) {
                                        $user_rs = Database::search("SELECT * FROM `address`
                                        INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN 
                                        district ON district.district_id =city.district_district_id 
                                        WHERE address.user_email ='" . $_SESSION['ud']['email'] . "'");
                                        $user_data = $user_rs->fetch_assoc();
                                        if ($user_data["district_id"] == 15) {
                                            echo $product_data["delevery_colombo"] . "(" . $user_data["district_name"] . ")";
                                        } else {
                                            echo $product_data["delevery_other"] . "&nbsp;<span class='fw-bold text-info'> (" . $user_data["district_name"] . ")</span>";
                                        }
                                    }

                                    ?>
                                </p>
                                <p><span class="text-mute text-secondary">Delevery By</span>
                                    <?php
                                    $d = new DateTime();
                                    $tz = new DateTimeZone("Asia/Colombo");
                                    $d->setTimezone($tz);
                                    $d->modify("+5 days");
                                    $date = $d->format("m-d");
                                    ?>
                                    <span class="fw-bolder"><?php echo $date ?></span>
                                </p>
                                <button type="submit" onclick="buyNow(<?php echo $product_data['id']; ?>);" class="btn btn-danger mybtn">BUY NOW</button>
                                <button onclick="addtocart(<?php echo $pid ?>);" class="btn btn-warning mybtn1 fw-bold">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data['user_email'] . "'");
                    $seller_data = $seller_rs->fetch_assoc();
                    ?>
                    <div class="d-none card d-lg-block col-3">
                        <span class="fs-5 fw-bold text-danger">Seller</span>
                        <span class=" text-secondary text-muted fs-6"><?php echo $seller_data["fname"] . "&nbsp;" . $seller_data['lname']; ?></span>
                        <hr>
                        <span>seller joined date <?php echo $seller_data["joined_date"] ?></span>
                        <br>

                        <?php
                        // Encryption key (keep this secret and secure)
                        $encryptionKey = "Aventura-Best-Encryption-with-danu-189073#$@!#342541234"; // Change this to a strong, random key

                        // Data to be encrypted
                        $email = $seller_data["email"];

                        // Encrypt the data
                        $encryptedEmail = encryptData($email, $encryptionKey);

                        // Decrypt the data
                        $decryptedEmail = decryptData($encryptedEmail, $encryptionKey);



                        // Function to encrypt data
                        function encryptData($data, $key)
                        {
                            $cipher = "aes-256-cbc";
                            $ivlen = openssl_cipher_iv_length($cipher);
                            $iv = openssl_random_pseudo_bytes($ivlen);
                            $encryptedData = openssl_encrypt($data, $cipher, $key, 0, $iv);
                            return base64_encode($iv . $encryptedData);
                        }

                        // Function to decrypt data
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
                        ?>

                        <a href="<?php echo "customerSeeSeller.php?seledetails=".$encryptedEmail ?>">Seller's Profile</a>

                        <br>
                        <a href="">Visit Store</a>
                        <br>
                        <a href="">See other items</a>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h4 class="fw-bold"> Description </h4>
                        <span class="text-muted fw-bold"><?php echo $product_data["discription"] ?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h4 class="fw-bold"> Reviews </h4>
                        <?php
                        $review_rs = Database::search("SELECT * FROM `review` WHERE `product_id`='" . $product_data["id"] . "'");
                        $review_num = $review_rs->num_rows;
                        for ($j = 0; $j < $review_num; $j++) {
                            $review_data = $review_rs->fetch_assoc();
                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $review_data['user_email'] . "'");
                            $user_data = $user_rs->fetch_assoc();
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <span class="text-muted"> <span class=" fw-bolder">Customer:</span><?php echo $user_data['fname'] . "&nbsp;" . $user_data['lname'] ?> </span>
                                    <br>
                                    <span class="text-muted"> <span class=" fw-bolder">Review Date:</span><?php echo $review_data['review_date']; ?> </span>
                                    <?php
                                    $img_rs = Database::search("SELECT * FROM `review_img` WHERE `review_review_id` = '" . $review_data['review_id'] . "'");
                                    $image_num = $img_rs->num_rows;
                                    for ($k = 0; $k < $image_num; $k++) {
                                        $image_data = $img_rs->fetch_assoc();
                                    ?>
                                        <img src="<?php echo $image_data['r_img_path'] ?>" style="height: 5vh;" alt="">
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    ?>
                                    <p class=" text-warning fw-bolder">Star count: <?php echo $review_data['star_count']; ?>&star;</p>
                                    <p class="fw-bold "><?php echo $review_data["review_comment"]; ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h4 class="fw-bold text-capitalize"> similar items </h4>
                    </div>
                </div>
            </div>
            <?Php require "footer.php"; ?>
        </div>
    </div>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
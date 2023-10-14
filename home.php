<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART LANKA.COM || Home</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body class="body ">
    <div class=" container-fluid">
        <div class="row">
            <?php
            session_start();
            require "connection.php";
            require "header.php";
            ?>
            <?php
            require "search.php";



            ?>
            <hr />
            <div class="col-12 d-none d-lg-block ">
                <div class="row">
                    <div id="saved-items" class="col-1 text-warning cursor border-bottom text-center">
                        <span class="fw-bold mb-3">Saved Items <i class="bi bi-heart-fill"></i></span>
                    </div>
                    <div id="item-2" class="col-1 text-warning cursor border-bottom text-center">
                        <span class="fw-bold mb-3">Latest</span>
                    </div>

                    <?php
                    $rs_cat = Database::search("SELECT * FROM `product_category`  ");
                    $num = 9;
                    for ($x = 1; $x < $num; $x++) {
                        $cat_data = $rs_cat->fetch_assoc();
                    ?>
                        <div id="<?php echo ("myDiv" . $x) ?>" data-value="1" onmouseover="divview(<?php echo $X ?>);" onmouseout="onmouseout(<?php echo $x ?>);" class=" col-1  border-bottom text-center" data-bs-toggle="dropdown">
                            <span class="fw-bold mb-3"><?php echo $cat_data["cat_name"] ?></span>
                        </div>
                        <div class="dropdown-menu modal" id="<?php echo 'myModal' . $x ?>">
                            <div class="row">
                                <div class=" text-dark text-decoration-none col-5 offset-1">
                                    <span class="h4 signupstart">Shop Now</span>
                                    <br>
                                    <br>
                                    <?php
                                    $sub_cat_rs = Database::search("SELECT * FROM `sub_category` WHERE `product_category_id` = '" . $cat_data['cat_id'] . "'");
                                    $sub_cat_num = $sub_cat_rs->num_rows;
                                    for ($i = 0; $i < $sub_cat_num; $i++) {
                                        $sub_cat_data = $sub_cat_rs->fetch_assoc();
                                    ?>

                                        <li><a class="text-decoration-none mt-2 text-dark fw-bold" href="#"><?php echo $sub_cat_data['sub_cat_name'] ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!--img backend-->
                                <div class="col-6">
                                    <img src="resources/logo.png">
                                </div>
                                <!--img backend-->
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div id="item3" class="col-1 text-warning border-bottom cursor text-center">
                        <span class="fw-bold mb-3">Wouchers</span>
                    </div>
                    <div id="item4" class="col-1 text-warning border-bottom cursor text-center">
                        <span class="fw-bold mb-3">My Products</span>
                    </div>
                </div>
            </div>
        </div>
        <!--body-->
        <br>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mt-1 d-none d-lg-block col-lg-10 offset-lg-1">
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-inner h-100">
                                <div class="carousel-item active">
                                    <img src="resources/carousal-1.png" class=" myimg d-block h-50 w-100" alt="">
                                    <div class="carousel-caption ">
                                        <h1 class=" text-dark fw-bold" style="margin-top: -200px;"> WELCOME TO CARTLANKA.COM</h1>
                                        <p class="text-info h5 font-monospace" style="margin-top: 1;">Sri Lanka Largest E-commerce Platform</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/carousal-2.png" class=" myimg d-block w-100" alt="...">
                                    <div class=" d-none d-md-block text-center">
                                        <h1 class=" text-black fw-bold text-danger" style="margin-top: -400px;">25% Discount Shop Now Home Applience</h1>
                                        <p class="text-info h5 font-monospace" style="margin-top: 320px;">Sri Lanka Largest E-commerce Platform</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/carousal-3.jpeg" style="height: 1040px;" class=" myimg d-block w-100" alt="...">
                                    <div class="carousel-caption align-text-bottom">
                                        <h1 class="text-start  text-secondary " style="font-size: 50px; margin-top: -400px; margin-left: -100px; ">Go Home Shop And Sell anything </h1>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 mb-3 align-items-center col-lg-8 offset-lg-2 ">
                <div class="">
                    <div class="row">
                        <div class="col-6 text-start">
                            <h3 class=" fst-italic fw-bold"><span class="new-text text-danger fw-bold  ">This Week Top </span>
                                <span>Deals</span>
                                <span class=" text-muted h6 "><a href="#" class="text-muted text-decoration-none">click here to see more-></a> </span>
                            </h3>
                        </div>
                        <div class="col-6 text-end">
                            <span> <a href="#" class="text-decoration-none text-muted ">View More</a> </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center ">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <?php
                                $product_rs = Database::search("SELECT *
FROM `product`
INNER JOIN `click_products` ON `click_products`.`product_id` = `product`.`id`
INNER JOIN `sub_category` ON `sub_category`.`sub_cat_id`=`product`.`sub_category_sub_cat_id`
INNER JOIN `product_category` ON `product_category`.`cat_id` = `sub_category`.`product_category_id`
INNER JOIN `cat_clicks` ON `cat_clicks`.`product_category_cat_id` = `product_category`.`cat_id` 
INNER JOIN `brand` ON `brand`.`brand_id`=`product`.`brand_id` 
INNER JOIN `brand_click` ON `brand_click`.`brand_brand_id`=`brand`.`brand_id`
WHERE  `product_status_id`='1'
ORDER BY `click_count` DESC, `cat_click_count` DESC , `brand_click_count` DESC
LIMIT 4;
");

                                $product_num = $product_rs->num_rows;
                                for ($k = 0; $k < $product_num; $k++) {
                                    $product_data = $product_rs->fetch_assoc();
                                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data["id"] . "'");
                                    $image_data = $image_rs->fetch_assoc();
                                ?>
                                    <div class="col-3 col-lg-3 cursor card " onclick="productclick(<?php
                                                                                                    if (!isset($_COOKIE['product' . $product_data['id']])) {
                                                                                                        echo $product_data['id'];
                                                                                                    } else {
                                                                                                        echo 0;
                                                                                                    }
                                                                                                    ?>) , brandclick(
                                                                                                <?php
                                                                                                if (!isset($_COOKIE['brand' . $product_data['brand_id']])) {
                                                                                                    echo $product_data['brand_id'];
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }

                                                                                                ?>
                                                                                            )  , catogoryclick(<?php
                                                                                                                if (isset($_COOKIE['category' . $product_data['cat_id']])) {
                                                                                                                    echo (0);
                                                                                                                } else {
                                                                                                                    echo $product_data['cat_id'];
                                                                                                                }
                                                                                                                ?>) ,  singleload(<?php echo $product_data['id']; ?>);">
                                        <div class="card-body">
                                            <img class="img-fluid" src="<?php echo $image_data["img_path"]  ?>">
                                            <span class=" d-none d-lg-block signupstart fw-bold text-capitalize "><?php echo $product_data["title"] ?></span>
                                            <?php
                                            $discount = Database::search("SELECT * FROM `discount` WHERE `product_id` = '" . $product_data["id"] . "'");
                                            $discount_row = $discount->num_rows;
                                            $discount_data = $discount->fetch_assoc();
                                            if ($discount_row > 0) {

                                                $op2 = $product_data["price"];
                                                $dis2 = $discount_data["dis_presentage"];
                                                $np2 = ($op2 - (($op2 / 100) * $dis2));
                                                if ($op2 == $np2) {
                                            ?>

                                                <?php
                                                } else {
                                                ?>
                                                    <span class="text-dark font-monospace fw-bold "><span class="fw-bold ">LKR. </span><?php echo $np2 . "<span class='text-warning'>  DIS-" . $dis2 . " % </span>" ?></span>
                                                    <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op2 ?></h6>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <span class="text-dark font-monospace fw-bold "><span class="fw-bold  ">LKR.</span><?php echo $product_data["price"] ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 align-items-center col-lg-8 offset-lg-2 ">
                <div class="">
                    <div class="row">
                        <div class="col-6 text-start">
                            <h3 class=" fst-italic fw-bold"><span class="new-text text-danger fw-bold  ">This Week Top </span>
                                <span>Discount Deals</span>
                                <span class=" text-muted h6 "><a href="#" class="text-muted text-decoration-none">click here to see more-></a> </span>
                            </h3>
                        </div>
                        <div class="col-6 text-end">
                            <span> <a href="#" class="text-decoration-none text-muted ">View More</a> </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row  ">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <?php
                                $dis_rs = Database::search("SELECT * FROM `product` INNER JOIN `discount` ON `product`.`id`=`discount`.`product_id`
                                INNER JOIN `click_products` ON `click_products`.`product_id` = `product`.`id`
INNER JOIN `sub_category` ON `sub_category`.`sub_cat_id`=`product`.`sub_category_sub_cat_id`
INNER JOIN `product_category` ON `product_category`.`cat_id` = `sub_category`.`product_category_id`
INNER JOIN `cat_clicks` ON `cat_clicks`.`product_category_cat_id` = `product_category`.`cat_id` 
INNER JOIN `brand` ON `brand`.`brand_id`=`product`.`brand_id` 
INNER JOIN `brand_click` ON `brand_click`.`brand_brand_id`=`brand`.`brand_id`
                        WHERE  `product_status_id`='1' ORDER BY `dis_presentage` DESC , `product_added_date` ASC, `click_count` DESC, `cat_click_count` DESC , `brand_click_count` DESC LIMIT 4");
                                $dis_num_rows = $dis_rs->num_rows;
                                for ($y = 0; $y < $dis_num_rows; $y++) {
                                    $dis_data = $dis_rs->fetch_assoc();
                                    $image_rs1 = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $dis_data["id"] . "'");
                                    $image_data1 = $image_rs1->fetch_assoc();
                                ?>
                                    <div class="col-3 card cursor d-lg-block " onclick="productclick(<?php
                                                                                                        if (!isset($_COOKIE['product' . $product_data['id']])) {
                                                                                                            echo $dis_data['id'];
                                                                                                        } else {
                                                                                                            echo 0;
                                                                                                        }
                                                                                                        ?>) , brandclick(
                                                                                                <?php
                                                                                                if (!isset($_COOKIE['brand' . $product_data['brand_id']])) {
                                                                                                    echo $dis_data['brand_id'];
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }

                                                                                                ?>
                                                                                            )  , catogoryclick(<?php
                                                                                                                if (isset($_COOKIE['category' . $product_data['cat_id']])) {
                                                                                                                    echo (0);
                                                                                                                } else {
                                                                                                                    echo $dis_data['cat_id'];
                                                                                                                }
                                                                                                                ?>) , singleload(<?php echo $dis_data['id']; ?>);">

                                        <img src="<?php echo $image_data1["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                        <div class="card-body text-start align-items-center justify-content-center">
                                            <span class="text-primary fw-bold"><?php echo $dis_data["title"]; ?></span>
                                            <br>
                                            <?php
                                            $op = $dis_data["price"];
                                            $dis = $dis_data["dis_presentage"];
                                            $np = ($op - (($op / 100) * $dis));
                                            ?>

                                            <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR. </span><?php echo $np . "<span class='text-warning'>  DIS-" . $dis . " % </span>" ?></span>
                                            <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op ?></h6>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <br>
                <div class="row  ">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <span class="h2 fw-bold" >Top Deals</span>
                            <?php

                            $list_rs = Database::search("SELECT *
FROM `product`
INNER JOIN `click_products` ON `click_products`.`product_id` = `product`.`id`
INNER JOIN `sub_category` ON `sub_category`.`sub_cat_id`=`product`.`sub_category_sub_cat_id`
INNER JOIN `product_category` ON `product_category`.`cat_id` = `sub_category`.`product_category_id`
INNER JOIN `cat_clicks` ON `cat_clicks`.`product_category_cat_id` = `product_category`.`cat_id` 
INNER JOIN `brand` ON `brand`.`brand_id`=`product`.`brand_id` 
INNER JOIN `brand_click` ON `brand_click`.`brand_brand_id`=`brand`.`brand_id`
WHERE  `product_status_id`='1'
ORDER BY `click_count` DESC, `cat_click_count` DESC , `brand_click_count` DESC  LIMIT 16 OFFSET 4;
");
                            $list_num = $list_rs->num_rows;
                            for ($k = 0; $k < $list_num; $k++) {
                                $list_data = $list_rs->fetch_assoc();
                                $image1_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $list_data["id"] . "'");
                                $image1_data = $image1_rs->fetch_assoc();
                            ?>
                                <div class="col-3 col-lg-3 cursor card " onclick="productclick(<?php
                                                                                                if (!isset($_COOKIE['product' . $list_data['id']])) {
                                                                                                    echo $list_data['id'];
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }
                                                                                                ?>) , brandclick(
                                                                                                <?php
                                                                                                if (!isset($_COOKIE['brand' . $list_data['brand_id']])) {
                                                                                                    echo $list_data['brand_id'];
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }

                                                                                                ?>
                                                                                            )  , catogoryclick(<?php
                                                                                                                if (isset($_COOKIE['category' . $list_data['cat_id']])) {
                                                                                                                    echo (0);
                                                                                                                } else {
                                                                                                                    echo $list_data['cat_id'];
                                                                                                                }
                                                                                                                ?>) ,  singleload(<?php echo $list_data['id']; ?>);">
                                    <div class="card-body">
                                        <img class="img-fluid" src="<?php echo $image1_data["img_path"]  ?>">
                                        <span class=" d-none d-lg-block signupstart fw-bold text-capitalize "><?php echo $list_data["title"] ?></span>
                                        <?php
                                        $discount = Database::search("SELECT * FROM `discount` WHERE `product_id` = '" . $list_data["id"] . "'");
                                        $discount_row = $discount->num_rows;
                                        $discount_data = $discount->fetch_assoc();
                                        if ($discount_row > 0) {

                                            $op2 = $list_data["price"];
                                            $dis2 = $discount_data["dis_presentage"];
                                            $np2 = ($op2 - (($op2 / 100) * $dis2));
                                            if ($op2 == $np2) {
                                                1
                                        ?>

                                            <?php
                                            } else {
                                            ?>
                                                <span class="text-dark font-monospace fw-bold "><span class="fw-bold ">LKR. </span><?php echo $np2 . "<span class='text-warning'>  DIS-" . $dis2 . " % </span>" ?></span>
                                                <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op2 ?></h6>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <span class="text-dark font-monospace fw-bold  "><span class="fw-bold  ">LKR.</span><?php echo $list_data["price"] ?></span>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center align-items-center ">
            <div class="col-12">
                <span class="text-muted h6"  id="loading">Show More....</span>
            </div>
            <?php
            require "footer.php";
            ?>
        </div>
        <!--body-->

    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
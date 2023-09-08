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
            require "connection.php";
            require "header.php";
            ?>
            <?php
            require "search.php";



            ?>
            <div class="col-12 d-none d-lg-block ">
                <div class="row">
                    <div id="saved-items" class="col-1 text-warning cursor border-bottom text-center">
                        <span class="fw-bold mb-3">Saved Items <i class="bi bi-heart-fill"></i></span>
                    </div>
                    <div id="item-2" class="col-1 text-warning cursor border-bottom text-center">
                        <span class="fw-bold mb-3">Category-2</span>
                    </div>

                    <?php
                    $rs_cat = Database::search("SELECT * FROM `product_category`  ");
                    $num = 9;
                    for ($x = 1; $x < $num; $x++) {
                        $cat_data = $rs_cat->fetch_assoc();
                    ?>
                        <div id="<?php echo ("myDiv" . $x) ?>" data-value="1" class=" col-1  border-bottom text-center" data-bs-toggle="dropdown">
                            <span class="fw-bold mb-3"><?php echo $cat_data["cat_name"] ?></span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="row">
                                <div class=" text-dark text-decoration-none col-5 offset-1">
                                    <span class="h4 signupstart">Shop Now</span>
                                    <br>
                                    <br>
                                    <?php
                                    $sub_cat_rs = Database::search("SELECT * FROM `sub_category` WHERE `product_category_id` = '" . $cat_data['id'] . "'");
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
                        <span class="fw-bold mb-3">Category-11</span>
                    </div>
                    <div id="item4" class="col-1 text-warning border-bottom cursor text-center">
                        <span class="fw-bold mb-3">Category-12</span>
                    </div>
                </div>
            </div>
        </div>
        <!--body-->
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
                <div class="form-control">
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
                        <?php
                        $database_rs = Database::search("SELECT * FROM `product` INNER JOIN `click_products` 
                            ON `product`.`id` = `click_products`.`product_id` INNER JOIN `product_img` ON 
                            `product_img`.`product_id`=`product`.`id` INNER JOIN `product_status` ON `product_status`.`id`=`product`.`product_status_id`
                            WHERE `product_status_id`='1' ORDER BY `click_count` DESC, `product_added_date` ASC LIMIT 4");
                        $db_row = $database_rs->num_rows;

                        for ($x = 0; $x < $db_row; $x++) {
                            $db_data = $database_rs->fetch_assoc();
                        ?>
                            <div class="col-4  mx-5 d-none d-lg-block col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2 " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                        <span class="text-primary fw-bold"> <?php echo $db_data["title"] ?> </span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span><?php echo $db_data["price"] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-sm-block d-md-none mt-1">
                                <div class="card" style="width: 7rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body">
                                        <!--bodyhere-->
                                        <h6><?php echo $db_data["title"] ?></h6>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span><?php echo $db_data["price"] ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-none d-md-block d-lg-none mt-1 mb-2">
                                <div class="card" style="width: 7rem;;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body">
                                        <h6><?php echo $db_data["title"] ?></h6>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span><?php echo $db_data["price"] ?></span>
                                        <!--bodyhere-->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3 align-items-center col-lg-8 offset-lg-2 ">
                <div class="form-control">
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
                    <div class="row justify-content-center ">
                        <?php
                        $dis_rs = Database::search("SELECT * FROM `product` INNER JOIN `discount` ON `product`.`id`=`discount`.`product_id`
                        INNER JOIN `click_products` ON `click_products`.`product_id`=`product`.`id` INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id`
                        WHERE  `product_status_id`='1' ORDER BY `dis_presentage` DESC , `product_added_date` ASC LIMIT 4");
                        $dis_num_rows = $dis_rs->num_rows;
                        for ($y = 0; $y < $dis_num_rows; $y++) {
                            $dis_data = $dis_rs->fetch_assoc();
                        ?>
                            <div class="col-4 mx-5 d-none d-lg-block col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $dis_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
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
                            </div>
                            <div class="col-3 d-sm-block d-md-none mt-1">
                                <div class="card" style="width: 7rem;">
                                    <img src="<?php echo $dis_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body">
                                        <!--bodyhere-->
                                        <span class="text-primary fw-bold"><?php echo $dis_data["title"]; ?></span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR. </span><?php echo $np . "<span class='text-warning'>  DIS-" . $dis . " % </span>" ?></span>
                                        <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op ?></h6>

                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-none d-md-block d-lg-none mt-1 mb-2">
                                <div class="card" style="width: 7rem;;">
                                    <img src="<?php echo $dis_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body">
                                        <span class="text-primary fw-bold"><?php echo $dis_data["title"]; ?></span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR. </span><?php echo $np . "<span class='text-warning'>  DIS-" . $dis . " % </span>" ?></span>
                                        <br>
                                        <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op ?></h6>
                                        <!--bodyhere-->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-lg-8 d-none d-lg-block offset-2 mt-3 mb-3">
                        <div class="row">
                            <div class="col-4  mt-3 mb-3 mx-5 col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                        <span class="text-primary fw-bold">Title here</span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span>100000.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-5 mt-3 mb-3 mx-5 col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                        <span class="text-primary fw-bold">Title here</span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span>100000.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-5 mt-3 mb-3 mx-5 col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                        <span class="text-primary fw-bold">Title here</span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span>100000.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-5 d-none mt-3 mb-3 mx-5 col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                        <span class="text-primary fw-bold">Title here</span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span>100000.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mx-5 mt-3 mb-3 mx-5 col-lg-2">
                                <div class="card" style="width: 12rem;">
                                    <img src="<?php echo $db_data["img_path"]; ?>" class="card-img-top mt-2  " alt="...">
                                    <div class="card-body text-center align-items-center justify-content-center">
                                        <span class="text-primary fw-bold">Title here</span>
                                        <br>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span>100000.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--body-->
        <?php
        require "footer.php";
        ?>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
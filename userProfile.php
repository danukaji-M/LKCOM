<?php
session_start();
require "connection.php";
if (isset($_SESSION["ud"])) {
    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["ud"]["email"] . "'");
    $image_data = $image_rs->fetch_assoc();

    $database_rs = Database::search("SELECT * FROM `product` INNER JOIN `click_products` 
        ON `product`.`id` = `click_products`.`product_id` INNER JOIN `product_img` ON 
        `product_img`.`product_id`=`product`.`id`
        WHERE `product_status_id`='1' ORDER BY `click_count` DESC, `product_added_date` ASC LIMIT 4");
    $db_row = $database_rs->num_rows;

    for ($x = 0; $x < $db_row; $x++) {
        $db_data = $database_rs->fetch_assoc();
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CARTLANKA || User Profile</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@112.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="font.css">
    </head>

    <body class="" style="overflow-x: hidden;">
        <div class="container-fluid">
            <div class="row ">
                <?php require "header.php" ?>
                <div class="col-12 d-block ">
                    <div class="row text-center justify-content-center" id="view1">
                        <div class="col-12 col-lg-3">
                            <div class="row">
                                <div class="col-12 border-end border-bottom text-center mt-1">
                                    <div class="form-control">
                                        <div class="text-end d-flex ">
                                            <i class="bi bi-gear-wide cursor" onclick="profilephotoChange();"></i>
                                            <br>
                                            <label class="form-label">profile</label>
                                        </div>
                                        <img src="
                                        <?php
                                        if (isset($image_data["img_path"])) {
                                            echo $image_data["img_path"];
                                        } else {
                                            echo "resources\userprofile\avatar.svg";
                                        }
                                        ?>
                                        " class=" img-user">
                                        <br>
                                        <span class="text-warning fw-bold h3 signupstart ">
                                            <?php
                                            echo $_SESSION["ud"]["fname"] . " " . $_SESSION["ud"]["lname"];
                                            ?>
                                        </span>
                                        <br>
                                        <span class="text-muted signupstart">
                                            <?php
                                            echo $_SESSION["ud"]["email"];
                                            $email = $_SESSION["ud"]["email"];
                                            ?>
                                        </span>
                                    </div>
                                    <hr>
                                    <div class=" mt-2 mb-2 col-12 text-center bg-info-subtle  ">
                                        <button onclick="changeUserType();" id="switch" class="btn btn-success mb-2">
                                            <?php
                                            $x = Database::search("SELECT * FROM `user_has_user_type` WHERE `user_email`='" . $email . "' AND `user_type_type_id`='1'");
                                            $xnum = $x->num_rows;
                                            if ($xnum == 1) {
                                                $y = Database::search("SELECT * FROM `user_has_user_type` WHERE `user_email`='" . $email . "' AND `user_type_type_id`='2'");
                                                $ynum = $y->num_rows;
                                                if ($ynum == 1) {
                                                    echo "Switch To Seller Account";
                                                } else {
                                                    echo ("Register Seller Account");
                                                }
                                            }
                                            ?>

                                        </button>
                                        <br>
                                        <div class="text-start">
                                            <?php
                                            $address_rs = Database::search("SELECT * FROM `address` WHERE `user_email`='" . $email . "'");
                                            $address_data = $address_rs->fetch_assoc();
                                            $city_rs = Database::search("SELECT * FROM `city` WHERE `city_id`='" . $address_data["city_city_id"] . "'");
                                            $city_data = $city_rs->fetch_assoc();
                                            $district_rs = Database::search("SELECT * FROM `district` WHERE `district_id` = '" . $city_data["district_district_id"] . "'");
                                            $district_data = $district_rs->fetch_assoc();
                                            $province_rs = Database::search("SELECT * FROM `province` WHERE `province_id`='" . $district_data["district_id"] . "'");
                                            $province_data = $province_rs->fetch_assoc();
                                            ?>
                                            <h4 class="fw-bold signupstart text-start link-underline ">
                                                Primary Address
                                            </h4>
                                            <span class="text-muted"><?php echo $address_data["line_1"] ?></span>
                                            <br>
                                            <span class="text-muted"><?php echo $address_data["line_2"] ?></span>
                                            <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="text-muted"><?php echo $city_data["city_name"] ?></span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-muted">
                                                        <?php echo $district_data["district_name"] ?>
                                                    </span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-muted"><?php echo $province_data["province_name"] ?></span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-muted">
                                                        <?php echo $address_data["postal_code"] ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="text-start">
                                                <h4 class="fw-bold signupstart text-start link-underline ">
                                                    Secondary Address
                                                </h4>
                                                <span class="text-muted">Adress Line 1</span>
                                                <br>
                                                <span class="text-muted">Adress Line 2</span>
                                                <br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span class="text-muted">City</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="text-muted">
                                                            district
                                                        </span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="text-muted">Province</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="text-muted">
                                                            postal code
                                                        </span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="text-start">
                                                    <h4 class="fw-bold signupstart text-start link-underline ">
                                                        Billing Address
                                                    </h4>
                                                    <span class="text-muted">Adress Line 1</span>
                                                    <br>
                                                    <span class="text-muted">Adress Line 2</span>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span class="text-muted">City</span>
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="text-muted">
                                                                district
                                                            </span>
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="text-muted">Province</span>
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="text-muted">
                                                                postal code
                                                            </span>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 justify-content-center align-items-center">
                                        <div class="col-12">
                                            <button onclick="changeView();" class="btn btn-primary"> Change User Detail
                                                <i class="bi bi-gear-wide cursor"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 border-end ">
                            <div class="row">
                                <div class="col-12">
                                    <span class=" text-info h2 fw-bold signupstart">
                                        Bought reviews
                                    </span>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4 bg-primary border-start border-end border-top border-bottom" id="his" onclick="phis();" onload="phis1();">
                                                    <span class="h5 text-dark">
                                                        purchase History
                                                    </span>
                                                </div>
                                                <div class="col-4 border-start border-end border-top border-bottom" id="rev" onclick="prev();">
                                                    <span class="h5 text-dark">
                                                        My Reviews
                                                    </span>
                                                </div>
                                                <div class="col-4 border-start border-end border-top border-bottom" id="com" onclick="pcom();">
                                                    <span class="h5 text-dark">
                                                        Complains
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5 overflow-auto" style="height: 60vh;" id="phistry">
                                    <?php
                                    $purchase_rs = Database::search("SELECT * FROM `buyitems` WHERE `user_email`= '" . $email . "' ORDER BY `date` DESC");
                                    if ($purchase_rs->num_rows > 0) {
                                        for ($n = 0; $n < $purchase_rs->num_rows; $n++) {
                                            $purchase_data = $purchase_rs->fetch_assoc();
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $purchase_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();
                                            $purch_img = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $purchase_data["product_id"] . "' ");
                                            $purch_img_data = $purch_img->fetch_assoc();
                                    ?>
                                            <div class=" col-5 offset-1 col-lg-5">
                                                <div class="card " style="width:12rem;  ">
                                                    <img src="<?php echo $purch_img_data["img_path"] ?>" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-danger fw-bold"><?php echo $product_data["title"] ?></h5>
                                                        <?php
                                                        $discount = Database::search("SELECT * FROM `discount` WHERE `product_id` = '" . $db_data["id"] . "'");
                                                        $discount_row = $discount->num_rows;
                                                        $discount_data = $discount->fetch_assoc();
                                                        if ($discount_row > 0) {

                                                            $op2 = $db_data["price"];
                                                            $dis2 = $discount_data["dis_presentage"];
                                                            $np2 = ($op2 - (($op2 / 100) * $dis2));
                                                            if ($op2 == $np2) {
                                                        ?>
                                                                <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span><?php echo $db_data["price"] ?></span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR. </span><?php echo $np2 . "<span class='text-warning'>  DIS-" . $dis2 . " % </span>" ?></span>
                                                                <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op2 ?></h6>
                                                                <button class="btn btn-warning">GO TO SEEING DETAILS</button>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class=" col-12">
                                            <div class="row justify-content-center align-items-center ">
                                                <div class="col-12 ">
                                                    <span class="text-danger h1 text-capitalize ">Opps You didn't Bought Anything</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="row d-none " id="viewdiv1">
                                    <div class="col-12 mt-5">
                                        <?php
                                        $review_rs = Database::search("SELECT * FROM `review` WHERE `user_email`= '" . $email . "' ORDER BY `review_date` DESC");
                                        if ($review_rs->num_rows > 0) {
                                            for ($n = 0; $n < $review_rs->num_rows; $n++) {
                                                $review_data = $review_rs->fetch_assoc();
                                        ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Featured
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">Special title treatment</h5>
                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>

                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <span class="text-danger h1 text-capitalize">Opps You didn't Review Anything</span>
                                        <?php
                                        }
                                        ?>


                                        <div class="col-12 mt-5">
                                            <div class="row justify-content-center">
                                                <div class="col-6 col-lg-3">
                                                    <span class="btn btn-dark">
                                                        << </span>
                                                            <span class="btn link-opacity-50-hover  btn-dark">
                                                                1
                                                            </span>
                                                            <span class="btn btn-dark">
                                                                2
                                                            </span>
                                                            <span class="btn btn-dark">
                                                                >>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row d-none " id="viewdiv2">
                                    <div class="col-12 mt-5">
                                        <?php
                                        $complain_rs = Database::search("SELECT * FROM `complain` WHERE `user_email`= '" . $email . "' ORDER BY `complain_date` DESC");
                                        if ($complain_rs->num_rows > 0) {
                                            for ($n = 0; $n < $complain_rs->num_rows; $n++) {
                                                $complain_data = $complain_rs->fetch_assoc();
                                        ?>
                                                <div class="card bg-light text-dark btn-outline-danger">
                                                    <div class="card-header bg-info">
                                                        Featured
                                                    </div>
                                                    <div class="card-body ">
                                                        <h5 class="card-title">Special title treatment</h5>
                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                        <a href="#" class="btn btn-danger">Go somewhere</a>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <span class="text-danger h1 text-capitalize"> You didn't Complain Anything</span>
                                        <?php
                                        }
                                        ?>

                                        <div class="col-12 mt-5">
                                            <div class="row justify-content-center">
                                                <div class="col-6 col-lg-3">
                                                    <span class="btn btn-dark">
                                                        << </span>
                                                            <span class="btn link-opacity-50-hover  btn-dark">
                                                                1
                                                            </span>
                                                            <span class="btn btn-dark">
                                                                2
                                                            </span>
                                                            <span class="btn btn-dark">
                                                                >>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-6 text-start">
                                    <label class="form-label text-muted">Bought reviews</label>
                                    <select name="" class="form-control" id="boughtItem">
                                        <option value="0">SELECT YOUR ITEM</option>
                                        <?php
                                        $purchase_rs = Database::search("SELECT * FROM `buyitems` WHERE `user_email`= '" . $email . "' ORDER BY `date` DESC");
                                        if ($purchase_rs->num_rows > 0) {
                                            for ($n = 0; $n < $purchase_rs->num_rows; $n++) {
                                                $purchase_data = $purchase_rs->fetch_assoc();
                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $purchase_data["product_id"] . "'");
                                                $product_data = $product_rs->fetch_assoc();
                                        ?>
                                                <option value="<?php echo $purchase_data["buyitem_id"]
                                                                ?>"><?php echo $product_data["title"] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>

                            </div>

                            <hr>
                            <div class="col-10 text-start offset-1 mt-5">
                                <span class="text-danger fw-bold signupstart ">Give Feedback Star To review Quality</span>
                                <div class="star-rating">
                                    <input type="radio" name="stars" id="star-a" value="5" />
                                    <label for="star-a"></label>

                                    <input type="radio" name="stars" id="star-b" value="4" />
                                    <label for="star-b"></label>

                                    <input type="radio" name="stars" id="star-c" value="3" />
                                    <label for="star-c"></label>

                                    <input type="radio" name="stars" id="star-d" value="2" />
                                    <label for="star-d"></label>

                                    <input type="radio" name="stars" id="star-e" value="1" />
                                    <label for="star-e"></label>

                                </div>
                                <div class=" mt-5 mb-5 text-center justify-content-center ">
                                    <span class="h5 fw-bold signupstart text-start">
                                        Upload Your review Image Here
                                    </span>
                                    <input type="file" class="d-none" src="" id="feedbackreviewImg" alt="Profile Picture">
                                    <label for="userImage" class="btn btn-dark">Upload Your review to click Here</label>
                                </div>
                                <span class="text-dark fw-bold text-1">Write About Your review</span>
                                <textarea id="textfb" class="form-control">
                                    </textarea>
                                <button class="btn btn-info mt-2 fw-bold" onclick="feedback();">Submit</button>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="view2" class="row d-none justify-content-center text-center">
            <div class="col-12 col-lg-6 border-start border-end">
                <span class="text-dark h1">User Details</span>
                <div class="form-control mb-3">
                    <div class="text-end d-flex ">
                        <i class="bi bi-gear-wide cursor" onclick="profilephotoChange();"></i>
                        <br>
                        <label class="form-label">profile</label>
                    </div>
                    <img src="
                                        <?php
                                        if (isset($image_data["img_path"])) {
                                            echo $image_data["img_path"];
                                        } else {
                                            echo "resources\userprofile\avatar.svg";
                                        }
                                        ?>
                                        " class=" img-user">
                    <br>
                    <span class="text-warning fw-bold h3 signupstart ">
                        <?php
                        echo $_SESSION["ud"]["fname"] . " " . $_SESSION["ud"]["lname"];
                        ?>
                    </span>
                    <br>
                    <span class="text-muted signupstart">
                        <?php
                        echo $_SESSION["ud"]["email"];
                        $email = $_SESSION["ud"]["email"];
                        ?>
                    </span>

                </div>

                <hr />
                <!--address-->

                <div class="row  mb-2 justify-content-center text-start">
                    <div class="col-6 mb-2">
                        <label class="form-label">First Name</label>
                        <input class="form-control" id="fn" type="text" value="<?php echo $_SESSION["ud"]["fname"]; ?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="">Gender</label>
                        <label class="form-label">Last Name</label>
                        <input class="form-control" id="ln" type="text" value="<?php echo $_SESSION["ud"]["lname"]; ?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-label">Your Gender</label>
                        <select class="form-control" disabled>
                            <option value="0"><?php echo $_SESSION["ud"]["gender_name"]; ?></option>
                        </select>
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-label">Password</label>
                        <input class="form-control" id="pw" type="passowrd" value="<?php echo $_SESSION["ud"]["password"]; ?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-label">Your Mobile</label>
                        <input class="form-control" id="mobile" type="email" value="<?php echo $_SESSION["ud"]["mobile"]; ?>">
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-label">Joined Date</label>
                        <input class="form-control" type="text" value="<?php echo $_SESSION["ud"]["joined_date"]; ?>" disabled>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label">Your Email</label>
                        <input class="form-control" id="email" type="email" value="<?php echo $_SESSION["ud"]["email"]; ?>">
                    </div>
                    <hr>
                    <div class="row text-center mt-5 mb-5 justify-content-center">
                        <div class="col-12 ">
                            <button class="btn btn-success"> Change personal Details </button>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 col-lg-12 border-top border-bottom border-end border-5 ">
                        <span class="text-primary shadow h3 text-start">Primary Adress</span>
                        <br>
                        <div class="row">
                            <div class="col-12 mt-3 ">
                                <label class="form-label signupstart">Address Line 1</label>
                                <input type="text" id="pal1" value="<?php
                                                                    if (empty($pdata["line_1"])) {
                                                                    } else {
                                                                        echo $pdata["line_1"];
                                                                    }
                                                                    ?>" placeholder="Address line 1" class="form-control border-primary">
                            </div>
                            <div class="col-12 mt-3 ">
                                <label class="form-label signupstart">Address Line 2</label>
                                <input type="text" id="pal2" value="<?php
                                                                    if (empty($pdata["line_2"])) {
                                                                    } else {
                                                                        echo $pdata["line_2"];
                                                                    }
                                                                    ?>" placeholder="Address line 2" class="form-control border-primary">
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">
                                    Select Your City
                                </label>
                                <select id="pcity" class="form-control border-primary ">
                                    <option value="0">Select your City</option>
                                    <?php
                                    $city_rs = Database::search("SELECT * FROM `city`");
                                    $city_rows = $city_rs->num_rows;
                                    for ($j = 0; $j < $city_rows; $j++) {
                                        $city_data = $city_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($j + 1) ?>"><?php echo $city_data["city_name"] ?></option>
                                    <?php
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">
                                    Select Your District
                                </label>
                                <select id="pdisreict" class="form-control border-primary ">
                                    <option value="0">Select your District</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">
                                    Select Your Province
                                </label>
                                <select id="pprovince" class="form-control border-primary ">
                                    <option value="0">Select your Province</option>
                                </select>

                            </div>
                            <div class="col-6 mt-3">
                                <label class="form-label">
                                    Enter Your Postal Code
                                </label>
                                <input id="ppc" value="<?php
                                                        if (empty($pdata["postal_code"])) {
                                                        } else {
                                                            echo $pdata["postal_code"];
                                                        }
                                                        ?>" class="form-control border-primary" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 justify-content-center">
                        <div class="col-12">
                            <button onclick="adressesUpdate();" class="btn btn-success fw-bold signupstart ">Update Shipping Details</button>
                            <button type="button" class="btn btn-secondary" onclick="changeview();">Close</button>
                        </div>
                    </div>
                </div>
                <!--address-->
            </div>

        </div>
        </div>



        </div>
        </div>
        <div class="modal" id="imgModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary signupstart ">Profile Image Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body justify-content-center ">
                        <span class="h5 fw-bold signupstart text-start">
                            Upload Your Profile Image Here
                        </span>
                        <input type="file" class="d-none" src="" id="userImage" alt="Profile Picture" che>
                        <label for="userImage" class="btn btn-dark">Upload Your Profile to click Here</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="save();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php
        require "footer.php";
        ?>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} else {
    echo "<script>
    window.location='home.php';
    </script>";
}
?>
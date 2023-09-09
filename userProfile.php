<?php
session_start();
require "connection.php";
if (isset($_SESSION["ud"])) {
    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["ud"]["email"] . "'");
    $image_data = $image_rs->fetch_assoc();
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

    <body>
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
                                        <v-button onclick="changeUserType();" id="switch" class="btn btn-success mb-2">
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

                                        </v-button>
                                        <br>
                                        <div class="text-start">
                                            <h4 class="fw-bold signupstart text-start link-underline ">
                                                Primary Address
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
                                                        <div class="col-12 mt-3">
                                                            <input type="checkbox" name="" id="">
                                                            <label class="form-label text-info">Use Prmary Address To biling Address</label>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="checkbox" name="" id="">
                                                            <label class="form-label text-info ">Use Secondary Address To biling Address</label>
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
                                        Bought Products
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
                                <div class="row mt-5 " id="phistry">
                                    <div class=" col-12">
                                        <div class="row justify-content-center align-items-center ">
                                            <div class="col-6 col-lg-3">
                                                <div class="card mx-5 " style="width:12rem;">
                                                    <img src="resources/product/example_pro_1.jpg" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-4 offset-lg-1">
                                                <div class="card  mx-5 mt-3 mb-3 " style="width: 12rem;">
                                                    <img src="resources/product/example_pro_1.jpg" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-6 col-lg-5 offset-lg-1">
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
                                <div class="row d-none " id="viewdiv1">
                                    <div class="col-12 mt-5">
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
                                    <label class="form-label text-muted">Bought products</label>
                                    <select name="" class="form-control" id="boughtItem">
                                        <option value="0">SELECT YOUR ITEM</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-6 text-start">
                                    <labe class="text-muted form-label ">Press button to track your item</labe>

                                    <v-button class="btn btn-danger mt-2 ">
                                        Check Tracking Details
                                    </v-button>
                                </div>
                            </div>
                            <div class="row mt-5 justify-content-center">
                                <span class="text-muted h1">
                                    OOPS HAVENT ANY TRACKING DETAIL PLEASE SELECT A PRODUCT
                                    <br />
                                    <i class="bi bi-geo-alt"></i>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-10 offset-1">
                                    <span class="h5 text-warning ">Your Tracking details</span>
                                    <div class="row border-2 mt-3 border-start border-end border-top border-bottom">
                                        <div class="col-3 border-end">
                                            <span class="text-info text-capitalize fw-bold signupstart " id="wh">
                                                PACKAGE HAND OUT TO COORIER
                                            </span>
                                        </div>
                                        <div class="col-4 border-end text-start">
                                            <input type="radio" name="" id="locationRadio">
                                            <span class="text-muted text-capitalize text-dark ">
                                                location <i class="bi bi-geo-alt"></i>-
                                            </span>
                                        </div>
                                        <div class="col-5">
                                            <span class="text-dark text-capitalize">Coorier details</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 mb-2 text-start mt-5 offset-1">
                                    <span class="text-dark form-control fw bold">
                                        estimate date and Price
                                    </span>
                                </div>
                                <hr>
                                <div class="col-10 text-start offset-1 mt-5">
                                    <span class="text-danger fw-bold signupstart ">Give Feedback Star To Product Quality</span>
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
                                            Upload Your Product Image Here
                                        </span>
                                        <input type="file" class="d-none" src="" id="feedbackProductImg" alt="Profile Picture">
                                        <label for="userImage" class="btn btn-dark">Upload Your product to click Here</label>
                                    </div>
                                    <span class="text-dark fw-bold text-1">Write About Your Product</span>
                                    <textarea id="feedback" class="form-control">
                                    </textarea>
                                    <button class="btn btn-info mt-2 fw-bold" onclick="feedback();" >Submit</button>
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
                            <input class="form-control" id="email" type="email" value="<?php echo $_SESSION["ud"]["mobile"]; ?>">
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Joined Date</label>
                            <input class="form-control" type="text" value="<?php echo $_SESSION["ud"]["joined_date"]; ?>" disabled>
                        </div>
                        <div class="col-12 col-lg-6 border-top border-bottom border-end border-5 ">
                            <span class="text-primary shadow h3 text-start">Primary Adress</span>
                            <br>
                            <div class="row">
                                <div class="col-12 mt-3 ">
                                    <label class="form-label signupstart">Address Line 1</label>
                                    <input type="text" id="pal1" placeholder="Address line 1" class="form-control border-primary">
                                </div>
                                <div class="col-12 mt-3 ">
                                    <label class="form-label signupstart">Address Line 2</label>
                                    <input type="text" id="pal2" placeholder="Address line 2" class="form-control border-primary">
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Select Your City
                                    </label>
                                    <select id="pcity" class="form-control border-primary ">
                                        <option value="0">Select your City</option>
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
                                    <input id="ppc" class="form-control border-primary" type="text">
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="" id="billingAddress1" checked>
                                    <span class="text-muted fw-bold text-capitalize">use Billing to primary address</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 border-bottom border-top border-5">
                            <span class="text-secondary shadow h3 text-start">Secondary Adress</span>
                            <span class="text-muted">(optional)</span>
                            <div class="row">
                                <div class="col-12 mt-3 ">
                                    <label id="sal1" class="form-label signupstart">Address Line 1</label>
                                    <input type="text" placeholder="Address line 1" class="form-control border-danger">
                                </div>
                                <div class="col-12 mt-3 ">
                                    <label id="sal2" class="form-label signupstart">Address Line 2</label>
                                    <input type="text" placeholder="Address line 2" class="form-control border-danger">
                                </div>
                                <div class="col-6 mt-3">
                                    <label i class="form-label">
                                        Select Your City
                                    </label>
                                    <select id="scity" class="form-control border-danger ">
                                        <option value="0">Select your City</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Select Your District
                                    </label>
                                    <select id="sdistrict" class="form-control border-danger ">
                                        <option value="0">Select your District</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Select Your Province
                                    </label>
                                    <select id="sProvince" class="form-control border-danger ">
                                        <option value="0">Select your Province</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Enter Your Postal Code
                                    </label>
                                    <input id="spc" class="form-control border-danger" type="text">
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="" id="billingAddress2">
                                    <span class="text-muted fw-bold text-capitalize">use Billing to Secondary address</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 border-5 border-start  border-end border-bottom ">
                            <span class=" text-success shadow h3 text-start">Billing Adress</span>
                            <span class="text-muted">(optional)</span>
                            <div class="row">
                                <div class="col-12 mt-3 ">
                                    <label id="bal1" class="form-label signupstart">Address Line 1</label>
                                    <input type="text" placeholder="Address line 1" class="form-control border-success">
                                </div>
                                <div class="col-12 mt-3 ">
                                    <label id="bal2" class="form-label signupstart">Address Line 2</label>
                                    <input type="text" placeholder="Address line 2" class="form-control border-success">
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Select Your City
                                    </label>
                                    <select id="bcity" class="form-control border-success ">
                                        <option value="0">Select your City</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Select Your District
                                    </label>
                                    <select id="bdistrict" class="form-control border-success ">
                                        <option value="0">Select your District</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Select Your Province
                                    </label>
                                    <select id="bprovince" class="form-control border-success ">
                                        <option value="0">Select your Province</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <label class="form-label">
                                        Enter Your Postal Code
                                    </label>
                                    <input id="bpc" class="form-control border-success" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-12">
                                <button onclick="adressesUpdate();" class="btn btn-success fw-bold signupstart ">Update Settings</button>
                                <button type="button" class="btn btn-secondary" onclick="changeview();">Close</button>
                            </div>
                        </div>
                    </div>
                    <!--address-->
                </div>
            </div>
            <hr>
            <?php
            require "footer.php";
            ?>
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
                        <input type="file" class="d-none" src="" id="userImage" alt="Profile Picture">
                        <label for="userImage" class="btn btn-dark">Upload Your Profile to click Here</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="save();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


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
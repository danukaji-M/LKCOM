<?php
session_start();
require "connection.php";
if (isset($_SESSION["ud"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CARTLANKA || User Profile</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="font.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row ">
                <?php require "header.php" ?>
                <div class="col-12">
                    <div class="row text-center justify-content-center">
                        <div class="col-12 col-lg-3">
                            <div class="row">
                                <div class="col-12 border-end border-bottom text-center mt-1">
                                    <div class="form-control">
                                        <div class="text-end d-flex ">
                                            <i class="bi bi-gear-wide cursor" onclick="profilephotoChange();"></i>
                                            <br>
                                            <label class="form-label">profile</label>
                                        </div>
                                        <img src="resources/userprofile/avatar.svg" class=" img-user">
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
                                            <button class="btn btn-primary"> Change User Detail
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
                                                <div class="col-4 bg-primary border-start border-end border-top border-bottom" id="his" onclick="phis();" onload="phis1();" >
                                                    <span class="h5 text-dark">
                                                        purchase History
                                                    </span>
                                                </div>
                                                <div class="col-4 border-start border-end border-top border-bottom" id="rev" onclick="prev();"  >
                                                    <span class="h5 text-dark">
                                                        My Reviews
                                                    </span>
                                                </div>
                                                <div class="col-4 border-start border-end border-top border-bottom" id="com" onclick="pcom();"  >
                                                    <span class="h5 text-dark">
                                                        Complains
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 " id="phistry" >
                                    <div class=" col-12">
                                        <div class="row justify-content-center align-items-center ">
                                            <div class="col-12 col-lg-6">
                                                <div class="card mx-5 " style="width: 18rem;">
                                                    <img src="resources/product/example_pro_1.jpg" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="card  mx-5 " style="width: 18rem;">
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
                                <div class="row d-none " id="viewdiv1" >
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
                                <div class="row d-none " id="viewdiv2" >
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
                        <div class="col-4">
                            hi
                        </div>
                    </div>
                </div>

                <?php
                require "footer.php";
                ?>
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
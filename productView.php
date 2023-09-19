<?php
session_start();
require "connection.php";
if (isset($_SESSION["ud"])) {
    $email = $_SESSION["ud"]["email"];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seller Product || </title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="font.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php require "header.php"; ?>
                    <div class="row  justify-content-center d-flex">
                        <div class="col-12 border-end col-lg-3">
                            <div class="row overflow-y-auto  " ">
                                <div class=" card text-center d-flex justify-content-center align-items-center col-12">
                                <div class="img">
                                    <?php
                                    $pro_img = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");
                                    $image_data = $pro_img->fetch_assoc();
                                    ?>
                                    <img src="<?php
                                                if (isset($image_data["img_path"])) {
                                                    echo $image_data["img_path"];
                                                } else {
                                                    echo "resources\userprofile\avatar.svg";
                                                }
                                                ?>" class=" img-user mt-3 mb-4" alt="">
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
                            </div>
                            <div class="row overflow-auto" style="height: 30rem;">
                                <div class="col-12 ">
                                    <div class="col-12 mx-3 d-lg-block d-sm-none text-start">
                                        <span class="text-mute text-uppercase" style="color:gray;">Main</span>
                                        <ul style="list-style: none;">
                                            <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView2();"> <i class="bi bi-bucket-fill"></i>&nbsp;My Products</li>
                                            <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView3();"> <i class="bi bi-graph-down"></i>&nbsp;Product Update</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="text-dark fw-bold signupstart">Sort Products</h5>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="text" name="search" class="form-control" id="search">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" id="search" onclick="sort(0);"> Search </button>
                                        </div>
                                    </div>

                                    <hr>
                                    <h6 class="text-danger fw-bold">Sort By Added Date</h6>
                                    <input type="radio" name="o1" id="older">
                                    <label for="older" class="fw-bold">Oldest Product</label>
                                    <br>
                                    <input type="radio" name="o1" id="new">
                                    <label for="new" class="fw-bold">New Product</label>
                                    <hr>
                                    <h6 class="text-danger fw-bold">Sort By Price</h6>
                                    <input type="radio" name="h1" id="high">
                                    <label for="high" class="fw-bold">Highest Price to min Price</label>
                                    <br>
                                    <input type="radio" name="h1" id="low">
                                    <label for="min" class="fw-bold">Minimum price to highest Price</label>
                                    <hr>
                                    <h6 class="text-danger fw-bold">Activated And Deactivated</h6>
                                    <input type="radio" name="a1" id="active">
                                    <label for="active" class="fw-bold">Show Activated products</label>
                                    <br>
                                    <input type="radio" name="a1" id="deactive">
                                    <label for="deactive" class="fw-bold">Show Deactivated Products</label>
                                    <hr>
                                    <h6 class="text-danger fw-bold">Sort By Product quantity</h6>
                                    <input type="radio" name="m1" id="tomn">
                                    <label for="active" class="fw-bold">Max quantity to min</label>
                                    <br>
                                    <input type="radio" name="m1" id="tomx">
                                    <label for="maxqty" class="fw-bold">Min quantity to max</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sort" class="col-12 col-lg-9">
                        <span class="h3 text-warning signupstart">Your Products</span>
                        <div class="row ">
                            <?php
                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }
                            $sellproduct_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                            $sellproduct_num = $sellproduct_rs->num_rows;
                            $results_per_page = 4;
                            $number_of_page = ceil($sellproduct_num / $results_per_page);
                            $page_results = ($pageno - 1) * $results_per_page;
                            $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' LIMIT  " . $results_per_page . " OFFSET 
                            " . $page_results . "");
                            $product_num = $product_rs->num_rows;
                            for ($m = 0; $m < $product_num; $m++) {
                                $product_data = $product_rs->fetch_assoc();
                                $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` ='" . $product_data["id"] . "'");
                                $product_img_data = $product_img_rs->fetch_assoc();
                            ?>
                                <div class="col-12 mt-5 col-lg-6">
                                    <div class="card col-12">
                                        <div class="row">
                                            <div class="col-5 ">
                                                <img src="<?php echo $product_img_data["img_path"]; ?>" style="height: 13rem;" class=" card-img img-flex" alt="">
                                            </div>
                                            <div class="col-7 card-body">
                                                <h5 class="card-title"><?php echo $product_data["title"] ?></h5>
                                                <p class="card-text"><?php echo $product_data["price"] ?></p>
                                                <p class="<?php
                                                            if ($product_data["product_status_id"] == "1") {
                                                            ?>
                                                                    text-success fw-bold
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    text-danger fw-bold
                                                                    <?php
                                                                }
                                                                    ?>">
                                                    <?php
                                                    if ($product_data["product_status_id"] == "1") {
                                                    ?>
                                                        Your Product Is Activated
                                                    <?php
                                                    } else {
                                                    ?>
                                                        Your Product Is Disabled
                                                    <?php
                                                    }
                                                    ?>
                                                </p>
                                                <span class="btn btn-info"> <a class=" text-decoration-none text-dark" href="updateProduct.php"> Update Product</a></span>
                                                <span class="<?php
                                                                if ($product_data["product_status_id"] == "1") {
                                                                ?>
                                                                    btn btn-success
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    btn btn-dark
                                                                    <?php
                                                                }
                                                                    ?>" onclick='update(<?php echo $product_data["id"]; ?> );' id="statusOpen<?php echo $product_data["id"] ?>"><?php
                                                                                                                                                                                if ($product_data["product_status_id"] == "1") {
                                                                                                                                                                                ?>
                                                        Deactivate Product
                                                    <?php
                                                                                                                                                                                } else {
                                                    ?>
                                                        Activate Product
                                                    <?php
                                                                                                                                                                                }
                                                    ?></span>
                                                <div class="modal" id="status-modal" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Product Status Updater</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                if ($product_data["product_status_id"] == "1") {
                                                                ?>
                                                                    <span class="text-danger fw-bold">Do you Want Disable This Product ? </span>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="text-success fw-bold">Do you Want enable This Product ? </span>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" onclick="yes(<?php echo $product_data['id']; ?>)" class="<?php
                                                                                                                                                if ($product_data["product_status_id"] == "1") {
                                                                                                                                                ?>
                                                                    btn btn-danger
                                                                    <?php
                                                                                                                                                } else {
                                                                    ?>
                                                                    btn btn-info
                                                                    <?php
                                                                                                                                                }
                                                                    ?>">
                                                                    YES
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal" id="discount-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Product Discount window</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="text-danger fw-bold">Do you Want Make Discount This Product ? </span>
                                                <div class=" input-group"><input aria-describedby="basic-addon2" type="text" placeholder="Enter Your Discount Precentage" class="form-control" id="discount">
                                                    <span class=" input-group-text" id="basic-addon2">%</span>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" onclick="discount(<?php echo $product_data['id'] ?>)" class="btn btn-danger">
                                                    Add Discount
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                <div class="modal" id="delete-modal" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Product Permenant Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span class="text-danger fw-bold">Do you Want Delete This Product ? </span>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" onclick="del(<?php echo $product_data['id']; ?>)" class="btn btn-danger">
                                                                    YES
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <br>
                                                <span class="btn cursor btn-danger" id="deleteOpen<?php echo $product_data['id']; ?>" onclick="deleteProduct(<?php echo $product_data['id']; ?>);">Delete</span>
                                                <button class="btn cursor btn-warning" id="discountOpen<?php echo $product_data['id']; ?>" onclick="DiscountAdd(<?php echo $product_data['id']; ?>);">Discount</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row text-center mt-5 align-items-center justify-content-center d-flex">
                            <div class="col-12">
                                <nav arial-label="Page navigation example">
                                    <ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item">
                                            <a class="btn btn-dark" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php

                                        for ($y = 1; $y <= $number_of_page; $y++) {
                                            if ($y == $pageno) {
                                        ?>

                                                <li class="page-item active">
                                                    <a class="btn btn-dark" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="page-item">
                                                    <a class="btn btn-dark" href="<?php echo "?page=" . ($y); ?>"><?php echo $y; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }

                                        ?>

                                        </li>
                                        <li class="page-item">
                                            <a class="btn btn-dark" href="
                                                <?php if ($pageno >= $number_of_page) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php require "footer.php" ?>
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
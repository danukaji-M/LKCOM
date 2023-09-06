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

<body>
    <div class="container-fluid">
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
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="" class="d-block w-100" alt="">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Some representative placeholder content for the second slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="..." class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
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
        <!--body-->
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
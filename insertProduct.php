<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARTLANKLA||Seller Register</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body class="bds">
    <div class="contianer-fluid">
        <div class="row">
            <?php
            require "header.php";
            ?>
            <div class="col-12">
                <div class="row justify-content-center text-center ">
                    <!--mobile menu-->
                    <!--mobile menu-->
                    <div class="d-none d-lg-block col-lg-2 border-end border-secondary">
                        <div class="row">
                            <hr>
                            <div class="col-12">
                                <a href="home.php">
                                    <img src="resources/logo1.png" alt="">
                                </a>
                            </div>
                            <div class="col-12 mx-3 text-start">
                                <span class="text-mute text-uppercase" style="color:gray;">Main</span>
                                <ul style="list-style: none;">
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView2();"> <i class="bi bi-bucket-fill"></i>&nbsp;Add product</li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView3();"> <i class="bi bi-graph-down"></i>&nbsp;Analytics </li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView4();"> <i class="bi bi-people-fill"></i>&nbsp;Customers</li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView5();"><i class="bi bi-envelope-open-heart-fill"></i>&nbsp;Reviews </li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover " onclick="changeView5();"><i class="bi bi-emoji-neutral-fill"></i>&nbsp;Complains </li>
                                </ul>
                            </div>
                            <div class="col-12 mx-3 text-start ">
                                <span class="text-mute text-uppercase" style="color:gray;">Account settings</span>
                                <ul style="list-style: none;">
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover "><a class="text-decoration-none text-dark" href=""><i class="bi bi-person-fill"></i>&nbsp;Account Settings</a></li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover "><a class="text-decoration-none text-dark" href=""><i class="bi bi-chat-heart"></i>&nbsp;FAQ</a></li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover "><a class="text-decoration-none text-dark" href=""><i class="bi bi-chat-dots-fill"></i>&nbsp;Support</a></li>
                                    <li class=" signupstart h6 mt-4 mb-2 newclasshover "><a class="text-decoration-none text-dark" href=""><i class="bi bi-box-arrow-left"></i>&nbsp;Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="row  ">
                            <div class="col-12 overflow-auto border-top text-start border-end" style="height: 90vh;">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-12  border-bottom mt-3">
                                        <span class="h1 text-capitalize">Add new product</span>
                                    </div>
                                    <div class="col-12 m-4 ">
                                        <span class="h3 text-capitalize"> base information</span>
                                    </div>
                                    <div class="col-12 mb-4 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="card-body">
                                                <label class="  form-label">title</label>
                                                <input type="text" id="title" class="form-control mb-2 color" placeholder="Enter Title Here">
                                                <label class="form-label">discription</label>
                                                <textarea name="discription" class=" form-control " id="discription" rows="5" placeholder="Enter Discription here"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="h3 mt-3 text-capitalize"> Pictures</span>
                                    <div class="col-12 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="card-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                                        </div>
                                                        <div class=" col-12">
                                                            <div class="row justify-content-center ">
                                                                <input type="file" class="d-none" id="image-uploaderm" multiple>
                                                                <input type="file" class="d-none" id="imageuploader1" />
                                                                <div class="col-2 rounded">
                                                                    <label for="imageuploader1"> <img src="resources/Placeholder.png" class="img-fluid img1" style="width: 100px;" id="i0" /></label>
                                                                </div>
                                                                <input type="file" class="d-none" id="imageuploader2" />
                                                                <div class="col-2 rounded">
                                                                    <label for="imageuploader2"><img src="resources/Placeholder.png" class="img-fluid img1" style="width: 100px;" id="i1" /></label>
                                                                </div>
                                                                <input type="file" class="d-none" id="imageuploader3" />
                                                                <div class="col-2 rounded">
                                                                    <label for="imageuploader3"><img src="resources/Placeholder.png" class="img-fluid img1" style="width: 100px;" id="i2" /></label>
                                                                </div>
                                                                <input type="file" class="d-none" id="imageuploader4" />
                                                                <div class="col-2 rounded">
                                                                    <label for="imageuploader4"><img src="resources/Placeholder.png" class="img-fluid img1" style="width: 100px;" id="i3" /></label>
                                                                </div>
                                                                <div class="col-12 text-center ">
                                                                    <label for="image-uploaderm" class="btn btn-info mt-3 ">Add your images</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="h3 mt-3 text-capitalize"> Details</span>
                                    <div class="col-12 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="" style="font-size: smaller;">price</label>
                                                        <div class="input-group">
                                                            <span class=" input-group-text" id="basic-addon">$</span>
                                                            <input type="text" id="price" placeholder="Price" aria-label="price" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="" style="font-size: smaller;">Delevery Colombo</label>
                                                        <div class="input-group">
                                                            <span class=" input-group-text" id="basic-addon">$</span>
                                                            <input type="text" id="dc" placeholder="Price" aria-label="dc" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="" style="font-size: smaller;">Delevery out of Colombo</label>
                                                        <div class="input-group">
                                                            <span class=" input-group-text" id="basic-addon">$</span>
                                                            <input type="text" id="doc" placeholder="Price" aria-label="doc" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="h3 mt-3 text-capitalize"> product Details</span>
                                    <div class="col-12 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label">Select category</label>
                                                        <select class="form-control" name="SelectOption" id="catsel">
                                                            <option value="0">Select your product category</option>
                                                            <?php
                                                            $cat_rs = Database::search("SELECT * FROM `product_category`");
                                                            $cat_num = $cat_rs->num_rows;
                                                            $sub_cat_rs = Database::search("SELECT * FROM `sub_category` ");
                                                            $sub_cat_num = $sub_cat_rs->num_rows;
                                                            for ($m = 0; $m < $cat_num; $m++) {
                                                                $cat_data = $cat_rs->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo $cat_data["cat_id"] ?>">
                                                                    <?php
                                                                    echo $cat_data["cat_name"]
                                                                    ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>

                                                        </select>


                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Select sub category</label>
                                                        <select class="form-control" name="category-select" id="subcatsel">
                                                            <option value="0">Select your product sub category</option>
                                                            <?php
                                                            for ($m = 0; $m < $sub_cat_num; $m++) {
                                                                $sub_cat_data = $sub_cat_rs->fetch_assoc();
                                                            ?>
                                                                <option value="<?php echo $sub_cat_data["sub_cat_id"] ?>"><?php echo $sub_cat_data["sub_cat_name"] ?></option>
                                                            <?php
                                                            }

                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Select Brand</label>
                                                        <select class="form-control" name="category-select" id="brandsel">
                                                            <option value="0">Select your product Brand</option>
                                                            <?php
                                                            $brand_rs = Database::search("SELECT * FROM `brand`");
                                                            $brand_num = $brand_rs->num_rows;
                                                            for ($j = 1; $j < $brand_num + 1; $j++) {
                                                                $brnd_data = $brand_rs->fetch_assoc();
                                                            ?>
                                                                <option value="<?php
                                                                                echo $brnd_data["brand_id"];
                                                                                ?>">
                                                                    <?php echo $brnd_data['brand_name']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="" class="form-label"  >Product Quantity</label>
                                                        <input class="form-control" id="qty" placeholder='product Quantity'> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="h3 mt-3 text-capitalize">select product colors</span>
                                    <div class="col-12 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <select id="clr_id" class="form-control">
                                                            <option value="0"> choose a color</option>
                                                        <?php
                                                        $color_rs = Database::search("SELECT * FROM `color`");
                                                        $color_num = $color_rs->num_rows;
                                                        for ($i = 0; $i < $color_num; $i++) {
                                                            $color_data = $color_rs->fetch_assoc();
                                                        ?>
                                                        <option value="<?php echo $color_data["color_id"]?>"> <?php echo $color_data["color"] ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="h3 mt-3 text-capitalize">Add Product features</span>
                                    <div class="col-12 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="  card-body">
                                                <label class="form-label">Add Product Specification</label>
                                                <textarea name="" id="specs" class="form-control" placeholder="if you selling clothse mannually input sizes
                                                ex-: small- size" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="h3 mt-3 text-capitalize">Payment Methods</span>
                                    <div class="col-12 text-capitalize signupstart  d-flex justify-content-center align-items-center  ">
                                        <div class="card col-10 ">
                                            <div class="  card-body">
                                                <span for="">Select Approved Payment methods</span>
                                                <ul class=" list-unstyled">
                                                    <li> <input type="checkbox" name="Card Payment" id="cpay">&nbsp;
                                                        <label for=""><i class="bi bi-credit-card-2-back-fill"></i>&nbsp;Card Payment</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="Cash On Delivery" id="cod">
                                                        &nbsp;<label for=""><i class="bi bi-cash-stack"></i>&nbsp;Cash on Delevery</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 mb-4 text-center">
                                        <button class="btn btn-info " onclick="insertProduct();" > Add your Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
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
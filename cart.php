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
        <title>CARTLANKA || CART</title>
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
                    <h2 class=" signupstart text-warning">Cart Items</h2>
                    <hr>
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-12 d-flex align-items-center justify-content-center overflow-auto  col-lg-11 border-3 border-start border-bottom border-end border-top " style="height: 70vh;">
                            <?php
                            $total = 0;
                            $didtot = 0;
                            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION['ud']['email'] . "'");
                            $cart_num = $cart_rs->num_rows;

                            if ($cart_num == 0) {
                            ?>
                                <div class="row">
                                    <div class="col text-center">
                                        <img src="resources/cart-cloud.png" class=" img-fluid" style="height: 200px;" alt="">
                                        <br>
                                        <span class="h1 fw-bold text-muted">No Cart items</span>
                                    </div>
                                </div>
                                <div class="row m-5 ">
                                    <div class="col-12 ">
                                        <div class="row">
                                            <?php
                                        } else {
                                            for ($i = 0; $i < $cart_num; $i++) {
                                                $cart_data = $cart_rs->fetch_assoc();
                                                $image_rs = Database::search("SELECT * FROM `product_img` INNER JOIN 
                                `product` ON product_img.product_id = product.id WHERE `product_id` = '" . $cart_data['product_id'] . "'");
                                                $image_data = $image_rs->fetch_assoc();
                                                $product_data = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data['product_id'] . "'")->fetch_assoc();
                                                $wdp = $product_data['price'];
                                                $total = $total+$wdp;

                                            ?>

                                                <div class="col-5 m-3 card">
                                                    <div class="row ">
                                                        <div class="col-4">
                                                            <img src="<?php echo $image_data["img_path"]; ?>" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="col-8 mt-3">
                                                            <span class="text-danger h5 fw-bold "><?php echo $image_data["title"] ?></span>
                                                            <br>
                                                            <span class="text-muted "><?php echo $image_data["discription"] ?></span>
                                                            <br>
                                                            <?php
                                                            $discount = Database::search("SELECT * FROM `discount` WHERE `product_id` = '" . $product_data["id"] . "'");
                                                            $discount_row = $discount->num_rows;
                                                            $discount_data = $discount->fetch_assoc();
                                                            if ($discount_row > 0) {

                                                                $op2 = $product_data["price"];
                                                                $dis2 = $discount_data["dis_presentage"];
                                                                $discountval = ($op2 / 100) * $dis2;
                                                                $np2 = ($op2 - (($op2 / 100) * $dis2));
                                                                $didtot = $didtot+$discountval;
                                                                if ($op2 == $np2) {
                                                                    
                                                            ?>

                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR. </span><?php echo $np2 . "<span class='text-warning'>  DIS-" . $dis2 . " % </span>" ?></span>
                                                                    <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op2 ?></h6>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <span class="text-dark font-monospace fw-bold "><span class="fw-bold text-danger ">LKR.</span><?php echo $product_data["price"] ?></span>
                                                            <?php
                                                            }
                                                            ?>
                                                            <button type="submit " class=" btn btn-warning">Buy Now</button>
                                                            <button type="submit" class=" btn btn-danger text-capitalize">remove from cart</button>
                                                        </div>
                                                    </div>


                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>

                                </div>‌
                        </div>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-2 m-5">
                            <table class="table">
                                <thead>
                                    <tr class="col">
                                        <th>
                                            item count
                                        </th>
                                        <th class=" fw-bold" ><?php echo $cart_num; ?> Items</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr class="col">
                                        <th>
                                            Full Value
                                        </th>
                                        <th class=" fw-bold" >LKR . <?php echo $total ?></th>
                                    </tr>
                                </thead>
                                ‌ <thead>
                                    <tr class="col">
                                        <th>
                                            Discount
                                        </th>
                                        <th class=" fw-bold" >LKR. <?php echo $didtot ?></th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="col">
                                            Net Value
                                        </th>
                                        <th class="fw-bolder fw-bold" >LKR. <?php echo $total - $didtot ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-5">
                            <button class="btn btn-success" >Buy Cart Now</button>
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
} else if (!isset($_SESSION["ud"])) {
    echo "<script>window.location='home.php'</script>";
}

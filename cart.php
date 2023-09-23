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
                        <div class="col-12 d-flex align-items-center justify-content-center  col-lg-11 border-3 border-start border-bottom border-end border-top " style="height: 70vh;">
                            <?php
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

                                <?php
                            } else {
                                for ($i = 0; $i < $cart_num; $i++) {
                                    $cart_data = $cart_rs->fetch_assoc();
                                    $image_rs = Database::search("SELECT * FROM `product_img` INNER JOIN 
                                `product` ON product_img.product_id = product.id WHERE `user_email` = '" . $cart_data['product_id'] . "'");
                                    $image_data = $image_rs->fetch_assoc();
                                ?>
                                    <div class="row ">
                                        <div class="col-12 align-items-end justify-content-end d-flex">
                                            <table class="table text-end align-text-bottom">
                                                <thead>
                                                    <tr>
                                                        <th scope="col-1">Net Value :</th>
                                                        <th scope="col-1">LKR.100000.00</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <hr>
                                            <button class="btn m-2 btn-success text-end">
                                                Buy
                                            </button>
                                            <button class="btn m-2 btn-danger text-end">
                                                Remove 
                                            </button>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
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

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
        <title>Cart Lanka || INVOICE</title>
    </head>

    <body>
        <div class="conainer-fluid">
            <div class="row">
                <div class="col-12">
                    <?php require "header.php"; ?>
                    <hr>
                    <div class="row justify-content-center ">
                        <div class="col-12 bg-info">
                            <div class="row">
                                <div class="col-6">
                                    <h1 class="m-3 text-uppercase signupstart">Invoice</h1>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-5 m-2">
                                            <span>mobile</span>
                                            <br>
                                            <span>Email</span>
                                        </div>
                                        <div class="col-5 m-2">
                                            <span>Adress 1</span>
                                            <br>
                                            <span>Adress 2</span>
                                            <br>
                                            <span>Adress city</span>
                                            <br>
                                            <span>Adress District</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-12">
                    <div class="row text-start ">
                        <div class="col-3 mt-4">
                            <span class="text-muted m-3">Billed To</span>
                            <br>
                            <span class="fw-bold m-3">client_adress_1</span>
                            <br>
                            <span class="fw-bold m-3">client_adress_2</span>
                            <br>
                            <span class="fw-bold m-3">city</span>
                            <br>
                            <span class="fw-bold m-3">district</span>
                            <br>
                        </div>
                        <div class="col-5 mt-4">
                            <span class="text-muted ">Invoice Id</span>
                            <br>
                            <span class="fw-bold">0000000</span>
                            <br>
                            <br>
                            <span class="text-muted">Date of issue</span>
                            <br>
                            <span class="fw-bold">DD/MM/YYYY</span>
                            <br>
                        </div>
                        <div class="col-3 mt-4 text-end">
                            <span class="text-muted">Invoice Total</span>
                            <br>
                            <span class="h3 fw-bold text-danger">LKR.10000.00 </span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="fw-bold">
            <div class="row justify-content-center ">
                <div class="col-11">
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="h5 text-danger fw-bold" scope="col">Description</th>
                                        <th class="h5 text-danger fw-bold" scope="col">Single Price</th>
                                        <th class="h5 text-danger fw-bold" scope="col">Quantity</th>
                                        <th class="h5 text-danger fw-bold" scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="fw-bold h6">Title</span>
                                            <br>
                                            <span class="text-muted">Description</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">LKR.10000.00</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">2</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">LKR.20000.00</span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-6 col-lg-2 text-end ">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-danger fw-medium "  scope="col">subtotal</th>
                                            <th scope="col">LKR.20000.00</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Discount</th>
                                            <td>LKR.5000.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Net Value</th>
                                            <td>LKR.15000.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>
<?php

} else {
    echo "<script>window.location='home.php'</script>";
}
?>
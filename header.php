<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <div class="col-12 mb-1 mt-2">
        <div class="row">
            <div class="col-12 d-none d-md-block offset-md-1 col-md-6">
                <span class="fw-bold ">Welcome</span>
                <?php
                if (isset($_SESSION["ud"])) {
                    $session_data = $_SESSION["ud"];
                ?>

                    <span class=" text-decoration-underline text-warning"><?php echo $session_data["fname"] . " " . $session_data["lname"] ?></span> ||
                    <span class="text-info fw-bold cursor" onclick="signOut();">Sign Out</span>
                <?php
                } else {
                ?>
                    <span class="text-warning fw-bold ">
                        <a href="index.php" class=" text-decoration-none">Login Or Create new Account</a>
                    </span>
                <?php
                }

                ?>
                ||
                <span class="fw-bold">Help & Contact</span>
            </div>
            <div class="col-12 col-md-4 offset-lg-1 ">
                <div class="row">
                    <div class="col-3 align-items-start text-start ">
                        <span class="fw-bold">SELL</span>
                    </div>
                    <div class="col-3 align-items-start text-start">
                        <img src="resources/cart.svg" alt="" class="cart-icon" srcset="">
                    </div>
                    <div class="col-2 align-items-start text-start ">
                        <span class="fw-bold">Watch list </span>
                    </div>
                    <div class="col-4 align-items-end text-start">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                CartLanka.Com
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button"><a class=" text-decoration-none text-dark" href="">My Account</a></button></li>
                                <li><button class="dropdown-item" type="button"><a class=" text-decoration-none text-dark" href="">My Account</a></button></li>
                                <li><button class="dropdown-item" type="button"><a class=" text-decoration-none text-dark" href="">My Account</a></button></li>
                                <li><button class="dropdown-item" type="button"><a class=" text-decoration-none text-dark" href="">My Account</a></button></li>
                                <li><button class="dropdown-item" type="button"><a class=" text-decoration-none text-dark" href="">My Account</a></button></li>
                                <li><button class="dropdown-item" type="button"><a class=" text-decoration-none text-dark" href="">My Account</a></button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
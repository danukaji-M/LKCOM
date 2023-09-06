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
            <div class="col-12">
                <div class="row">
                            <div id="saved-items" class="col-1 text-warning cursor border-bottom text-center">
                                <span class="fw-bold mb-3">Saved Items <i class="bi bi-heart-fill"></i></span>
                            </div>
                            <div id="item-2" class="col-1 text-warning cursor border-bottom text-center">
                                <span class="fw-bold mb-3">Category-2</span>
                            </div>
                            <div id="myDiv1" data-value="1" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-1</span>
                            </div>
                            <div id="myDiv2" data-value="2" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-2</span>
                            </div>
                            <div id="myDiv3" data-value="3" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-3</span>
                            </div>
                            <div id="myDiv4" data-value="4" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-4</span>
                            </div>
                            <div id="myDiv5" data-value="5" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-5</span>
                            </div>
                            <div id="myDiv6" data-value="6" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-6</span>
                            </div>
                            <div id="myDiv7" data-value="7" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-7</span>
                            </div>
                            <div id="myDiv8" data-value="8" class="col-1 border-bottom text-center">
                                <span class="fw-bold mb-3">Category-8</span>
                            </div>
                            <div id="item3" class="col-1 text-warning border-bottom cursor text-center">
                                <span class="fw-bold mb-3">Category-11</span>
                            </div>
                            <div id="item4" class="col-1 text-warning border-bottom cursor text-center">
                                <span class="fw-bold mb-3">Category-12</span>
                            </div>
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
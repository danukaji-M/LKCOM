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
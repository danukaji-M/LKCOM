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
        <title>CART LANKA || WATCHLIST</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="font.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    require "header.php";
                    require "search.php";
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-10 border-start border-end">
                            <span class="fw-bold text-start h2" >WATCHLIST</span>
                            <h6 class="text-end" ><a href=""><?php echo $_SESSION["ud"]['fname']; ?></a></h6>
                            <hr>
                            <div class="row d-flex align-items-center justify-content-center overflow-auto   text-center" style="height:70vh;">
                                <div class="col-12">
                                    <?php
                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` INNER JOIN `product` ON 
                                    `product`.`id`=`watchlist`.`product_id` INNER JOIN `product_img` ON 
                                    `product_img`.`product_id`=`product`.`id`");
                                    $watchlist_num = $watchlist_rs->num_rows;
                                    if ($watchlist_num == 0) {
                                        ?>
                                        <div class="row d-flex justify-content-center text-center align-items-center">
                                            <div class="col-12">
                                                <img src="resources/watchlist.png" style="height: 15vh;" alt="">
                                                <h1 class="text-mute" style="color: gray;" >You have no items in your Watchlist.</h1>
                                                <span class="text-mute" style="color: gray;">Start adding items to your Watchlist today! Simply tap ‘Add to watchlist’ next to the item you want to keep a close eye on.</span>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        for ($i=0; $i < $watchlist_num; $i++) { 
                                            $watchlist_data= $watchlist_rs->fetch_assoc();
                                            ?>
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <div class="col-12 col-lg-5 card">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img src="<?php echo $watchlist_data["img_path"]; ?>" />
                                                        
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require "footer.php" ;?>
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
    echo "<script>window.locaion = 'home.php'</script>";
}

?>
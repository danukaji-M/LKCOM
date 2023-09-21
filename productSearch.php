<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products || CARTLANKA.COM</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            require "connection.php";
            require "header.php";
            require "search.php"
            ?>
            <div class="col-12 ">
                <div class="row">
                    <div class="col-4 border-end border-bottom border-top ">
                        <input type="radio" name="sort" id="maxtomin">
                        <label for="maxtomin">Max Price To Min Price</label>
                        <br>
                        <input type="radio" name="sort" id="mintomax">
                        <label for="maxtomin">Min Price To Max Price</label>
                    </div>
                    <div class="col-4 border-end border-bottom border-top ">
                        <input type="radio" name="sort1" id="maxtomind">
                        <label for="maxtomin">Max delevery fee to min</label>
                        <br>
                        <input type="radio" name="sort1" id="mintomaxd">
                        <label for="maxtomin">Min delevery fee To Max </label>
                    </div>
                    <div class="col-4 border-end border-bottom border-top ">
                        <input type="radio" name="sort2" id="maxtominq">
                        <label for="maxtomin">Max Quantity To Min </label>
                        <br>
                        <input type="radio" name="sort2" id="mintomaxq">
                        <label for="maxtomin">Min Quantity To Max </label>
                        <button class="btn mx-5 btn-info" onclick="sSort();" style="height: 30px; font-size:15px;">Sort</button>
                    </div>
                </div>
            </div>
            <div id="sort" class=" mt-5 col-12">
                <div class="row mt-2">
                    <div class="col-12 col-lg-6">
                        <div class="row justify justify-content-center">
                            <div class="card col-11 col-lg-11">
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="resources/product/example_pro_1.jpg" style="height: 12rem;" class=" img-fluid" alt="">
                                        </div>
                                        <div class="col-9">
                                            <span class="h5 fw-bold text-dark link-underline ">Title</span>
                                            <br>
                                            <span class="h6 text-muted">Descripton</span>
                                            <p class="text-warning h6">Discount</p>
                                            <p class="text-danger">Price</p>
                                            <button type="button" class="btn btn-success">Buy Now</button>
                                            <button type="submit" class="btn btn-info">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mt-5 text-center justify-content-center">
                    <div class=" col-1">
                        <ul class=" pagination">
                            <li class=" page-item">
                                <a href="#" class=" btn btn-dark">&lt;&lt; </a>
                            </li>
                            <li class=" page-item">
                                <a href="#" class=" btn btn-dark">1</a>
                            </li>
                            <li class=" page-item">
                                <a href="#" class=" btn btn-dark">2</a>
                            </li>
                            <li class=" page-item">
                                <a href="#" class=" btn btn-dark">&gt;&gt;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
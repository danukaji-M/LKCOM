<?php
session_start();
require "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARTLANA || ADVANCED SEARCH</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "header.php"; ?>
            <div class="col-12">
                <h3 style="text-align:center;">ADVANCED SEARCH</h3><br/>
                <div class="row justify-content-center">
                    <div class="col-12 card col-md-10">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="search">Search Text</label>
                                <input class="form-control" id="text" type="text" placeholder="Search Text" >
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="category-search">
                                    Category Search :
                                </label>
                                <input type="text" id="category-search" placeholder="Search With Category" class="form-control">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="seller-search">
                                    Seller Search :
                                </label>
                                <input type="text" id="seller-search" placeholder="Search With Seller" class="form-control">
                            </div>
                            <div class="col-12 mt-4 mb-4">
                            <span class="fw-bold h3">Sort Process</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <h4>Sort With Price</h4>
                                <input type="radio" id="lth" name="price_sort" >
                                <label class="fw-bold text-capitalize text-danger " >Low To High</label>
                                <br>
                                <input type="radio" id="htl" name="price_sort" >
                                <label class="fw-bold text-capitalize text-danger " for="htl">High To Low</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <h4>Sort With Date</h4>
                                <input type="radio" id="nto" name="date_sort" >
                                <label class="fw-bold text-capitalize text-danger " >new to old</label>
                                <br>
                                <input type="radio" id="otn" name=date_sort" >
                                <label class="fw-bold text-capitalize text-danger " for="htl">old to new</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <h4>Sort With Most Sell</h4>
                                <input type="radio" id="slth" name="sell_sort" >
                                <label class="fw-bold text-capitalize text-danger " >Selling Low To High</label>
                                <br>
                                <input type="radio" id="shtl" name="sell_sort" >
                                <label class="fw-bold text-capitalize text-danger " for="htl">Selling High To Low</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <h4>Sort With Shipping Cost</h4>
                                <input type="radio" id="sclth" name="price_sort" >
                                <label class="fw-bold text-capitalize text-danger " >Shipping Low To High</label>
                                <br>
                                <input type="radio" id="schtl" name="price_sort" >
                                <label class="fw-bold text-capitalize text-danger " for="htl">Shipping High To Low</label>
                            </div>
                        </div>
                        <div class="col-12 mt-5 mb-5">
                            <button onclick="advancedSearch(0);" class="btn btn-primary" >Search</button>
                            <button class="btn btn-success" onclick="clear();" > Clear</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function clear(){
            window.location.reload();
        }
    </script>
    <script src="script.js"></script>
</body>
</html>

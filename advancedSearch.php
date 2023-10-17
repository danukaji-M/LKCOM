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
                                <select name="" class="form-control" id="seller-search">
                                    <option value="0">Select a Brand...</option>
                                    <?php 
                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                    $brand_num = $brand_rs->num_rows;
                                    for ($i=0; $i < $brand_num; $i++) { 
                                        $brand_obj = $brand_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $brand_obj['brand_id']?>"><?php echo $brand_obj['brand_name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
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
                                <h4>Sort With Most Sell</h4>
                                <input type="radio" id="nto" name="nto" >
                                <label class="fw-bold text-capitalize text-danger " >New To Old</label>
                                <br>
                                <input type="radio" id="otn" name="nto" >
                                <label class="fw-bold text-capitalize text-danger " for="htl">Old To New</label>
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

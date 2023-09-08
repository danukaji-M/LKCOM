<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <div class="col-12 mt-2 mb-2 ">
        <div class="row  ">
            <div class="col-12">
                <div class="row">
                    <div class="col-1 offset-lg-1 d-none d-md-block col-lg-1 align-items-end">
                        <img src="resources/logo1.png" alt="" class="logo1" srcset="">
                    </div>
                    <div class="col-1 d-none d-lg-block">
                        <span class="text-info" >Shop With category</span>
                    </div>
                    <div class=" col-9 col-md-8 offset-1 offset-lg-0 col-lg-7 ">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" placeholder="Search Your Product" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <?php
                                $datab_rs = Database::search("SELECT * FROM `product_category`");
                                $numrows = $datab_rs->num_rows;
                                for ($n=0; $n < $numrows; $n++) { 
                                    $datadd = $datab_rs->fetch_assoc();
                                    ?>
                                    <li><a class="dropdown-item" href="#"><?php echo $datadd['cat_name']; ?></a></li>
                                    <?php
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 offset-1 offset-lg-0 col-md-2 align-items-sm-center col-lg-1 align-items-md-start text-md-start">
                        <button class="btn btn-primary" type="button">Search <i class="bi bi-search"></i></button>
                    </div>
                    <div class="col-5 col-md-2 col-lg-1 align-items-start text-start">
                        <button class="btn btn-info" type="button">Advanced <i class="bi bi-search"></i> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</body>

</html>
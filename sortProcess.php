<?php
session_start();
require "connection.php";

$email = $_SESSION["ud"]["email"];

$search = $_POST["text"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$status = $_POST["status"];
$time = $_POST["time"];

$query = "SELECT * FROM `product` WHERE `user_email` = '" . $email . "' ";

if (!empty($search)) {
    $query .= " AND `title` LIKE '%" . $search . "%'";
}
if ($status != 0) {
    if ($status == "1") {
        $query .= " AND `product_status_id` = '1'";
    } else if ($status == "2") {
        $query .= " AND `product_status_id` = '2'";
    }
    if ($qty != "0") {
        if ($qty == "1") {
            $query .= " ORDER BY `qty` DESC";
        } else if ($qty == "2") {
            $query .= " ORDER BY `qty` ASC";
        }
    }
    if ($time != "0") {
        if ($time = "1") {
            $query .= " ORDER BY `product_added_date` DESC";
        } else if ($time = "2") {
            $query .= " ORDER BY `product_added_date` ASC";
        }
    }
    if ($price != "0") {
        if ($price == "1") {
            $query .= " ORDER BY `price` DESC";
        } else if ($price == "2") {
            $query .= " ORDER BY `price` ASC";
        }
    }
}
?>
<div class="offset-1 col-10 text-center">
    <div class="row justify-content-center">

        <?php

        if ("0" != $_POST["page"]) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 4;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " 
                                            OFFSET " . $page_results . " ");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

        ?>

            <!-- card -->
            <div class="card mb-3 mt-3 col-12 col-lg-6">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <?php

                        $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                                                            `product_id`='" . $selected_data["id"] . "'");
                        $product_img_data = $product_img_rs->fetch_assoc();

                        ?>

                        <img src="<?php echo $product_img_data["img_path"]; ?>" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo $selected_data["title"]; ?></h5>
                            <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />
                            <span class="card-text fw-bold text-success"><?php echo $selected_data["qty"]; ?> Items left</span>
                            <p class="<?php
                                                            if ($selected_data["product_status_id"] == "1") {
                                                            ?>
                                                                    text-success fw-bold
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    text-danger fw-bold
                                                                    <?php
                                                                }
                                                                    ?>">
                                                    <?php
                                                    if ($selected_data["product_status_id"] == "1") {
                                                    ?>
                                                        Your Product Is Activated
                                                    <?php
                                                    } else {
                                                    ?>
                                                        Your Product Is Disabled
                                                    <?php
                                                    }
                                                    ?>
                                                </p>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-1">
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-info fw-bold">Update Product</button>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                        <span class="<?php
                                                                if ($selected_data["product_status_id"] == "1") {
                                                                ?>
                                                                    btn btn-success
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    btn btn-dark
                                                                    <?php
                                                                }
                                                                    ?>" onclick='update(<?php echo $selected_data["id"]; ?> );' id="statusOpen<?php echo $selected_data["id"] ?>"><?php
                                                                                                                                                                                if ($selected_data["product_status_id"] == "1") {
                                                                                                                                                                                ?>
                                                        Deactivate Product
                                                    <?php
                                                                                                                                                                                } else {
                                                    ?>
                                                        Activate Product
                                                    <?php
                                                                                                                                                                                }
                                                    ?></span>
                                        </div>
                                        <div class="col-6">
                                                <span class="btn cursor btn-danger" id="deleteOpen<?php echo $selected_data['id']; ?>" onclick="deleteProduct(<?php echo $selected_data['id']; ?>);">Delete</span>
                                                <button class="btn cursor btn-warning" id="discountOpen<?php echo $selected_data['id']; ?>" onclick="DiscountAdd(<?php echo $selected_data['id']; ?>);">Discount</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->

        <?php
        }

        ?>



    </div>
</div>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="btn btn-dark" <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    ?>
                                                    onclick="sort(<?php echo ($pageno - 1) ?>);"
                                                    <?php
                                                } ?>
                                                aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($y = 1; $y <= $number_of_pages; $y++) {
                if ($y == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="btn btn-dark" onclick="sort(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="btn btn-dark" onclick="sort(<?php echo ($y); ?>);"><?php echo $y; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="btn btn-dark" <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    ?>
                                                    onclick="sort(<?php echo ($pageno + 1) ?>);"
                                                    <?php
                                                } ?>
                                                aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
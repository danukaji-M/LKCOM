<?php
session_start();
require "connection.php";

$stext = $_GET["text"];
$cat = $_GET["catid"];
$pageno = 0;

$query = "SELECT * FROM `product` ";
if (!empty($stext) && $cat == 0) {

    $query .= " WHERE `title` LIKE '%" . $stext . "%' OR `discription` LIKE '%" . $stext . "%'";
} elseif (empty($text) && $cat != 0) {
    $query .= " INNER JOIN `sub_category` ON sub_category.sub_cat_id = product.sub_category_sub_cat_id 
            INNER JOIN `product_category` ON product_category.cat_id = sub_category.product_category_id
            WHERE `cat_id` = '" . $cat . "'";
} elseif (!empty($stext) && $cat != 0) {
    $query .= " INNER JOIN `sub_category` ON sub_category.sub_cat_id = product.sub_category_sub_cat_id 
            INNER JOIN `product_category` ON product_category.cat_id = sub_category.product_category_id
            WHERE `cat_id` = '" . $cat . "' AND `title` LIKE '%" . $stext . "%'";
}
?>
<div class="offset-1 col-10 text-center">
    <div class="row justify-content-center">

        <?php

        if ("0" != $_GET["pageno"]) {
            $pageno = $_GET["pageno"];
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
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $selected_data["id"]; ?>" onchange="changeStatus(<?php echo $selected_data['id']; ?>);" <?php if ($selected_data["product_status_id"] == 2) { ?> checked <?php } ?> />
                                <label class="form-check-label fw-bold text-info" for="<?php echo $selected_data["id"]; ?>">
                                    <?php if ($selected_data["product_status_id"] == 2) { ?>
                                        Activate Product
                                    <?php } else {
                                    ?>
                                        Deactivate Product
                                    <?php
                                    } ?>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row g-1">
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-success fw-bold">Update</button>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-danger fw-bold">Delete</button>
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
                                        ?> onclick="sort(<?php echo ($pageno - 1) ?>);" <?php
                                                                                    } ?> aria-label="Previous">
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
                                        ?> onclick="sort(<?php echo ($pageno + 1) ?>);" <?php
                                                                                    } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
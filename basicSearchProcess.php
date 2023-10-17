<?php
require "connection.php";
$text = $_GET['text'];
$sest = $_GET['sest'];
$cat = $_GET['cat'];
$no = $_GET['no'];

$query = "SELECT * FROM `product` INNER JOIN `sub_category` ON `sub_category`.`sub_cat_id` = `product`.`sub_category_sub_cat_id` 
            INNER JOIN `product_category` ON `product_category`.`cat_id`=`sub_category`.`product_category_id` 
            INNER JOIN `cat_clicks` ON `cat_clicks`.`product_category_cat_id` = `product_category`.`cat_id` 
INNER JOIN `brand` ON `brand`.`brand_id`=`product`.`brand_brand_id` 
INNER JOIN `brand_click` ON `brand_click`.`brand_brand_id`=`brand`.`brand_id`
INNER JOIN `click_products` ON `click_products`.`product_id` = `product`.`id`  ";
echo $sest;
if ($sest == 2) {
    $query .= " WHERE `title` LIKE '%" . $text . "%' AND `product_status_id`='1'  
    ORDER BY `click_count` DESC, `cat_click_count` DESC , `brand_click_count` DESC";
} elseif ($sest == 1) {
    $query .= " WHERE `cat_id` = '" . $cat . "' AND `product_status_id`='1' 
    ORDER BY `click_count` DESC, `cat_click_count` DESC , `brand_click_count` DESC";
} elseif ($sest == 3) {
    $query .= " WHERE  `title` LIKE '%" . $text . "%' OR `cat_id` = '" . $cat . "' AND `product_status_id`='1' 
    ORDER BY `click_count` DESC, `cat_click_count` DESC , `brand_click_count` DESC";
}
?>
<section style="background-color: #eee;">
    <div class="text-center container py-5">
        <h4 class="mt-4 mb-5"><strong>Bestsellers</strong></h4>

        <div class="row">
            <?php
            if ("0" != $no) {
                $no = $_GET['no'];
            } else {
                $no = 1;
                $product_rs = Database::search($query);
                $product_num = $product_rs->num_rows;
                $results_per_page = 8;
                $lastPage = ceil($product_num / $results_per_page);
                $page_results = ($no - 1) * $results_per_page;
                $search_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . " ");
                $search_num = $search_rs->num_rows;
                for ($i = 0; $i < $search_num; $i++) {
                    $search_data = $search_rs->fetch_assoc();
                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $search_data['id'] . "'");
                    $image_data = $image_rs->fetch_assoc();
            ?>
                    <div onclick="productclick(<?php
                                                if (!isset($_COOKIE['product' . $search_data['id']])) {
                                                    echo $search_data['id'];
                                                } else {
                                                    echo 0;
                                                }
                                                ?>) , brandclick(
                                                                                                <?php
                                                                                                if (!isset($_COOKIE['brand' . $search_data['brand_id']])) {
                                                                                                    echo $search_data['brand_id'];
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }

                                                                                                ?>
                                                                                            )  , catogoryclick(<?php
                                                                                                                if (isset($_COOKIE['category' . $search_data['cat_id']])) {
                                                                                                                    echo (0);
                                                                                                                } else {
                                                                                                                    echo $search_data['cat_id'];
                                                                                                                }
                                                                                                                ?>) ,  singleload(<?php echo $search_data['id']; ?>);" class="col-lg-4  col-md-12 mb-4">
                        <div class="card cursor">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="<?php echo $image_data['img_path']; ?>" style="height: 13rem;" class="w-50" />
                                <a href="#!">
                                    <div class="mask">
                                        <div class="d-flex justify-content-start align-items-end h-100">
                                            <h5><span class="badge bg-primary ms-2">New</span></h5>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <a onclick="" class="text-reset">
                                    <h5 class="card-title mb-3"><?php echo $search_data['title'] ?></h5>
                                </a>
                                <?php
                                $discount = Database::search("SELECT * FROM `discount` WHERE `product_id` = '" . $search_data["id"] . "'");
                                $discount_row = $discount->num_rows;
                                $discount_data = $discount->fetch_assoc();
                                if ($discount_row > 0) {

                                    $op2 = $search_data["price"];
                                    $dis2 = $discount_data["dis_presentage"];
                                    $np2 = ($op2 - (($op2 / 100) * $dis2));
                                    if ($op2 == $np2) {
                                ?>

                                    <?php
                                    } else {
                                    ?>
                                        <span class="text-dark font-monospace fw-bold "><span class="fw-bold ">LKR. </span><?php echo $np2 . "<span class='text-warning'>  DIS-" . $dis2 . " % </span>" ?></span>
                                        <h6 class="text-danger text-muted text-decoration-line-through">LKR. <?php echo $op2 ?></h6>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <span class="text-dark font-monospace fw-bold "><span class="fw-bold  ">LKR.</span><?php echo $search_data["price"] ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<div class="col-12">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" <?php if ($no <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($no - 1) ?>);" <?php
                                                                                        } ?> tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <?php

            for ($y = 1; $y <= $lastPage; $y++) {
                if ($y == $no) {
            ?>
                    <li class="page-item"><a class="page-link" onclick="basicSearch(<?php echo ($y) ?>);" href="#"><?php echo $y ?></a></li>
                <?php
                } else {
                ?>
                    <li class="page-item"><a onclick="basicSearch(<?php echo ($y) ?>);" class="page-link" href="#"><?php echo $y ?></a></li>
            <?php }
            } ?>
            <li class="page-item">
                <a class="page-link" <?php if ($no >= $lastPage) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($no + 1) ?>);" <?php } ?> href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
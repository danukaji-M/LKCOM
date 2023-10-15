<?php
$text = $_POST['text'];
$category = $_POST['category'];
$seller = $_POST['seller'];
$lth = $_POST['lth'];
$htl = $_POST['htl'];
$nto = $_POST['nto'];
$otn = $_POST['otn'];
$slth  = $_POST['slth'];
$shtl = $_POST['shtl'];
$sclth = $_POST['sclth'];
$schtl = $_POST['schtl'];
$status = 0;
$query = " SELECT *
FROM `product`
INNER JOIN `click_products` ON `click_products`.`product_id` = `product`.`id`
INNER JOIN `sub_category` ON `sub_category`.`sub_cat_id`=`product`.`sub_category_sub_cat_id`
INNER JOIN `product_category` ON `product_category`.`cat_id` = `sub_category`.`product_category_id`
INNER JOIN `cat_clicks` ON `cat_clicks`.`product_category_cat_id` = `product_category`.`cat_id` 
INNER JOIN `brand` ON `brand`.`brand_id`=`product`.`brand_id` 
INNER JOIN `brand_click` ON `brand_click`.`brand_brand_id`=`brand`.`brand_id`
WHERE  `product_status_id`='1' AND `title` = '".$text."'";
if ($lth == "true" && $htl == "false") {
    $query .= " ORDER BY `price` ACS ";
    $status =1;
}
if($lth == "false" && $htl  == "true"){
    $query.=" ORDER BY price DESC ";
    $status = 2;
}
if($nto == "true" && $otn == "false"){
    $query.= " ORDER BY `product_added_date` ASC ";
    $status = 3;
}
if($nto == "false" && $otn=="true"){
    $query.= "ORDER BY product_added_date DESC";
    $status = 4;
}




if ($category === null && $seller === null) {
}
if ($category != null && $seller === null) {
}
if ($category != null && $seller != null) {
}

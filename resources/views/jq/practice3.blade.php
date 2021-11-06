<?php
 
$post_tax_price = 0;
$tax_rate = 1.10;
 
if (isset($_GET['price'])) {
    $post_tax_price = (float)($_GET['price']) * $tax_rate;
}
if (isset($_POST['price'])) {
    $post_tax_price = (float)($_POST['price']) * $tax_rate;
}
 
$json = array(
    array('post_tax_price' => $post_tax_price),
);
 
header("Content-Type: text/javascript; charset=utf-8");
echo json_encode($json); 
exit();
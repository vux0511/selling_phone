<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    if (isset($_POST['search'])) {
        $key = $_POST['key'];
        $sql = "SELECT * FROM product WHERE name_product LIKE '%$key%' OR new_price_product LIKE '%$key%'";
        $searchProduct = selectAll($sql);
        $product_category = loadCategory();
        require_once ('view/public/layout/header.php');
        require_once ('view/public/layout/search.php');
        require_once ('view/public/layout/footer.php');
    } else {
        echo "Lỗi";
    }
?>

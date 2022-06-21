<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    switch ($act) {
        default:
            $topproduct = loadTopProduct();
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/slider.php');
            require_once ('view/public/layout/banner.php');
            require_once ('view/public/layout/top-product.php');
            require_once ('view/public/layout/banner2.php');
            $category = loadCategory();
            require_once ('view/public/layout/tab-product.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>
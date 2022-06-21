<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    switch ($act) {
        case 'search': {
            require_once ('view/public/layout/header.php');
            if (isset($_POST['search'])) {
                $key = $_POST['key'];
                $searchProduct = searchProduct($key);
            } else {
                $product_category = loadCategory();
                require_once ('view/public/layout/header.php');
                require_once ('view/public/layout/product.php');
                require_once ('view/public/layout/footer.php');
            }
            break;
        }
        default:
            $product_category = loadCategory();
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/product.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>
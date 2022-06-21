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
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                // Cập nhật lượt xem
                $sql = "UPDATE product SET view = view+1 WHERE id_product = '$id_product'";
                $updateView = execute($sql);
                // load sản phẩm chi tiết
                $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
                $loadDetail = loadDetail($sql);
            }

            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/detail.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>
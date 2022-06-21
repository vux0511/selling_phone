<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';



    switch ($act) {
        case 'delete_cart':
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                unset($_SESSION['my_cart'][$id_product]);
                header('location:index.php?controller=cart');
            }
        break;

        case 'order_complete':
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/order_complete.php');
            require_once ('view/public/layout/footer.php');
        break;

        default:
            require_once ('view/public/layout/header.php');
            if (isset($_COOKIE['login'])) {
                $user = $_COOKIE['login'];
                $sql = "SELECT * FROM user WHERE user = '$user'";
                $select_id_user = selectOne($sql);
                $id_user =  $select_id_user['id_user'];
                $sql = "SELECT * FROM bill WHERE id_user = ''";
                $bill = SelectAll($sql);
            }


            require_once ('view/public/layout/cart_order.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>

<!-- <p style="text-align: center;"></p> -->
<!--
<h5 style='color: red; font-size='16px';text-align: center;>Lỗi : Không được để trống</h5>"
<h5 style="color: red; font"></h5> -->

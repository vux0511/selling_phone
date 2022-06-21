<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';
    switch ($act) {

        case 'delete': {
            if (isset($_GET['id_bill'])) {
                $id_bill = $_GET['id_bill'];

                $sql = "DELETE FROM bill WHERE id_bill = $id_bill";
                if (execute($sql)) {
                    header('location: index.php?controller=cart');
                } else {
                    $thongbao = "<h6 style='color: green;'>Xóa thất bại</h6>";
                }
            }
        }

        break;
        case 'detail_bill': {
            if (isset($_GET['id_bill'])) {
                $id_bill = $_GET['id_bill'];

                $sql = "SELECT * FROM bill1 WHERE id_bill = '$id_bill'";
                $selectDetailBill = selectAll($sql);
            }

            if (isset($_POST['update'])) {
                if ($_GET['id_bill']) {
                    $id_bill = $_GET['id_bill'];
                }
                $status = $_POST['status'];

                $sql = "UPDATE bill SET status = '$status' WHERE id_bill = $id_bill";

                if (execute($sql)) {
                    $thongbao = "<h6 style='color: green;'>Cập nhật thành công</h6>";
                    header('location: index.php?controller=cart');
                } else {
                    $thongbao = "<h6 style='color: green;'>Cập nhật thất bại</h6>";
                }

            }
            require_once ('./view/cart/detail_bill.php');
            break;
        }
        default:
            $sql = "SELECT * FROM bill ORDER BY id_bill DESC ";
            $selectCart = selectCart($sql);
            require_once ('./view/cart/list_cart.php');
            break;
    }
?>
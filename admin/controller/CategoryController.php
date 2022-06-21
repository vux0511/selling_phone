<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';
    switch ($act) {
        case 'add_category': {
            if (isset($_POST['add_category'])) {
                $name_category = $_POST['name_category'];

                if ($name_category != '') {
                    $sql = "INSERT INTO category (name_category) VALUES ('$name_category')";
                    if (execute($sql)) {
                        $thongbao = "<h6 style='color: green;'>Thêm thành công</h6>";
                    } else {
                        $thongbao = "<h6 style='color: green;'>Thêm thất bại</h6>";
                    }
                } else {
                    $error = "<h6 style='color: green;'>Không được bỏ trống</h6>";
                }
            }
            include ('./view/category/add_category.php');
            break;
        }
        case 'edit_category': {
            if (isset($_GET['id_category'])) {
                $id_category = $_GET['id_category'];

                $sql = "SELECT * FROM category WHERE id_category = '$id_category'";
                $edit_category = selectOne($sql);

                if (isset($_POST['edit_category'])) {
                    $name_category = $_POST['name_category'];

                    if ($name_category != '') {
                        $sql = "UPDATE category SET name_category = '$name_category' WHERE id_category = $id_category";
                        if (execute($sql)) {
                            header('location: ?controller=category');
                        } else {
                            $thongbao = "<h6 style='color: green;'>Sửa thất bại</h6>";
                        }
                    } else {
                        $error = "<h6 style='color: green;'>Không được bỏ trống</h6>";
                    }
                }
            }
            require_once ('./view/category/edit_category.php');
            break;
        }
        case 'list_category': {
            $sql = "SELECT * FROM category";
            $data_category = selectAll($sql);
            require_once ('./view/category/list_category.php');
            break;
        }
        case 'delete_category': {
            if (isset($_GET['id_category'])) {
                $id_category = $_GET['id_category'];

                $sql = "DELETE FROM category WHERE id_category = $id_category";
                if (execute($sql)) {
                    header('location: ?controller=category');
                } else {
                    $thongbao = "<h6 style='color: green;'>Xóa thất bại</h6>";
                }
            }
        }
        default:
            $sql = "SELECT * FROM category";
            $data_category = selectAll($sql);
            require_once ('./view/category/list_category.php');
            break;
    }
?>
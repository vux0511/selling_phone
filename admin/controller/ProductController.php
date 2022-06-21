<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    switch ($act) {
        case 'add_product': {
            if (isset($_POST['add_product'])) {
                $name_product = $_POST['name_product'];
                $id_category = $_POST['id_category'];
                $quantity_product = $_POST['quantity_product'];
                $old_price_product = $_POST['old_price_product'];
                $new_price_product = $_POST['new_price_product'];
                $info_product = $_POST['info_product'];
                $screen = $_POST['screen'];
                $type = $_POST['type'];
                $front_camera = $_POST['front_camera'];
                $rear_camera = $_POST['rear_camera'];
                $cpu = $_POST['cpu'];
                $ram = $_POST['ram'];
                $rom = $_POST['rom'];
                $sdcard = $_POST['sdcard'];
                $battery = $_POST['battery'];

                $image_product = $_FILES['image_product']['name'];
                $images_2 = $_FILES['images_2']['name'];
                $images_3 = $_FILES['images_3']['name'];
                $images_4 = $_FILES['images_4']['name'];

                if ($name_product != '' && $id_category != '' && $quantity_product != '' && $old_price_product != '' && $new_price_product != '' && $image_product != '' && $images_2 != '' && $images_3 != '' && $images_4 != '') {
                    $target_dir = "../view/images/product/";
                    $target_file = $target_dir . basename($_FILES["image_product"]["name"]);
                    $target_file2 = $target_dir . basename($_FILES["images_2"]["name"]);
                    $target_file3 = $target_dir . basename($_FILES["images_3"]["name"]);
                    $target_file4 = $target_dir . basename($_FILES["images_4"]["name"]);
                    move_uploaded_file($_FILES["image_product"]["tmp_name"], $target_file);
                    move_uploaded_file($_FILES["images_2"]["tmp_name"], $target_file2);
                    move_uploaded_file($_FILES["images_3"]["tmp_name"], $target_file3);
                    move_uploaded_file($_FILES["images_4"]["tmp_name"], $target_file4);

                    $sql = "INSERT INTO product (name_product,id_category,quantity_product,old_price_product,new_price_product,info_product,image_product,images_2,images_3,images_4,screen,type,front_camera,rear_camera,cpu,ram,rom,sdcard,battery) VALUES ('$name_product', '$id_category', '$quantity_product', '$old_price_product', '$new_price_product', '$info_product', '$image_product', '$images_2', '$images_3', '$images_4', '$screen', '$type', '$front_camera', '$rear_camera', '$cpu', '$ram', '$rom', '$sdcard', '$battery')";
                    if (execute($sql)) {
                        $thongbao = "<h6 style='color: green;'>Thêm thành công</h6>";
                    } else {
                        $thongbao = "<h6 style='color: green;'>Thêm thất bại</h6>";
                    }
                } else {
                    $error = "<h6 style='color: red; font-size='16px'>Không được để rỗng !</h6>";
                }
            }
            // Lấy SELECT OPTION CATEGORY cho View
            $sql = "SELECT * FROM category";
            $data_category = selectAll($sql);
            include('./view/product/add_product.php');
            break;
        }
        case 'edit_product': {
            if (isset($_POST['edit_product'])) {
                $id_product = $_GET['id_product'];
                $name_product = $_POST['name_product'];
                $id_category = $_POST['id_category'];
                $quantity_product = $_POST['quantity_product'];
                $old_price_product = $_POST['old_price_product'];
                $new_price_product = $_POST['new_price_product'];
                $info_product = $_POST['info_product'];

                $screen = $_POST['screen'];
                $type = $_POST['type'];
                $front_camera = $_POST['front_camera'];
                $rear_camera = $_POST['rear_camera'];
                $cpu = $_POST['cpu'];
                $ram = $_POST['ram'];
                $rom = $_POST['rom'];
                $sdcard = $_POST['sdcard'];
                $battery = $_POST['battery'];

                $image_product = $_FILES['image_product']['name'];
                $images_2 = $_FILES['images_2']['name'];
                $images_3 = $_FILES['images_3']['name'];
                $images_4 = $_FILES['images_4']['name'];

                if ($name_product != '' || $id_category != '' || $quantity_product != '' || $old_price_product != '' || $new_price_product != '') {

                    $target_dir = "../view/images/product/";

                    $target_file = $target_dir . basename($_FILES["image_product"]["name"]);
                    $target_file2 = $target_dir . basename($_FILES["images_2"]["name"]);
                    $target_file3 = $target_dir . basename($_FILES["images_3"]["name"]);
                    $target_file4 = $target_dir . basename($_FILES["images_4"]["name"]);
                    move_uploaded_file($_FILES["image_product"]["tmp_name"], $target_file);
                    move_uploaded_file($_FILES["images_2"]["tmp_name"], $target_file2);
                    move_uploaded_file($_FILES["images_3"]["tmp_name"], $target_file3);
                    move_uploaded_file($_FILES["images_4"]["tmp_name"], $target_file4);

                    if ($image_product != '' && $images_2 != '' && $images_3 != '' && $images_4 != '') {
                        $sql = "UPDATE product SET id_category ='$id_category',quantity_product='$quantity_product',name_product='$name_product',image_product='$image_product',old_price_product='$old_price_product',new_price_product='$new_price_product',info_product='$info_product',
                        images_2='$images_2',images_3='$images_3',images_4='$images_4',screen='$screen',type='$type',front_camera='$front_camera',rear_camera='$rear_camera',cpu='$cpu',ram='$ram',rom='$rom',sdcard='$sdcard',battery='$battery' WHERE id_product = '$id_product'";

                        if (execute($sql)) {
                            $thongbao = "<h6 style='color: green;'>Sửa thành công</h6>";
                            header('location: ?controller=product');
                        } else {
                            $error = "<h6 style='color: green;'>Sửa thất bại</h6>";
                        }
                    } else {
                        $sql = "UPDATE product SET id_category='$id_category',quantity_product='$quantity_product',name_product='$name_product',old_price_product='$old_price_product',new_price_product='$new_price_product',screen='$screen',type='$type',front_camera='$front_camera',rear_camera='$rear_camera',cpu='$cpu',ram='$ram',rom='$rom',sdcard='$sdcard',battery='$battery',info_product='$info_product' WHERE id_product = '$id_product'";

                        if (execute($sql)) {
                            $thongbao = "<h6 style='color: green;'>Sửa thành công</h6>";
                            header('location: ?controller=product');
                        } else {
                            $error = "<h6 style='color: green;'>Sửa thất bại</h6>";
                        }
                    }

                } else {
                    $error = "<h6 style='color: red; font-size='16px'>Không được để rỗng !</h6>";
                }
            }
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
                $data_product_edit = selectOne($sql);
                $sql = "SELECT * FROM category";
                $data_category = selectAll($sql);
            }
            require_once('./view/product/edit_product.php');
            break;
        }
        case 'delete_product': {
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];

                $sql = "DELETE FROM product WHERE id_product = $id_product";
                if (execute($sql)) {
                    header('location: ?controller=product');
                } else {
                    $thongbao = "<h6 style='color: green;'>Xóa thất bại</h6>";
                }
            }
        }
        case 'list_product': {
            // Lấy SELECT OPTION CATEGORY cho View
            $sql = "SELECT * FROM category";
            $data_category_option = selectAll($sql);

            $sql = "SELECT * FROM category";
            $data_category = selectAll($sql);
            require_once('./view/category/list_category.php');
            break;
        }
        default: {
            // Lấy SELECT OPTION CATEGORY cho View
            $sql = "SELECT * FROM category";
            $data_category_option = selectAll($sql);

            $sql = "SELECT * FROM product ORDER BY id_product DESC";
            $data_product = selectAll($sql);
            require_once('./view/product/list_product.php');
            break;
        }
    }
?>
<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    switch ($act) {
        case 'edit_user': {
            if (isset($_GET['id_user'])) {
                $id_user = $_GET['id_user'];
                $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
                $data_user_edit = selectOne($sql);
            }
            if (isset($_POST['edit_user'])) {
                $id_user = $_GET['id_user'];
                $lever = $_POST['lever'];
                $fullname = $_POST['fullname'];

                if ($fullname != '') {
                    $sql = "UPDATE user SET lever ='$lever',fullname='$fullname' WHERE id_user = '$id_user'";
                        if (execute($sql)) {
                            $thongbao = "<h6 style='color: green;'>Sửa thành công</h6>";
                            header('location: ?controller=user');
                        } else {
                            $error = "<h6 style='color: green;'>Sửa thất bại</h6>";
                        }
                } else {
                    $error = "<h6 style='color: red; font-size='16px'>Không được để rỗng !</h6>";
                }
            }
            require_once('./view/user/edit_user.php');
            break;
        }
        case 'delete_user': {
            if (isset($_GET['id_user'])) {
                $id_user = $_GET['id_user'];

                $sql = "DELETE FROM user WHERE id_user = $id_user";
                if (execute($sql)) {
                    header('location: ?controller=user');
                } else {
                    $thongbao = "<h6 style='color: green;'>Xóa thất bại</h6>";
                }
            }
        }
        case 'list_user': {
            // Lấy SELECT OPTION USER cho View
            $sql = "SELECT * FROM user";
            $data_user_option = selectAll($sql);

            $sql = "SELECT * FROM user";
            $data_user = selectAll($sql);
            require_once('./view/user/list_user.php');
            break;
        }
        default: {
            // Lấy SELECT OPTION USER cho View
            $sql = "SELECT * FROM user";
            $data_user_option = selectOne($sql);

            $sql = "SELECT * FROM user";
            $data_user = selectAll($sql);
            require_once('./view/user/list_user.php');
            break;
        }
    }
?>
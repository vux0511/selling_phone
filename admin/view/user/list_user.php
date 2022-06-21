<?php
    include ('view/public/navbar.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Quản Lý Thành Viên</h2>
    <?php
        if (isset($error)) {
            echo $error;
        }
        if (isset($thongbao)) {
            echo $thongbao;
        }
    ?>
    <div class="table-responsive">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th class="id_user">#</th>
                        <th class="fullname">Tên Thành Viên</th>
                        <th class="user">Tên Tài Khoản</th>
                        <th class="email">Email</th>
                        <th class="phone_user">Số Điện Thoại</th>
                        <th class="address_user">Địa Chỉ</th>
                        <th class="lever">Cấp Bậc</th>
                        <th class="action_user">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stt=1;
                        foreach ($data_user as $value) {
                    ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $value['fullname'] ?></td>
                        <td><?php echo $value['user'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['phone_user'] ?></td>
                        <td><?php echo $value['address_user'] ?></td>
                        <td><?php echo $value['lever']; ?></td>
                        <td><a
                                href="
                                index.php?controller=user&act=edit_user&id_user=<?php echo $value['id_user'] ?>">Sửa</a>
                            - <a onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                                href="index.php?controller=user&act=delete_user&id_user=<?php echo $value['id_user'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</main>


<?php
    include ('view/public/footer.php');
?>
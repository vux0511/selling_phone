<?php
    include ("view/public/navbar.php");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Sửa Thành Viên</h2>
    <?php
        if (isset($error)) {
            echo $error;
        }
        if (isset($thongbao)) {
            echo $thongbao;
        }
    ?>
    </p>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tên Thành Viên</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="fullname"
                value="<?php echo $data_user_edit['fullname'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Cấp Bậc</label>
            <select class="form-control" id="exampleFormControlSelect1" name="lever">
                <?php
                    if ($data_user_edit['lever'] == 'admin') {
                        echo '<option value="admin" selected>ADMIN</option>';
                        echo '<option value="0">Thành Viên</option>';
                    } else {
                        echo '<option value="0" selected>Thành Viên</option>';
                        echo '<option value="admin">ADMIN</option>';
                    }
                ?>
            </select>
        </div>
        <a href="?controller=back_user"><button type="button" class="btn btn-warning" style="margin-bottom: 25px;">Quay
                lại</button></a>
        <button type="submit" class="btn btn-success" name="edit_user" style="margin-bottom: 25px;">Sửa</button>
    </form>
</main>

<?php
    include ("view/public/footer.php");
?>
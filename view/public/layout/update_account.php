<div class="container" style="margin-top: 40px;">

    <?php
        $thongbao = '';
        if (isset($_POST['update_user'])) {
            $user_update = $_COOKIE['login'];
            $fullname = $_POST['fullname'];
            $phone_user = $_POST['phone_user'];
            $email = $_POST['email'];
            $address_user = $_POST['address_user'];

            if ($fullname != '' && $phone_user != '' && $email != '' && $address_user != '') {
                $sql = "UPDATE user SET fullname='$fullname', phone_user ='$phone_user', email ='$email', address_user = '$address_user' WHERE user = '$user_update'";
                if (execute($sql)) {
                    $thongbao = "<p style='color: green;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Sửa thành công</p>";
                } else {
                    $thongbao = "<p style='color: red;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Sửa thất bại</p>";
                }
            } else {
                $thongbao = "<p style='color: red;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Không được để trống</p>";
            }
        }
    ?>

    <form action="" method="POST">
        <div class="row">
            <?php
                if (isset($_COOKIE['login'])) {
                    $user = $_COOKIE['login'];
                    $sql = "SELECT * FROM user WHERE user = '$user'";
                    $account = loadDetail($sql);
                }
            ?>
            <?php
                    foreach ($account as $value) {
            ?>

                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Tên tài khoản :</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $value['user'] ?>" name="email" style="border: 1px solid #ced4da; border-radius: 0.25rem;" disabled>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Họ & tên :</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $value['fullname'] ?>" name="fullname" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Số điện thoại :</label>
                        <input type="text" class="form-control" id="phone" value="<?php echo $value['phone_user'] ?>" name="phone_user" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $value['email'] ?>" name="email" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Địa chỉ :</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $value['address_user'] ?>" name="address_user" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group" style="display: flex;">

                        <span style="margin: 0px auto;"><a href="index.php?controller=account&act=account"><input class="see_more" value="Quay lại" style="width: 150px; margin-top: 25px;border-radius: 4px;"></input></a></span> <span style="margin: 0px auto;"><input type="submit" class="see_more" name="update_user" value="Cập nhật" style="width: 150px; margin-top: 25px;border-radius: 4px;"></input></span>

                    </div>
                    <?php
                            if (isset($thongbao)) {
                                echo $thongbao;
                            }
                        ?>
                </div>
            <?php
                }
            ?>
        </div>

  </form>
</div>
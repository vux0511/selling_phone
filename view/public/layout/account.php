<div class="container" style="margin-top: 40px;">

    <?php
       if (isset($_COOKIE['login'])) {
        $user = $_COOKIE['login'];
        $sql = "SELECT * FROM user WHERE user = '$user'";
        $account = loadDetail($sql);
    }
    ?>
    <div class="container">
        <div class="row" style="border: 1px solid #ddd; border-radius: 5px; padding: 25px;">
            <?php
                foreach ($account as $value) {
            ?>
                <div class="col-md-4 col-xs-6">
                    <div class="form-group" style="font-size: 16px;">
                        <label for="pwd">Họ Tên : </label> <?php echo $value['fullname'] ?>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <div class="form-group" style="font-size: 16px;">
                        <label for="pwd">Tên tài khoản : </label> <?php echo $value['user'] ?>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <div class="form-group" style="font-size: 16px;">
                        <label for="pwd">Cấp độ:</label> <?php echo $value['lever'] ?>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6" style="font-size: 16px;">
                    <div class="form-group">
                        <label for="pwd">Số điện thoại : </label> <?php echo $value['phone_user'] ?>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6" style="font-size: 16px;">
                    <div class="form-group">
                        <label for="pwd">Email : </label> <?php echo $value['email'] ?>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6" style="font-size: 16px;">
                    <div class="form-group">
                        <label for="pwd">Địa chỉ : </label> <?php echo $value['address_user'] ?>
                    </div>
                </div>
                <form action="index.php?controller=account&act=update" method="post">
                    <input type="submit" class="see_more" name="buy_product" value="Cập nhật thông tin" style="width: 180px; margin-top: 100px; border-radius: 4px;"></input>
                </form>
            <?php
                }
            ?>
        </div>
    </div>
</div>
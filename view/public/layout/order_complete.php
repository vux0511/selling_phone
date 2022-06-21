<div class="container">
    <div class="row">
        <p style="font-size: 25px; text-align: center; margin-top: 120px;">Cảm ơn bạn đã đặt hàng </p>
        <p style="font-size: 25px; text-align: center; margin-bottom: 100px;">Mã đơn hàng của bạn là :

        <?php
        if (isset($_COOKIE['login']))
        {
            $user = $_COOKIE['login'];
            // Lấy id_user để SELECT ở bảng --bill--
            $sql = "SELECT * FROM user WHERE user = '$user'";
            $select_id_user = selectAll($sql);
            foreach ($select_id_user as $value) {
                $id_user = $value['id_user'];
            }

            // Lấy đơn hàng khác vừa đặt
            $select_bill_user = "SELECT * FROM bill WHERE id_user = '$id_user' ORDER BY id_bill DESC LIMIT 1";
            $select_bill_user = selectAll($select_bill_user);
            foreach ($select_bill_user as $value) {
                echo $value['id_bill'];
            }
        }
    ?>

        </p>
    </div>

</div>
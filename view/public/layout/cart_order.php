<div class="container" style="margin-top: 30px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên người đặt</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Tình trạng</th>
            <th>Tổng tiền</th>
            <th>Chi tiết đơn hàng</th>
        </tr>
        </thead>
        <tbody>
            <?php

                foreach ($bill as $value) {
            ?>
        <tr>
            <td><?php  echo $value['id_bill']?></td>
            <td><?php  echo $value['fullname']?></td>
            <td><?php  echo $value['phone']?></td>
            <td><?php  echo $value['address']?></td>
            <td><?php  echo $value['note']?></td>
            <td><?php  echo $value['status']?></td>
            <td><?php  echo $value['subtotal']?></td>
            <td><a href="index.php?controller=info_cart_order&id_bill=<?php  echo $value['id_bill']?>">Chi tiết</a></td>
        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
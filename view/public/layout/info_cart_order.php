<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Số lượng</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($select_id_product as $value) {
            ?>
            <tr>
                <td><?php echo $bill1['id_bill'] ?></td>
                <td><?php echo $value['name_product'] ?></td>
                <td>
                    <img src="view/images/product/<?php echo $value['image_product'] ?>" width="100px">
                </td>
                <td><?php echo $bill1['quantity'] ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
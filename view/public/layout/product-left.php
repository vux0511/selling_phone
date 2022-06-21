<div class="col-sm-3">
                <div class="row">
                    <ul class="list-group" style="text-align: center;">
                        <li class="list-group-item active" style="background-color: #ff523b; border: 1px solid #ff523b; font-size: 16px;">
                            Danh Mục Sản Phẩm</li>
                        <?php
                            foreach ($product_category as  $value) {
                        ?>
                            <a href="index.php?controller=product&category=<?php echo $value['id_category'] ?>">
                                <li class="list-group-item"><?php echo $value['name_category'] ?></li>
                            </a>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="row" style="text-align: center;">
                    <h4>Tìm Kiếm Sản Phẩm</h4>
                    <form style="display: flex;" method="POST" action="index.php?controller=search">
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" style="width:100%; margin-right: 6px;" name="key">
                        <button type="submit" name="search" class="btn btn-default">Tìm</button>
                    </form>
                </div>
                <div class="box" style="border: 1px solid #eeeeee; margin-top: 30px; border-radius: 5px;padding: 15px;">
                    <u><h4 style="text-align: center;">Khoảng giá</h4></u>
                    <div style="text-align: left; font-size: 15px; line-height: 30px;">
                        <ul style="margin-top: 20px;">
                            <li style="list-style-type: circle">
                                <a href="index.php?controller=product&price1">Dưới 3.000.000 đ</a>
                            </li>
                            <li style="list-style-type: circle"><a href="index.php?controller=product&price2">3.000.000 - 5.000.000 đ</a></li>
                            <li style="list-style-type: circle"><a href="index.php?controller=product&price3">5.000.000 - 10.000.000 đ</a></li>
                            <li style="list-style-type: circle"><a href="index.php?controller=product&price4">10.000.000 - 15.000.000 đ</a></li>
                            <li style="list-style-type: circle"><a href="index.php?controller=product&price5">Trên 20.000.000 đ</a></li>
                        </ul>
                    </div>
                </div>
            </div>

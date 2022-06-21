<?php
    include ("view/public/navbar.php");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Sửa Sản Phẩm</h2>
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
            <label for="exampleFormControlInput1">Tên SP</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name_product"
                value="<?php echo $data_product_edit['name_product'] ?>">
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh Mục</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                        <?php
                            foreach ($data_category as $category_option) {
                        ?>
                        <option value="<?php echo $category_option['id_category'] ?>" <?php if($data_product_edit['id_category'] == $category_option['id_category'])
                        {
                            echo "selected";
                        }
                        ?>>
                            <?php echo $category_option['name_category'] ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Số Lượng</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="quantity_product" value="<?php echo $data_product_edit['quantity_product'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá Cũ</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="old_price_product" value="<?php echo $data_product_edit['old_price_product'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá Mới</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="new_price_product" value="<?php echo $data_product_edit['new_price_product'] ?>">
                </div>
            </div>
        </div>
        <!-- Thông tin máy -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Màn Hình</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="screen" value="<?php echo $data_product_edit['screen'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Hãng</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="type" value="<?php echo $data_product_edit['type'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Camera Trước</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="front_camera" value="<?php echo $data_product_edit['front_camera'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Camera Sau</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="rear_camera" value="<?php echo $data_product_edit['rear_camera'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Chipset</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="cpu" value="<?php echo $data_product_edit['cpu'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Ram</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="ram" value="<?php echo $data_product_edit['ram'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rom</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="rom" value="<?php echo $data_product_edit['rom'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Thẻ Nhớ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="sdcard" value="<?php echo $data_product_edit['sdcard'] ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Pin</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="battery" value="<?php echo $data_product_edit['battery'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Thông Tin</label>
            <textarea class="form-control" rows="3"
                name="info_product"><?php echo $data_product_edit['info_product']?></textarea>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box" style="border: 1px solid #eee;">
                    <div class="form-group" style="padding: 10px;">
                        <label for="exampleFormControlInput1">Ảnh</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="image_product">
                        <img src="../view/images/product/<?php echo $data_product_edit['image_product']?>" width="150px">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box" style="border: 1px solid #eee;">
                    <div class="form-group" style="padding: 10px;">
                        <label for="exampleFormControlInput1">Ảnh</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="images_2">
                        <img src="../view/images/product/<?php echo $data_product_edit['images_2']?>" width="150px">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box" style="border: 1px solid #eee;">
                    <div class="form-group" style="padding: 10px;">
                        <label for="exampleFormControlInput1">Ảnh</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="images_3">
                        <img src="../view/images/product/<?php echo $data_product_edit['images_3']?>" width="150px">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box" style="border: 1px solid #eee;">
                    <div class="form-group" style="padding: 10px;">
                        <label for="exampleFormControlInput1">Ảnh</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="images_4">
                        <img src="../view/images/product/<?php echo $data_product_edit['images_4']?>" width="150px">
                    </div>
                </div>
            </div>
        </div>
        <a href="?controller=back_product"><button type="button" class="btn btn-warning"style="margin-bottom: 25px;">Quay lại</button></a>
        <button type="submit" class="btn btn-success" name="edit_product" style="margin-bottom: 25px;">Sửa</button>
    </form>
</main>

<?php
    include ("view/public/footer.php");
?>
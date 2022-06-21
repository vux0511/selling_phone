<?php
    include ("view/public/navbar.php");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Thêm Sản Phẩm</h2>
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
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name_product">
        </div>


        <!-- <div class="form-group">
            <label for="exampleFormControlInput1">HOT</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="hot_product">
        </div> -->
        <!-- <div class="form-group">
            <label for="exampleFormControlSelect1">Sản Phẩm HOT</label>
            <select class="form-control" id="exampleFormControlSelect1" name="hot_product">
                <option value='0'>Không</option>
                <option value="1">HOT</option>
            </select>
        </div> -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">ID Danh Mục</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                        <?php
                            foreach ($data_category as $category_option) {
                        ?>

                        <option value="<?php echo $category_option['id_category'] ?>">
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
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="quantity_product">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá Cũ</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="old_price_product">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá Mới</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="new_price_product">
                </div>
            </div>
        </div>
        <!-- Thông tin máy -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Màn Hình</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="screen">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Hãng</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="type">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Camera Trước</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="front_camera">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Camera Sau</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="rear_camera">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Chipset</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="cpu">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Ram</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="ram">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rom</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="rom">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Thẻ Nhớ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="sdcard">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Pin</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="battery">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Thông Tin</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info_product"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Lớn</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="image_product">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Mô Tả 1</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="images_2">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Mô Tả 2</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="images_3">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh Mô Tả 3</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" name="images_4">
        </div>
        <a href="?controller=back"><button type="button" class="btn btn-warning" style="margin-bottom: 25px;"
                name="back">Quay
                lại</button></a>
        <button type="submit" class="btn btn-success" name="add_product" style="margin-bottom: 25px;">Thêm</button>

    </form>
    <?php
    include ("view/public/footer.php");
?>
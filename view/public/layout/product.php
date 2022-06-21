<!-- START PRODUCT HOT + NEW  -->
<?php
    $sotin1trang = 8;
    if (isset($_GET["page"]))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
?>
<div class="container container-product-new" style="padding:0px; padding-right: 3px; margin-top: 60px;">
        <div class="row">
            <?php
                require_once ('view/public/layout/product-left.php');
            ?>
            <div class="col-sm-9" style="padding-right: 0px;">
                <h3 style="color: #ff523b; margin-top: 0px; text-align: center; margin-bottom: 30px;"><ins>Tất Cả Sản Phẩm</ins></h3>
                <?php
                    if (isset($_GET['category'])) {
                        $id_category = $_GET['category'];

                        $sql = "SELECT count(*) FROM product WHERE id_category = $id_category";
                        $tongsotin = selectRow($sql);
                        $sotrang = ceil($tongsotin / $sotin1trang);
                        $from = ($page - 1) * $sotin1trang;
                        $loadProductWithID = loadProductCategory($id_category,$from,$sotin1trang);
                        foreach ($loadProductWithID as $value) {
                ?>
                    <div class="col-md-3 col-xs-6">
                        <div class="card box-shadow">
                            <img src="view/images/product/<?php echo $value['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                            <p class="name-product"><?php echo $value['name_product'] ?></p>
                            <span class="price-new">
                                <?php echo number_format($value['new_price_product']) .' đ'?>
                            </span>
                            <span class="price-old"><strike><?php echo number_format($value['old_price_product']) .' đ'?></strike></span>
                            <p class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                <form action="index.php?controller=cart&id_product=<?php echo $value['id_product'] ?>" method="post">
                                    <input type="hidden" name="id_product" value="<?php echo $value['id_product'] ?>">
                                    <input type="hidden" name="name_product" value="<?php echo $value['name_product'] ?>">
                                    <input type="hidden" name="image_product" value="<?php echo $value['image_product'] ?>">
                                    <input type="hidden" name="new_price_product" value="<?php echo $value['new_price_product'] ?>">
                                    <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                    </button>
                                </form>
                                <a href="index.php?controller=detail&id_product=<?php echo $value['id_product'] ?>">
                                    <button style="width: 95px;">Xem thêm</button>
                                </a>
                            </div>
                            </p>
                        </div>
                    </div>
                <?php
                        }
                        for ($t=1; $t<=$sotrang ; $t++) {
                            echo "<ul class='pagination' style='right:100%'>
                                    <li><a href='index.php?controller=product&category=".$id_category."&page=$t'>Trang $t</a></li>
                                </ul>";
                        }
                    }
                    elseif (isset($_GET['price1'])) {
                        $sql = "SELECT * FROM product WHERE new_price_product <= 3000000";
                        $loadProductPrice = loadProductPrice($sql);
                        foreach ($loadProductPrice as $loadProductPrice) {
                        ?>
                            <div class="col-md-3 col-xs-6">
                                <div class="card box-shadow">
                                    <img src="view/images/product/<?php echo $loadProductPrice['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                                    <p class="name-product"><?php echo $loadProductPrice['name_product'] ?></p>
                                    <span class="price-new">
                                        <?php echo number_format($loadProductPrice['new_price_product']) .' đ'?>
                                    </span>
                                    <span class="price-old"><strike><?php echo number_format($loadProductPrice['old_price_product']) .' đ'?></strike></span>
                                    <p class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                        <form action="index.php?controller=cart&id_product=<?php echo $loadProductPrice['id_product'] ?>" method="post">
                                            <input type="hidden" name="id_product" value="<?php echo $loadProductPrice['id_product'] ?>">
                                            <input type="hidden" name="name_product" value="<?php echo $loadProductPrice['name_product'] ?>">
                                            <input type="hidden" name="image_product" value="<?php echo $loadProductPrice['image_product'] ?>">
                                            <input type="hidden" name="new_price_product" value="<?php echo $loadProductPrice['new_price_product'] ?>">
                                            <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                            </button>
                                        </form>
                                        <a href="index.php?controller=detail&id_product=<?php echo $loadProductPrice['id_product'] ?>">
                                            <button style="width: 95px;">Xem thêm</button>
                                        </a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    // Hiện ra tất cả sản phẩm
                    } elseif (isset($_GET['price2'])) {
                        $sql = "SELECT * FROM product WHERE new_price_product >= 3000000 AND new_price_product <= 5000000";
                        $loadProductPrice = loadProductPrice($sql);
                        foreach ($loadProductPrice as $loadProductPrice) {
                        ?>
                            <div class="col-md-3 col-xs-6">
                                <div class="card box-shadow">
                                    <img src="view/images/product/<?php echo $loadProductPrice['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                                    <p class="name-product"><?php echo $loadProductPrice['name_product'] ?></p>
                                    <span class="price-new">
                                        <?php echo number_format($loadProductPrice['new_price_product']) .' đ'?>
                                    </span>
                                    <span class="price-old"><strike><?php echo number_format($loadProductPrice['old_price_product']) .' đ'?></strike></span>
                                    <p class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                        <form action="index.php?controller=cart&id_product=<?php echo $loadProductPrice['id_product'] ?>" method="post">
                                            <input type="hidden" name="id_product" value="<?php echo $loadProductPrice['id_product'] ?>">
                                            <input type="hidden" name="name_product" value="<?php echo $loadProductPrice['name_product'] ?>">
                                            <input type="hidden" name="image_product" value="<?php echo $loadProductPrice['image_product'] ?>">
                                            <input type="hidden" name="new_price_product" value="<?php echo $loadProductPrice['new_price_product'] ?>">
                                            <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                            </button>
                                        </form>
                                        <a href="index.php?controller=detail&id_product=<?php echo $loadProductPrice['id_product'] ?>">
                                            <button style="width: 95px;">Xem thêm</button>
                                        </a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    } elseif (isset($_GET['price3'])) {
                        $sql = "SELECT * FROM product WHERE new_price_product >= 5000000 AND new_price_product <= 10000000";
                        $loadProductPrice = loadProductPrice($sql);
                        foreach ($loadProductPrice as $loadProductPrice) {
                        ?>
                            <div class="col-md-3 col-xs-6">
                                <div class="card box-shadow">
                                    <img src="view/images/product/<?php echo $loadProductPrice['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                                    <p class="name-product"><?php echo $loadProductPrice['name_product'] ?></p>
                                    <span class="price-new">
                                        <?php echo number_format($loadProductPrice['new_price_product']) .' đ'?>
                                    </span>
                                    <span class="price-old"><strike><?php echo number_format($loadProductPrice['old_price_product']) .' đ'?></strike></span>
                                    <p class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                        <form action="index.php?controller=cart&id_product=<?php echo $loadProductPrice['id_product'] ?>" method="post">
                                            <input type="hidden" name="id_product" value="<?php echo $loadProductPrice['id_product'] ?>">
                                            <input type="hidden" name="name_product" value="<?php echo $loadProductPrice['name_product'] ?>">
                                            <input type="hidden" name="image_product" value="<?php echo $loadProductPrice['image_product'] ?>">
                                            <input type="hidden" name="new_price_product" value="<?php echo $loadProductPrice['new_price_product'] ?>">
                                            <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                            </button>
                                        </form>
                                        <a href="index.php?controller=detail&id_product=<?php echo $loadProductPrice['id_product'] ?>">
                                            <button style="width: 95px;">Xem thêm</button>
                                        </a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    } elseif (isset($_GET['price4'])) {
                        $sql = "SELECT * FROM product WHERE new_price_product >= 10000000 AND new_price_product <= 15000000";
                        $loadProductPrice = loadProductPrice($sql);
                        foreach ($loadProductPrice as $loadProductPrice) {
                        ?>
                            <div class="col-md-3 col-xs-6">
                                <div class="card box-shadow">
                                    <img src="view/images/product/<?php echo $loadProductPrice['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                                    <p class="name-product"><?php echo $loadProductPrice['name_product'] ?></p>
                                    <span class="price-new">
                                        <?php echo number_format($loadProductPrice['new_price_product']) .' đ'?>
                                    </span>
                                    <span class="price-old"><strike><?php echo number_format($loadProductPrice['old_price_product']) .' đ'?></strike></span>
                                    <p class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                        <form action="index.php?controller=cart&id_product=<?php echo $loadProductPrice['id_product'] ?>" method="post">
                                            <input type="hidden" name="id_product" value="<?php echo $loadProductPrice['id_product'] ?>">
                                            <input type="hidden" name="name_product" value="<?php echo $loadProductPrice['name_product'] ?>">
                                            <input type="hidden" name="image_product" value="<?php echo $loadProductPrice['image_product'] ?>">
                                            <input type="hidden" name="new_price_product" value="<?php echo $loadProductPrice['new_price_product'] ?>">
                                            <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                            </button>
                                        </form>
                                        <a href="index.php?controller=detail&id_product=<?php echo $loadProductPrice['id_product'] ?>">
                                            <button style="width: 95px;">Xem thêm</button>
                                        </a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    } elseif (isset($_GET['price5'])) {
                        $sql = "SELECT * FROM product WHERE new_price_product >= 20000000";
                        $loadProductPrice = loadProductPrice($sql);
                        foreach ($loadProductPrice as $loadProductPrice) {
                        ?>
                            <div class="col-md-3 col-xs-6">
                                <div class="card box-shadow">
                                    <img src="view/images/product/<?php echo $loadProductPrice['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                                    <p class="name-product"><?php echo $loadProductPrice['name_product'] ?></p>
                                    <span class="price-new">
                                        <?php echo number_format($loadProductPrice['new_price_product']) .' đ'?>
                                    </span>
                                    <span class="price-old"><strike><?php echo number_format($loadProductPrice['old_price_product']) .' đ'?></strike></span>
                                    <p class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                        <form action="index.php?controller=cart&id_product=<?php echo $loadProductPrice['id_product'] ?>" method="post">
                                            <input type="hidden" name="id_product" value="<?php echo $loadProductPrice['id_product'] ?>">
                                            <input type="hidden" name="name_product" value="<?php echo $loadProductPrice['name_product'] ?>">
                                            <input type="hidden" name="image_product" value="<?php echo $loadProductPrice['image_product'] ?>">
                                            <input type="hidden" name="new_price_product" value="<?php echo $loadProductPrice['new_price_product'] ?>">
                                            <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                            </button>
                                        </form>
                                        <a href="index.php?controller=detail&id_product=<?php echo $loadProductPrice['id_product'] ?>">
                                            <button style="width: 95px;">Xem thêm</button>
                                        </a>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    }
                     else {
                        $sql = "SELECT count(*) FROM product";
                        $tongsotin = selectRow($sql);
                        $sotrang = ceil($tongsotin / $sotin1trang);
                        $from = ($page - 1) * $sotin1trang;
                        $loadProduct = loadPageProduct($from,$sotin1trang);
                        foreach ($loadProduct as $loadProduct) {
                    ?>
                    <div class="col-md-3 col-xs-6">
                        <div class="card box-shadow">
                            <img src="view/images/product/<?php echo $loadProduct['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                            <p class="name-product"><?php echo $loadProduct['name_product'] ?></p>
                            <span class="price-new">
                                <?php echo number_format($loadProduct['new_price_product']) .' đ'?>
                            </span>
                            <span class="price-old"><strike><?php echo number_format($loadProduct['old_price_product']) .' đ'?></strike></span>
                            <p class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </p>
                            <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                <form action="index.php?controller=cart&id_product=<?php echo $loadProduct['id_product'] ?>" method="post">
                                    <input type="hidden" name="id_product" value="<?php echo $loadProduct['id_product'] ?>">
                                    <input type="hidden" name="name_product" value="<?php echo $loadProduct['name_product'] ?>">
                                    <input type="hidden" name="image_product" value="<?php echo $loadProduct['image_product'] ?>">
                                    <input type="hidden" name="new_price_product" value="<?php echo $loadProduct['new_price_product'] ?>">
                                    <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                    </button>
                                </form>
                                <a href="index.php?controller=detail&id_product=<?php echo $loadProduct['id_product'] ?>">
                                    <button style="width: 95px;">Xem thêm</button>
                                </a>
                            </div>
                            </p>
                        </div>
                    </div>
                <?php
                        }
                    for ($t=1; $t<=$sotrang ; $t++) {
                        echo "
                            <ul class='pagination' style='right:100%'>
                                <li><a href='index.php?controller=product&page=$t' style='color: ff523b;'>Trang $t</a></li>
                            </ul>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Xem thêm -->


<!-- START PRODUCT HOT + NEW  -->
<div class="container container-product-new" style="padding:0px; padding-right: 3px; margin-top: 60px;">
        <div class="row">
            <?php
                require_once ('view/public/layout/product-left.php');
            ?>
            <div class="col-sm-9" style="padding-right: 0px;">
                <h3 style="color: #ff523b; margin-top: 0px; text-align: center; margin-bottom: 30px;"><ins>Tất Cả Sản
                        Phẩm</ins></h3>
                <?php
                    if (isset($_GET['category'])) {
                        $id_category = $_GET['category'];
                        $sql = "SELECT * FROM product WHERE id_category = '$id_category' LIMIT 8";
                        $loadProductCategory = loadProductCategory($sql);
                        foreach ($loadProductCategory as $value) {
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
                                <button style="border-right: 1px solid #eee;"><i class="fas fa-cart-plus"></i></button>
                                <button>Xem thêm </button>
                            </div>
                            </p>
                        </div>
                    </div>
                <?php
                        }
                    } elseif (isset($searchProduct)) {
                        foreach ($searchProduct as $searchProduct) {
                    ?>

                        <div class="col-md-3 col-xs-6">
                            <div class="card box-shadow">
                                <img src="view/images/product/<?php echo $searchProduct['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                                <p class="name-product"><?php echo $searchProduct['name_product'] ?></p>
                                <span class="price-new">
                                    <?php echo number_format($searchProduct['new_price_product']) .' đ'?>
                                </span>
                                <span class="price-old"><strike><?php echo number_format($searchProduct['old_price_product']) .' đ'?></strike></span>
                                <p class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </p>
                                <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                                    <form action="index.php?controller=cart&id_product=<?php echo $searchProduct['id_product'] ?>" method="post">
                                        <input type="hidden" name="id_product" value="<?php echo $searchProduct['id_product'] ?>">
                                        <input type="hidden" name="name_product" value="<?php echo $searchProduct['name_product'] ?>">
                                        <input type="hidden" name="image_product" value="<?php echo $searchProduct['image_product'] ?>">
                                        <input type="hidden" name="new_price_product" value="<?php echo $searchProduct['new_price_product'] ?>">
                                        <button type="submit" style="border-right: 1px solid #eee;width: 94px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                        </button>
                                    </form>
                                    <a href="index.php?controller=detail&id_product=<?php echo $searchProduct['id_product'] ?>">
                                        <button style="width: 95px;">Xem thêm</button>
                                    </a>
                                </div>
                                </p>
                            </div>
                        </div>

                    <?php
                        }
                    } else {
                        $loadProduct = loadProduct();
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
                                    <button type="submit" style="border-right: 1px solid #eee;width: 100px;" name="addcart"><i class="fas fa-cart-plus"></i>
                                    </button>
                                </form>
                                <a href="index.php?controller=detail&id_product=<?php echo $loadProduct['id_product'] ?>">
                                    <button style="width: 100px;">Xem thêm</button>
                                </a>
                            </div>
                            </p>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>


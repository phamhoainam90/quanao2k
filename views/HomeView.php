<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangChu.php";
?>
<div class="banner-index tp_product_new">
    <div class="container">
        <div class="row">
            <div class="main-title text-center">
                <h2 class="tp_title">Sản phẩm mới</h2>
                <div class="shop-now">
                    <a href="#">Xem thêm</a>
                </div>
            </div>
            <div id="owl-product-index2" class="owl-carousel owl-theme clearfix banner-list">
                <?php 
                    $products = $this->modelHotProducts();
                ?>
                <?php foreach($products as $rows): ?>
                <div class="banner-item" style="position: relative;">
                    <div
                        style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;">
                        <?php echo $rows->discount; ?>%</div>
                    <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>"><i
                            style=" z-index: 1; position: absolute; width: 70px; color:black; right:-40px ; top:0px; font-size: 25px;"
                            class="fa fa-heart" aria-hidden="true"></i></a>
                    <div class="img">
                        <a class="img_product"
                            href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"
                            data-id="12074462">
                            <img class="lazyload" data-sizes="auto"
                                data-src="assets/upload/products/<?php echo $rows->photo; ?>"
                                title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>">
                        </a>
                    </div>
                    <div class="info">
                        <h3 style="padding-top: 10px; font-size:15px;">
                            <a class="tp_product_name"
                                href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                        </h3>
                        <div class="prices">
                            <strong
                                class="tp_product_price"><?php echo number_format($rows->price-($rows->price*$rows->discount)/100); ?>₫</strong>
                            <span style="text-decoration:line-through; font-size:14px; color:gray; margin-left: 20px;"
                                class="tp_product_price"><?php echo number_format($rows->price); ?>₫</span>
                        </div>
                        <div>
                            <form>
                                <div class="select-wrapper number-wrapper">
                                    <input type="hidden" id="pview-qtt" value="1" class="text-center">
                                </div>
                                <div class="add">
                                    <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><span
                                            style="background-color:#fba617d1; font-weight: bold; width:100px;"
                                            class="btn btn-secondary">Chi tiết</span></a>
                                    <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"
                                        class="nutAdd"><span type="submit"
                                            style="background-color:#fba617d1; font-weight: bold; width: 110px;"
                                            class="btn btn-secondary AddToCart" title="Thêm vào giỏ hàng"
                                            onclick="alert('Thêm vào giỏ hàng thành công')">
                                            Thêm vào giỏ</span></a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.add {
    opacity: 0;
}

.add-2 {
    opacity: 0;
    padding-bottom: 5px;
}

.banner-item:hover .add {
    opacity: 1;
    transition: 0.5s;
}

.product-item:hover .add-2 {
    opacity: 1;
    transition: 0.5s;
}
</style>
<div class="best-seller tp_product_hot">
    <div class="container">
        <div class="row">
            <div class="main-title text-center">
                <h2 class="tp_title">Sản phẩm nổi bật</h2>
                <div class="shop-now">
                    <a href="#">Xem thêm</a>
                </div>
            </div>
            <div id="owl-product-index" class="owl-carousel owl-theme">
                <?php 
                    $products = $this->modelNewProducts();
                ?>
                <?php foreach($products as $rows): ?>
                <div class="item">
                    <div class="product-item" style="position: relative;">
                        <div
                            style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;">
                            <?php echo $rows->discount; ?>%</div>
                        <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>"><i
                                style=" z-index: 1; position: absolute; width: 70px; color:black; right:-45px ; top:0px; font-size: 25px;"
                                class="fa fa-heart" aria-hidden="true"></i></a>
                        <div class="img">
                            <a class="img_product"
                                href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                                <img class="lazyload " data-sizes="auto"
                                    src="assets/upload/products/<?php echo $rows->photo; ?>"
                                    title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>">
                            </a>
                        </div>
                        <div class="info">
                            <h3 style="padding-top: 10px; font-size:15px;">
                                <a class="tp_product_name"
                                    href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                            </h3>
                            <div class="prices" style="padding-bottom: 5px;">
                                <strong style="font-size:17px; color:red;"
                                    class="tp_product_price"><?php echo number_format($rows->price-($rows->price*$rows->discount)/100); ?>₫</strong>
                                <span
                                    style="text-decoration:line-through; font-size:14px; color:gray; margin-left: 20px;"
                                    class="tp_product_price"><?php echo number_format($rows->price); ?>₫</span>
                            </div>
                            <div>
                                <form>
                                    <div class="select-wrapper number-wrapper">
                                        <input type="hidden" id="pview-qtt" value="1" class="text-center">
                                    </div>
                                    <div class="add-2" style="text-align:center;">
                                        <a
                                            href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><span
                                                style="background-color:#fba617d1; font-weight: bold; width:80px;"
                                                class="btn btn-secondary">Chi tiết</span></a>
                                        <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"
                                            class="nutAdd"><span type="submit"
                                                style="background-color:#fba617d1; font-weight: bold; width: 110px;"
                                                class="btn btn-secondary AddToCart" title="Thêm vào giỏ hàng"
                                                onclick="alert('Thêm vào giỏ hàng thành công')">
                                                Thêm vào giỏ</span></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.nutAdd').click(function(e) {
        e.preventDefault();
        var $link = $(this).attr('href');
        var $sl = $('#pview-qtt').val();
        $.ajax({
            url: $link,
            type: 'post',
            dataType: 'html',
            data: {
                sl: $sl
            }
        })

    });
});
</script>
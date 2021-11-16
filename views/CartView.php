<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<script type="text/javascript">
$(document).ready(function() {
    $(".item-quantity").click(function(e) {
        $("#form_update").trigger("submit");
    });
    $('.remove_cart').click(function(e) {
        e.preventDefault();
        var tr = $(this).parent().parent();
        var link = $(this).attr('href');
        $.ajax({
                type: "post",
                url: link,
                dataType: "html"
            })
            .done(function() {
                tr.remove();
                tongdonhang();
            });
    });
    $("#form_update").submit(function(e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
                url: "index.php?controller=cart&action=update",
                type: "POST",
                dataType: "html",
                data: form_data
            })
            .done(function() {
                tongdonhang();
            });
    });
    $('.deleteAll').click(function(e) {
        e.preventDefault();
        var tbody_giohang = $('.giohang');
        var tbody_tongDH = $('.tongDH');
        var input_checkout = $('#checkout');
        $.ajax({
                url: "index.php?controller=cart&action=destroy",
                type: "POST",
                dataType: "html"
            })
            .done(function() {
                tbody_giohang.remove();
                tbody_tongDH.remove();
                input_checkout.remove();
                tongdonhang();
            });
    });
});

function tongdonhang() {
    var giohang = $('.giohang').children("tr");
    var tongDH = $('.tongDH').children("tr");
    var tong = parseFloat(0);
    for (let i = 0; i < giohang.length; i++) {
        tong += (parseFloat(giohang.eq(i).children('.price').children('input').val()) * parseFloat(giohang.eq(i)
            .children('.qty').children('input').val()));
    }
    $('.sl_giohang').text(giohang.length);
    tongDH.children('.price').children().children().children().text(tong.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
        ","));
}
</script>
<div class="container">
    <!-- <form action="index.php?controller=cart&action=update" method="post"> -->
    <form id="form_update">
        <div class="row">
            <div id="layout-page" class="col-md-12">
                <div class="main-title2 mb30">
                    <h1>Giỏ hàng</h1>
                </div>
                <div id="cartformpage" class="pb30">
                    <table class="cart cart-hidden">
                        <thead>
                            <tr>
                                <th class="image">Hình ảnh</th>
                                <th class="item">Tên sản phẩm</th>
                                <th class="price">Giá bán lẻ</th>
                                <th class="qty">Số lượng</th>
                                <th class="remove">Xoá</th>
                            </tr>
                        </thead>
                        <tbody class="giohang">
                            <?php foreach($_SESSION["cart"] as $product): ?>
                            <tr class="item">
                                <td class="image">
                                    <div class="product_image">
                                        <a href="chitiet.html">
                                            <img class="lazyload" data-sizes="auto"
                                                src="assets/upload/products/<?php echo $product['photo']; ?>"
                                                data-src="assets/upload/products/<?php echo $product['photo']; ?>" />
                                        </a>
                                    </div>
                                </td>
                                <td class="item">
                                    <a
                                        href="index.php?controller=products&action=detail&id=<?php echo $product['id']; ?>">
                                        <strong><?php echo $product['name']; ?></strong>
                                    </a>
                                </td>
                                <td class="price"><input type="hidden"
                                        value="<?php echo $product['price']; ?>"><span><?php echo number_format($product['price']); ?></span>₫
                                </td>
                                <td class="qty">
                                    <input type="number" id="quantity" min="1" class="item-quantity"
                                        value="<?php echo $product['number']; ?>"
                                        name="product_<?php echo $product['id']; ?>" required="Không thể để trống">
                                </td>
                                <td class="remove">
                                    <a href="index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>"
                                        rel="nofollow" class="cart remove_cart"></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php if($this->cartNumber() > 0): ?>
                        <tbody class="tongDH">
                            <tr class="summary">
                                <td class="image"></td>
                                <td>
                                    <a style="width: 110px;display: block; line-height: 34px; margin-top: 10px;  background: #c6ab7f; color: #fff; text-transform: uppercase; float: left;"
                                        class="button-default deleteAll" href="index.php?controller=cart&action=destroy"
                                        class="button pull-left"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng')">Xóa toàn bộ</a>
                                    <input id="update_cart"
                                        style="display: none; width:100px; margin-right: 10px; float: right; "
                                        type="submit" class="button-default" value="Cập nhật">
                                </td>
                                <td style="font-size: 20px; text-transform: uppercase;">Tổng tiền</td>
                                <td class="price">
                                    <span class="total" style="font-size: 25px;">
                                        <strong><span><?php echo number_format($this->cartTotal());?></span>₫</strong>
                                    </span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                        <?php endif; ?>
                    </table>
                    <div class="cart-buttons inner-right inner-left">
                        <div class="buttons clearfix text-right">
                            <button type="button" id="update-cart" class="button-default" name="update"
                                onclick="location.href = 'index.php'">Tiếp tục mua sắm</button>
                            <?php if($this->cartNumber() > 0): ?>
                            <button type="button" id="checkout" class="button-default"
                                onclick="location.href = 'index.php?controller=cart&action=checkout'">Thanh toán
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
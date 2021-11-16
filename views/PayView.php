<link rel="stylesheet" type="text/css" href="assets/frontend/css/cart.css">
<?php 
    $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<form action="index.php?controller=cart&action=checkpay" method="post">
<div class="wrapper">
    <div class="main">
    <div class="left">
        <h2 class="info-title">Thông tin giao hàng</h2>
            <div class="content">
            <input class="info-text" placeholder="Họ và tên"  size="30" type="text" name="customerName" value="" required>
            <input class="info-text email" placeholder="Email" type="email" name="customerEmail" value="" required>
            <input class="info-text phone" placeholder="Số điện thoại"  maxlength="11" type="tel" name="customerMobile" value="" required>
            <input class="info-text" placeholder="Địa chỉ" size="30" type="text" name="customerAddress" value="" required>
            <textarea class="info-note" name="description" class="input" placeholder="Ghi chú" rows="4"></textarea>
            </div>
            <div class="content-bottom">
                <p>Phương thức thanh toán</p>
                <input type="radio" name="pay" value="Thanh toán tại nhà"> Thanh toán tại nhà
                <br>
                <input type="radio" name="pay" value="Chuyển khoản qua ngân hàng"> Chuyển khoản qua ngân hàng
            </div>   
            <div class="bottom">
                <a  href="index.php?controller=cart">
                    <i class="fa fa-chevron-left">
                    </i> Giỏ hàng
                </a>
    </div>                               
    </div>
</div>
    <div class="right">
        <div class="right-top">
            <div class="right-t-t">
            <table style=" border:0px solid;">
                <?php foreach($_SESSION["cart"] as $product): ?>
                    <tr class="sp">
                        <td class="top">
                            <div class="sl-t">
                                <img src="assets/upload/products/<?php echo $product['photo']; ?>" alt="<?php echo $product['name']; ?>">
                                <div class="sl"><span><?php echo $product['number']; ?></span></div>
                            </div>
                        </td>
                        <td style="border-top: 0px solid;" >
                            <p><?php echo $product['name']; ?></p>
                        </td >
                        <td style="text-align: right;border-top: 0px solid; ">
                            <span><?php echo number_format($product['price']*$product['number']); ?>₫</span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
        <div class="right-main">
            <div class="right-m-m">
            <table>
                <tr class="sp">
                    <td class="top">Tạm tính</td>
                    <td class="top" style="text-align: right; margin-top:-20px;"><?php echo number_format($this->cartTotal()); ?>₫</td>
                </tr>
                <tr class="sp">
                    <td class="top">Phí vận chuyển</td>
                    <td class="top" style="text-align: right;margin-top:-20px;">0</td>
                </tr>
            </table>
            </div>
        </div>
        <div class="right-bottom">
            <table>
                <tr>
                     <td class="top">Tổng cộng</td>
                     <td class="top" style="text-align: right; font-size: 25px; margin-top: -20px;;display: block;"><?php echo number_format($this->cartTotal()); ?>₫</td>
                </tr>
            </table>
            <button class="hov" type="submit" id="acceptCheckout" style="width: 100%; font-size: 17px;line-height: 60px;background: #338DBC;color: white;margin-top: 45px;border-radius: 5px;">
            <span class="btn-content">Thanh toán</span>
            </button>
        </div>
    </div>
  </div>
</form>
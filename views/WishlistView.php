<?php 
	//load LayoutTrangChu.php
	$this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <div class="container">
  <div class="row">
    <div id="layout-page" class="col-md-12">
      <div class="main-title2 mb30">
        <h1>Sản phẩm yêu thích</h1>
      </div>
      <div id="cartformpage" class="pb30">
        <table class="cart cart-hidden">
          <thead>
            <tr>
              <th class="image">Hình ảnh</th>
              <th class="item">Tên sản phẩm</th>
              <th class="remove">Xoá</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($_SESSION["Wishlist"] as $product): ?>
            <tr class="item">
              <td class="image">
                <div class="product_image">
                  <a href="chitiet.html">
                    <img class="lazyload" data-sizes="auto" src="assets/upload/products/<?php echo $product['photo']; ?>" data-src="assets/upload/products/<?php echo $product['photo']; ?>"/>
                  </a>
                </div>
              </td>
              <td class="item">
                <a href="index.php?controller=products&action=detail&id=<?php echo $product['id']; ?>">
                  <strong><?php echo $product['name']; ?></strong>
                </a>
              </td>
              <td class="remove">
                <a href="index.php?controller=wishlist&action=delete&id=<?php echo $product['id']; ?>" rel="nofollow" class="cart remove_cart" ></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
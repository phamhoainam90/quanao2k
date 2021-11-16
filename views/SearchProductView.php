<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div id="collection" class="tp_product_category">
  <div class="fix-breadcrumb">
    <ul class="breadcrumb&#x20;breadcrumb-arrow&#x20;hidden-sm&#x20;hidden-xs">
      <li>
        <h3 style="margin-bottom: 50px;">TÌM KIẾM</h3>
      </li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
    <div class="product-lists clearfix select4">
                <?php foreach($data as $rows): ?>
                <div class="product-item" style="position: relative;">
                    <div
                        style=" z-index: 1; position: absolute; width: 30px; line-height: 30px; border-radius: 30px; background: black; color:white; text-align: center;">
                        <?php echo $rows->discount; ?>%</div>
                    <a href="index.php?controller=wishlist&action=create&id=<?php echo $rows->id; ?>"><i
                            style=" z-index: 1; position: absolute; width: 70px; color:black; right:-44px ; top:0px; font-size: 25px;"
                            class="fa fa-heart" aria-hidden="true"></i></a>
                    <div class="img">
                        <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>">
                            <img class="lazyload" data-sizes="auto"
                                src="assets/upload/products/<?php echo $rows->photo; ?>"
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
                            <span style="text-decoration:line-through; font-size:15px; color:gray; margin-left: 20px;"
                                class="tp_product_price"><?php echo number_format($rows->price); ?>₫</span>
                        </div>
                        <div style="text-align: center;">
                            <form action="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>"
                                method="post">
                                <div class="select-wrapper number-wrapper">
                                    <input type="hidden" value="<?php  echo $_SERVER['REQUEST_URI']; ?>"
                                        class="text-center" name="url">
                                    <input type="hidden" id="pview-qtt" value="1" min="1" max="5000" class="text-center"
                                        name="sl">
                                </div>
                                <div class="add">
                                    <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><span
                                            style="background-color:#fba617d1; font-weight: bold; width:100px;"
                                            class="btn btn-secondary">Chi tiết</span></a>
                                    <button type="submit"
                                        style="background-color:#fba617d1; font-weight: bold; width: 110px;"
                                        class="btn btn-secondary AddToCart" title="Thêm vào giỏ hàng"
                                        onclick="alert('Thêm vào giỏ hàng thành công')">
                                        Thêm vào giỏ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <style type="text/css">
              .add {opacity: 0;}
              .product-item:hover .add { opacity: 1; transition: 0.5s;}
            </style>
      <div class="paginate text-center">
        
        <div id="pagination">
          <?php $keysearch = isset($_GET["searchkey"])? $_GET["searchkey"]:""; ?>
          <?php if($numPage>1): ?>
              <div class="paginator">
              <a rel="nofollow" class="paging-first" href="index.php?controller=search&action=searchproduct&searchkey=<?php echo $keysearch; ?>&page=1"></a>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <a class="currentPage" href="index.php?controller=search&action=searchproduct&searchkey=<?php echo $keysearch; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
              <?php endfor; ?>
              <a rel="nofollow" class="paging-last" href="index.php?controller=search&action=searchproduct&searchkey=<?php echo $keysearch; ?>&page=<?php echo $numPage; ?>"></a>
              </div>
          <?php endif; ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
  //load LayoutTrangChu.php
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<?php if ($ProductsOrder==NULL):?>
    <br><br>
    <div class="alert alert-warning" role="alert" style="text-align:center; width:80%; margin:auto;">
        Bạn chưa sử dụng sản phẩm nào của cửa hàng!
    </div>
    <br><br>
<?php else: ?>
<br><br>
<table class="table table-bordered table-hover" style="width:80%;margin:auto;">
    <tr>
        <th style="width: 100px;">Photo</th>
        <th>Name</th>
        <th>Price</th>
        <th></th>
    </tr>
    <?php foreach($ProductsOrder as $rows): ?>
    <tr>
        <td style="text-align: center;"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="assets/Upload/Products/<?php echo $rows->photo; ?>"
                style="width:100px;"></a></td>
        <td style="text-align: center; line-height:80px;"><?php echo $rows->name; ?></td>
        <td style="text-align: center; line-height:80px;"><?php echo number_format($rows->price); ?>₫</td>
        <td style="text-align: center; font-size: 20px; width:100px; line-height:80px;"> <a
                href="index.php?controller=rating&action=ratingProduct&id=<?php echo $rows->id; ?>"
                class="label label-success">Đánh giá</a></td>
    </tr>
    <?php endforeach; ?>
</table><br><br>
<?php endif; ?>
<?php 
  //load LayoutTrangChu.php
$this->layoutPath = "LayoutTrangTrong.php";
?>
<div id="PageContainer" class="is-moved-by-drawer">
  <div class="container">
    <div class="article-img text-center">
    </div>
    <h1><?php echo $record->name; ?></h1>
    <div class="article-detail rte">
     <p><?php echo $record->description; ?></p>
     <p><?php echo $record->content; ?></p>
   </div>
 </div>
</div>